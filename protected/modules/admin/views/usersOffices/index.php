<?php
/* @var $this UsersOfficesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Offices',
);

$this->menu=array(
	array('label'=>'Create UsersOffices', 'url'=>array('create')),
	array('label'=>'Manage UsersOffices', 'url'=>array('admin')),
);
?>

<h1>Users Offices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
