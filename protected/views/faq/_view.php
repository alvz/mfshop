<div class="view">
<?php $this->widget('ext.EChosen.EChosen'); ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('question')); ?>:</b>
	<?php echo CHtml::encode($data->question); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo $data->answer; ?>
	<br />


</div>