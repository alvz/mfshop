<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="span-4" id="sidebar">                   
        <div id="sidebar-left">
            <?php
            $this->widget('ext.efgmenu.EFgMenu', array(
                'bDev' => true,
                'id' => 'verticalmenu',
                'menubarOptions' => array(
                    'direction' => 'vertical',
                ),
                'items' => array(
                    array('label' => 'Home', 'url' => array('/site/index')),
                    array('label' => 'Dashboard', 'url' => array('/site/dashboard'), 'visible' => Yii::app()->user->checkAccess('admin')),
                    array('label' => 'Products', 'url' => '#', 'items' => array(
                            array('label' => 'All', 'url' => 'index.php?r=product/index'),
                            array('label' => 'Books', 'url' => 'index.php?r=product/indexBook'),
                            array('label' => 'Videos', 'url' => 'index.php?r=product/indexVideo',
                        )),
                    ),
                    array('label' => 'News', 'url' => array('/news/index')),
                    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                    array('label' => 'Contact', 'url' => array('/site/contact')),
                ),
            ));
            ?>

            <br/><br/>

            <?php echo CHtml::image(Yii::app()->getAssetManager()->baseUrl . '/images/youradhere.png', '', array('style' => 'margin-left:15px;')); ?>

            <br/><br/>
            <br/>
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Useful Links',
                'htmlOptions' => array('style' => 'width:70%;margin-left:1.5em;', 'class' => 'portlet')
            ));

            $links = Link::model()->findAll();
            $linkItems = array();
            foreach ($links as $item) {
                $linkItems[] = array('label' => $item->title, 'url' => $item->url);
            }
            $this->widget('zii.widgets.CMenu', array(
                'items' => $linkItems,
            ));
            $this->endWidget();
            ?>

        </div>            
    </div>

    <div id="content" class="span-17">        
        <?php echo $content; ?>
    </div><!-- content -->

    <div class="span-5 last" id="sidebar-right">
        <div>

            <div class="searchsite" style="background-color:rgb(240,240,240);padding:10px 0px 10px 4px;border-radius:8px;border-style:inset">
                <div class="form">
                    <?php
                    echo CHtml::beginForm(array('product/searchAll'), 'GET');
                    ?>

                    <?php echo 'Search:'; ?><br/>
                    <?php echo CHtml::textField('searchquery', '', array(
                        'style' => 'width:120px;margin:0px',
                        'placeholder'=>'Keyword(s)...',
                        'class'=>'hinttext',                        
                        )); ?>


                    <?php
                    echo CHtml::imageButton(Yii::app()->getAssetManager()->baseUrl . '/images/icon-search.png', array(
                        'style' => 'margin:0px;vertical-align:middle',
                        'title'=>'search',
                        ));
                    echo CHtml::endForm();
                    ?>
                </div>
                <br/>
                <hr/>
            </div>         

            <?php
            if (Yii::app()->user->checkAccess('admin')) {
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => 'Operations'
                ));

                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array('class' => 'operations'),
                ));
                $this->endWidget();
            }

            if (Yii::app()->user->checkAccess('member')) {
                $this->beginWidget('zii.widgets.CPortlet', array(
                    'title' => '<span class="icon icon-basket3">Shopping Cart</span>',
                ));                
                echo CHtml::link('View shopping cart',array('userCart/addToCart'));
                $this->endWidget();
            }
            // '<span class="icon icon-basket3">Shopping Cart</span>',
            ?>

            <br/>

            <?php echo CHtml::image(Yii::app()->getAssetManager()->baseUrl . '/images/youradhere.png', '', array('style' => 'margin-left:35px;')); ?>
            <br/><br/><br/>           

            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Charity Acts',
                'htmlOptions' => array('style' => 'text-align:center', 'class' => 'portlet')
            ));

            echo CHtml::openTag('a', array('href' => 'http://wwww.mahak.com', 'target' => 'blank'));
            ?>
            <div>
            <?php
            echo CHtml::image(Yii::app()->getAssetManager()->baseUrl . '/images/mahak.jpg');
            ?>
                <canvas width="128" height="42" style="display: block;border: 0px none;"></canvas>
            </div>
            <?php
            echo CHtml::closeTag('a');

            $this->endWidget();
            ?>

            <br/>

            <?php $this->widget('TagCloud', array('maxTags' => Yii::app()->params['tagCloudCount'])); ?>

        </div>
    </div>
</div>
<?php $this->endContent(); ?>
