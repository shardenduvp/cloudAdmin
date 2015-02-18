<?php
/* @var $this ReviewCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Review Categories',
);

$this->menu=array(
	array('label'=>'Create ReviewCategory', 'url'=>array('create')),
	array('label'=>'Manage ReviewCategory', 'url'=>array('admin')),
);
?>

<h1>Review Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
