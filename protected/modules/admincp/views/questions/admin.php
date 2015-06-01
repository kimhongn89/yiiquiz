<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Questions'=>array('index'),
	'Manage',
);
?>

<h1>Manage Questions</h1>
<?php echo CHtml::button('Add New',array('submit' =>array('questions/create'),'class' => 'btn btn-lg btn-info')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'questions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		    'name'=>'id',
		    'value'=>'CHtml::encode($data->id)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
		    'type'=>'raw',
		    'name'=>'content',
		    'value'=>'$data->content',
        ),
		array('filter'=>false,
		    'name'=>'type',
		    'value'=>'CHtml::encode(type_quest($data->type))',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
	    array('filter'=>false,
	        'name'=>'id_category',
	        'value'=>'CHtml::encode($data->category->title)',
	        'htmlOptions' => array('class' => 'button-column'),
	    ),
		array('filter'=>false,
		    'name'=>'status',
		    'value'=>'CHtml::encode($data->status == 0 ? "Deactive" : "Active")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		'sort',
		'created_on',
		array('filter'=>false,
		    'name'=>'id_level',
		    'value'=>'CHtml::encode($data->level->title)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
			'header' => 'Actions',
		    'headerHtmlOptions' => array('class' => 'button-column'),
			'class'=>'CButtonColumn',
		),
	),
)); ?>
<?php
function type_quest($data)
{
   return Yii::app()->params['typeQuestion'][$data];
}
?>