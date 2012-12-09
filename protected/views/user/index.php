<?php
$this->breadcrumbs = array(
    'Dashboard' => array('site/dashboard'),
    'Manage Users' => array('user/admin'),
    'Users',
);

$this->menu = array(
    array('label' => 'Create User', 'url' => array('create')),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

<h1>Users</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'sortableAttributes' => array(
        'username',
        'first_name',
        'last_name',
        'last_login_time',
        'off_percent',
        'status',
    ),
    'itemView' => '_view',
));
?>
