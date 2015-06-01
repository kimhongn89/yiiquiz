<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array('class' => 'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-10'>
    		<?php echo $form->textField($model,'title',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>
     <div class="form-group">
        		<?php echo $form->labelEx($model,'sort',array('class'=>'col-sm-2 control-label')); ?>
        		<div class='col-md-4'>
            		<?php echo $form->textField($model,'sort',array('class'=>'form-control','required'=>true,'pattern'=>'\d*')); ?>
            		<?php echo $form->error($model,'sort'); ?>
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