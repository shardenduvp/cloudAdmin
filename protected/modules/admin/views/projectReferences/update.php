<?php
/* @var $this ProjectReferencesController */
/* @var $model ProjectReferences */

$this->breadcrumbs=array(
	'Project References'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProjectReferences', 'url'=>array('index')),
	array('label'=>'Create ProjectReferences', 'url'=>array('create')),
	array('label'=>'View ProjectReferences', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectReferences', 'url'=>array('admin')),
);
?>

<h1>Update ProjectReferences <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>