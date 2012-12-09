<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('index')),
    array('label' => 'Create News', 'url' => array('create')),
    array('label' => 'Update News', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete News', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage News', 'url' => array('admin')),
    array('label' => 'Create Comment', 'url' => array('/commentNews/create', 'newsid' => $model->id))
);
?>

<h1>View News "<i><?php echo $model->title; ?></i>"</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'title',
        array(
            'label' => $model->getAttributeLabel('news_text'),
            'type' => 'html',
            'value' => $model->news_text,
        ),
        array(
            'label' => 'Create Time',
            'value' => date('F j, Y \a\t h:i:s A', $model->create_time),
        ),
        array(
            'label' => 'Update Time',
            'value' => date('F j, Y \a\t h:i:s A', $model->update_time),
        ),
        array(
            'label' => 'Created by',
            'value' => User::model()->findByPk($model->user_create_id)->username,
        ),
        array(
            'label' => 'Created by',
            'value' => User::model()->findByPk($model->user_update_id)->username,
        ),
    ),
));
?>

<br>
<h1>News Comments</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $commentNewsDataProvider,
    'itemView' => '/commentNews/_view',
    'sortableAttributes' => array(
        'name',
        'comment_time',
        'status',
    ),
));
