<?php
if (Yii::app()->user->checkAccess('admin')) {
    $this->breadcrumbs = array(
        'Dashboard' => array('site/dashboard'),
        'Manage Users' => array('user/admin'),);
}
$this->breadcrumbs[] = $model->username;

$this->menu = array(
    array('label' => 'List User', 'url' => array('index')),
    array('label' => 'Create User', 'url' => array('create')),
    array('label' => 'Update User', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete User', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1>View User <i>"<?php echo $model->username; ?></i>"</h1>

<?php
echo CHtml::link('Update Your Account', array('update','id'=>$model->id), array('class'=>'button grey'));
?>
<br/><br/>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'username',
        'first_name',
        'last_name',
        'email',
        array(
            'label' => $model->getAttributeLabel('last_login_time'),
            'value' => date("F j, Y \a\t h:i:s A", $model->last_login_time),
        ),
        'activation_code',
        array(
            'label' => $model->getAttributeLabel('status'),
            'value' => Lookup::item("userStatus", $model->status),
        ),
        'phone_number',
        'off_percent',
        'phone_number2',
        'cell_number',
    ),
));
?>
