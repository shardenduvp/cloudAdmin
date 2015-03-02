<?php
/* @var $this SkillsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Skills',
);

$this->menu=array(
	array('label'=>'Create Skills', 'url'=>array('create')),
	array('label'=>'Manage Skills', 'url'=>array('admin')),
);
?>

<h1>Skills</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
