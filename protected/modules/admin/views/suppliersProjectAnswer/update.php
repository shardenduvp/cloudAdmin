<?php
/* @var $this SuppliersProjectAnswerController */
/* @var $model SuppliersProjectAnswer */

$this->breadcrumbs=array(
	'Suppliers Project Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersProjectAnswer', 'url'=>array('index')),
	array('label'=>'Create SuppliersProjectAnswer', 'url'=>array('create')),
	array('label'=>'View SuppliersProjectAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersProjectAnswer', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersProjectAnswer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>