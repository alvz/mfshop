<div class="wide form">
    <?php $this->widget('ext.EChosen.EChosen'); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'type'); ?>
        <?php
        echo $form->dropDownList($model, 'type', Lookup::items('productType'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'score'); ?>
        <?php
        echo $form->dropDownList($model, 'score', array('0', '1', '2', '3', '4', '5'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        ));
        ?>
    </div>

    <div class="row" style="border-width: 1px;padding: 5px 0 5px 0;
         margin-left: 20px;margin-right: 20px;
         -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         box-shadow: 0px 1px 8px rgba(0, 0, 0, .15) inset;">
        <div class="sidebyside">
            <div class="leftside">
                <?php echo CHtml::label('Created From', 'createfromDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'createfromDate',
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
                <?php echo CHtml::label('Created To', 'createtoDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'createtoDate',
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


    <div class="row" style="border-width: 1px;padding: 5px 0 5px 0;
         margin-left: 20px;margin-right: 20px;
         -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         box-shadow: 0px 1px 8px rgba(0, 0, 0, .15) inset;">
        <div class="sidebyside">
            <div class="leftside">
                <?php echo CHtml::label('Updated From', 'updatefromDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'updatefromDate',
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
                <?php echo CHtml::label('Updated To', 'updatetoDate',array('style'=>'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'updatetoDate',
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


    <div class="row buttons">
        <?php echo CHtml::submitButton('Search', array('class' => 'grey button')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->