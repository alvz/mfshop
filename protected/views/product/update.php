<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List Product', 'url' => array('index')),
    array('label' => 'Create Product', 'url' => array('create')),
    array('label' => 'View Product', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Product', 'url' => array('admin')),
    array('label' => 'Upload Images', 'url' => array('productImage/create', 'pid' => $model->id)),
    array('label' => 'Create Comment', 'url' => array('commentProduct/create', 'pid' => $model->id)),
);
?>

<h1>Update Product</h1>

<?php
echo $this->renderPartial('_form_update', array(
    'model' => $model,
    'bookModel' => $bookModel,
    'videoModel' => $videoModel,
));
?>