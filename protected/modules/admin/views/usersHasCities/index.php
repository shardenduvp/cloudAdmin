<?php
/* @var $this UsersHasCitiesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Has Cities',
);

$this->menu=array(
	array('label'=>'Create UsersHasCities', 'url'=>array('create')),
	array('label'=>'Manage UsersHasCities', 'url'=>array('admin')),
);
?>

<h1>Users Has Cities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
