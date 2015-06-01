<?php
/* @var $this ResultsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Results',
);

$this->menu=array(
	array('label'=>'Create Results', 'url'=>array('create')),
	array('label'=>'Manage Results', 'url'=>array('admin')),
);
?>

<h1>Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
