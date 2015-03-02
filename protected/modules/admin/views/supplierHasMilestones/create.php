<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */

$this->breadcrumbs=array(
	'Supplier Has Milestones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SupplierHasMilestones', 'url'=>array('index')),
	array('label'=>'Manage SupplierHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Create SupplierHasMilestones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>