<?php
$baseUrl = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('http://www.google.com/jsapi');
$cs->registerCoreScript('jquery');
$cs->registerScriptFile($baseUrl . '/js/jquery.gvChart-1.0.1.min.js');
$cs->registerScriptFile($baseUrl . '/js/pbs.init.js');
//$cs->registerCssFile($baseUrl . '/css/jquery.css');
?>

<?php $this->pageTitle = Yii::app()->name; ?>

<h1>Welcome to the Dashboard</h1>
<div class="flash-notice">This is the admin console called <b>Dashboard</b>. You can access and manage all parts of your site from here</div>
<div class="span-23 showgrid">
    <div class="dashboardIcons span-16">

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('userCart/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-shopping-cart2.png" alt="Order History" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('userCart/admin'); ?>">Order History</a></div>
        </div>   

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('user/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-people.png" alt="Customers" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('user/admin'); ?>">Customers</a></div>
        </div>

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('product/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-barcode.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('product/admin'); ?>">Products</a></div>
        </div>

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('commentProduct/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-chat.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('commentProduct/admin'); ?>">All Comments</a></div>
        </div>

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('user/view',array('id'=>  Yii::app()->user->getId())); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-contact.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('user/view',array('id'=>  Yii::app()->user->getId())); ?>">My Account</a></div>
        </div>

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('tag/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-tags.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('tag/admin'); ?>">Tags</a></div>
        </div>

        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('faq/admin'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-help.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('faq/admin'); ?>">FAQs</a></div>
        </div>
        
        <div class="dashIcon span-3">
            <a href="<?php echo Yii::app()->getController()->createUrl('srbac/authitem/frontpage'); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/big_icons/icon-lock.png" alt="Products" /></a>
            <div class="dashIconText"><a href="<?php echo Yii::app()->getController()->createUrl('srbac/authitem/frontpage'); ?>">Access Rules</a></div>
        </div>        

    </div><!-- END OF .dashIcons -->

</div>