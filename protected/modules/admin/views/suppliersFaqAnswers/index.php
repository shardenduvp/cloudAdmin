<?php
/* @var $this SuppliersFaqAnswersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Faq Answers',
);

$this->menu=array(
	array('label'=>'Create SuppliersFaqAnswers', 'url'=>array('create')),
	array('label'=>'Manage SuppliersFaqAnswers', 'url'=>array('admin')),
);
?>

<h1>Suppliers Faq Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
