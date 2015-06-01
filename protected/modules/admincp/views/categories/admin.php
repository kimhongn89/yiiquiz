<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);
?>
<h1>Manage Categories</h1>
<?php echo CHtml::ajaxLink(
    '<button class="btn btn-info btn-lg">Add New</button>',
    Yii::app()->createUrl('admincp/categories/create'),
    array('type'=>'POST',
        'dataType'=>'json',
        'data'=>'js:{ "ajax":true }',
        'success'=>'js:function(data){
                 if(data.close == false){
		              $("#viewModal .modal-title ").html("Create Category");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            }'
    ),array()
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categories-grid',
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
		            'options'=>array('class'=>'update_category'),
		        ),
		    ),
		),
	),
)); ?>
<?php  Yii::app()->clientScript->registerScript('frm_category','
    $(document).on("submit", "#categories-form", function(event){
        event.preventDefault();
        $.ajax({
            url: $("#categories-form").attr("action"),
            type: "post",
            data: $("#categories-form").serialize(),
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Create Category");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }else{
		              $.fn.yiiGridView.update("categories-grid");
		              $("#viewModal").modal("hide");
		          }
            },
        });
    });
'); ?>

<?php  Yii::app()->clientScript->registerScript('update_category','
    $(document).on("click", ".update_category", function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Update Category");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            },
        });
    });
'); ?>
