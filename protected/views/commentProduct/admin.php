<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    'Manage All Comments',
);

$this->menu = array(
    array('label' => 'Back to Products', 'url' => array('product/index')),        
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('comment-product-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Comment Products</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php $this->widget('ext.EChosen.EChosen'); ?>
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
    'id' => 'comment-product-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(        
        'email',
        'name',
        'comment_text',
        array(
            'name' => 'product_id',
            'type'=>'html',
            'value' => 'CHtml::Link(CHtml::encode($data->product->name),
                array(\'product/view\',\'id\'=>$data->product->id))',
        ),
        array(
            'name' => 'comment_time',            
            'value' => 'CHtml::encode(date(\'j F, Y  H:i:s A\',$data->comment_time))',
        ),
        array(
            'name' => 'status',
            'value' => 'CHtml::encode(Lookup::item(\'commentStatus\', $data->status))',
            //'filter'=>  Lookup::items('commentStatus'),            
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
