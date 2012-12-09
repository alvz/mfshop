<?php

/**
 * This is the model class for table "tbl_book".
 *
 * The followings are the available columns in table 'tbl_book':
 * @property integer $id
 * @property integer $isbn
 * @property integer $publisher_id
 * @property integer $pages_count
 * @property integer $edition
 * @property integer $press_number
 *
 * The followings are the available model relations:
 * @property Product $id0
 * @property Publisher $publisher
 */
class Book extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Book the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_book';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('isbn, pages_count, edition, press_number', 'numerical', 'integerOnly' => true),
            array('isbn', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('isbn, publisher_id, pages_count, edition, press_number', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'id'),
            'publisher' => array(self::BELONGS_TO, 'Publisher', 'publisher_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'isbn' => 'Isbn',
            'publisher_id' => 'Publisher',
            'pages_count' => 'Pages Count',
            'edition' => 'Edition',
            'press_number' => 'Press Number',
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
        
        $criteria->compare('isbn', $this->isbn);
        $criteria->compare('publisher_id', $this->publisher_id);
        $criteria->compare('pages_count', $this->pages_count);
        $criteria->compare('edition', $this->edition);
        $criteria->compare('press_number', $this->press_number);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}