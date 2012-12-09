<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="shortcut icon" type="image/x-icon" href="favicon4.png" />

        <!-- qq fileupload begin -->
        <script src="fileupload/jquery-1.7.1.min.js"></script>
        <script src="fileupload/fileuploader.js"></script>
        <link rel="stylesheet" type="text/css" href="fileupload/fileuploader.css" />
        <!-- qq fileupload end -->

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jui/jquery.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/jui/jquery-ui.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    </head>

    <body>

        <div class="container" id="page">
            <div id="topnav">                
                <div class="topnav_text">
                    <?php if (!Yii::app()->user->isGuest): ?>
                        Last login: <?php echo date('F d, Y, G:i', Yii::app()->user->lastLoginTime); ?> | 
                    <?php endif; ?>
                    <?php echo CHtml::link('Home', array('/site/index')); ?> | 
                    <?php
                    if (!Yii::app()->user->isGuest) {
                        echo CHtml::link('My Account', array('user/view', 'id' => Yii::app()->user->getId())).' | ';
                    }
                    ?>  
                    <?php
                    if(Yii::app()->user->isGuest){
                        echo CHtml::link('Register', array('user/create')).' | ';
                        echo CHtml::link('Login', array('/site/login'));
                    }
                    else
                        echo CHtml::link('Logout (' . Yii::app()->user->name . ')', array('/site/logout'));
                    ?>
                </div>
            </div>
            <div id="header">
                <div id="logo"><img align="left" src="<?php echo Yii::app()->assetManager->baseUrl; ?>/images/logo.png"></img>                    
                    <img align="right" src="<?php echo Yii::app()->assetManager->baseUrl; ?>/images/logo-invert.png"></img>
                    <div id="logotext">
<?php echo CHtml::encode(Yii::app()->name . ' - The Ultimate Choice For Those Who Only Want Best'); ?>
                    </div>
                </div>
            </div><!-- header -->

            <div id="mainmenu">

                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'About Us', 'url' => array('//site/page', 'view' => 'about')),
                        array('label' => 'Contact', 'url' => array('site/contact')),
                        array('label' => 'FAQ', 'url' => array('faq/index')),
                        array('label' => 'Dashboard', 'url' => array('/site/dashboard'),
                            'visible' => !Yii::app()->user->isGuest && Yii::app()->user->checkAccess('admin'), 'itemOptions' => array('class' => 'dashboardmenu')),
                        )));
                ?>
            </div> <!--mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>                           

<?php echo $content; ?>

            <div id="footer">
                <div class="paycards">
                    <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-visa2.png'); ?>
<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-mastercard.png'); ?>
<?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-paypal.png'); ?>
                </div>

                <div class="browsers"> 
<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-firefox.png'), 'http://www.firefox.com'); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-chrome.png'), 'http://www.google.com/chrome'); ?>
                </div>

                <div class="followus">
                    <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-facebook.png'), 'http://www.facebook.com/mfshop'); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-twitter2.png'), 'http://www.twitter.com/mfshop'); ?>
<?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-rss.png'), array('rss/productfeed')); ?>
                </div>

                <hr/>
                Copyright &copy; <?php echo date('Y'); ?> by MFShop.com<br/>
                All Rights Reserved.<br/>
<?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
