<?php

class QuizsController extends Controller
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
		$model=new Quizs;
		$levels=Levels::model()->findAll("status=1");
		$categories=Categories::model()->findAll("status=1");
		$qcls=array();
		if(isset($_POST['Quizs']))
		{
			$model->attributes=$_POST['Quizs'];
    		//creating dynamic models from post
            $postData =@$_POST['QuizCateLevel'];
            if ($postData !== null && is_array($postData)) {
                if($model->save()){
                    $valid=true;
                    foreach ($postData as $i => $item) {
                        $qcls[$i] = new QuizCateLevel();
                        $qcls[$i]->setAttributes($item);
                        $qcls[$i]->id_quiz = $model->id;
                        $valid=$qcls[$i]->save() && $valid;
                    }
                    if(!$valid){
                        $model->delete();
                        foreach ($qcls as $qcl){
                            if(!$qcl->isNewRecord){
                                $qcl->delete();
                            }
                        }
                        Yii::app()->user->setFlash('qcl','Note: Category and Level is unique.');
                        
                    }else{
                        $no_of_quest=$model->totalQuestion;
                        $model->no_of_question=$no_of_quest;
                        $model->save();
                        $this->redirect(array('index'));
                    }
                }else{
                    foreach ($postData as $i => $item) {
                        $qcls[$i] = new QuizCateLevel();
                        $qcls[$i]->setAttributes($item);
                    }
                }              
            }else{
                Yii::app()->user->setFlash('qcl','At least one row in attribute Number of question.');
                for($i=0;$i<3;$i++){
                    $qcls[]=new QuizCateLevel;
                }
            }
		}else{
		        for($i=0;$i<3;$i++){
                    $qcls[]=new QuizCateLevel;
                }
		}
		$this->render('create',array(
			'model'=>$model,
		    'qcls' => $qcls,
		    'levels'=>$levels,
		    'categories' =>$categories,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$levels=Levels::model()->findAll("status=1");
		$categories=Categories::model()->findAll("status=1");
		$qcls=array();
		if(isset($_POST['Quizs']))
		{
		    $model->attributes=$_POST['Quizs'];
		    //creating dynamic models from post
		    $postData =@$_POST['QuizCateLevel'];
		    if ($postData !== null && is_array($postData)) {
		        if($model->validate()){
		            //delete all qcl in db which have id_quiz=$id
		            $criteria = new CDbCriteria;
		            $criteria->addCondition('id_quiz ='. $id);
		            //get old record
		            $old=QuizCateLevel::model()->findAll($criteria);
		            //delete old record
		            QuizCateLevel::model()->deleteAll($criteria);
		            //add new record
		            $valid=true;
		            foreach ($postData as $i => $item) {
		                $qcls[$i] = new QuizCateLevel();
		                $qcls[$i]->setAttributes($item);
		                $qcls[$i]->id_quiz = $model->id;
		                $valid=$qcls[$i]->save() && $valid;
		            }
		            if(!$valid){
		                QuizCateLevel::model()->deleteAll($criteria);
		                Yii::app()->user->setFlash('qcl','Note: Category and Level is unique.');
		                //save old record to db
		                foreach ($old as $item) {
		                    $item->isNewRecord=true;
		                    $item->save();
		                }
		            }else{
		                $no_of_quest=$model->totalQuestion;
		                $model->no_of_question=$no_of_quest;
		                $model->save();
                        $this->redirect(array('index'));
		            }
		        }else{
    		        $qcls=QuizCateLevel::model()->findAll("id_quiz=".$id);
		        }
		    }else{
		        Yii::app()->user->setFlash('qcl','At least one row in attribute Number of question.');
		        $qcls=QuizCateLevel::model()->findAll("id_quiz=".$id);
		    }
		}else{
		    $qcls=QuizCateLevel::model()->findAll("id_quiz=".$id);
		}
		$this->render('update',array(
			'model'=>$model,
		    'qcls' => $qcls,
		    'levels'=>$levels,
		    'categories' =>$categories,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if($this->loadModel($id)->delete()){
		    //delete all qcl in db which have id_quiz=$id
		    $criteria = new CDbCriteria;
		    $criteria->addCondition('id_quiz ='. $id);
		    QuizCateLevel::model()->deleteAll($criteria);
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
		$model=new Quizs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Quizs']))
			$model->attributes=$_GET['Quizs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAddQCL()
	{
	    if (Yii::app()->request->isAjaxRequest) {
	        //this is the post data from the ajax request
	        $model=new Quizs;
	        $qcls = array();
	        $levels=Levels::model()->findAll("status=1");
	        $categories=Categories::model()->findAll("status=1");
	        if(isset($_POST['Quizs']))
	        {
	            $model->attributes=$_POST['Quizs'];
	        }
	        $postData =@$_POST['QuizCateLevel'];
	        if ($postData !== null && is_array($postData)) {
                foreach ($postData as $i => $single) {
                    $qcls[$i] = new QuizCateLevel();
                    $qcls[$i]->setAttributes($single);
                }
            }
	        //creating an additional empty model instance
            $amount=max(1,@$_POST['add_amount']);
            for($i=0;$i<$amount;$i++){
                $qcls[] = new QuizCateLevel();
            }
	        // it has to be renderAjax in order to include the script validation files
	        echo $this->renderPartial('_form', array(
                                                 'model'=>$model,           
	                                               'qcls' => $qcls,
                                    		    'levels'=>$levels,
                                    		    'categories' =>$categories,),false);
	        Yii::app()->end();
	
	    } else {
	        throw new HttpException(404, 'Unable to resolve the request');
	    }
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Quizs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Quizs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Quizs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='quizs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
