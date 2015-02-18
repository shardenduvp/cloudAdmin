<?php
/* @var $this ClientTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Teams',
);

$this->menu=array(
	array('label'=>'Create ClientTeam', 'url'=>array('create')),
	array('label'=>'Manage ClientTeam', 'url'=>array('admin')),
);
?>

<h1>Client Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
