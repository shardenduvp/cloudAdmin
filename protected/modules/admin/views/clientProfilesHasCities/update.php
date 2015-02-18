<?php
/* @var $this ClientProfilesHasCitiesController */
/* @var $model ClientProfilesHasCities */

$this->breadcrumbs=array(
	'Client Profiles Has Cities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProfilesHasCities', 'url'=>array('index')),
	array('label'=>'Create ClientProfilesHasCities', 'url'=>array('create')),
	array('label'=>'View ClientProfilesHasCities', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProfilesHasCities', 'url'=>array('admin')),
);
?>

<h1>Update ClientProfilesHasCities <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>