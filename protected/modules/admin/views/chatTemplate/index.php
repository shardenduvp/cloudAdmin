<?php
/* @var $this ChatTemplateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chat Templates',
);

$this->menu=array(
	array('label'=>'Create ChatTemplate', 'url'=>array('create')),
	array('label'=>'Manage ChatTemplate', 'url'=>array('admin')),
);
?>

<h1>Chat Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
