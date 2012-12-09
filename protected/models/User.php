<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $last_login_time
 * @property string $activation_code
 * @property integer $status
 * @property integer $phone_number
 * @property integer $phone_number2
 * @property integer $cell_number
 * @property integer $off_percent
 * @property integer $create_time
 * @property integer $update_time
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property UserCart[] $userCarts
 * @property UserImage[] $userImages
 */
class User extends CActiveRecord {

    public $password_repeat;

    const STATUS_UNACTIVE = 1;
    const STATUS_ACTIVE = 2;
    const STATUS_SUSPENDED = 3;

    /**
     * Returns the static model of the specified AR class.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('password', 'compare'),
            array('username, password,first_name,last_name', 'required'),
            array('phone_number, phone_number2, cell_number, off_percent, status', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 50),
            array('first_name', 'length', 'max' => 50),
            array('last_name', 'length', 'max' => 50),
            array('password', 'length', 'min' => 6, 'max' => 256),
            array('email', 'length', 'max' => 60),
            array('email', 'email'),
            array('username, email', 'unique'),
            array('password_repeat,status', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('first_name,last_name,username, email, last_login_time, status, phone_number,phone_number2,cell_number, off_percent', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'addresses' => array(self::HAS_MANY, 'Address', 'user_id'),
            'userCarts' => array(self::HAS_MANY, 'UserCart', 'user_id'),
            'userImages' => array(self::HAS_MANY, 'UserImage', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'last_login_time' => 'Last Login Time',
            'activation_code' => 'Activation Code',
            'status' => 'Status',
            'phone_number' => 'Phone Number (Primary)',
            'phone_number2' => 'Phone Number (Secondary)',
            'cell_number' => 'Cell Number',
            'off_percent' => 'Off Percent %',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('email', $this->email, true);

        if (isset($_GET['loginfromDate']) && isset($_GET['logintoDate']) &&
                $_GET['loginfromDate'] != "" && $_GET['logintoDate'] != "") {
            $startTime = 0;
            $endTime = 0;
            $start = array();
            $start = explode('/', $_GET['loginfromDate']);
            $startTime = mktime(0, 0, 1, $start[0], $start[1], $start[2]);
            $end = array();
            $end = explode('/', $_GET['logintoDate']);
            $endTime = mktime(24, 0, 0, $end[0], $end[1], $end[2]);

            $criteria->addBetweenCondition('last_login_time', $startTime, $endTime);
        }


        $criteria->compare('activation_code', $this->activation_code, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('phone_number', $this->phone_number);
        $criteria->compare('phone_number2', $this->phone_number2);
        $criteria->compare('cell_number', $this->cell_number);
        $criteria->compare('off_percent', $this->off_percent);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    public function afterValidate() {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }

    public function encrypt($value) {
        return md5($value);
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->off_percent = 0;
                $this->status = self::STATUS_UNACTIVE;
                $this->create_time = $this->update_time = time();
            }
            else
                $this->update_time = time();
            return true;
        }else {
            return false;
        }
    }

}