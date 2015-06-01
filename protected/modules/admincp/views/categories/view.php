<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title,
);
?>

<h1>View Categories #<?php echo $model->id; ?></h1>

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
