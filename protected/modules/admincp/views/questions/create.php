<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Questions', 'url'=>array('index')),
	array('label'=>'Manage Questions', 'url'=>array('admin')),
);
?>

<h1>Create Questions</h1>
<div class='form' id='frm-question'>
<?php $this->renderPartial('_form', array('model'=>$model,'levels'=>$levels,'categories'=>$categories,'answers'=>$answers,'hidechoice' =>$hidechoice,'hidetext' =>$hidetext,'action'=>Yii::app()->createUrl('admincp/questions/create'))); ?>
</div>