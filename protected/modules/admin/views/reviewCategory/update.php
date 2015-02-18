<?php
/* @var $this ReviewCategoryController */
/* @var $model ReviewCategory */

$this->breadcrumbs=array(
	'Review Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReviewCategory', 'url'=>array('index')),
	array('label'=>'Create ReviewCategory', 'url'=>array('create')),
	array('label'=>'View ReviewCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ReviewCategory', 'url'=>array('admin')),
);
?>

<h1>Update ReviewCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>