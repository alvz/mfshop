<?php $this->beginWidget('ext.EChosen.EChosen'); ?>
<div class="row">
    <?php echo CHtml::activeLabelEx($bookModel, 'isbn'); ?>
    <?php echo CHtml::activeTextField($bookModel, 'isbn'); ?>
    <?php echo CHtml::error($bookModel, 'isbn'); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabelEx($bookModel, 'publisher_id'); ?>
    <?php echo CHtml::activeListBox($bookModel, 'publisher_id', 
            CHtml::listData(Publisher::model()->findAll(), 'id', 'name'), array('class' => 'chzn-rtl chzn-select')); ?>
    <?php echo CHtml::error($bookModel, 'publisher_id'); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabelEx($bookModel, 'pages_count'); ?>
    <?php echo CHtml::activeTextField($bookModel, 'pages_count'); ?>
    <?php echo CHtml::error($bookModel, 'pages_count'); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabelEx($bookModel, 'edition'); ?>
    <?php echo CHtml::activeTextField($bookModel, 'edition'); ?>
    <?php echo CHtml::error($bookModel, 'edition'); ?>
</div>

<div class="row">
    <?php echo CHtml::activeLabelEx($bookModel, 'press_number'); ?>
    <?php echo CHtml::activeTextField($bookModel, 'press_number'); ?>
    <?php echo CHtml::error($bookModel, 'press_number'); ?>
</div>
<?php $this->endWidget(); ?>
