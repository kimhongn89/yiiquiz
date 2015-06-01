<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Update',
);
?>
<h1>Update Questions <?php echo $model->id; ?></h1>
<div class='form' id='frm-question'>
<?php $this->renderPartial('_form', array('model'=>$model,'levels'=>$levels,'categories'=>$categories,'answers'=>$answers,'hidechoice' =>$hidechoice,'hidetext' =>$hidetext,'action'=>$action)); ?>
</div>