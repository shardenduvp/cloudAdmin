<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
	array('label'=>'View AdminLogs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AdminLogs', 'url'=>array('admin')),
);
?>

<h1>Update AdminLogs <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>