<?php
/* @var $this QuestionsController */
/* @var $model Questions */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'questions-form',
    'action' => $action,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class' => 'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php if(Yii::app()->user->hasFlash('ans')):?>
    <div class="error">
        <?php echo Yii::app()->user->getFlash('ans'); ?>
    </div>
    <?php endif; ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'content',array('class'=>'col-sm-2 control-label')); ?>
		<div class="col-sm-10">
		<?php echo $form->textArea($model,'content',array('id'=>'ckContent','class'=>'form-control')); ?>
		<?php echo $form->error($model,'content'); ?>
		</div>
	</div>
	<div class='row'>
	    <div class='col-md-6'>
	       <div class="form-group">
    		    <?php echo $form->labelEx($model,'id_category',array('class'=>'col-sm-3 control-label')); ?>
        		<div class="col-sm-9">
        		<?php echo $form->dropDownList($model,"id_category", CHtml::listData($categories,'id', 'title'),array('empty' => '(Select a category)','class'=>'form-control')); ?>
        		<?php echo $form->error($model,'id_category'); ?>
        		</div>
            </div>
        </div>
        <div class='col-md-6'>
            <div class="form-group">
    		    <?php echo $form->labelEx($model,'id_level',array('class'=>'col-sm-3 control-label')); ?>
        		<div class="col-sm-9">
        		<?php echo $form->dropDownList($model,"id_level", CHtml::listData($levels,'id', 'title'),array('empty' => '(Select a level)','class'=>'form-control')); ?>
        		<?php echo $form->error($model,'$levels'); ?>
        		</div>
            </div>
        </div>
	</div>
	<div class='row'>
	    <div class='col-md-6'>
	       <div class="form-group">
    		    <?php echo $form->labelEx($model,'status',array('class'=>'col-sm-3 control-label')); ?>
        		<div class="col-sm-9">
        		<?php echo $form->dropDownList($model,'status',array('1'=>'Active','0'=>'Deactive'),array('class'=>'form-control')); ?>
        		<?php echo $form->error($model,'status'); ?>
        		</div>
            </div>
        </div>
        
        <div class='col-md-6'>
            <div class="form-group">
    		   <?php echo $form->labelEx($model,'sort',array('class'=>'col-sm-3 control-label')); ?>
        		<div class="col-sm-9">
        		<?php echo $form->textField($model,'sort',array('class'=>'form-control')); ?>
        		<?php echo $form->error($model,'sort'); ?>
        		</div>
        		</div>
        </div>
	</div>
	<div class='row'>
	    <div class='col-md-6 '>
            <div class="form-group">
    		   <?php echo $form->labelEx($model,'type',array('class'=>'col-sm-3 control-label')); ?>
        		<div class="col-sm-9">
        		<?php echo $form->dropDownList($model,'type',Yii::app()->params['typeQuestion'],array('id'=>'sel_type','class'=>'form-control')); ?>
        		<?php echo $form->error($model,'type'); ?>
        		</div>
        		</div>
        </div>
	</div>
	
	<div class="row">
	   <div class='col-md-6'>
	       <div class='form-group'>
	           <label class='col-sm-3 control-label'>Answer:</label>
	       </div>
	       
	   </div>
		<div id="choice-answer" class='col-md-12 <?php echo $hidechoice?>' >
    		<div class="col-md-2 pull-right">
    		    <button type="button" id="add-answer" class="btn btn-lg btn-default pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    		    <input type='number' value = '1' min='1' style=' margin-right: 10px;width: 40px;'  name = 'add_amount' class='pull-right' >
    	        
    		</div> 
		  <?php foreach ($answers as $i => $item): ?>
    	    <div class="col-md-10 alert alert-warning alert-dismissible alert-answer" role="alert" >
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                <div class='col-md-8'>
            	           <?php echo $form->labelEx($item,"[$i]title"); ?>
                		   <?php echo $form->textField($item,"[$i]title",array('class'=>'form-control')) ?>
                		  <?php echo $form->error($item,"[$i]title"); ?>
            	        </div>         
                        <div class='col-md-2 text-center'>
            	        <?php echo $form->labelEx($item,"[$i]result"); ?>
                		<?php echo $form->checkBox($item,"[$i]result",array('class'=>'form-control')); ?>
                		<?php echo $form->error($item,"[$i]result"); ?>
            	        </div>
            	        <div class='col-md-2 text-center'>
            	        <?php echo $form->labelEx($item,"[$i]status"); ?>
                		<?php echo $form->dropDownList($item,"[$i]status",array('1'=>'Active','0'=>'Deactive'),array('class'=>'form-control')); ?>
                		<?php echo $form->error($item,"[$i]status"); ?>
            	        </div>
            	        <?php echo $form->hiddenField($item,"[$i]id") ?>
            	        
            </div>
            <?php endforeach;?>      
		</div>
		<div id="text-answer" class=" col-md-12 <?php echo $hidetext?>">
		      <div class="form-group">
            		<div class="col-sm-6 col-md-offset-1">
            		<?php echo $form->textField($model,'short_answer',array('class'=>'form-control')) ?>
            		<?php echo $form->error($model,'short_answer'); ?>
            		</div>
        		</div>
    		
		</div>
		
	</div>
	<div class="row buttons">
	    <?php echo CHtml::hiddenField('action' , $action); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class"=>"btn btn-success pull-right")); ?>
	</div>

<?php $this->endWidget(); ?>
<?php
Yii::app()->clientScript->registerScript("addAnswer","
    $(document).on('click', '#add-answer', function(){
        $('#ckContent').val(CKEDITOR.instances['ckContent'].getData());
        $.ajax({
            url: '" .Yii::app()->createUrl('admincp/questions/addAnswer'). "',
            type: 'post',
            data: $('#" . $form->id . "').serialize(),
            dataType: 'html',
            success: function(data) {
                $('#frm-question').html(data);
            },
            error: function() {
                alert('An error has occured while adding a new block.');
            }
        });
    });
"); ?>
<script type="text/javascript">
     $(document).ready(function(){
    	CKEDITOR.replace( 'ckContent' );
    })
    $('#sel_type').change(function(){
        var value=$(this).val();
        if(value == 1 || value == 2){//choice answer
        	$('#text-answer').addClass('hide');
        	$('#choice-answer').removeClass('hide');
        }else{//short answer
        	$('#text-answer').removeClass('hide');
        	$('#choice-answer').addClass('hide');
        }
    });
    $('.alert-answer').on('close.bs.alert', function (event) {
        var target = $(this);
    	event.preventDefault();
    	swal({
			  title: "Are you sure?",
			  text: "Do you want to delete this Answer!",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Yes, i do!",
			  closeOnConfirm: true,
			},
			function(){
				$(target).remove();
			});
  	})
  	
</script>