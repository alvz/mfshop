<?php

/**
 * This is the model class for table "tbl_tag".
 *
 * The followings are the available columns in table 'tbl_tag':
 * @property integer $id
 * @property string $name
 * @property integer $frequency
 *
 * The followings are the available model relations:
 * @property TagNewsAssign[] $tagNewsAssigns
 * @property TagProductAssign[] $tagProductAssigns
 */
class Tag extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Tag the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_tag';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('name, frequency', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tagNewsAssigns' => array(self::HAS_MANY, 'TagNewsAssign', 'tag_id'),
            'tagProductAssigns' => array(self::HAS_MANY, 'TagProductAssign', 'tag_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'frequency' => 'Frequency',
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
        $criteria->compare('frequency', $this->frequency);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //--------------------------------------------------------------------------------------

    /**
     * Returns tag names and their corresponding weights.
     * Only the tags with the top weights will be returned.
     * @param integer the maximum number of tags that should be returned
     * @return array weights indexed by tag names.
     */
    public function findTagWeights($limit = 20) {
        $models = $this->findAll(array(
            'order' => 'frequency DESC',
            'limit' => $limit,
                ));

        $total = 0;
        foreach ($models as $model)
            $total+=$model->frequency;

        $tags = array();
        if ($total > 0) {
            foreach ($models as $model)
                if ($model->frequency > 0) {
                    $tags[$model->name] = 8 + (int) (30 * $model->frequency / ($total + 10));
                }
            ksort($tags);
        }
        return $tags;
    }

    /* protected function beforeSave() {
      if (parent::beforeSave()) {
      if ($this->isNewRecord) {
      $this->create_time = $this->update_time = time();
      $this->score = 0;
      $this->user_create_id = $this->user_update_id = Yii::app()->user->id;
      } else {
      $this->update_time = time();
      $this->user_update_id = Yii::app()->user->id;
      }
      return true;
      }
      else
      return false;
      } */
}