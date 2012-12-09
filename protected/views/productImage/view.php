<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    $model->product->name => array('product/view', 'id' => $model->product_id),
    'Product Images' => array('admin', 'pid' => $model->product_id),
    'View Image',
);

$this->menu = array(
    array('label' => 'List ProductImage', 'url' => array('index', 'pid' => $model->product_id)),
    array('label' => 'Upload Images', 'url' => array('productImage/create', 'pid' => $model->product_id)),
    array('label' => 'Delete ProductImage', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Images', 'url' => array('admin', 'pid' => $model->product_id)),
);
?>

<h1>View Image</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Product Name',
            'value' => $model->product->name,
        ),
        'product_image_url',
    ),
));
?>
