<?php
/* @var $this ProposalPitchesController */
/* @var $model ProposalPitches */

$this->breadcrumbs=array(
	'Proposal Pitches'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProposalPitches', 'url'=>array('index')),
	array('label'=>'Create ProposalPitches', 'url'=>array('create')),
	array('label'=>'View ProposalPitches', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProposalPitches', 'url'=>array('admin')),
);
?>

<h1>Update ProposalPitches <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>