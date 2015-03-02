<?php
/* @var $this ClientPortfolioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Portfolios',
);

$this->menu=array(
	array('label'=>'Create ClientPortfolio', 'url'=>array('create')),
	array('label'=>'Manage ClientPortfolio', 'url'=>array('admin')),
);
?>

<h1>Client Portfolios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
