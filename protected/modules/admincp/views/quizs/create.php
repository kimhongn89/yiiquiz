<?php
/* @var $this QuizsController */
/* @var $model Quizs */

$this->breadcrumbs=array(
	'Quizs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Quizs', 'url'=>array('index')),
	array('label'=>'Manage Quizs', 'url'=>array('admin')),
);
?>

<h1>Create Quizs</h1>
<?php $this->renderPartial('_form', array('model'=>$model,'qcls'=>$qcls,'levels'=>$levels,'categories'=>$categories));?>