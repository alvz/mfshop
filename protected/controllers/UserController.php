<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column3';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'userContext + view update changePassword',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        $adminUsers = AuthAssignment::model()->findAll('itemname=:admin', array(':admin' => 'admin'));
        $usernames = array();
        foreach ($adminUsers as $item) {
            $usernames[] = $item->user->username;
        }
        return array(
            array('allow',
                'actions' => array('create'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('update', 'view', 'changePassword'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'index'),
                'users' => $usernames,
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (Yii::app()->user->isGuest || Yii::app()->user->checkAccess('admin')) {
            $model = new User;
            $addressModel = new Address;

            // Uncomment the following line if AJAX validation is needed
            $this->performAjaxValidation($model);

            if (isset($_POST['User']) && isset($_POST['Address'])) {
                $transaction = User::model()->dbConnection->beginTransaction();
                try {
                    $model->attributes = $_POST['User'];
                    if ($model->save()) {
                        $addressModel->attributes = $_POST['Address'];
                        $addressModel->user_id = $model->id;
                        if ($addressModel->save()) {
                            $transaction->commit();
                            $this->redirect(array('site/login'));
                        }
                        else
                            throw new CDbException('Error in saving in database. New user did NOT save.');
                    }
                    else
                        throw new CDbException('Error in saving in database. New user did NOT save.');
                } catch (CDbException $e) {
                    $transaction->rollBack();
                }
            }
            $this->render('create', array(
                'model' => $model,
                'addressModel' => $addressModel,
            ));
        } else {
            throw new CHttpException('403', 'You are not authorized to perform this action.');
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $addressModel = Address::model()->findByPk($model->id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['User']) && isset($_POST['Address'])) {
            $trans = Address::model()->dbConnection->beginTransaction();
            try {
                $model->attributes = $_POST['User'];

                if ($model->save(false)) {
                    $addressModel->attributes = $_POST['Address'];
                    $addressModel->user_id = $model->id;

                    if ($addressModel->save()) {
                        $trans->commit();
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                    else
                        throw new CDbException('Error in saving in database. New user did NOT save.');
                }
                else
                    throw new CDbException('Error in saving in database. New user did NOT save.');
            } catch (CDbException $e) {
                $trans->rollBack();
            }
        }

        $this->render('update', array(
            'model' => $model,
            'addressModel' => $addressModel,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = User::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    //-------------------------------------------------------------------------------

    public function actionChangePassword($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->user->getId() == intval($id)) {
            if (isset($_POST['User'])) {
                $model->attributes = $_POST['User'];
                if ($model->save())
                    $this->redirect(array('user/update', 'id' => $id));
            }
        }

        $this->render('change_pass', array('model' => $model));
    }

    public function filterUserContext($filterChain) {
        if (isset($_GET['id'])) {
            if (Yii::app()->user->getId() != intval($_GET['id']) && !Yii::app()->user->checkAccess('admin')) {
                throw new CHttpException('403', 'You are not authorized to perform this action');
            }
        } elseif (isset($_POST['id'])) {
            if (Yii::app()->user->getId() != intval($_POST['id']) && !Yii::app()->user->checkAccess('admin')) {
                throw new CHttpException('403', 'You are not authorized to perform this action');
            }
        }
        $filterChain->run();
    }

}
