<?php

Yii::import('application.vendors.*');
require_once('Zend/Feed.php');
require_once('Zend/Feed/Rss.php');

class RssController extends Controller {

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'productfeed', 'newsfeed'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionBookfeed() {
        $this->render('bookfeed');
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionNewsfeed() {
        $newss = News::findRecentNewss(20);

        $entries = array();
        foreach ($newss as $newsItem) {
            $entries[] = array(
                'title' => $newsItem->title,
                'link' => CHtml::encode($this->createAbsoluteUrl('news/view', array('id' => $newsItem->id))),
                'description' => $newsItem->news_text,
                'lastUpdate' => strtotime($newsItem->create_time),
            );
        }

        $feed = Zend_Feed::importArray(array(
                    'title' => 'MF-Shop Latest News',
                    'link' => $this->createUrl(''),
                    'charset' => 'UTF-8',
                    'entries' => $entries,
                        ), 'rss');
        $feed->send();
    }

    public function actionProductfeed() {
        $products = Product::findRecentProducts(20);

        $entries = array();
        foreach ($products as $product) {
            $entries[] = array(
                'title' => $product->name,
                'link' => CHtml::encode($this->createAbsoluteUrl('product/view', array('id' => $product->id))),
                'description' => $product->description,
                'lastUpdate' => strtotime($product->create_time),
            );
        }

        $feed = Zend_Feed::importArray(array(
                    'title' => 'MF-Shop Latest Products',
                    'link' => $this->createUrl(''),
                    'charset' => 'UTF-8',
                    'entries' => $entries,
                        ), 'rss');
        $feed->send();
    }

    public function actionVideofeed() {
        $this->render('videofeed');
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}