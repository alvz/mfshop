<?php
$this->breadcrumbs = array(
    'Dashboard' => array('site/dashboard'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        'username',
        'first_name',
        'last_name',
        'email',
        array(
            'name' => 'last_login_time',
            'value' => 'date("F j, Y \a\t h:i:s A", $data->last_login_time)',
        ),
        'activation_code',
        array(
            'name' => 'status',
            'value' => 'Lookup::item("userStatus",$data->status)',
        ),        
        'phone_number',        
        'off_percent',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
