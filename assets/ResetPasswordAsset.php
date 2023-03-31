<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ResetPasswordAsset extends AssetBundle
{
    public $basePath = '@webroot';//@app/themes/my-theme/assets
    public $baseUrl = '@web';
    public $css = [
        'css-site/site.css',
        'css/bootstrap.min.css',
        'css/icons.min.css',
        'css/app.min.css',
        'css/custom.min.css',
        
    ];
    public $js = [
        'js/layout.js',
        'libs/bootstrap/js/bootstrap.bundle.min.js',
        'libs/simplebar/simplebar.min.js',
        'libs/node-waves/waves.min.js',
        'libs/feather-icons/feather.min.js',
        'js/pages/plugins/lord-icon-2.1.0.js',
        'js/plugins.js',
        'libs/particles.js/particles.js',
        'js/pages/particles.app.js'
        
        
    ];
    public $depends = [

    ];
}