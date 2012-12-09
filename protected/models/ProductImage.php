<?php

/**
 * This is the model class for table "tbl_product_image".
 *
 * The followings are the available columns in table 'tbl_product_image':
 * @property integer $id
 * @property integer $product_id
 * @property string $product_image_url
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductImage extends CActiveRecord {

    public $imageFile;
    public $imageFile_filename;
    public $imageFile_mimetype;
    
    private $filePath;

    /**
     * Returns the static model of the specified AR class.
     * @return ProductImage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_product_image';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_image_url', 'length', 'max' => 500),
            array('imageFile', 'file', 'types' => 'gif, jpg, jpeg, png'),
            //array('imageFile','required'),
            array('imageFile', 'checkUploadedFile'),
            //
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, product_id, product_image_url', 'safe', 'on' => 'search'),
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
            'product_id' => 'Product',
            'product_image_url' => 'Product Image',
            'imageFile' => 'Product Image(s)',
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
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('product_image_url', $this->product_image_url, true);

        return new CActiveDataProvider(get_class($this), array(
                    'criteria' => $criteria,
                ));
    }

    //---------------------------------------------------------------------------------------------

    public static function clearUploadedFile() {
        self::saveUploadedFile(null, null, null);
    }

    public static function saveUploadedFile($fullpath, $filename, $mimetype) {
        $s = new CHttpSession();
        $s->open();
        $s['imageFile'] = $fullpath;
        $s['imageFile_filename'] = $filename;
        $s['imageFile_mimetype'] = $mimetype;
        $s->close();
    }

    public function checkUploadedFile($at = "", $p = "") {
        $s = new CHttpSession();
        $s->open();
        $this->imageFile = $s['imageFile'];
        $this->imageFile_filename = $s['imageFile_filename'];
        $this->imageFile_mimetype = $s['imageFile_mimetype'];
        $s->close();
        // check for valid file
        if (filesize($this->imageFile) > 0) {
            return true;
        } else {
            //$this->addError($at, "Please upload your image");
        }
        return false;
    }

    public static function echoUploadedsImage() {
	sleep(5);
        $model2 = new ProductImage();
        if ($model2->checkUploadedFile()) {
            header("Content-type: {$model2->imageFile_mimetype}");
            readfile($model2->imageFile);
        } else {
            header("Content-type: image/jpeg");
            readfile(CAssetManager::DEFAULT_BASEPATH . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'icon-barcode2.png');
        }
    }

    public static function getFileName($image_url) {
        $tokens = array();
        $tokens = explode('/', $image_url);
        $title = end($tokens);
        return $title;
    }

    protected function beforeDelete() {
        parent::beforeDelete();

        $this->filePath = $this->product_image_url;
        return true;
    }

    protected function afterDelete() {
        parent::afterDelete();
        if (!unlink(__DIR__ . '/../../../' . $this->filePath)) {
            throw new CHttpException(400, 'not deleted from path');
        }
        return true;
    }

}
