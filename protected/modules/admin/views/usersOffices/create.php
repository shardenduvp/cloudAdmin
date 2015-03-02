<?php
/* @var $this UsersOfficesController */
/* @var $model UsersOffices */

$this->breadcrumbs=array(
	'Users Offices'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersOffices', 'url'=>array('index')),
	array('label'=>'Manage UsersOffices', 'url'=>array('admin')),
);
?>

<h1>Create UsersOffices</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>