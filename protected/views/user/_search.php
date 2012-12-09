<div class="wide form">
    <?php $this->Widget('ext.EChosen.EChosen'); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
            ));
    ?>


    <div class="row">
        <?php echo $form->label($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 60)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>        
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>        
    </div>

    <div class="row" style="border-width: 1px;padding: 5px 0 5px 8px;
         margin-left: 10px;margin-right: 20px;
         -moz-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, .15) inset;
         box-shadow: 0px 1px 8px rgba(0, 0, 0, .15) inset;">
        <div class="sidebyside">
            <div class="leftside">
                <?php echo CHtml::label('Last login (From)', 'loginfromDate', array('style' => 'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'loginfromDate',
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
                <?php echo CHtml::label('Last login (To)', 'logintoDate', array('style' => 'margin-top: 10px')) ?>
                <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'name' => 'logintoDate',
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
        <?php echo $form->label($model, 'status'); ?>
        <?php
        echo $form->dropDownList($model, 'status', Lookup::items('userStatus'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:150px'));
        ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'phone_number'); ?>
<?php echo $form->textField($model, 'phone_number'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'phone_number2'); ?>
<?php echo $form->textField($model, 'phone_number2'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'cell_number'); ?>
<?php echo $form->textField($model, 'cell_number'); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'off_percent'); ?>
<?php echo $form->textField($model, 'off_percent'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search',array('class'=>'button grey')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->