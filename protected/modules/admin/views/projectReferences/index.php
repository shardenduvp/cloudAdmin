<?php
/* @var $this ProjectReferencesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Project References',
);

$this->menu=array(
	array('label'=>'Create ProjectReferences', 'url'=>array('create')),
	array('label'=>'Manage ProjectReferences', 'url'=>array('admin')),
);
?>

<h1>Project References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
