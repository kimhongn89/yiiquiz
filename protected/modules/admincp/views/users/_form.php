<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class' => 'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    <div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'username',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'username'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'password',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'email',array('class'=>'form-control','maxlength'=>255,'required'=>true,'type'=>'email')); ?>
    		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'fullname',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'fullname',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'fullname'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'address',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'address',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'DOB',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<?php echo $form->textField($model,'DOB',array('class'=>'form-control','maxlength'=>255,'required'=>true,'id'=>'txt_dob')); ?>
    		<?php echo $form->error($model,'DOB'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<?php echo $form->labelEx($model,'gender',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-6'>
    		<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-primary btn-sm <?php echo $model->gender != 1 ? 'active' : 'notActive'?>" data-toggle="gender" data-title="0">Female</a>
    					<a class="btn btn-primary btn-sm <?php echo $model->gender == 1 ? 'active' : 'notActive'?>" data-toggle="gender" data-title="1">Male</a>
    				</div>
    				<?php echo $form->hiddenField($model,'gender',array('id'=>'gender','class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    				<?php echo $form->error($model,'gender'); ?>
    		</div>
    		
    		
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-4'>
    		<?php echo $form->dropDownList($model,'status',array('1'=>'Active','0'=>'Deactive'),array('class'=>'form-control','required'=>true)); ?>
    		<?php echo $form->error($model,'status'); ?>
		</div>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class"=>"btn btn-success pull-right")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$(document).ready(function(){
	$('#txt_dob').datepicker({
	      changeMonth: true,
	      changeYear: true,
	      dateFormat: 'yy-mm-dd',
	      yearRange: "-50:+0",
	    });
})

$('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>