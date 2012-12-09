<?php
$this->breadcrumbs = array(
    'User Carts' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List UserCart', 'url' => array('index')),
    array('label' => 'Create UserCart', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-cart-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Carts</h1>

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
    'id' => 'user-cart-grid',
    'dataProvider' => $model->search(),
    //'filter'=>$model,
    'columns' => array(
        array(
            'name' => 'user_id',
            'type'=>'html',
            'value' => 'CHtml::Link(User::model()->findByPk($data->user_id)->username,array("user/view","id"=>$data->user_id))',
        ),
        array(
            'name' => 'product_id',
            'type'=>'html',
            'value' => 'CHtml::Link(Product::model()->findByPk($data->product_id)->name,array("product/view","id"=>$data->product_id))',
        ),
        array(
            'name' => 'status',
            'value' => 'Lookup::item("cartStatus", $data->status)',
        ),
        'count',
        array(
            'name'=>'final_price',
            'value'=>'Product::model()->findByPk($data->product_id)->price * UserCart::model()->findByPk($data->id)->count',
        ),
        array(
            'name' => 'creation_time',
            'value' => 'date("F j, Y \a\t h:i:s A", $data->creation_time)',
        ),
        array(
            'name' => 'update_time',
            'value' => 'date("F j, Y \a\t h:i:s A", $data->update_time)',
        ),
        array(
            'name' => 'pay_time',
            'value' => 'date("F j, Y \a\t h:i:s A", $data->pay_time)',
        ),
    ),
));
?>
