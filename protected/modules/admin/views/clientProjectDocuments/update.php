<?php
/* @var $this ClientProjectDocumentsController */
/* @var $model ClientProjectDocuments */

$this->breadcrumbs=array(
	'Client Project Documents'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProjectDocuments', 'url'=>array('index')),
	array('label'=>'Create ClientProjectDocuments', 'url'=>array('create')),
	array('label'=>'View ClientProjectDocuments', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProjectDocuments', 'url'=>array('admin')),
);
?>

<h1>Update ClientProjectDocuments <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>