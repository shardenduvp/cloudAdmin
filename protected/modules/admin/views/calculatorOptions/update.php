<?php
/* @var $this CalculatorOptionsController */
/* @var $model CalculatorOptions */

$this->breadcrumbs=array(
	'Calculator Options'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorOptions', 'url'=>array('index')),
	array('label'=>'Create CalculatorOptions', 'url'=>array('create')),
	array('label'=>'View CalculatorOptions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorOptions', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorOptions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>