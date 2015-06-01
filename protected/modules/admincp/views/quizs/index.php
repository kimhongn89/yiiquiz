<?php
/* @var $this QuizsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Quizs',
);

$this->menu=array(
	array('label'=>'Create Quizs', 'url'=>array('create')),
	array('label'=>'Manage Quizs', 'url'=>array('admin')),
);
?>

<h1>Quizs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
