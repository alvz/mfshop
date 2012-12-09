<?php
$this->breadcrumbs = array(
    'News',
);

$this->menu = array(
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'Manage News', 'url' => array('admin')),
);
?>

<h1>News</h1>

<?php
if (Yii::app()->user->checkAccess('admin')) {
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
        'sortableAttributes' => array(
            'title',
            'create_time',
            'update_time',
        ),
    ));
} else {
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view2',
        'sortableAttributes' => array(
            'title',
            'create_time',            
        ),
    ));
}
?>
