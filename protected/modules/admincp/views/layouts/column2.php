<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
<div class="container">
	<!-- BEGIN SIDEBAR & CONTENT -->
	<div class="row margin-bottom-40">
		<!-- BEGIN SIDEBAR -->
		<div class="col-md-2 col-sm-2">
			<div class="column margintop20">
			     <?php $this->widget('zii.widgets.CMenu',array(
            			'items'=>array(
            				array('label'=>'<i class="fa fa-angle-right"></i> Dashboard', 'url'=>array('default/'),'active'=>$this->id=='default'?true:false),
            				array('label'=>'<i class="fa fa-angle-right"></i> Quizs', 'url'=>array('quizs/'),'active'=>$this->id=='quizs'?true:false),
            			    array('label'=>'<i class="fa fa-angle-right"></i> Categories', 'url'=>array('categories/'),'active'=>$this->id=='categories'?true:false),
            			    array('label'=>'<i class="fa fa-angle-right"></i> Questions', 'url'=>array('questions/'),'active'=>$this->id=='questions'?true:false),
            			    array('label'=>'<i class="fa fa-angle-right"></i> Result', 'url'=>array('results/'),'active'=>$this->id=='results'?true:false),
            			    array('label'=>'<i class="fa fa-angle-right"></i> Users', 'url'=>array('users/'),'active'=>$this->id=='users'?true:false),
            			    array('label'=>'<i class="fa fa-angle-right"></i> Levels', 'url'=>array('levels/'),'active'=>$this->id=='levels'?true:false),
            			),
                        'htmlOptions'=>array('class'=>'nav nav-pills nav-stacked'),
			            'encodeLabel' => false
		              )); ?>
				
			</div>
		</div>
		<!-- END SIDEBAR -->

		<!-- BEGIN CONTENT -->

		<div class="col-md-10 col-sm-10">
			<div id="content">
        		<?php echo $content; ?>
        	</div>
			<!-- content -->
		</div>
		<!-- END CONTENT -->

	</div>
	<!-- END SIDEBAR & CONTENT -->
</div>
<?php $this->endContent(); ?>