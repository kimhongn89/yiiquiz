<?php
/* @var $this QuizsController */
/* @var $model Quizs */

$this->breadcrumbs=array(
	'Quizs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Quizs', 'url'=>array('index')),
	array('label'=>'Create Quizs', 'url'=>array('create')),
	array('label'=>'View Quizs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Quizs', 'url'=>array('admin')),
);
?>

<h1>Update Quizs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'qcls'=>$qcls,'levels'=>$levels,'categories'=>$categories));?>