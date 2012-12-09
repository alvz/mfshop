<div class="wide form">
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'question'); ?>
		<?php echo $form->textArea($model,'question',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class'=>'grey button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->