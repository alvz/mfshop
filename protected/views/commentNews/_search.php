<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php $this->widget('ext.EChosen.EChosen'); ?>
	<div class="row">
		<?php echo $form->label($model,'news_id'); ?>
		<?php echo $form->textField($model,'news_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment_time'); ?>
		<?php echo $form->textField($model,'comment_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',  Lookup::items('commentStatus'),array('class'=>'chzn-select')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search',array('class' => 'button grey')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->