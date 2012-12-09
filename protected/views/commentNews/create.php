<?php
$this->breadcrumbs=array(
	'Comment News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommentNews', 'url'=>array('index')),
	array('label'=>'Manage CommentNews', 'url'=>array('admin')),
);
?>

<h1>Create CommentNews</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>