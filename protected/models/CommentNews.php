<?php

/**
 * This is the model class for table "tbl_comment_news".
 *
 * The followings are the available columns in table 'tbl_comment_news':
 * @property integer $id
 * @property integer $news_id
 * @property string $comment_text
 * @property string $comment_time
 * @property string $email
 * @property string $name
 *
 * The followings are the available model relations:
 * @property News $news
 */
class CommentNews extends CActiveRecord {

    const STATUS_NOT_READ = 1;
    const STATUS_READ_NOT_APPROVED = 2;
    const STATUS_APPROVED = 3;
    
    /**
     * Returns the static model of the specified AR class.
     * @return CommentNews the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_comment_news';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email, comment_text','required'),
            array('email, name', 'length', 'max' => 50),
            array('email', 'unique'),
            array('comment_text, status', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, news_id, comment_text, comment_time, email, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'news' => array(self::BELONGS_TO, 'News', 'news_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'news_id' => 'News',
            'comment_text' => 'Comment Text',
            'comment_time' => 'Comment Time',
            'email' => 'Email',
            'name' => 'Name',
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
        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('comment_text', $this->comment_text, true);
        $criteria->compare('comment_time', $this->comment_time, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('name', $this->name, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //-------------------------------------------------------------------------

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->status = self::STATUS_NOT_READ;
            }
            $this->comment_time = time();
            return TRUE;
        }
        else
            return false;
    }

}