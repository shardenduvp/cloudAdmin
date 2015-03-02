<?php
/* @var $this CalculatorCategoryController */
/* @var $model CalculatorCategory */

$this->breadcrumbs=array(
	'Calculator Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorCategory', 'url'=>array('index')),
	array('label'=>'Create CalculatorCategory', 'url'=>array('create')),
	array('label'=>'View CalculatorCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorCategory', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>