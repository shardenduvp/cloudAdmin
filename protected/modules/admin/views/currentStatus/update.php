<?php
/* @var $this CurrentStatusController */
/* @var $model CurrentStatus */

$this->breadcrumbs=array(
	'Current Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CurrentStatus', 'url'=>array('index')),
	array('label'=>'Create CurrentStatus', 'url'=>array('create')),
	array('label'=>'View CurrentStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CurrentStatus', 'url'=>array('admin')),
);
?>

<h1>Update CurrentStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>