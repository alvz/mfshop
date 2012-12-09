<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->username), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
    <?php echo CHtml::encode($data->first_name); ?>
    <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
    <?php echo CHtml::encode($data->last_name); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('last_login_time')); ?>:</b>
    <?php echo CHtml::encode(date('F j, Y \a\t h:i:s A', $data->last_login_time)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('activation_code')); ?>:</b>
    <?php echo CHtml::encode($data->activation_code); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode(Lookup::item('userStatus',$data->status)); ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
    <?php echo CHtml::encode($data->phone_number); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('phone_number2')); ?>:</b>
    <?php echo CHtml::encode($data->phone_number2); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('cell_number')); ?>:</b>
    <?php echo CHtml::encode($data->cell_number); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('off_percent')); ?>:</b>
    <?php echo CHtml::encode($data->off_percent); ?>
    <br />

</div>