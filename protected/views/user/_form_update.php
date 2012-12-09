<div class="form">
    <?php $this->Widget('ext.EChosen.EChosen'); ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => true,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::link('Change Password', array('user/changepassword', 'id' => $model->id)) ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'email', array('style' => 'margin-top: 20px;')); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 60)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row">
        <?php /* echo $form->labelEx($model, 'status'); ?>
          <?php echo $form->dropDownList($model, 'status', Lookup::items('userStatus'),array('class'=>'chzn-select','style'=>'width: 150px')); ?>
          <?php echo $form->error($model, 'status'); */ ?>
    </div>

    <div class="row">
        <?php /* echo $form->labelEx($model, 'off_percent'); ?>
          <?php echo $form->textField($model, 'off_percent'); ?>
          <?php echo $form->error($model, 'off_percent'); */ ?>
    </div>

    <div class="personalinfo-container" style="margin-top: 10px">
        <h3>Your Personal information:</h3>    
        <div class="row">
            <?php echo $form->labelEx($model, 'first_name'); ?>
            <?php echo $form->textField($model, 'first_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'first_name'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'last_name'); ?>
            <?php echo $form->textField($model, 'last_name', array('size' => 50, 'maxlength' => 50)); ?>
            <?php echo $form->error($model, 'last_name'); ?>
        </div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="sidebyside">
                <div class="leftside">
                    <?php echo $form->labelEx($model, 'phone_number'); ?>
                    <?php echo $form->textField($model, 'phone_number'); ?>
                    <?php echo $form->error($model, 'phone_number'); ?>
                </div>

                <div class="righside">
                    <?php echo $form->labelEx($model, 'phone_number2'); ?>
                    <?php echo $form->textField($model, 'phone_number2'); ?>
                    <?php echo $form->error($model, 'phone_number2'); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'cell_number'); ?>
            <?php echo $form->textField($model, 'cell_number'); ?>
            <?php echo $form->error($model, 'cell_number'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'country'); ?>
            <?php echo $form->textField($addressModel, 'country', array('size' => 40, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'country'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'state'); ?>
            <?php echo $form->textField($addressModel, 'state', array('size' => 35, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'state'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'city'); ?>
            <?php echo $form->textField($addressModel, 'city', array('size' => 20, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'city'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'street'); ?>
            <?php echo $form->textField($addressModel, 'street', array('size' => 20, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'street'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'alley'); ?>
            <?php echo $form->textField($addressModel, 'alley', array('size' => 20, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'alley'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'pelak'); ?>
            <?php echo $form->textField($addressModel, 'pelak', array('size' => 20, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'pelak'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($addressModel, 'unit'); ?>
            <?php echo $form->textField($addressModel, 'unit', array('size' => 20, 'maxlength' => 128)); ?>
            <?php echo $form->error($addressModel, 'unit'); ?>
        </div>
    </div>
    
    <?php if(Yii::app()->user->checkAccess('admin')){ ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', Lookup::items('userStatus'), array(
            'class' => 'chzn-select',
            'prompt' => 'select an option',
            'style' => 'width:200px;',
        )); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <?php } ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'button grey')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->