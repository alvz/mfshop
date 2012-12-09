<?php
$this->breadcrumbs=array(
	'Comment News',
);

$this->menu=array(
	array('label'=>'Create CommentNews', 'url'=>array('create')),
	array('label'=>'Manage CommentNews', 'url'=>array('admin')),
);
?>

<h1>Comment News</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
