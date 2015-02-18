<?php
/* @var $this ClientTeamController */
/* @var $model ClientTeam */

$this->breadcrumbs=array(
	'Client Teams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientTeam', 'url'=>array('index')),
	array('label'=>'Create ClientTeam', 'url'=>array('create')),
	array('label'=>'View ClientTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientTeam', 'url'=>array('admin')),
);
?>

<h1>Update ClientTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>