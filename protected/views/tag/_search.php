<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>


    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 20, 'maxlength' => 20)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'frequency'); ?>
        <?php echo $form->textField($model, 'frequency'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search',array('class' => 'button grey')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->