<?php

/**
 * This is the model class for table "tbl_news".
 *
 * The followings are the available columns in table 'tbl_news':
 * @property integer $id
 * @property string $title
 * @property string $news_text
 * @property string $create_time
 * @property integer $user_create_id
 * @property string $update_time
 * @property integer $user_update_id
 *
 * The followings are the available model relations:
 * @property CommentNews[] $commentNews
 * @property TagNewsAssign[] $tagNewsAssigns
 */
class News extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title','required'),
            array('title', 'length', 'max' => 100),
            array('news_text', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'commentNews' => array(self::HAS_MANY, 'CommentNews', 'news_id'),
            'tagNewsAssigns' => array(self::HAS_MANY, 'TagNewsAssign', 'news_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'news_text' => 'News Text',
            'create_time' => 'Create Time',
            'user_create_id' => 'Created by',
            'update_time' => 'Update Time',
            'user_update_id' => 'Last Updated by',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('news_text', $this->news_text, true);
        
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
        $criteria->compare('user_create_id', $this->user_create_id);
        //$criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('user_update_id', $this->user_update_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //----------------------------------------------------------------------------
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
                //$this->score = 0;
                $this->user_create_id = $this->user_update_id = Yii::app()->user->id;
            } else {
                $this->update_time = time();
                $this->user_update_id =Yii::app()->user->id;
            }
            return true;
        }
        else
            return false;
    }
    
        
    protected function beforeDelete() {
        if(parent::beforeDelete())
        {
            CommentNews::model()->deleteAll('news_id='.$this->id);            
            return true;
        }
        else
            return false;
    }
    
    public static function findRecentNewss($limit = 10) {
        return self::model()->findAll(array(
                    'order' => 'create_time DESC',
                    'limit' => $limit,
                ));
    }

}