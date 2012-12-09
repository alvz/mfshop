<div class="view">	

    	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
    	
	<?php echo CHtml::encode($data->comment_text); ?>
	<br />

        <br/>
	<?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->comment_time)); ?>
	<br />

</div>