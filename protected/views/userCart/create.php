<?php
$this->breadcrumbs=array(
	'User Carts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCart', 'url'=>array('index')),
	array('label'=>'Manage UserCart', 'url'=>array('admin')),
);
?>

<h1>Create UserCart</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>