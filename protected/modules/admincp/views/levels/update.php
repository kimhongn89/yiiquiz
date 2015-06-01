<?php
/* @var $this LevelsController */
/* @var $model Levels */

$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Levels', 'url'=>array('index')),
	array('label'=>'Create Levels', 'url'=>array('create')),
	array('label'=>'View Levels', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Levels', 'url'=>array('admin')),
);
?>

<h1>Update Levels <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>