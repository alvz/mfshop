<div class="form">
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'password-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="note">Please enter new password (at least 6 characters) .</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <?php echo CHtml::label('New Password', CHtml::activeId($model, 'password')); ?>
    <?php echo $form->passwordField($model, 'password', array(
        'size' => 60,
        'maxlength' => 256,
        'autocomplete' => 'off',
        )); ?>
    <?php echo $form->error($model, 'password'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'password_repeat'); ?>
    <?php echo $form->passwordField($model, 'password_repeat', array('size' => 60,
        'maxlength' => 256,
        'autocomplete' => 'off',
        )); ?>        
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button grey')); ?>
</div>

<?php $this->endWidget(); ?>
</div>