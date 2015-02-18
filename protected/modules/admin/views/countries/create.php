<?php
/* @var $this CountriesController */
/* @var $model Countries */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Countries', 'url'=>array('index')),
	array('label'=>'Manage Countries', 'url'=>array('admin')),
);
?>

<h1>Create Countries</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>