<?php
$this->breadcrumbs = array(
    'Products'=>array('product/index'),
    'Manage All Comments'=>array('commentProduct/admin'),	
    $model->email,
);

$this->menu = array(
    //array('label' => 'List CommentProduct', 'url' => array('index', 'pid' => $model->product->id)),
    //array('label' => 'Create CommentProduct', 'url' => array('create', 'pid' => $model->product->id)),
    array('label' => 'Update Comment', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Comment', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label'=>'Manage All Comments', 'url'=>array('admin')),
);
?>

<h1>View CommentProduct #<?php echo $model->id; ?></h1>
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(        
        'email',
        'name',
        'comment_text',
        array(
            'label' => 'Product',
            'value' => CHtml::encode($model->product->name),
        ),        
        array(
            'label'=>'Create Time',
            'value'=>  CHtml::encode(date('j F, Y  H:i:s A',$model->comment_time)),
        ),
        array(
            'name' => 'status',
            'value' => CHtml::encode(Lookup::item('commentStatus', $model->status))
        )
    ),
));
?>
