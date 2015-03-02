<?php
/* @var $this ClientProjectsHasSkillsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Projects Has Skills',
);

$this->menu=array(
	array('label'=>'Create ClientProjectsHasSkills', 'url'=>array('create')),
	array('label'=>'Manage ClientProjectsHasSkills', 'url'=>array('admin')),
);
?>

<h1>Client Projects Has Skills</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
