<?php
$x = 2;
$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Product', 'url' => array('index')),
    array('label' => 'Create Product', 'url' => array('create')),
    array('label' => 'Update Product', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Product', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Product', 'url' => array('admin')),
    array('label' => 'Create Comment', 'url' => array('commentProduct/create', 'pid' => $model->id)),
    array('label' => 'List Comments', 'url' => array('commentProduct/index', 'pid' => $model->id)),
    array('label' => 'Upload Images', 'url' => array('productImage/create', 'pid' => $model->id)),
    array('label' => 'Manage Images', 'url' => array('productImage/admin', 'pid' => $model->id)),
        //array('label' => 'Manage Comments', 'url' => array('commentProduct/admin', 'pid' => $model->id)),
);
?>

<h1>View Product Details</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => 'Type',
            'value' => Lookup::item('productType', $model->type),
        ),
        'name',
        array(
            'label' => $model->getAttributeLabel('description'),
            'type' => 'html',
            'value' => $model->description,
        ),
        'price',
        array(
            'label' => $model->getAttributeLabel('score'),
            'type' => 'html',
            'value' => Product::showStars($model->score),
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
            'label' => 'Last updated by',
            'value' => User::model()->findByPk($model->user_update_id)->username,
        ),
        'off_percent',
        array(
            'label' => $model->getAttributeLabel('tags'),
            'type' => 'raw',
            'value' => $model->getTags(),
        )
    ),
));

if (isset($bookModel)) {
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $bookModel,
        'attributes' => array(
            'isbn',
            'pages_count',
            'edition',
            'press_number',
        ),
    ));
} elseif (isset($videoModel)) {
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $videoModel,
        'attributes' => array(
            'duration',
            'format',
        ),
    ));
}
?>

<?php
$this->widget('CStarRating', array('name' => 'rating',
    'minRating' => 1,
    'maxRating' => 5,
    'titles' => array('1' => 'Awful', '2' => 'Bad', '3' => 'Average', '4' => 'Good', '5' => 'Greate',),
    'starWidth' => 30,
));
?>

<br/>
<h1>Product Images</h1>

<div class="adgallery-container">
    <div class="adgallery">
        <?php
        if (count($imageList) > 0) {
            $this->widget('ext.adGallery.AdGallery', array(
                'agEffect' => 'slide-hori',
                'imageList' => $imageList,
            ));
        }
        else
            echo 'No Images Found';
        ?>
    </div>
</div>

<br>


<?php /*
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $commentProductDataProvider,
    'itemView' => '/commentProduct/_view',
    'sortableAttributes' => array(
        'status',
        'name',
        'comment_time',
    ),
));*/
?>
