<?php
/* @var $this CallSchedulesController */
/* @var $model CallSchedules */

$this->breadcrumbs=array(
	'Call Schedules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CallSchedules', 'url'=>array('index')),
	array('label'=>'Create CallSchedules', 'url'=>array('create')),
	array('label'=>'View CallSchedules', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CallSchedules', 'url'=>array('admin')),
);
?>

<h1>Update CallSchedules <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>