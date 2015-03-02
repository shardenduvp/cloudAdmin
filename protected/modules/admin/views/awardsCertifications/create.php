<?php
/* @var $this AwardsCertificationsController */
/* @var $model AwardsCertifications */

$this->breadcrumbs=array(
	'Awards Certifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AwardsCertifications', 'url'=>array('index')),
	array('label'=>'Manage AwardsCertifications', 'url'=>array('admin')),
);
?>

<h1>Create AwardsCertifications</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>