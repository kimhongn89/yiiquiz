<?php

class SiteController extends Controller
{

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction'
            )
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $results=array();//contain list of quiz which user had done
        if (! Yii::app()->user->id)
            $this->redirect(array(
                'site/login'
            ));
        $models = Quizs::model()->findAll('status =1');
        $quiz_users=Results::model()->findAllByAttributes(array(
                    'id_user' => Yii::app()->user->id
                ));
        if($quiz_users){
            foreach ($quiz_users as $value){
                $start = strtotime($value->start);
                if((time() - $start) >= $value->quiz->time || $value->done == 1)
                {
                    $results[$value->id_quiz]=true;
                }else{
                    $results[$value->id_quiz]=false;
                }
            }
        }
        $this->render('index', array(
            'models' => $models,
            'results' => $results,
        ));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionQuiz($id)
    {
        if (! Yii::app()->user->id)
            $this->redirect(array(
                'site/login'
            ));
        $continue=false;
        $quiz = Quizs::model()->findByPk($id);
        $rs=Results::model()->findByAttributes(array('id_quiz'=>$id,'id_user'=>Yii::app()->user->id));
        if($rs){
            $start = strtotime($rs->start);
            if((time() - $start) >= $quiz->time || $rs->done == 1)
            {
                $this->redirect(array(
                    'site/index'
                ));
            }elseif((time() - $start) < $quiz->time)
            {
                $continue=true;
            }
        }
        $this->render('quiz', array(
            'quiz' => $quiz,
            'continue'=>$continue
        ));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionStart()
    {
        $id=$_REQUEST['id'];
        $arr_quest = array();
        $html=Null;
        $response=array();
        $quiz = Quizs::model()->findByPk($id);
        if($quiz){
            $timer=$quiz->time;
            $rs=Results::model()->findByAttributes(array('id_quiz'=>$id,'id_user'=>Yii::app()->user->id));
            if($rs){//đã làm
                $start = strtotime($rs->start);
                if((time() - $start) >= $quiz->time || $rs->done == 1)//hết giờ hoặc done
                {
                    $response['error']=true;
                }else{//disconnect & còn giờ vào làm lại
                    $resultdetails = ResultDetail::model()->findAllByAttributes(array('id_result' => $rs->id));
                    $response['error']=false;
                    $timer=$quiz->time - (time() - $start);
                }
            }else{//mới
                $qCLs = QuizCateLevel::model()->findAllByAttributes(array(
                    'id_quiz' => $id
                ));
                foreach ($qCLs as $qCL) {
                    $arr = array();
                    $questions = Questions::model()->findAllByAttributes(array(
                        'id_category' => $qCL->id_category,
                        'id_level' => $qCL->id_level,
                        'status' => 1,
                    ));
                    foreach ($questions as $quest) {
                        $arr[] = $quest->id;
                    }
                    $arr_id=array_rand($arr, $qCL->no_of_question);
                    if(is_array($arr_id)){
                        foreach ($arr_id as $val){
                            array_push($arr_quest,$arr[$val]);
                        }
                    }else{
                        array_push($arr_quest,$arr[$arr_id]);
                    }
                }
                $criteria = new CDbCriteria;
                $criteria->order = 'id_category ASC';
                $questions = Questions::model()->findAllByPk($arr_quest,$criteria);
                $rs=new Results();
                $rs->id_quiz=$id;
                $rs->id_user=Yii::app()->user->id;
                $rs->start=date('Y-m-d H:i:s', time());
                if($rs->save()){
                    $rd=new ResultDetail();
                    $rd->id_result=$rs->id;
                    foreach ($questions as $model){
                        $rd->isNewRecord = true;
                        $rd->id=NULL;
                        $rd->id_question=$model->id;
                        $rd->save();
                    }
                    $resultdetails = ResultDetail::model()->findAllByAttributes(array('id_result' => $rs->id));
                }
                $response['error']=false;
            }
        }else{
            $response['error']==true;
        }
        if($response['error']==false){
            $html = $this->renderPartial('test', array(
                'models' => $resultdetails,
                'rsID' => $rs->id,
                'timer' => $timer,
                'quiz' =>$quiz,
            ), true, false);
        }
        $response['html']=$html;
        echo json_encode($response);
    }
    
    
    public function actionSaveChoice(){
        if (Yii::app()->request->isAjaxRequest) {
           $resultID = $_REQUEST['rs'];
           $questionID = $_REQUEST['question'];
           $answerID=@$_REQUEST['answer'];
           $rs=Results::model()->findByPk($resultID);
           if($rs){
               $quiz=Quizs::model()->findByPk($rs->id_quiz);
               $start = strtotime($rs->start);
               //check timeout or not
               if((time() - $start) < $quiz->time)
               {
                   $rd=ResultDetail::model()->findByAttributes(array('id_result'=>$resultID,'id_question'=>$questionID));
                   if($rd){
                       if($rd->question->type == 1){//onechoice
                           $rd->id_answer = $answerID;
                           $answer=Answers::model()->findByAttributes(array('id'=>(int)$answerID,'id_question'=>$questionID),'result=:result',array(':result'=>1));
                           if($answer)
                               $rd->result=1;
                           else
                               $rd->result=0;
                       }elseif ($rd->question->type == 2){//multi choice
                           if(is_array($answerID)){//check is array
                               sort($answerID);//sort acs
                               $rd->id_answer = implode($answerID,',');
                                $lstAnswer = Answers::model()->findAll(array("select"=>"id","condition"=>"id_question =  $questionID AND result = 1", "order"=>"id ASC"));
                               $arrAnswer = array();
                               if($lstAnswer){
                                   foreach ($lstAnswer as $item){
                                       $arrAnswer[] = $item->id;
                                   }
                               }
                               //compare
                               if($rd->id_answer == implode($arrAnswer,','))
                                   $rd->result=1;
                               else
                                   $rd->result=0;
                           }else{//don't have any choice sent
                               $rd->result=-1;
                           } 
                       }else{//short answer
                           $rd->text_answer=trim($answerID);
                           //compare result
                           if($rd->question->short_answer == $rd->text_answer){
                               $rd->result=1;
                           }else{
                               $rd->result=0;
                           }
                       }
                       //save result detail
                       $rd->save();
                   }
               }else{//timeout
                   echo 0;
               }
           }
           Yii::app()->end();
        }
    }
    
    public function actionLoadPreview($rs)
    {
        if (Yii::app()->request->isAjaxRequest) {
            $resultID = $rs;
            $rds = ResultDetail::model()->findAllByAttributes(array(
                'id_result' => $resultID,
            ));
            echo  $response=$this->renderPartial('preview',array('rds'=>$rds),false);
            Yii::app()->end();
        }
    }
    
    public function actionEndQuiz(){
        if (Yii::app()->request->isAjaxRequest) {
            $resultID = $_REQUEST['rs'];
            $rs=Results::model()->findByPk($resultID,'id_user=:userID',array(':userID'=>Yii::app()->user->id));
            if($rs){
                $rs->end =date('Y-m-d H:i:s', time());
                $rs->done = 1;
                if($rs->save()){
                    $quiz = Quizs::model()->findByPk($rs->id_quiz);
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
                   echo  $response=$this->renderPartial('result',array('true' => $true,'fail'=>$fail,'unchoose'=>$unchoose,'quiz' => $quiz,'rs'=>$rs),false);
                }
            }
            Yii::app()->end();
        }
    }
    
   
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        if (Yii::app()->user->id)
            $this->redirect(array(
                'site/index'
            ));
        
        $model = new LoginForm();
        
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array(
            'model' => $model
        ));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}