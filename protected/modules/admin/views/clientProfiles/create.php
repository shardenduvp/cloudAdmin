<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>

<h1>Create ClientProfiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>