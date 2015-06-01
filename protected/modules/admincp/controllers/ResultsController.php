<?php

class ResultsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	/**
	 * @return array action filters
	 */
    public function filters()
	{
		return array(
		    'adminFilter',
			//'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		 return array(
            array('allow',
                'actions'=>array(),
                'roles'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
	if (Yii::app()->request->isAjaxRequest) {
    	    $html=Null;
    	    $response=array();
            $resultID =$id;
            $rs=Results::model()->findByPk($resultID);
            if($rs){
                $resultdetails = ResultDetail::model()->findAllByAttributes(array('id_result' => $rs->id));
                $true= Yii::app()->db->createCommand()
                ->select('count(id) as total')
                ->from('result_detail rd')
                ->where('id_result=:resultID AND result=:result ', array(':resultID'=>$resultID,':result' =>1))
                ->queryRow();
                $fail= Yii::app()->db->createCommand()
                ->select('count(id) as total')
                ->from('result_detail rd')
                ->where('id_result=:resultID AND result=:result ', array(':resultID'=>$resultID,':result' =>0))
                ->queryRow();
                $unchoose= Yii::app()->db->createCommand()
                ->select('count(id) as total')
                ->from('result_detail rd')
                ->where('id_result=:resultID AND result=:result ', array(':resultID'=>$resultID,':result' =>-1))
                ->queryRow();
                $response['error']=false;
                $html = $this->renderPartial('view', array(
                    'models' => $resultdetails,
                    'result' => $rs,
                    'true' => $true,
                    'fail'=>$fail,
                    'unchoose'=>$unchoose,
                ), true, false);
                $response['html']=$html;
            }else{
                $response['error']=true;
            }
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
	if($this->loadModel($id)->delete()){
		    //delete all result detail in db which have id_result=$id
		    $criteria = new CDbCriteria;
		    $criteria->addCondition('id_result ='. $id);
		    ResultDetail::model()->deleteAll($criteria);
		}

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Results('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Results']))
			$model->attributes=$_GET['Results'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Results the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Results::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Results $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='results-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
