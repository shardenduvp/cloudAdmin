<?php
/* @var $this UsersHasTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Has Teams',
);

$this->menu=array(
	array('label'=>'Create UsersHasTeam', 'url'=>array('create')),
	array('label'=>'Manage UsersHasTeam', 'url'=>array('admin')),
);
?>

<h1>Users Has Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
