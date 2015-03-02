<?php
/* @var $this LinkedinConnectionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linkedin Connections',
);

$this->menu=array(
	array('label'=>'Create LinkedinConnections', 'url'=>array('create')),
	array('label'=>'Manage LinkedinConnections', 'url'=>array('admin')),
);
?>

<h1>Linkedin Connections</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
