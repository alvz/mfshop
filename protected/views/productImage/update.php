<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    $model->product->name => array('product/view', 'id' => $model->product_id),
    'Product Images' => array('admin', 'pid' => $model->product_id),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'List ProductImage', 'url' => array('index')),
    array('label' => 'Create ProductImage', 'url' => array('create')),
    array('label' => 'View ProductImage', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage ProductImage', 'url' => array('admin')),
    array('label' => 'Back to The Product', 'url' => array('product/create', 'id' => $pid)),
);
?>

<h1>Update ProductImage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>