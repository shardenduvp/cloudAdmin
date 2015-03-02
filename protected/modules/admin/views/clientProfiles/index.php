<?php
/* @var $this ClientProfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Profiles',
);

$this->menu=array(
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>

<h1>Client Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
