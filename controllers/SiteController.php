<?php

namespace app\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;
use yii\bootstrap5\Html;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use app\models\VerifyEmailForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;

use app\models\Boat;
use app\models\ReportDamage;
use app\models\ReportSurvey;
use app\models\ReportRepair;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'login'],
                'rules' => [
                    [
                        'actions' => ['signup', 'login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // all boat
        $modelBoat = Boat::find()->all();
        $boatName = array();
        $totalBoatReport = array();
        $totalBoatReportFix = array();
        $totalBoatReportNotFix = array();
        $totalBoatReportNoWarranty = array();
        foreach ($modelBoat as $boat){
            $boatName[] = $boat->short_name;
            $totalBoatReport[] = ReportDamage::find()->where(['status_id'=>2])->andWhere(['boat_id'=>$boat->id])->count();
            $totalBoatReportFix[] = ReportRepair::find()->select('reportDamage.boat_id')->joinWith('reportSurvey')->joinWith('reportSurvey.reportDamage')->where(['report_repair.status_id' => 4,'report_damage.boat_id' => $boat->id])->count();
            $totalBoatReportNotFix[] = ReportRepair::find()->select('reportDamage.boat_id')->joinWith('reportSurvey')->joinWith('reportSurvey.reportDamage')->where(['report_repair.status_id' => 3,'report_damage.boat_id' => $boat->id])->count();
            $totalBoatReportNoWarranty[] = ReportSurvey::find()->joinWith('reportDamage')->where(['report_survey.status_id' => 3,'report_survey.warranty_protection' => 0,'report_damage.boat_id' => $boat->id])->count();
        }

        // status boat
        $total = Boat::find()->count();
        $active = Boat::find()->andWhere(['boat_status_id'=>1])->count();
        $inactive = Boat::find()->andWhere(['boat_status_id'=>2])->count();

        $activePercent = round((($active / $total) * 100), 0); 
        $inactivePercent = round((($inactive / $total) * 100), 0); 

        // pie chart report
        $totalDamage = ReportDamage::find()->count();
        $totalSurvey = ReportSurvey::find()->count();
        $totalRepair = ReportRepair::find()->count();
        $totalAllReport = $totalDamage + $totalSurvey + $totalRepair;
        $totalReport = ReportDamage::find()->andWhere(['status_id'=>2])->count(); // total report yg dah approved
        $totalFixed = ReportRepair::find()->andWhere(['status_id'=>4])->count(); // report pembaikan yg dah approved
        $totalNotFixed = ReportRepair::find()->andWhere(['status_id'=>3])->count();; // report kerosakan yg dah approved tapi belum dibaiki
        $totalNoWarranty = ReportSurvey::find()->andWhere(['status_id'=>3])->andWhere(['warranty_protection'=>0])->count(); // report tinjauan yg dah approved and no warranty

        if ($totalReport){
            $fixedPercent = ($totalFixed / $totalReport) * 100;
            $notFixedPercent = ($totalNotFixed / $totalReport) * 100;
            $noWarrantyPercent = ($totalNoWarranty / $totalReport) * 100;
        } else {
            $fixedPercent = 0;
            $notFixedPercent = 0;
            $noWarrantyPercent = 0;
        }
        

        if (Yii::$app->user->isGuest) {
            return $this->redirect(['login']);
        }

        return $this->render('index', [
            'modelBoat' => $modelBoat,
            'boatName' => json_encode($boatName),
            'totalBoatReport' => json_encode($totalBoatReport),
            'totalBoatReportFix' => json_encode($totalBoatReportFix),
            'totalBoatReportNotFix' => json_encode($totalBoatReportNotFix),
            'totalBoatReportNoWarranty' => json_encode($totalBoatReportNoWarranty),
            'total' => $total,
            'active' => $active,
            'inactive' => $inactive,

            'activePercent' => $activePercent,
            'inactivePercent' => $inactivePercent,

            'totalAllReport' => $totalAllReport,

            'totalReport' => $totalReport,
            'totalFixed' => $totalFixed,
            'totalNotFixed' => $totalNotFixed,
            'totalNoWarranty' => $totalNoWarranty,

            'fixedPercent' => $fixedPercent,
            'notFixedPercent' => $notFixedPercent,
            'noWarrantyPercent' => $noWarrantyPercent,
        ]);
    }

    public function actionGetList()
    {
        $status = $_GET['status'];
        $status = (!empty($status) ? ['boat_status_id' => $status] : '');

        switch ($_GET['order'][0]['column']) {
            case 1:
                $sort = "boat_name " . $_GET['order'][0]['dir'];
                break;

            default:
                $sort = 'id ASC';
                break;
        }

        $output = [];

        $query = Boat::find()
                ->where($status) // boat status
                ->orderBy($sort);
        

        if ($_GET['search']['value'] != null) {
            $query->andWhere([
                'OR',
                ["LIKE", "boat_name", $_GET['search']['value']],
            ]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->pageSize = $_GET['length'];
        $model = $query->offset(($_GET['start']))
            ->limit($pages->limit)
            ->all();

        $x = $_GET['start'] + 1;

        foreach ($model as $key => $value) {

            $output[] = array(
                $x,
                $value->boat_name,
                '<span class="badge badge-border '. $value->status->StatusLabel. ' text-uppercase">'.$value->status->name.'</span>',
                $value->getCheckTable($value->prop_check),
                $value->getCheckTable($value->gen_check),
                $value->getCheckTable($value->nav_check),
                $value->getCheckTable($value->comm_check),
                $value->getCheckTable($value->warfare_check),
            );

            $x++;
        }

        $output = array(
            "recordsTotal" => $countQuery->count(),
            "recordsFiltered" => $countQuery->count(),
            "data" => $output
        );

        return json_encode($output);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        // $viewToken = Yii::$app->getRequest()->getQueryParam('view-token');

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success');
            return $this->goBack();
            // if ($viewToken) {
            //     return $this->redirect(['ticket/view','id'=>$viewToken]);
            // } else {
            
            // }
        }

        $model->password = '';
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
 
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->renderPartial('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->renderPartial('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->renderPartial('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
