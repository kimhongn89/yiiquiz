<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	$model->id,
);
?>

<h1>View Questions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		    'type' => 'raw',
		    'name'=>'content',
		    'value'=>CHtml::encode($model->content),
        ),
		array(
	        'name'=>'type',
	        'value'=>Yii::app()->params['typeQuestion'][$model->type],
	    ),
	    'short_answer',
	    array(
	        'name'=>'id_category',
	        'value'=>CHtml::encode($model->category->title),
	    ),
		 array(
		'name'=>'status',
		'value'=>CHtml::encode($model->status == 0 ? "Deactive" : "Active"),
        ),
		'sort',
		'created_on',
	    array(
	        'name'=>'id_level',
	        'value'=>CHtml::encode($model->level->title),
	    ),
	),
)); ?>
