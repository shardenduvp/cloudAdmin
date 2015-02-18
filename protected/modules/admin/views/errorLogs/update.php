<?php
/* @var $this ErrorLogsController */
/* @var $model ErrorLogs */

$this->breadcrumbs=array(
	'Error Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ErrorLogs', 'url'=>array('index')),
	array('label'=>'Create ErrorLogs', 'url'=>array('create')),
	array('label'=>'View ErrorLogs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ErrorLogs', 'url'=>array('admin')),
);
?>

<h1>Update ErrorLogs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>