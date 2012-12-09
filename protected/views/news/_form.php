<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        'enableAjaxValidation' => true,        
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <?php
    echo $form->labelEx($model, 'news_text');
    $this->widget('ext.editMe.ExtEditMe', array(
        'model' => $model,
        'attribute' => 'news_text',
    ));
    echo $form->error($model, 'news_text');
    ?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'grey button')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->