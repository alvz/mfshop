<?php
/* $this->menu = array(
  array('label' => 'List UserCart', 'url' => array('index')),
  array('label' => 'Create UserCart', 'url' => array('create')),
  array('label' => 'Update UserCart', 'url' => array('update', 'id' => $model->id)),
  array('label' => 'Delete UserCart', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
  array('label' => 'Manage UserCart', 'url' => array('admin')),
  ); */
?>

<h1>View Shopping Cart</h1>

<?php
foreach ($cart as $item) {
    ?>
    <div style="margin-bottom: 20px;border: solid;border-radius: 12px;padding: 20px">
        <a href="<?php echo $x = Yii::app()->getController()->createUrl('userCart/delete', array('id' => $item->id)); ?>">
            <img src="<?php echo Yii::app()->assetManager->baseUrl; ?>/images/button_ajax_cart_delete.gif" />
        </a>
        &nbsp;&nbsp

        <?php
        echo CHtml::link($item->product->name, array('product/view', 'id' => $item->product->id)) . '&nbsp;&nbsp;&nbsp;&nbsp;';
        echo 'Price: ' . CHtml::encode($item->product->price) . '&nbsp;&nbsp;&nbsp;&nbsp;';
        echo 'Count: ' . CHtml::encode($item->count, array('style' => 'display: inline-block;margin-right:20px'));
        ?>
    </div>
    <?php
}
echo CHtml::encode('Final Price: ' . $finalprice . '$') . '&nbsp;&nbsp;&nbsp;';
if($finalprice>0)
echo CHtml::link('Pay', array('paysuccess'), array('class' => 'grey button'));
?>