<?php
/* @var $this ClientProfilesHasCitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Profiles Has Cities',
);

$this->menu=array(
	array('label'=>'Create ClientProfilesHasCities', 'url'=>array('create')),
	array('label'=>'Manage ClientProfilesHasCities', 'url'=>array('admin')),
);
?>

<h1>Client Profiles Has Cities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
