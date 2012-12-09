<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id' => $data->id)); ?>
    <br /><br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('news_text')); ?>:</b>
    <div class="texthtml">
        <?php echo $data->news_text; ?>
    </div>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
    <?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->create_time)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_create_id')); ?>:</b>
    <?php echo CHtml::encode(User::model()->findByPk($data->user_create_id)->username); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
    <?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->update_time)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_update_id')); ?>:</b>
    <?php echo CHtml::encode(User::model()->findByPk($data->user_update_id)->username); ?>
    <br />


</div>