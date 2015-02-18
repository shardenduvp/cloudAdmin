<?php
/* @var $this ServicesController */
/* @var $model Services */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Services', 'url'=>array('index')),
	array('label'=>'Create Services', 'url'=>array('create')),
	array('label'=>'View Services', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Services', 'url'=>array('admin')),
);
?>

<h1>Update Services <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>