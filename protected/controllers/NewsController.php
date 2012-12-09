<?php

class NewsController extends Controller {

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
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
                $adminUsers=AuthAssignment::model()->findAll('itemname=:admin',array(':admin'=>'admin'));
        $usernames=array();
        foreach ($adminUsers as $item) {
            $usernames[]=$item->user->username;
        }
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view2'),
                'users' => array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'view'),
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
        //-------------------------------------------------------------
        $commentNewsDataProvider = new CActiveDataProvider('CommentNews', array(
                    'criteria' => array(
                        'condition' => 'news_id=:newsID',
                        'params' => array(':newsID' => $id,),
                    ),
                    'pagination' => array('pageSize' => 5),
                ));
        //-------------------------------------------------------------
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'commentNewsDataProvider' => $commentNewsDataProvider,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new News;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('News');

        Yii::app()->clientScript->registerLinkTag('alternate', 'application/rss+xml', $this->createUrl('rss/newsfeed'));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

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
        $model = News::model()->findByPk((int) $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    //-----------------------------------------------------------------------------------------

    public function actionView2($id) {
        $model = $this->loadModel($id);
        $commentModel = new CommentNews;

        if (isset($_POST['CommentNews'])) {
            $commentModel->attributes = $_POST['CommentNews'];
            $commentModel->news_id = $model->id;

            if (!$commentModel->save()) {
                Yii::app()->user->setFlash('commentFailed', 'Something went wrong while saving your comment, Please try again a few minutes later.');
            } else {
                Yii::app()->user->setFlash('commentSubmitted', 'Your comment is submitted successfully. It will be shown here as soon as the site manager approves it. Thanks.');
            }
        }
        $commentNewsDataProvider = new CActiveDataProvider('CommentNews', array(
                    'criteria' => array(
                        'select' => array('name,comment_text,comment_time'),
                        'condition' => 'news_id=:newsID AND status=:status',
                        'params' => array(':newsID' => $id, ':status' => CommentNews::STATUS_APPROVED),
                    ),
                    'pagination' => array('pageSize' => 5),
                ));

        $commentModel = new CommentNews;
        //-------------------------------------------------------------
        $this->render('view2', array(
            'model' => $model,
            'commentModel' => $commentModel,
            'commentNewsDataProvider' => $commentNewsDataProvider,
        ));
    }

    public function actionIndex2() {
        $dataProvider = new CActiveDataProvider('News');

        Yii::app()->clientScript->registerLinkTag('alternate', 'application/rss+xml', $this->createUrl('rss/newsfeed'));

        $this->render('index2', array(
            'dataProvider' => $dataProvider,
        ));
    }

}
