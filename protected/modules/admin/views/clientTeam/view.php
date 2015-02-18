<?php
/* @var $this ClientTeamController */
/* @var $model ClientTeam */

$this->breadcrumbs=array(
	'Client Teams'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClientTeam', 'url'=>array('index')),
	array('label'=>'Create ClientTeam', 'url'=>array('create')),
	array('label'=>'Update ClientTeam', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClientTeam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClientTeam', 'url'=>array('admin')),
);
?>

<h1>View ClientTeam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'client_portfolio_id',
		'team_id',
		'add_date',
		'status',
		'active',
	),
)); ?>
