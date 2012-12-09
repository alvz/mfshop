<div class="view">
    
    <b style="font-size: 16px;">
        <?php echo CHtml::link(CHtml::encode($data->title), array('view2', 'id' => $data->id)); ?>
    </b>
    <br /><br/>
    
    <div style="padding: 8px;">
        <?php echo $data->news_text; ?>
    </div>
    <br />
    
    <i><?php echo CHtml::encode(date('j F, Y  H:i:s A', $data->create_time)); ?></i>
    <br />

</div>