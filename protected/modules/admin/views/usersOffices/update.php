<?php
/* @var $this UsersOfficesController */
/* @var $model UsersOffices */

$this->breadcrumbs=array(
	'Users Offices'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersOffices', 'url'=>array('index')),
	array('label'=>'Create UsersOffices', 'url'=>array('create')),
	array('label'=>'View UsersOffices', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersOffices', 'url'=>array('admin')),
);
?>

<h1>Update UsersOffices <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>