<?php
/* @var $this IndustriesController */
/* @var $model Industries */

$this->breadcrumbs=array(
	'Industries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Industries', 'url'=>array('index')),
	array('label'=>'Create Industries', 'url'=>array('create')),
	array('label'=>'View Industries', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Industries', 'url'=>array('admin')),
);
?>

<h1>Update Industries <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>