<?php
/* @var $this SupplierHasMilestonesController */
/* @var $model SupplierHasMilestones */

$this->breadcrumbs=array(
	'Supplier Has Milestones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SupplierHasMilestones', 'url'=>array('index')),
	array('label'=>'Create SupplierHasMilestones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#supplier-has-milestones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Supplier Has Milestones</h1>

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
				<h4><i class="fa fa-table"></i>List of Supplier Has Milestones</h4>
			</div>
			<div class="box-body">
						<?php $this->widget('zii.widgets.grid.CGridView', array(
							//'id'=>'supplier-has-milestones-grid',
							'id'=>'datatables1',
							'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
							'dataProvider'=>$model->search(),
							'filter'=>$model,
							'columns'=>array(
								'id',
								'module',
								'start_date',
								'end_date',
								'amount',
								'date',
								'status',
								'transaction',
								'note',
								'reminder_date',
								'milestone_title',
								'overview',
								'due_date',
								'is_schedule_payment',
								'suppliers_id',
								'supplier_proposal_id',
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