<?php
/* @var $this ProposalPitchesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proposal Pitches',
);

$this->menu=array(
	array('label'=>'Create ProposalPitches', 'url'=>array('create')),
	array('label'=>'Manage ProposalPitches', 'url'=>array('admin')),
);
?>

<h1>Proposal Pitches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
