<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>
    <?php $this->widget('ext.EChosen.EChosen'); ?>
    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_id'); ?>
        <?php
        echo $form->dropDownList($model, 'product_id', CHtml::listData(Product::model()->findAll(), 'id', 'name'), array('class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px'));
        ?>
    </div>

    <div class="row" style="padding: 5px 0 5px 0;
         margin-left: 20px;margin-right: 20px;
         -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         box-shadow: 0px 1px 8px rgba(0, 0, 0, .15) inset;">
        <div class="sidebyside">
            <div class="leftside">
                <?php echo CHtml::label('From', 'fromDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'fromDate',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                    ),
                    'htmlOptions' => array(
                        'class' => 'shadowdatepicker'
                    ),
                ));
                ?>
            </div>
            <div class="righside">
                <?php echo CHtml::label('To', 'toDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'toDate',
                    // additional javascript options for the date picker plugin
                    'options' => array(
                        'showAnim' => 'fold',
                    ),
                    'htmlOptions' => array(
                        'class' => 'shadowdatepicker'
                    ),
                ));
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php
        echo $form->dropDownList($model, 'status', Lookup::items('commentStatus'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px'
        ));
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array('class' => 'button grey')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->