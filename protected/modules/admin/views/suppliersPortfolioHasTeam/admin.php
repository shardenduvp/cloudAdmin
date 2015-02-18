<?php
/* @var $this SuppliersPortfolioHasTeamController */
/* @var $model SuppliersPortfolioHasTeam */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Teams'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasTeam', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasTeam', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-portfolio-has-team-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Portfolio Has Teams</h1>

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
	'id'=>'suppliers-portfolio-has-team-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'suppliers_has_portfolio_id',
		'name',
		'designation',
		'dep',
		'image',
		/*
		'linkedin',
		'facebook',
		'twitter',
		'add_date',
		'status',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
