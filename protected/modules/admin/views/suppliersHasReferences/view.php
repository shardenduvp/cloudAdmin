<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasReferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasReferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<h1>View SuppliersHasReferences #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'project_name',
		'project_description',
		'company_name',
		'client_email',
		'year_engagement',
		'communication_rating',
		'skill_rating',
		'timeline_rating',
		'independence_rating',
		'provide_do_well',
		'provider_improve',
		'tag_line',
		'add_date',
		'modified',
		'suppliers_id',
		'client_profiles_id',
		'suppliers_has_portfolio_id',
		'client_first_name',
		'client_last_name',
		'follow_venturepact',
		'is_unattributed',
		'email_hide',
		'review_type',
		'status',
	),
)); ?>
