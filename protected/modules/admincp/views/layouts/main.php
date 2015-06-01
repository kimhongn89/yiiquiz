<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/plugins/sweetalert/sweet-alert.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/plugins/sweetalert/sweet-alert.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?php echo Yii::app()->createUrl('/site/index')?>" class="navbar-brand " title="HomePage"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Elinext" class="img-responsive"> </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <?php $this->widget('zii.widgets.CMenu',array(
            			'items'=>array(
            			    array('label'=>'AdminCP', 'url'=>array('default/')),
            				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            			),
                        'htmlOptions'=>array('class'=>'nav navbar-nav','style'=>'font-weight: bold')
		)); ?>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <div class="container main-admin">
            <?php if(isset($this->breadcrumbs)):?>
        	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
        			'links'=>$this->breadcrumbs,
        		)); ?><!-- breadcrumbs -->
        	<?php endif?>
        
        	<?php echo $content; ?>
        
        	<div class="clear"></div>
        </div>
        <br/>
        <div class="container">
            <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
        </div>

<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php $cs=Yii::app()->clientScript;
$cs->scriptMap=array(
    'jquery.js'=>false,
); ?>
