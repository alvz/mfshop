<div class="view">
    <?php $this->widget('ext.EChosen.EChosen'); ?>
    
    <b><?php echo CHtml::encode($data->name); ?></b>
    <br />
    
    <div class="texthtml">
        <?php echo CHtml::encode($data->comment_text); ?>
    </div>
    <br />
    
    <i><?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->comment_time)); ?></i>
    <br />

</div>