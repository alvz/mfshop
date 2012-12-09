<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    $this->getProduct()->name => array('product/view', 'id' => $this->getProduct()->id),
    'Product Images',
);

$this->menu = array(
    array('label' => 'Upload Images', 'url' => array('create', 'pid' => $_GET['pid'])),
    array('label' => 'Manage Images', 'url' => array('admin', 'pid' => $_GET['pid'])),
);
?>

<h1>Product Images</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
