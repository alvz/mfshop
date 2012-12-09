<?php $this->pageTitle=Yii::app()->name; ?>

<h2 style="font-weight: bolder;text-decoration: underline;font-family:Purisa ,'Century Schoolbook L', Verdana, Geneva, sans-serif;text-align: center;">
    Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i>
</h2>

<?php 
$this->widget('ext.seqimage.SeqImage',array(
  'widthImage' => 650, 
  'heightImage' => 340,
    'timeDelay'=>8000,
  'slides'=>array(  
       array(
           'image'=>array('src'=>Yii::app()->getAssetManager()->baseUrl.'/images/slideshow/1.jpg'),                       
       ),
       array(
           'image'=>array('src'=>Yii::app()->getAssetManager()->baseUrl.'/images/slideshow/2.jpg'),            
       ),
      array(
           'image'=>array('src'=>Yii::app()->getAssetManager()->baseUrl.'/images/slideshow/3.jpg'),            
       ),      
  )));
?>

<p style="text-align: justify;">The best and first online shop ever made by "Yii" technology. Browse our huge list of products, books and videos and buy as many as you want. For the best experience we suggest to register in the site if this is your first visit, Thank you very much.</p>
<p>We hope you enjoy shopping at MFShop.com</p>
<hr/>
<h2 style="text-align: center;text-decoration: underline; font-family:Purisa ,'Century Schoolbook L', Verdana, Geneva, sans-serif;">
    Latest Products
</h2>

<?php 
echo $this->renderPartial('//product/_latest_products',array('recentProducts'=>$recentProducts));
?>