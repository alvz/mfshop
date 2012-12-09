<div class="row">
    <?php echo CHtml::activeLabelEx($videoModel, 'duration'); ?>
    <?php echo CHtml::activeTextField($videoModel, 'duration'); ?>
    <p class="hint">Duration in minutes</p>
    <?php echo CHtml::error($videoModel, 'duration'); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabelEx($videoModel, 'format'); ?>
    <?php echo CHtml::activeTextField($videoModel, 'format'); ?>
    <?php echo CHtml::error($videoModel, 'format'); ?>
</div>