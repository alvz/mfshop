<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    $this->getProduct()->name => array('product/view', 'id' => $this->getProduct()->id),
    'Product Images' => array('admin', 'pid' => $this->getProduct()->id),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Images', 'url' => array('admin', 'pid' => $pid)),
);
?>

<h1>Upload Image(s)</h1>

<?php
echo $this->renderPartial('_form', array(
    'model' => $model,
    'pid' => $pid,
));
?>