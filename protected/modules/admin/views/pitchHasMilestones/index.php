<?php
/* @var $this PitchHasMilestonesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pitch Has Milestones',
);

$this->menu=array(
	array('label'=>'Create PitchHasMilestones', 'url'=>array('create')),
	array('label'=>'Manage PitchHasMilestones', 'url'=>array('admin')),
);
?>

<h1>Pitch Has Milestones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
