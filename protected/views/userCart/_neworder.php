<div class="order-item">
    <div class="order-name"></div>
    <div class="order-count"></div>
    <div class="order-delete-button"></div>
</div>
<?php
echo CHtml::link(substr(Product::model()->findByPk(10)->name, 0, 20) . '...  *3', array('product/view', 'id' => 10));
?>                           
<div id="neworder">sdkjflskjflsjfls</div>