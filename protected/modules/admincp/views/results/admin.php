<?php
/* @var $this ResultsController */
/* @var $model Results */

$this->breadcrumbs=array(
	'Results'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Results', 'url'=>array('index')),
	array('label'=>'Create Results', 'url'=>array('create')),
);
?>

<h1>Manage Results</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'results-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		    'name'=>'id',
		    'value'=>'CHtml::encode($data->id)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
	    array(
	        'sortable'=>false,
	        'name'=>'id_user',
	        'value'=>'CHtml::encode($data->user->fullname)',
	    ),
	    array(
	        'sortable'=>false,
	        'name'=>'id_quiz',
	        'value'=>'CHtml::encode($data->quiz->title)',
	    ),
		'start',
		array('filter'=>false,
		    'name'=>'done',
		    'value'=>'CHtml::encode($data->done == 0 ? "Uncompleted" : "Done")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		'end',
		array(
			'header' => 'Actions',
		    'headerHtmlOptions' => array('class' => 'button-column'),
			'class'=>'CButtonColumn',
		    'template'=>'{update}{view}{delete}',
		    'buttons'=>array(
		        'update'=>array(
		            'visible'=>'false',
		        ),
		        'view' =>array(
		            'options'=>array(
		                'ajax'=>array(
		                    'type'=>'POST',
		                    'url'=>"js:$(this).attr('href')",
		                    'dataType' => 'json',
		                    'success'=>'function(data) {
                                    if(data.error == false){
		                                $("#viewModal .modal-title ").html("View Result");
		                                $("#viewModal .modal-dialog ").addClass("modal-lg");
                                        $("#viewModal .modal-body ").html(data.html); $("#viewModal").modal(); 
                                    }
		                    }'
		                ),
		            ),
                ),
		    ),
		),
	),
)); ?>
