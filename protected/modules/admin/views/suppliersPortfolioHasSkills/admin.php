<?php
/* @var $this SuppliersPortfolioHasSkillsController */
/* @var $model SuppliersPortfolioHasSkills */

$this->breadcrumbs=array(
	'Suppliers Portfolio Has Skills'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersPortfolioHasSkills', 'url'=>array('index')),
	array('label'=>'Create SuppliersPortfolioHasSkills', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-portfolio-has-skills-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Portfolio Has Skills</h1>

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
	'id'=>'suppliers-portfolio-has-skills-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'portfolio_id',
		'skills_id',
		'status',
		'add_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
