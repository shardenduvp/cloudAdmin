<?php
/* @var $this SupplierHasMilestonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Supplier Has Milestones',
);

$this->menu=array(
	array('label'=>'Create SupplierHasMilestones', 'url'=>array('create')),
	array('label'=>'Manage SupplierHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Supplier Has Milestones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
