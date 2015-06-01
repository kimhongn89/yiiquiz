<?php

class LevelsController extends Controller
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
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if (Yii::app()->request->isAjaxRequest) {
		    $html=Null;
		    $response=array();
		    $response['close']=false;
		    $model=new Levels;
		    // Uncomment the following line if AJAX validation is needed
		    // $this->performAjaxValidation($model);
		    if(isset($_POST['Levels']))
		    {
		        $model->attributes=$_POST['Levels'];
		        if($model->save())
		            $response['close']=true;
		        else
		            $response['close']=false;
		    }
		    $html = $this->renderPartial('_form',array('model'=>$model,),true,false);
		    $response['html']=$html;
		    echo json_encode($response);
		    Yii::app()->end();
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	if (Yii::app()->request->isAjaxRequest) {
	        $html=Null;
	        $response=array();
	        $response['close']=false;
    	    $model=$this->loadModel($id);
    		// Uncomment the following line if AJAX validation is needed
    		// $this->performAjaxValidation($model);
    
    		if(isset($_POST['Levels']))
    		{
    			$model->attributes=$_POST['Levels'];
    			if($model->save())
    			    $response['close']=true;
    			else 
    			    $response['close']=false;
    		}
    		$html = $this->renderPartial('_form',array('model'=>$model,),true,false);
    		$response['html']=$html;
    		echo json_encode($response);
    		Yii::app()->end();
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Levels('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Levels']))
			$model->attributes=$_GET['Levels'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Levels the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Levels::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Levels $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='levels-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
