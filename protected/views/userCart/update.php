<?php
$this->breadcrumbs=array(
	'User Carts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCart', 'url'=>array('index')),
	array('label'=>'Create UserCart', 'url'=>array('create')),
	array('label'=>'View UserCart', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserCart', 'url'=>array('admin')),
);
?>

<h1>Update UserCart <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>