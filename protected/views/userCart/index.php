<?php
$this->breadcrumbs=array(
	'User Carts',
);

$this->menu=array(
	array('label'=>'Create UserCart', 'url'=>array('create')),
	array('label'=>'Manage UserCart', 'url'=>array('admin')),
);
?>

<h1>User Carts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
