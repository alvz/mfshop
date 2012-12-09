<div class="view">
    <?php $this->widget('ext.EChosen.EChosen'); ?>
    <b><?php echo CHtml::link('Edit this comment', array('commentProduct/update', 'id' => $data->id)); ?></b>
    <br/><br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br /><br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('comment_text')); ?>:</b>
    <div class="texthtml">
        <?php echo CHtml::encode($data->comment_text); ?>
    </div>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('comment_time')); ?>:</b>
    <?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->comment_time)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode(Lookup::item('commentStatus', $data->status)); ?>
    <br />


</div>