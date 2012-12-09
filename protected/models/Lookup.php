<?php

/**
 * This is the model class for table "tbl_lookup".
 *
 * The followings are the available columns in table 'tbl_lookup':
 * @property integer $id
 * @property string $name
 * @property integer $code
 * @property string $type
 * @property integer $position
 */
class Lookup extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Lookup the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_lookup';
    }

    /**
     * @return array validation rules for model attributes.
     */
    private static $items = array();

    public static function items($type) {
        if (!isset(self::$items[$type]))
            self::loadItems($type);
        return self::$items[$type];
    }

    public static function item($type, $code) {
        if (!isset(self::$items[$type]))
            self::loadItems($type);
        return isset(self::$items[$type][$code]) ? self::$items[$type][$code] : false;
    }

    private static function loadItems($type) {
        self::$items[$type] = array();
        $models = self::model()->findAll(array(
            'condition' => 'type=:type',
            'params' => array(':type' => $type),
            'order' => 'position',
                ));
        foreach ($models as $model)
            self::$items[$type][$model->code] = $model->name;
    }

}