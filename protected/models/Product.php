<?php

/**
 * This is the model class for table "tbl_product".
 *
 * The followings are the available columns in table 'tbl_product':
 * @property integer $id
 * @property integer $type
 * @property string $description
 * @property string $name
 * @property integer $price
 * @property integer $score
 * @property string $create_time
 * @property string $update_time
 * @property integer $user_create_id
 * @property integer $user_update_id
 * @property integer $off_percent
 *
 * The followings are the available model relations:
 * @property Book $book
 * @property CommentProduct[] $commentProducts
 * @property ProductImage[] $productImages
 * @property UserCart[] $userCarts
 */
class Product extends CActiveRecord {

    const TYPE_BOOK = 1;
    const TYPE_VIDEO = 2;    

    /**
     * Returns the static model of the specified AR class.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, type', 'required'),
            array('type, price, score, off_percent', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('publisher_id', 'safe'),
            array('description,tagss', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('type, name, create_time, update_time, price, score, off_percent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'book' => array(self::HAS_ONE, 'Book', 'id'),
            'video' => array(self::HAS_ONE, 'Video', 'id'),
            'commentProducts' => array(self::HAS_MANY, 'CommentProduct', 'product_id'),
            'productImages' => array(self::HAS_MANY, 'ProductImage', 'product_id'),
            'userCarts' => array(self::HAS_MANY, 'UserCart', 'product_id'),
            'createUsers' => array(self::BELONGS_TO, 'User', 'user_create_id'),
            'updateUsers' => array(self::BELONGS_TO, 'User', 'user_update_id'),
            'tags' => array(self::HAS_MANY, 'TagProductAssign', 'product_id'),
            'productImageCount' => array(self::STAT, 'ProductImage', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'type' => 'Type',
            'description' => 'Description',
            'name' => 'Name',
            'price' => 'Price (Dollars)',
            'score' => 'Score (out of 5)',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'user_create_id' => 'Created by',
            'user_update_id' => 'Last Updated by',
            'off_percent' => 'Off Percent',
            'tags' => 'Tag(s)',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('type', $this->type);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('score', $this->score);

        if (isset($_GET['createfromDate']) && isset($_GET['createtoDate']) &&
                $_GET['createfromDate'] != "" && $_GET['createtoDate'] != "") {
            $startTime = 0;
            $endTime = 0;
            $start = array();
            $start = explode('/', $_GET['createfromDate']);
            $startTime = mktime(0, 0, 1, $start[0], $start[1], $start[2]);
            $end = array();
            $end = explode('/', $_GET['createtoDate']);
            $endTime = mktime(24, 0, 0, $end[0], $end[1], $end[2]);

            $criteria->addBetweenCondition('create_time', $startTime, $endTime);
        }

        if (isset($_GET['updatefromDate']) && isset($_GET['updatetoDate']) &&
                $_GET['updatefromDate'] != "" && $_GET['updatetoDate'] != "") {
            $startTime = 0;
            $endTime = 0;
            $start = array();
            $start = explode('/', $_GET['updatefromDate']);
            $startTime = mktime(0, 0, 1, $start[0], $start[1], $start[2]);
            $end = array();
            $end = explode('/', $_GET['updatetoDate']);
            $endTime = mktime(24, 0, 0, $end[0], $end[1], $end[2]);

            $criteria->addBetweenCondition('update_time', $startTime, $endTime);
        }


        //$criteria->compare('create_time', $this->create_time, true);
        //$criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('off_percent', $this->off_percent);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    // -------------------------------  My Methods -------------------------------
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                $this->score = 0;
                $this->user_create_id = $this->user_update_id = Yii::app()->user->id;
            } else {
                $this->update_time = time();
                $this->user_update_id = Yii::app()->user->id;
                ;
            }
            return true;
        }
        else
            return false;
    }

    protected function beforeDelete() {
        if (parent::beforeDelete()) {
            CommentProduct::model()->deleteAll('product_id=' . $this->id);
            Book::model()->deleteAll('id=' . $this->id);
            return true;
        }
        else
            return false;
    }

    public static function showStars($score) {
        $stars = null;
        for ($i = 1; $i <= $score; $i++) {
            $stars .= CHtml::image(Yii::app()->theme->baseUrl . '/images/small_icons/star-active.png');
        }
        for ($i = 1; $i <= 5 - $score; $i++) {
            $stars .= CHtml::image(Yii::app()->theme->baseUrl . '/images/small_icons/star-unactive.png');
        }
        return $stars;
    }

    public function getTags() {
        $tagsProducts = $this->tags;
        $t = null;
        foreach ($tagsProducts as $tagProduct) {
            $t.=$tagProduct->tag->name . '&nbsp;&nbsp;|&nbsp;&nbsp;';
        }
        return $t;
    }

    public static function findRecentProducts($limit = 10) {
        //see if it is in the cache, if so, just return it
        if (($cache = Yii::app()->cache) !== null) {
            $key = 'Mfshop.Product.RecentProducts';
            if (($recentProducts = $cache->get($key)) !== false)
                return $recentProducts;
        }
        $recentProducts = self::model()->findAll(array(
            'order' => 'create_time DESC',
            'limit' => $limit,
                ));
        foreach ($recentProducts as $item) {
            $item->name=time();
        }
        $item->name=time();
        if ($recentProducts != null) {
            //a valid message was found. Store it in cache for future retrievals
            if (isset($key))
                $cache->set($key, $recentProducts, 300);
            return $recentProducts;
        }
        else
            return null;

        /* return self::model()->findAll(array(
          'order' => 'create_time DESC',
          'limit' => $limit,
          )); */
    }

}
