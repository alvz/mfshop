<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_image_url')); ?>:</b>
	<?php echo CHtml::encode($data->product_image_url); ?>
	<br />


</div>