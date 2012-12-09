<?php
$cs = Yii::app()->getClientScript();
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.css');
$this->breadcrumbs = array(
    'Faqs',
);

$this->menu = array(
    array('label' => 'Create Faq', 'url' => array('create')),
    array('label' => 'Manage Faq', 'url' => array('admin')),
);
?>
<?php $this->widget('ext.EChosen.EChosen'); ?>
<div class="container showgrid">
    <h1>Frequently Asked Questions</h1>

    <div class="span-16">

        <?php
        $this->widget('zii.widgets.jui.CJuiAccordion', array(
            'panels' => $panels,
            'options' => array(
                'animated' => 'bounceslide',
                'autoHeight' => 0,
            ),
            'htmlOptions' => array('class' => 'shadowaccordion'),
        ));
        ?>
    </div>
</div>
