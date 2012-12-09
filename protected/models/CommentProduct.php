<?php

/**
 * This is the model class for table "tbl_comment_product".
 *
 * The followings are the available columns in table 'tbl_comment_product':
 * @property integer $id
 * @property string $email
 * @property string $comment_text
 * @property integer $product_id
 * @property string $comment_time
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class CommentProduct extends CActiveRecord {

    const STATUS_NOT_READ = 1;
    const STATUS_READ_NOT_APPROVED = 2;
    const STATUS_APPROVED = 3;

    /**
     * Returns the static model of the specified AR class.
     * @return CommentProduct the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_comment_product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, name,comment_text', 'required'),
            array('email, name', 'length', 'max' => 50),
            array('email', 'email'),
            array('comment_text, comment_time, status', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, email, comment_text, product_id, comment_time, name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'comment_text' => 'Comment Text',
            'product_id' => 'Product',
            'comment_time' => 'Comment Time',
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('comment_text', $this->comment_text, true);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('status', $this->status);

        if (isset($_GET['fromDate']) && isset($_GET['toDate']) &&
                $_GET['fromDate'] != "" && $_GET['toDate'] != "") {
            $startTime = 0;
            $endTime = 0;
            $start = array();
            $start = explode('/', $_GET['fromDate']);
            $startTime = mktime(0, 0, 1, $start[0], $start[1], $start[2]);
            $end = array();
            $end = explode('/', $_GET['toDate']);
            $endTime = mktime(24, 0, 0, $end[0], $end[1], $end[2]);

            $criteria->addBetweenCondition('comment_time', $startTime, $endTime);
        }

        $criteria->compare('name', $this->name, true);

        // $criteria->condition = 'product_id=:productID';
        //$criteria->params = array(':productID', $this->product_id);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //---------------------------------------------------------------------

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