<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    'Manage All Comments' => array('commentProduct/admin'),
    $model->email => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    //array('label'=>'List CommentProduct', 'url'=>array('index','pid'=>$model->product->id)),
    //array('label'=>'Create CommentProduct', 'url'=>array('create','pid'=>$model->product->id)),
    array('label' => 'View Comment', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage All Comments', 'url' => array('admin', 'pid' => $model->product->id)),
);
?>

<h1>Update CommentProduct <?php echo $model->id; ?></h1>
<?php $this->widget('ext.EChosen.EChosen'); ?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>