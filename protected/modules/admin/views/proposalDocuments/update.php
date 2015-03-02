<?php
/* @var $this ProposalDocumentsController */
/* @var $model ProposalDocuments */

$this->breadcrumbs=array(
	'Proposal Documents'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProposalDocuments', 'url'=>array('index')),
	array('label'=>'Create ProposalDocuments', 'url'=>array('create')),
	array('label'=>'View ProposalDocuments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProposalDocuments', 'url'=>array('admin')),
);
?>

<h1>Update ProposalDocuments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>