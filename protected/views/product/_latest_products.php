<div class="latestproducts-container">

    <?php
    foreach ($recentProducts as $product) {
        ?>
        <div class="latestproduct">
            <?php
            $images = $product->productImages;                        
            if ($product->productImageCount!=0) {
                foreach ($images as $img) {
                    ?>
                    <div id="productfirstImage">
                        <?php
                        echo CHtml::image($img->product_image_url, '', array('style' => 'width:150px;height:150px;'));
                        ?>
                    </div>
                    <?php
                    break;
                }
            } else {
                echo CHtml::image(Yii::app()->theme->baseUrl . '/images/big_icons/icon-barcode.png', '', array('style' => 'width:150px;height:150px;'));
            }
            ?> 

            <br/>
            <b><?php echo CHtml::encode(Lookup::item('productType', $product->type)); ?></b> :             
            <b><?php echo CHtml::link(CHtml::encode($product->name), array('//product/view', 'id' => $product->id)); ?></b>            
            <br/><br/>

            <b><?php echo CHtml::encode($product->getAttributeLabel('price')); ?>:</b>
            <?php echo CHtml::encode($product->price); ?> $
            <br />

        </div>
    <?php } ?>
</div>