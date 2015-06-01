<?php
/* @var $this LevelsController */
/* @var $model Levels */

$this->breadcrumbs=array(
	'Levels'=>array('index'),
	'Manage',
);
?>
<h1>Manage Levels</h1>
<?php echo CHtml::ajaxLink(
    '<button class="btn btn-info btn-lg">Add New</button>',
    Yii::app()->createUrl('admincp/levels/create'),
    array('type'=>'POST',
        'dataType'=>'json',
        'data'=>'js:{ "ajax":true }',
        'success'=>'js:function(data){
                 if(data.close == false){
		              $("#viewModal .modal-title ").html("Create Level");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            }'
    ),array()
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'levels-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		    'name'=>'id',
		    'value'=>'CHtml::encode($data->id)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		'title',
		array('filter'=>false,
		    'name'=>'status',
		    'value'=>'CHtml::encode($data->status == 0 ? "Deactive" : "Active")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
		    'name'=>'sort',
		    'value'=>'CHtml::encode($data->sort)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
		    'header' => 'Actions',
		    'headerHtmlOptions' => array('class' => 'button-column'),
			'class'=>'CButtonColumn',
		    'template'=>'{view}{update}{delete}',
		    'buttons'=>array(
		        'update' =>array(
		            'options'=>array('class'=>'update_level'),
		        ),
		    ),
		),
	),
)); ?>
<?php  Yii::app()->clientScript->registerScript('frm_level','
    $(document).on("submit", "#levels-form", function(event){
        event.preventDefault();
        $.ajax({
            url: $("#levels-form").attr("action"),
            type: "post",
            data: $("#levels-form").serialize(),
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Create Level");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }else{
		              $.fn.yiiGridView.update("levels-grid");
		              $("#viewModal").modal("hide");
		          }
            },
        });
    });
'); ?>

<?php  Yii::app()->clientScript->registerScript('update_level','
    $(document).on("click", ".update_level", function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Update Level");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            },
        });
    });
'); ?>
