<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $model SuppliersFaqAnswers */

$this->breadcrumbs=array(
	'Suppliers Faq Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuppliersFaqAnswers', 'url'=>array('index')),
	array('label'=>'Create SuppliersFaqAnswers', 'url'=>array('create')),
	array('label'=>'View SuppliersFaqAnswers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SuppliersFaqAnswers', 'url'=>array('admin')),
);
?>

<h1>Update SuppliersFaqAnswers <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>