<?php
/* @var $this QuizsController */
/* @var $model Quizs */

$this->breadcrumbs=array(
	'Quizs'=>array('index'),
	'Manage',
);
?>

<h1>Manage Quizs</h1>
<?php echo CHtml::button('Add New',array('submit' =>array('quizs/create'),'class' => 'btn btn-lg btn-info')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'quizs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		    'name'=>'id',
		    'value'=>'CHtml::encode($data->id)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		'title',
		array(
		    'name'=>'time',
		    'value'=>'CHtml::encode($data->time)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
	    array('filter'=>false,
	        'name'=>'no_of_question',
	        'value'=>'CHtml::encode($data->no_of_question)',
	        'htmlOptions' => array('class' => 'button-column'),
	    ),
		array('filter'=>false,
		    'name'=>'status',
		    'value'=>'CHtml::encode($data->status == 0 ? "Deactive" : "Active")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array('filter'=>false,
		    'name'=>'sort',
		    'value'=>'CHtml::encode($data->sort)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
			'header' => 'Actions',
		    'headerHtmlOptions' => array('class' => 'button-column'),
			'class'=>'CButtonColumn',
		),
	),
)); ?>
