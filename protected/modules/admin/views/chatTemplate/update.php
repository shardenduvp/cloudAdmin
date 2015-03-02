<?php
/* @var $this ChatTemplateController */
/* @var $model ChatTemplate */

$this->breadcrumbs=array(
	'Chat Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChatTemplate', 'url'=>array('index')),
	array('label'=>'Create ChatTemplate', 'url'=>array('create')),
	array('label'=>'View ChatTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChatTemplate', 'url'=>array('admin')),
);
?>

<h1>Update ChatTemplate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>