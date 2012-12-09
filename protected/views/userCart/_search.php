<div class="wide form">
    <?php $this->widget('ext.EChosen.EChosen'); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>


    <div class="row">
        <?php echo $form->label($model, 'user_id'); ?>
        <?php
        echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'username')
                , array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_id'); ?>
        <?php echo $form->dropDownList($model, 'product_id', CHtml::listData(Product::model()->findAll(), 'id', 'name'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        )); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('cartStatus'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        )); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'count'); ?>
        <?php echo $form->textField($model, 'count'); ?>
    </div>

    <div class="row buttons">
<?php echo CHtml::submitButton('Search',array('class'=>'grey button')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->