<?php
/* @var $this OfficeTypeController */
/* @var $model OfficeType */

$this->breadcrumbs=array(
	'Office Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OfficeType', 'url'=>array('index')),
	array('label'=>'Create OfficeType', 'url'=>array('create')),
	array('label'=>'View OfficeType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OfficeType', 'url'=>array('admin')),
);
?>

<h1>Update OfficeType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>