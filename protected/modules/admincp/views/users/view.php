<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);
?>
<h1>View Users #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'fullname',
		'email',
		'address',
		'DOB',
		array(
		    'name'=>'gender',
		    'value'=>CHtml::encode($model->gender == 0 ? "Female" : "Male"),
        ),
		array(
		    'name'=>'status',
		    'value'=>CHtml::encode($model->status == 0 ? "Deactive" : "Active"),
        ),
		'created_on',
	),
)); ?>
