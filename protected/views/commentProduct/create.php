<?php
$this->breadcrumbs=array(
    'Products'=>array('product/index'),
    $this->getProduct()->name=>array('product/view','id'=>$this->getProduct()->id),
	'Comments'=>array('index','pid'=>$this->getProduct()->id),
	'Create',
);

$this->menu=array(
	//array('label'=>'List CommentProduct', 'url'=>array('index','pid'=>$model->product->id)),
	array('label'=>'Manage All Comments', 'url'=>array('admin')),
);
?>

<h1>Create CommentProduct</h1>
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>