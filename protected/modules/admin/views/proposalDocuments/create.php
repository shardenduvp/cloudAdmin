<?php
/* @var $this ProposalDocumentsController */
/* @var $model ProposalDocuments */

$this->breadcrumbs=array(
	'Proposal Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProposalDocuments', 'url'=>array('index')),
	array('label'=>'Manage ProposalDocuments', 'url'=>array('admin')),
);
?>

<h1>Create ProposalDocuments</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>