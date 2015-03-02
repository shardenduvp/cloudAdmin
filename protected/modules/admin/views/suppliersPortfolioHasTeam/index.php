<?php
/* @var $this SuppliersPortfolioHasTeamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Teams',
);

$this->menu=array(
	array('label'=>'Create SuppliersPortfolioHasTeam', 'url'=>array('create')),
	array('label'=>'Manage SuppliersPortfolioHasTeam', 'url'=>array('admin')),
);
?>

<h1>Suppliers Portfolio Has Teams</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
