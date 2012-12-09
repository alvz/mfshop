<?php
$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->name,
);
?>

<h1><?php echo $model->name; ?></h1>

<div class="lightbox-container" style="padding: 8px;background-color: #e8e8e8;border-radius: 12px;text-align: center;">
    <?php
    if (isset($imageList) && count($imageList) > 0) {
        foreach ($imageList as $item) {
            ?>
            <div class="singleimag">
                <?php
                $this->widget('ext.lyiightbox.LyiightBox2', array(
                    'thumbnail' => $item['image_url'],
                    'image' => $item['image_url'],
                    'title' => $item['title'],
                    'visible' => true,
                    'group' => 'imagegroup'
                ));
                ?>
            </div>
            <?php
        }
    }else
        echo 'No image available'
        ?>
</div>
<br/>
<hr/>
<p style="text-align: justify">
    <?php
    echo $model->description;
    ?>
</p>
<div style="background-color: #eaeaea;padding: 10px; ">
    <?php if (isset($bookModel)) { ?>
        <ul>
            <li><?php echo 'ISBN: ' . $bookModel->isbn; ?></li>
            <li><?php echo 'Number of pages: ' . $bookModel->pages_count; ?></li>
            <li><?php echo 'Edition: ' . $bookModel->edition; ?></li>
            <li><?php echo 'Press Number: ' . $bookModel->press_number; ?></li>
        </ul>
    <?php } elseif (isset($videoModel)) {
        ?>
        <ul>
            <li><?php echo 'Duration: ' . $videoModel->duration; ?></li>
            <li><?php echo 'Format: ' . $videoModel->format; ?></li>
        </ul>
    <?php } ?>
</div>

<br/>
<?php
if (Yii::app()->user->checkAccess('member')) {
    echo CHtml::Link('Add to cart', array('userCart/addToCart', 'pid' => $model->id), array('class' => 'grey button'));
}
?>
<br/><br/><br/>

<?php /*
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $commentProductDataProvider,
    'itemView' => '/commentProduct/_view2',
));*/
?>
