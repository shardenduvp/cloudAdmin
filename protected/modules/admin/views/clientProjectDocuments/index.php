<?php
/* @var $this ClientProjectDocumentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Project Documents',
);

$this->menu=array(
	array('label'=>'Create ClientProjectDocuments', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectDocuments', 'url'=>array('admin')),
);
?>

<h1>Client Project Documents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
