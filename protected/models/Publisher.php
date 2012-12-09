<?php

/**
 * This is the model class for table "tbl_publisher".
 *
 * The followings are the available columns in table 'tbl_publisher':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $phone
 *
 * The followings are the available model relations:
 * @property Book[] $books
 */
class Publisher extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Publisher the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_publisher';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('phone', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 100),
            array('name','required'),
            array('name', 'unique'),
            array('address', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, address, phone', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'books' => array(self::HAS_MANY, 'Book', 'publisher_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
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

        $criteria->compare('name', $this->name, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('phone', $this->phone);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}