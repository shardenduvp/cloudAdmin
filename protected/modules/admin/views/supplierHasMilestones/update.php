<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */

$this->breadcrumbs=array(
	'Supplier Has Milestones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SupplierHasMilestones', 'url'=>array('index')),
	array('label'=>'Create SupplierHasMilestones', 'url'=>array('create')),
	array('label'=>'View SupplierHasMilestones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SupplierHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Update SupplierHasMilestones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>