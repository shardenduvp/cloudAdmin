<?php
/* @var $this ProjectReferencesController */
/* @var $model ProjectReferences */

$this->breadcrumbs=array(
	'Project References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectReferences', 'url'=>array('index')),
	array('label'=>'Manage ProjectReferences', 'url'=>array('admin')),
);
?>

<h1>Create ProjectReferences</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>