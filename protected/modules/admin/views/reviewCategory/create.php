<?php
/* @var $this ReviewCategoryController */
/* @var $model ReviewCategory */

$this->breadcrumbs=array(
	'Review Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReviewCategory', 'url'=>array('index')),
	array('label'=>'Manage ReviewCategory', 'url'=>array('admin')),
);
?>

<h1>Create ReviewCategory</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>