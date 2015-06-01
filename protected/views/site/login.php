<div class="main">
      <div class="container">
        <?php
		$this->pageTitle=Yii::app()->name . ' - Login';
		$this->breadcrumbs=array(
			'Login',
		);
		?>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-6 col-md-offset-3">
            <h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>false,
						'clientOptions'=>array(
							'validateOnSubmit'=>false,
						),
						'htmlOptions'=>array(
                        	'class'=>'form-horizontal form-without-legend',
                        )
					)); ?>
						
						<div class="form-group">
	                      <?php echo $form->labelEx($model,'username',array('class'=>'col-lg-4 control-label')); ?>
	                      <div class="col-lg-8">
	                        <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'username'); ?>
	                      </div>
                    	</div>
                    	<div class="form-group">
	                      <?php echo $form->labelEx($model,'password',array('class'=>'col-lg-4 control-label')); ?>
	                      <div class="col-lg-8">
	                        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
							<?php echo $form->error($model,'password'); ?>
	                      </div>
                    	</div>
						<div class="row rememberMe">
							<div class="col-lg-8 col-md-offset-4 padding-left-0">
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>
							</div>
						</div>
					
						<div class="row buttons">
							<div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
							<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-primary')); ?>
							</div>
						</div>
					
					<?php $this->endWidget(); ?>
                 	
                </div>
                <div class="col-md-12 col-sm-12 text-center">
                    username : 1qaz2wsx
                    <br>
                    admin : 1qaz2wsx
                    <br>
                    adminpage : yiiquiz/admincp
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>