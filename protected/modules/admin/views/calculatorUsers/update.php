<?php
/* @var $this CalculatorUsersController */
/* @var $model CalculatorUsers */

$this->breadcrumbs=array(
	'Calculator Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorUsers', 'url'=>array('index')),
	array('label'=>'Create CalculatorUsers', 'url'=>array('create')),
	array('label'=>'View CalculatorUsers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorUsers', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorUsers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>