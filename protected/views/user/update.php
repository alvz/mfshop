<?php
if (Yii::app()->user->checkAccess('admin')) {
    $this->breadcrumbs = array(
        'Dashboard' => array('site/dashboard'),
        'Manage Users' => array('user/admin'),
    );
}
$this->breadcrumbs[$model->username] = array('view', 'id' => $model->id);
$this->breadcrumbs[]='Update';


$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
    array('label' => 'View User', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1>Update User "<i><?php echo $model->username; ?></i>"</h1>

<?php echo $this->renderPartial('_form_update', array('model' => $model, 'addressModel' => $addressModel)); ?>