<?php
$this->breadcrumbs=array(
	'Comment News'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CommentNews', 'url'=>array('index')),
	array('label'=>'Create CommentNews', 'url'=>array('create')),
	array('label'=>'Update CommentNews', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommentNews', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommentNews', 'url'=>array('admin')),
);
?>

<h1>View CommentNews #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'news_id',
		'comment_text',
            array(
		'label'=>$model->getAttributeLabel('comment_time'),
                'value'=>date('F j, Y \a\t h:i:s A', $model->comment_time),
                ),
		'email',
		'name',
            array(                
		'label'=> 'status',
                'value' => CHtml::encode(Lookup::item('commentStatus', $model->status)),
                ),
	),
)); ?>
