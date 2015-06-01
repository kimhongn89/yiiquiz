<?php
/* @var $this QuizsController */
/* @var $model Quizs */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'quizs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('class' => 'form-horizontal'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    
	<?php echo $form->errorSummary($model); ?>
	
    <?php if(Yii::app()->user->hasFlash('qcl')):?>
    <div class="error">
        <?php echo Yii::app()->user->getFlash('qcl'); ?>
    </div>
    <?php endif; ?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'title',array('class'=>'col-sm-2 control-label')); ?>
		<div class='col-md-10'>
    		<?php echo $form->textField($model,'title',array('class'=>'form-control','maxlength'=>255,'required'=>true)); ?>
    		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>
	<div class="form-group">
        		<?php echo $form->labelEx($model,'time',array('class'=>'col-sm-2 control-label')); ?>
        		<div class='col-md-4'>
            		<?php echo $form->textField($model,'time',array('class'=>'form-control','required'=>true,'pattern'=>'\d*','min'=>1)); ?>
            		<?php echo $form->error($model,'time'); ?>
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
    <div class="row">
	    <label class="form-label">Number of question</label>
		<div id="contain-qcl">
		<div class="col-md-2 pull-right">
            <button type="button" id="add-qcl" class="btn btn-lg btn-default pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
		    <input type='number' value = '1' min='1' style=' margin-right: 10px;width: 40px;'  name = 'add_amount' class='pull-right' >
		</div>
		  <?php foreach ($qcls as $i => $item): ?>
    	    <div class="col-md-10 alert alert-warning alert-dismissible" role="alert" >
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <div class='col-md-4'>
            	           <?php echo $form->labelEx($item,"[$i]id_category"); ?>
                		   <?php echo $form->dropDownList($item,"[$i]id_category", CHtml::listData($categories,
                                                                      'id', 'title'),
                                                                      array('empty' => '(Select a category)','class'=>'form-control','required'=>true)); ?>
                		<?php echo $form->error($item,"[$i]id_category"); ?>
            	        </div>
            	        <div class='col-md-4'>
            	           <?php echo $form->labelEx($item,"[$i]id_level"); ?>
                		   <?php echo $form->dropDownList($item,"[$i]id_level", CHtml::listData($levels,
                                                                      'id', 'title'),
                                                                      array('empty' => '(Select a Level)','class'=>'form-control','required'=>true)); ?>
                		  <?php echo $form->error($item,"[$i]id_level"); ?>
            	        </div>
            	        <div class='col-md-4'>
            	           <?php echo $form->labelEx($item,"[$i]no_of_question"); ?>
                		   <?php echo $form->textField($item,"[$i]no_of_question",array('class'=>'form-control','required'=>true,'pattern'=>'\d*')) ?>
                		  <?php echo $form->error($item,"[$i]no_of_question"); ?>
            	        </div>
            </div>
            <?php endforeach;?>      
		</div>
		 
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array("class"=>"btn btn-success pull-right")); ?>
	</div>
    
<?php $this->endWidget(); ?>

</div><!-- form -->
<?php

Yii::app()->clientScript->registerScript("addQCL","
    $(document).on('click', '#add-qcl', function(){
        $.ajax({
            url: '" .Yii::app()->createUrl('admincp/quizs/addQCL'). "',
            type: 'post',
            data: $('#" . $form->id . "').serialize(),
            dataType: 'html',
            success: function(data) {
                $('#quizs-form').html(data);
            },
            error: function() {
                alert('An error has occured while adding a new block.');
            }
        });
    });
"); ?>
