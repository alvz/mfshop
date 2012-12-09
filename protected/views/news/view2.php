<?php
$this->breadcrumbs = array(
    'News' => array('index'),
    $model->title,
);
?>

<h1><?php echo $model->title; ?></h1>

<div class="news-text">
    <p>
        <?php echo $model->news_text; ?>
    </p>
</div>

<p>
    Published on: <?php echo CHtml::encode(date('j F, Y  H:i:s A', $model->create_time)); ?>
</p>

<br>
<h2>Comments</h2>

<?php
if (Yii::app()->user->hasFlash('commentSubmitted')) {
    ?><div class="flash-success">
    <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
    </div>
<?php }
?>

<?php if (Yii::app()->user->hasFlash('commentFailed')) { ?>
    <div class="flash-error">
    <?php echo Yii::app()->user->getFlash('commentFailed'); ?>
    </div>
        <?php
    }
    ?>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $commentNewsDataProvider,
    'itemView' => '/commentNews/_view2',
));
?>

<br/>
<hr/>
<h3>Write a comment</h3>
<?php
$this->renderPartial('//commentNews/_form', array('model' => $commentModel));
?>
