<?php
/* @var $this UpdateLogsController */
/* @var $model UpdateLogs */

$this->breadcrumbs=array(
	'Update Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UpdateLogs', 'url'=>array('index')),
	array('label'=>'Create UpdateLogs', 'url'=>array('create')),
	array('label'=>'View UpdateLogs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UpdateLogs', 'url'=>array('admin')),
);
?>

<h1>Update UpdateLogs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>