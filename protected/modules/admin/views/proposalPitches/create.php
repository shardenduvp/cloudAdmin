<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */

$this->breadcrumbs=array(
	'Proposal Pitches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProposalPitches', 'url'=>array('index')),
	array('label'=>'Manage ProposalPitches', 'url'=>array('admin')),
);
?>

<h1>Create ProposalPitches</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>