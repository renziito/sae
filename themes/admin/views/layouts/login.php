<!DOCTYPE html>
<html>
    <head>
        <?php $this->renderPartial('//layouts/sections/_head'); ?>
        <script type="text/javascript">
            window.onload = function () {
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="<?= Yii::app()->theme->getBaseUrl() ?>/pages/css/windows.chrome.fix.css" />'
            }
        </script>
    </head>
    <body class="fixed-header ">
        <div class="login-wrapper ">
            <!-- START Login Background Pic Wrapper-->
            <div class="bg-pic">
                <!-- START Background Pic-->
                <img src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/img/back.jpg" 
                     data-src="<?= Yii::app()->theme->getBaseUrl() ?>/assets/img/back.jpg" 
                     data-src-retina="<?= Yii::app()->theme->getBaseUrl() ?>/assets/img/back.jpg" alt="" class="lazy">
                <!-- END Background Pic-->
                <!-- START Background Caption-->
                <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                    <h2 class="semi-bold text-white">
                        SAE
                    </h2>
                    <p class="small">
                       Sistema de Administración del Edificio 
                    </p>
                </div>
                <!-- END Background Caption-->
            </div>
            <!-- END Login Background Pic Wrapper-->
            <!-- START Login Right Container-->
            <div class="login-container bg-white">
                <div class="login-form p-l-50 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                    <img src="<?= Yii::app()->getBaseUrl() ?>/images/logo_black.png" alt="logo" 
                          data-src="<?= Yii::app()->getBaseUrl() ?>/images/logo_black.png" 
                          data-src-retina="<?= Yii::app()->getBaseUrl() ?>/images/logo_black.png" width="auto"
                          class="m-b-20">
                    <?= $content ?>
                </div>
            </div>
            <!-- END Login Right Container-->
        </div>
        <?php $this->renderPartial('//layouts/sections/_scripts'); ?>
    </body>
</html>