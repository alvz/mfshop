<?php
$this->breadcrumbs=array(
    'Products'=>array('product/index'),
    $this->getProduct()->name=>array('product/view','id'=>$this->getProduct()->id),
	'Comments',
);

$this->menu=array(
	array('label'=>'Manage All Comments', 'url'=>array('admin')),
	//array('label'=>'Manage CommentProduct', 'url'=>array('admin')),
);
?>

<h1>Comment Products</h1>
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'sortableAttributes'=>array(
        'status',
        'name',
        'comment_time',
    ),
)); ?>
