<div class="view">

    <table class="kl">
        <tr><td>
                <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
                <?php echo CHtml::encode(Lookup::item('productType', $data->type)); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
                <?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
                <br />

                <?php /* echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
                  <?php echo $data->description; */ ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
                <?php echo CHtml::encode($data->price); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
                <?php echo Product::showStars($data->score); ?>
                <br /><br/>

                <b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
                <?php echo CHtml::encode(date('F j, Y \a\t h:i:s A', $data->create_time)); ?>
                <br />

                <b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
                <?php echo CHtml::encode(date('F j, Y \a\t h:i:s A', $data->update_time)); ?>
                <br />
            </td>
            <td>               
                <?php
                $images = $data->productImages;
                foreach ($images as $img) {
                    ?>
                    <div style="float:right;padding:5px;" id="productfirstImage">
                        <?php
                        echo CHtml::image($img->product_image_url, '', array('style' => 'width:100px;height:100px;'));
                        ?>
                    </div>
                    <?php
                    break;
                }
                ?>                
            </td>
        </tr>
    </table>

</div>