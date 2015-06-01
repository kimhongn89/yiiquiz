<?php

class DefaultController extends Controller
{
    public $layout = "column2";
    
    public function filters()
    {
        return array(
            'adminFilter',
            //'accessControl', // perform access control for CRUD operations
        );
    }
    
    /* public function accessRules()
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
    } */
    public function actionIndex()
	{
		$this->render('index');
	}
	public function actionQuestion()
	{
	   $model=new Questions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Questions']))
			$model->attributes=$_GET['Questions'];

		$this->render('question',array(
			'model'=>$model,
		));
	}
}