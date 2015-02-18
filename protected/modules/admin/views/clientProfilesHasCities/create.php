<?php
/* @var $this ClientProfilesHasCitiesController */
/* @var $model ClientProfilesHasCities */

$this->breadcrumbs=array(
	'Client Profiles Has Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProfilesHasCities', 'url'=>array('index')),
	array('label'=>'Manage ClientProfilesHasCities', 'url'=>array('admin')),
);
?>

<h1>Create ClientProfilesHasCities</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>