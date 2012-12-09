<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List News', 'url' => array('index')),
    array('label' => 'Create News', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage News</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'news-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'enableSorting' => 1,
    'columns' => array(        
        'title',
        array(
            'name' => 'user_create_id',
           'value' => 'User::model()->findByPk($data->user_create_id)->username'
        ),
        array(
            'name' => 'create_time',
            'value' => 'date(\'F j, Y \a\t h:i:s A\', $data->create_time)',
        ),
        array(
            'name' => 'update_time',
            'value' => 'date(\'F j, Y \a\t h:i:s A\', $data->update_time)',
        ),
        /*
          'user_update_id',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
