<div class="wide form">
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isbn'); ?>
		<?php echo $form->textField($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publisher_id'); ?>
		<?php echo $form->textField($model,'publisher_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pages_count'); ?>
		<?php echo $form->textField($model,'pages_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edition'); ?>
		<?php echo $form->textField($model,'edition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'press_number'); ?>
		<?php echo $form->textField($model,'press_number'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->