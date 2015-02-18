<?php
/* @var $this AwardsCertificationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Awards Certifications',
);

$this->menu=array(
	array('label'=>'Create AwardsCertifications', 'url'=>array('create')),
	array('label'=>'Manage AwardsCertifications', 'url'=>array('admin')),
);
?>

<h1>Awards Certifications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
