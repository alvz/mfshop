<?php
if (Yii::app()->user->checkAccess('admin')) {
    $this->breadcrumbs = array(
        'Dashboard' => array('site/dashboard'),
        'Manage Users' => array('user/admin'),);
}
$this->breadcrumbs[] = 'Create';

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form_create', array('model'=>$model, 'addressModel'=>$addressModel)); ?>