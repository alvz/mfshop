<?php

/**
 * This is the model class for table "tbl_user_cart".
 *
 * The followings are the available columns in table 'tbl_user_cart':
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $count The number of products which the user wants to buy
 * @property integer $final_price Final price of each product considering off percent
 * @property integer $status Possible values are as follows:<br/><br/>
 *      <table style="border-style:solid;border-width:1;">
 *      <th>Name</th><th>Code</th><th>Description</th>
 *      <tr style="border-style:solid;border-width:1;"><td>STATUS_BUYING</td><td>1</td><td>The product is <b>NOT</b> paid yet</td></tr>
 *      <tr style="border-style:solid;border-width:1;"><td>STATUS_BUYED</td><td>2</td><td>The product is paid but <b>NOt</b> delivered yet</td></tr>
 *      <tr style="border-style:solid;border-width:1;"><td>STATUS_PENDING_DELIVERY</td><td>3</td><td>The product is being delivered to the user</td></tr>
 *      <tr style="border-style:solid;border-width:1;"><td>STATUS_DELIVERED</td><td>4</td><td>The product is delivered to the user</td></tr>
 *      </table>
 * @property integer $creation_time The time which a product has been inserted to the user cart
 * @property integer $pay_time The time which the cost of the product has been paid
 * @property integer $deliver_time The time which the product has been delivered to the user
 * @property integer $update_time The time which the user updates his selected product in his/her cart
 *
 * The followings are the available model relations:
 * @property Product $product
 * @property User $user
 */
class UserCart extends CActiveRecord {
    
    const STATUS_BUYING=1;
    const STATUS_BUYED=2;
    const STATUS_PENDING_DELIVERY=3;
    const STATUS_DELIVERED=4;

    /**
     * Returns the static model of the specified AR class.
     * @return UserCart the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_user_cart';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('status, count, final_price', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, product_id, status, count, final_price, creation_time, update_time, pay_time, deliver_time', 'safe', 'on' => 'search'),
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
            'product_id' => 'Product',
            'status' => 'Status',
            'count' => 'Count',
            'final_price' => 'Final Price',
            'creation_time' => 'Creation Time',
            'update_time' => 'Update Time',
            'pay_time' => 'Pay Time',
            'deliver_time' => 'Deliver Time',
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
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('status', $this->status);
        $criteria->compare('count', $this->count);
        $criteria->compare('final_price', $this->final_price);
        $criteria->compare('creation_time', $this->creation_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('pay_time', $this->pay_time);
        $criteria->compare('deliver_time', $this->deliver_time);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //---------------------------------------------------------------------------------------

    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->count=1;
                $this->status=  self::STATUS_BUYING;
                $this->creation_time = $this->update_time = time();
            } else {                
                $this->update_time = time();                
            }
            return true;
        }
        else
            return false;
    }

}