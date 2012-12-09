<?php

/**
 * This is the model class for table "tbl_address".
 *
 * The followings are the available columns in table 'tbl_address':
 * @property integer $id
 * @property integer $user_id
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $alley
 * @property integer $pelak
 * @property integer $unit
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Address extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Address the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_address';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('pelak, unit', 'numerical', 'integerOnly' => true),
            array('country, state, city, street, alley', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, country, state, city, street, alley, pelak, unit', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'street' => 'Street',
            'alley' => 'Alley',
            'pelak' => 'Pelak',
            'unit' => 'Unit',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('street', $this->street, true);
        $criteria->compare('alley', $this->alley, true);
        $criteria->compare('pelak', $this->pelak);
        $criteria->compare('unit', $this->unit);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

}