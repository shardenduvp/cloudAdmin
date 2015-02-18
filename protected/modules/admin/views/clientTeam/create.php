<?php
/* @var $this ClientTeamController */
/* @var $model ClientTeam */

$this->breadcrumbs=array(
	'Client Teams'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientTeam', 'url'=>array('index')),
	array('label'=>'Manage ClientTeam', 'url'=>array('admin')),
);
?>

<h1>Create ClientTeam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>