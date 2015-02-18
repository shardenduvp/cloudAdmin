<?php
/* @var $this AwardsCertificationsController */
/* @var $model AwardsCertifications */

$this->breadcrumbs=array(
	'Awards Certifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AwardsCertifications', 'url'=>array('index')),
	array('label'=>'Create AwardsCertifications', 'url'=>array('create')),
	array('label'=>'View AwardsCertifications', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AwardsCertifications', 'url'=>array('admin')),
);
?>

<h1>Update AwardsCertifications <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>