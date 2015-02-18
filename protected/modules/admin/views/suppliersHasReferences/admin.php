<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-references-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has References</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'suppliers-has-references-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'project_name',
		'project_description',
		'company_name',
		'client_email',
		'year_engagement',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
