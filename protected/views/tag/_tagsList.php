<?php
$this->widget('ext.EChosen.EChosen');
echo CHtml::DropDownList('Product_tags', '', CHtml::listData(Tag::model()->findAll(), 'id', 'name'), array(
    'multiple' => 'multiple',
    'class' => 'chzn-select',
    'style' => 'width:400px',
));
?>
<?php if (Yii::app()->user->hasFlash('tagadded')) { ?>
    <div class="flash-success" style="width: 280px;float: bottom;">
        <?php echo Yii::app()->user->getFlash('tagadded'); ?>
    </div>
    <?php
    Yii::app()->clientScript->registerScript(
            'fadeAndHideEffect', '$(".flash-success").animate({opacity: 1.0}, 3000).fadeOut("slow");'
    );
} elseif (Yii::app()->user->hasFlash('tagexist')) {
    ?>
    <div class="flash-error" style="width: 280px;position: relative;float: outside;z-index: 5;">
        <?php echo Yii::app()->user->getFlash('tagexist'); ?>
    </div>
    <?php
    Yii::app()->clientScript->registerScript(
            'fadeAndHideEffect2', '$(".flash-error").animate({opacity: 1.0}, 3000).fadeOut("slow");'
    );
}
?>
