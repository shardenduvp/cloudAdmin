<?php
/* @var $this CalculatorQuestionController */
/* @var $model CalculatorQuestion */

$this->breadcrumbs=array(
	'Calculator Questions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CalculatorQuestion', 'url'=>array('index')),
	array('label'=>'Create CalculatorQuestion', 'url'=>array('create')),
	array('label'=>'View CalculatorQuestion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CalculatorQuestion', 'url'=>array('admin')),
);
?>

<h1>Update CalculatorQuestion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>