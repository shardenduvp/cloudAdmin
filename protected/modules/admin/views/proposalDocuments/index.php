<?php
/* @var $this ProposalDocumentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proposal Documents',
);

$this->menu=array(
	array('label'=>'Create ProposalDocuments', 'url'=>array('create')),
	array('label'=>'Manage ProposalDocuments', 'url'=>array('admin')),
);
?>

<h1>Proposal Documents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
