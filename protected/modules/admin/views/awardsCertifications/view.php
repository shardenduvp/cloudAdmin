<?php
/* @var $this AwardsCertificationsController */
/* @var $model AwardsCertifications */

$this->breadcrumbs=array(
	'Awards Certifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AwardsCertifications', 'url'=>array('index')),
	array('label'=>'Create AwardsCertifications', 'url'=>array('create')),
	array('label'=>'Update AwardsCertifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AwardsCertifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AwardsCertifications', 'url'=>array('admin')),
);
?>

<h1>View AwardsCertifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'image',
		'link',
		'description',
		'suppliers_id',
	),
)); ?>
