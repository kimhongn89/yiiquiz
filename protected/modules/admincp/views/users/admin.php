<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);
?>
<?php
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css');
?>
<h1>Manage Users</h1>
<?php echo CHtml::ajaxLink(
    '<button class="btn btn-info btn-lg">Add New</button>',
    Yii::app()->createUrl('admincp/users/create'),
    array('type'=>'POST',
        'dataType'=>'json',
        'data'=>'js:{ "ajax":true }',
        'success'=>'js:function(data){
                 if(data.close == false){
		              $("#viewModal .modal-title ").html("Create User");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            }'
    ),array()
);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		    'name'=>'id',
		    'value'=>'CHtml::encode($data->id)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		'username',
		'fullname',
		'email',
		'address',
		
		array(
		    'name'=>'DOB',
		    'value'=>'CHtml::encode($data->DOB)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array('filter'=>false,
		    'name'=>'gender',
		    'value'=>'CHtml::encode($data->gender == 0 ? "Female" : "Male")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array('filter'=>false,
		    'name'=>'status',
		    'value'=>'CHtml::encode($data->status == 0 ? "Deactive" : "Active")',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		array(
		    'name'=>'created_on',
		    'value'=>'CHtml::encode($data->created_on)',
		    'htmlOptions' => array('class' => 'button-column'),
        ),
		
		array(
			'header' => 'Actions',
		    'headerHtmlOptions' => array('class' => 'button-column'),
			'class'=>'CButtonColumn',
		    'template'=>'{view}{update}{delete}',
		    'buttons'=>array(
		        'update' =>array(
		            'options'=>array('class'=>'update_user'),
		        ),
		    ),
		),
	),
)); ?>
<?php  Yii::app()->clientScript->registerScript('frm_user','
    $(document).on("submit", "#users-form", function(event){
        event.preventDefault();
        $.ajax({
            url: $("#users-form").attr("action"),
            type: "post",
            data: $("#users-form").serialize(),
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Create User");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }else{
		              $.fn.yiiGridView.update("users-grid");
		              $("#viewModal").modal("hide");
		          }
            },
        });
    });
'); ?>

<?php  Yii::app()->clientScript->registerScript('update_user','
    $(document).on("click", ".update_user", function(event){
        event.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            url: url,
            type: "post",
            dataType: "json",
            success: function(data) {
                if(data.close == false){
		              $("#viewModal .modal-title ").html("Update User");
                      $("#viewModal .modal-body ").html(data.html); 
                      $("#viewModal .modal-footer ").remove();
		              $("#viewModal").modal();
                  }
            },
        });
    });
'); ?>
