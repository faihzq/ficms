<?php
use yii\web\JqueryAsset;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\ActiveForm;
use diggindata\signaturepad\SignaturePadWidget;
/** @var yii\web\View $this */
/** @var app\models\ReportDamage $model */

$this->title = $model->report_no;
$this->params['breadcrumbs'][] = ['label' => 'Borang Pendaftaran Latern Defect (LD)', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<link href="<?= \Yii::getAlias('@web');?>/libs/signature/css/jquery.signature.css" rel="stylesheet">
<style>
    .kbw-signature { width: 400px; height: 150px; }
</style>
<div class="report17-defect-view">

    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tandatangan Komander FIC</h5>
                </div>
                <div class="card-body">
                    
                        <div class="col-lg-12">
                            <div class="row">
                                <?php $form = ActiveForm::begin(); ?>
                                <div class="col-lg-12 mb-3">
                                    <div class="text-center">
                                    <p>Tandatangan Komander: <button type="button" class="btn btn-sm btn-light" id="clear">Clear</button></p>
                                    <div id="sign"></div>
                                    <?= $form->field($model, 'commander_sign')->hiddenInput(['id' => 'signature_data'])->label(false); ?>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'commander_name')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'sign_time', [
                                            'template' => '{label}<div class="input-group">
                                                            <span class="input-group-text"><i class="ri-calendar-2-line"></i></span>
                                                                {input}{hint}{error}
                                                            </div>',
                                        ])->textInput([ 'data-provider' => 'flatpickr','data-date-format'=>'', 'disabled'=>true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'commander_rank')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model, 'commander_position')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    
                    
                </div>
                <div class="card-footer">
                    <div class="form-group">                        
                        <a href="<?php echo Yii::$app->request->referrer ?: Yii::$app->homeUrl ?>" title="Cancel" class="btn btn-label btn-warning btn-animation bg-gradient waves-effect waves-light"><i class="mdi mdi-keyboard-return label-icon align-middle"></i>  Batal</a>
                        <?= Html::submitButton('<i class="mdi mdi-content-save-outline label-icon align-middle"></i> Hantar', ['class' => 'btn btn-label btn-success btn-animation bg-gradient waves-effect waves-light float-end']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>

<script src="<?= \Yii::getAlias('@web');?>/libs/signature/js/jquery.signature.js"></script>

<script>
    var sign = $('#sign').signature({ 
    change: function(event, ui) { 
        $('#signature_data').val(sign.signature('toDataURL'));
        },
    guideline:true,
    thickness: 2
    });

    $('#clear').click(function() {
        sign.signature('clear');
    });

    // $('#sign').draggable();
</script>

<?php if ($model->commander_sign): ?>
    <script>
        var signJson1 = '<?php echo $model->commander_sign; ?>';
        
        $('#sign').signature('enable').signature('draw', signJson1).signature('disable'); 
        $('#sign').removeClass('kbw-signature-disabled');  
        


    </script>
<?php endif ?>