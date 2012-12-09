<?php
$this->breadcrumbs = array(
    'Comment News' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List CommentNews', 'url' => array('index')),
    array('label' => 'Create CommentNews', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('comment-news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Comment News</h1>

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
    'id' => 'comment-news-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(        
        'comment_text',
        array(
        'name'=>'comment_time',
            'value'=>'date(\'F j, Y \a\t h:i:s A\', $data->comment_time)',
            ),
        'email',
        'name',
        array(
            'name' => 'status',
            'value' => 'Lookup::item(\'commentStatus\', $data->status)'
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
