<?php
/* @var $this QuizsController */
/* @var $model Quizs */

$this->breadcrumbs=array(
	'Quizs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Quizs', 'url'=>array('index')),
	array('label'=>'Create Quizs', 'url'=>array('create')),
	array('label'=>'Update Quizs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Quizs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Quizs', 'url'=>array('admin')),
);
?>

<h1>View Quizs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'time',
		'no_of_question',
		array(
		'name'=>'status',
		'value'=>CHtml::encode($model->status == 0 ? "Deactive" : "Active"),
        ),
		'sort',
	),
)); ?>
