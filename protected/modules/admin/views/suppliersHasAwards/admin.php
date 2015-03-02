<?php
/* @var $this SuppliersHasAwardsController */
/* @var $model SuppliersHasAwards */

$this->breadcrumbs=array(
	'Suppliers Has Awards'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SuppliersHasAwards', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasAwards', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#suppliers-has-awards-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers Has Awards</h1>

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
<div class="row">
	<div class="col-md-12">
		<!-- BOX -->
		<div class="box border blue">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of Suppliers Has Awards</h4>
			</div>
			<div class="box-body">
					<?php $this->widget('zii.widgets.grid.CGridView', array(
					//'id'=>'suppliers-has-awards-grid',
					'id'=>'datatables1',
					'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'id',
						array(
					           'name'=>'suppliers_id',
					           'header'=>'suppliers Id',
					           'filter'=>CHtml::activeDropDownList($model, 'suppliers_id',
					                     Chtml::listData(SuppliersHasAwards::model()->findAll(), 'suppliers_id', 'suppliers_id'),
					                       array('empty'=>'Select Supplier',"")),
					           'value'=>'$data->suppliers_id',            
			                ),
						array(
					           'name'=>'title',
					           'header'=>'title',
					           'filter'=>CHtml::activeDropDownList($model, 'title',
					                     Chtml::listData(SuppliersHasAwards::model()->findAll(), 'title', 'title'),
					                       array('empty'=>'Select title',"")),
					           'value'=>'$data->title',            
      						 ),
						'description',
						'image',
						array(
							'class'=>'CButtonColumn',
							'header'=>'Operations',
							'buttons'=>array(
                                        'update'=>array(
                                                        'visible'=>'true',
                                                ),
                                        'view'=>array(
                                                        'visible'=>'true',
                                                ),
                                        'delete'=>array(
                                                        'visible'=>'false',
                                                ),
                       						 )
						),
					),
				)); ?>
				</div>
		</div>
	<!-- /BOX -->
	</div>
</div>
