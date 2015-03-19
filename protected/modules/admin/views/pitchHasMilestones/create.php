<?php
/* @var $this PitchHasMilestonesController */
/* @var $model PitchHasMilestones */

$this->breadcrumbs=array(
	'Pitch Has Milestones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PitchHasMilestones', 'url'=>array('index')),
	array('label'=>'Manage PitchHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Create PitchHasMilestones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>