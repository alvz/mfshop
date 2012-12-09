<div class="view">
<?php $this->widget('ext.EChosen.EChosen'); ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isbn')); ?>:</b>
	<?php echo CHtml::encode($data->isbn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publisher_id')); ?>:</b>
	<?php echo CHtml::encode($data->publisher_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pages_count')); ?>:</b>
	<?php echo CHtml::encode($data->pages_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('edition')); ?>:</b>
	<?php echo CHtml::encode($data->edition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('press_number')); ?>:</b>
	<?php echo CHtml::encode($data->press_number); ?>
	<br />


</div>