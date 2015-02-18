<?php
/* @var $this ClientProfilesController */
/* @var $model ClientProfiles */

$this->breadcrumbs=array(
	'Client Profiles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientProfiles', 'url'=>array('index')),
	array('label'=>'Create ClientProfiles', 'url'=>array('create')),
	array('label'=>'View ClientProfiles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClientProfiles', 'url'=>array('admin')),
);
?>

<h1>Update ClientProfiles <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>