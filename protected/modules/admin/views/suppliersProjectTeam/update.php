<?php
/* @var $this SuppliersProjectTeamController */
/* @var $model SuppliersProjectTeam */

$this->breadcrumbs=array(
	'Suppliers Project Teams'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectTeam', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectTeam', 'url'=>array('create')),
	array('label'=>'View SuppliersProjectTeam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersProjectTeam', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersProjectTeam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>