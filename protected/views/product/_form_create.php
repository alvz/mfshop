<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        )
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>    

    <div class="row">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php $this->beginWidget('ext.EChosen.EChosen'); ?>
        <?php
        echo $form->dropDownList($model, 'type', Lookup::items('productType'), array(
            'class' => 'chzn-rtl chzn-select',
            'prompt' => '-select product type-',
            'ajax' => array(
                'type' => 'POST',
                'url' => $this->createUrl('Product/chooseType'),
                'update' => '#bookorvideoform'
            )
        ));
        ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row">
        <table>
            <tr>
                <td>
                    <?php echo $form->labelEx($model, 'tags'); ?>
                    <?php
                    echo $form->dropDownList($model, 'tags', CHtml::listData(Tag::model()->findAll(), 'id', 'name'), array(
                        'multiple' => 'multiple',
                        'class' => 'chzn-select',
                        'style' => 'width:400px',
                    ));
                    ?>
                    <p class="hint">Select as many tags as you want</p>
                    <?php echo $form->error($model, 'tags'); ?>
                </td>
                <td style="padding-right: 2em">- OR -</td>
                <td>
                    <?php
                    echo CHtml::TextField('addTag', '', array(
                        'class' => 'hinttext',
                        'placeholder'=>'Create a new one',
                    )) . ' ' . CHtml::ajaxLink('Create', array('tag/UpdateTagsList'), array(
                        'type' => 'POST',
                        'replace' => '#' . CHtml::activeId($model, 'tags') . '_chzn',
                            )
                    );
                    ?>
                </td>
            </tr>
        </table>
    </div>
    <br/>
    <hr/>
    
    <?php
    echo $form->labelEx($model, 'description');
    $this->widget('ext.editMe.ExtEditMe', array(
        'model' => $model,
        'attribute' => 'description',
    ));
    echo $form->error($model, 'description');
    ?>
    <br/>
    <hr/>
<?php $this->endWidget(); ?>
    <!-- -------------------------------- bookorvideoform ------------------------------------------------- -->

    <div id="bookorvideoform"></div>

    <!-- --------------------------------- end of bookorvideoform ----------------------------------------- -->

    <div class="row buttons"> 
        <?php echo CHtml::submitButton(($model->isNewRecord) ? 'Create' : 'Save',array('class' => 'button grey')); ?>
    </div>

    <?php $this->endWidget();
    ?>

</div><!-- form -->
<script type="text/javascript"></script>
