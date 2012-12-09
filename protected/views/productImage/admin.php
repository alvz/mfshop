<?php
$this->breadcrumbs = array(
    'Products' => array('product/index'),
    $this->getProduct()->name => array('product/view', 'id' => $this->getProduct()->id),
    'Manage Images',
);

$this->menu = array(
    array('label' => 'Upload Images', 'url' => array('productImage/create', 'pid' => $model->product_id)),
);

/* Yii::app()->clientScript->registerScript('search', "
  $('.search-button').click(function(){
  $('.search-form').toggle();
  return false;
  });
  $('.search-form form').submit(function(){
  $.fn.yiiGridView.update('product-image-grid', {
  data: $(this).serialize()
  });
  return false;
  });
  "); */
?>

<h1>Manage Product Images</h1>

<div class="lightbox-container">
    <?php
    $allImages = $model->search()->getData();
    foreach ($allImages as $item) {
        ?>
        <div class="singleimag">
            <?php
            $this->widget('ext.lyiightbox.LyiightBox2', array(
                'thumbnail' => $item->product_image_url,
                'image' => $item->product_image_url,
                'title' => ProductImage::getFileName($item->product_image_url),
                'visible' => true,
                'group' => 'imagegroup'
            ));
            ?>
            <div class='deleteimagebutton'>
                <?php
                echo CHtml::link(CHtml::htmlButton('<span class="icon icon-delete">Delete</span>', array('class' => 'button grey')), array('productImage/delete', 'id' => $item->id));
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
