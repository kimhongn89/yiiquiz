<?php

class QuestionsController extends Controller
{

    /**
     *
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     *      using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     *
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'adminFilter'
        )
        // 'accessControl', // perform access control for CRUD operations
        ;
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * 
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array(),
                'roles' => array(
                    'admin'
                )
            ),
            array(
                'deny', // deny all users
                'users' => array(
                    '*'
                )
            )
        );
    }

    /**
     * Displays a particular model.
     * 
     * @param integer $id
     *            the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id)
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Questions();
        $levels = Levels::model()->findAll("status=1");
        $categories = Categories::model()->findAll("status=1");
        $answers = array();
        $hidetext = null;
        $hidechoice = null;
        if (isset($_POST['Questions'])) {
            $model->attributes = $_POST['Questions'];
            $model->created_on = date('Y-m-d H:i:s', time());
            if ($model->type == 1 || $model->type == 2) { // choice answer
                $hidetext = 'hide';
                $postData = @$_POST['Answers'];
                if ($postData !== null && is_array($postData)) {
                    if ($model->save()) {
                        $valid = true;
                        foreach ($postData as $i => $item) {
                            $answers[$i] = new Answers();
                            $answers[$i]->setAttributes($item);
                            $answers[$i]->id_question = $model->id;
                            $valid = $answers[$i]->validate() && $valid;
                        }
                        if (! $valid) {
                            $model->delete();
                            
                        } else {
                            foreach ($answers as $item) {
                                $item->save();
                            }
                            $this->redirect(array(
                                'index'
                            ));
                        }
                    } else {
                        foreach ($postData as $i => $item) {
                            $answers[$i] = new Answers();
                            $answers[$i]->setAttributes($item);
                        }
                    }
                }else{
                    Yii::app()->user->setFlash('ans', 'At least one row in attribute Answer.');
                    for($i=0;$i<3;$i++){
                        $answers[] = new Answers();
                    }
                }
            } else { // short answer
                $hidechoice = 'hide';
                $model->scenario = 'short_answer';
                if ($model->save()){
                    $this->redirect(array(
                        'index'
                    ));
                }else{
                    for($i=0;$i<3;$i++){
                                $answers[] = new Answers();
                            }
                }
            }
        } else {
            for($i=0;$i<3;$i++){
               $answers[] = new Answers();
            }
            $hidetext = 'hide';
        }
        $this->render('create', array(
            'model' => $model,
            'levels' => $levels,
            'categories' => $categories,
            'answers' => $answers,
            'hidechoice' => $hidechoice,
            'hidetext' => $hidetext
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @param integer $id
     *            the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $levels = Levels::model()->findAll("status=1");
        $categories = Categories::model()->findAll("status=1");
        $hidetext = null;
        $hidechoice = null;
        $answers = array();
        if (isset($_POST['Questions'])) {
            $model->attributes = $_POST['Questions'];
            if ($model->type == 1 || $model->type == 2) { // choice answer
                $hidetext = 'hide';
                $postData = @$_POST['Answers'];
                if ($postData !== null && is_array($postData)) {
                        $valid = true;
                        foreach ($postData as $i => $item) {
                            if($item['id'] != NULL){
                                $answers[$i] = Answers::model()->findByPk($item['id']);
                            }else{
                                $answers[$i] = new Answers();
                                $answers[$i]->id_question=$model->id;
                                $answers[$i]->isNewRecord=true;
                            }
                            $answers[$i]->setAttributes($item);
                            $valid = $answers[$i]->validate() && $valid;
                        }
                        if ($valid && $model->validate()) {
                             $model->save();
                             //delete answer in db which do not exist in post answer
                             $oldAnswers=Answers::model()->findAllByAttributes(array('id_question' => $model->id));
                             if($oldAnswers != NULL){
                                 foreach ($oldAnswers as $oa){
                                     $delete=true;
                                     foreach ($answers as $answer) {
                                         if(isset($answer->id)){
                                             if($oa->id == $answer->id){
                                                 $delete=false;
                                                 break;
                                             }
                                         }
                                     }
                                     if($delete)
                                         $oa->delete();
                                }
                             }
                             //add new record
                            foreach ($answers as $answer) {
                                $answer->save();
                            } 
                             $this->redirect(array(
                                'index'
                            ));
                        }
                }else{
                    Yii::app()->user->setFlash('ans', 'At least one row in attribute Answer.');
                    for($i=0;$i<3;$i++){
                        $answers[] = new Answers();
                    }
                }
            } else { // short answer
                $hidechoice = 'hide';
                $model->scenario = 'short_answer';
                if ($model->save())
                    $this->redirect(array(
                        'index'
                    ));
                else
                    for($i=0;$i<3;$i++){
                        $answers[] = new Answers();
                    }
            }
        } else {//load model
            if ($model->type == 1 || $model->type == 2) { // choice answer
                $hidetext = 'hide';
            } else {
                $hidechoice = 'hide';
            }
            $answers = Answers::model()->findAll(array("condition"=>"id_question =  $id ", "order"=>"id ASC"));
        }
        $this->render('update', array(
            'model' => $model,
            'levels' => $levels,
            'categories' => $categories,
            'answers' => $answers,
            'hidechoice' => $hidechoice,
            'hidetext' => $hidetext,
            'action' => Yii::app()->createUrl('admincp/questions/update',array('id'=>$id)),
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * 
     * @param integer $id
     *            the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (! isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array(
                'admin'
            ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Questions('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Questions']))
            $model->attributes = $_GET['Questions'];
        
        $this->render('admin', array(
            'model' => $model
        ));
    }

    public function actionAddAnswer()
    {
        if (Yii::app()->request->isAjaxRequest) {
            // this is the post data from the ajax request
            $hidetext = null;
            $hidechoice = null;
            $model = new Questions();
            $levels = Levels::model()->findAll("status=1");
            $categories = Categories::model()->findAll("status=1");
            $answers = array();
            if (isset($_POST['Questions'])) {
                $model->attributes = $_POST['Questions'];
                if ($model->type == 1 || $model->type == 2) {
                    $hidetext = 'hide';
                } else {
                    $hidechoice = 'hide';
                }
            } else { // default
                $hidetext = 'hide';
            }
            $postData = @$_POST['Answers'];
            if ($postData !== null && is_array($postData)) {
                foreach ($postData as $i => $item) {
                    if($item['id'] != NULL){
                                $answers[$i] = Answers::model()->findByPk($item['id']);
                                echo $item['id'];
                            }else{
                                $answers[$i] = new Answers();
                                $answers[$i]->id_question=$model->id;
                                $answers[$i]->isNewRecord=true;
                            }
                            $answers[$i]->setAttributes($item);
                }
            }
            // creating an additional empty model instance
            $amount=max(1,@$_POST['add_amount']);
            for($i=0;$i<$amount;$i++){
                $answers[] = new Answers();
            }
            // it has to be renderAjax in order to include the script validation files
            echo $this->renderPartial('_form', array(
                'model' => $model,
                'answers' => $answers,
                'levels' => $levels,
                'categories' => $categories,
                'hidechoice' => $hidechoice,
                'hidetext' => $hidetext,
                'action' => $_POST['action']
            ), false);
            Yii::app()->end();
        } else {
            throw new HttpException(404, 'Unable to resolve the request');
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * 
     * @param integer $id
     *            the ID of the model to be loaded
     * @return Questions the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Questions::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * 
     * @param Questions $model
     *            the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'questions-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
