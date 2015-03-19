<?php
/* @var $this PitchHasMilestonesController */
/* @var $model PitchHasMilestones */

$this->breadcrumbs=array(
	'Pitch Has Milestones'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PitchHasMilestones', 'url'=>array('index')),
	array('label'=>'Create PitchHasMilestones', 'url'=>array('create')),
	array('label'=>'View PitchHasMilestones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PitchHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Update PitchHasMilestones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>