<?php
$this->breadcrumbs=array(
	'Comment News'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommentNews', 'url'=>array('index')),
	array('label'=>'Create CommentNews', 'url'=>array('create')),
	array('label'=>'View CommentNews', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommentNews', 'url'=>array('admin')),
);
?>

<h1>Update CommentNews <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>