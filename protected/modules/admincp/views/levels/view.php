<?php
/* @var $this LevelsController */
/* @var $model Levels */

$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->id,
);

?>

<h1>View Levels #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		array(
		'name'=>'status',
		'value'=>CHtml::encode($model->status == 0 ? "Deactive" : "Active"),
        ),
		'sort',
	),
)); ?>
