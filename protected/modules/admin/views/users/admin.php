<?php
/* @var $this UsersController */
/* @var $model Users */

/*
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);
*/

/*
$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
         	<h1>Manage Users</h1>
       	</div>
    </div>
</div>

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
				<h4><i class="fa fa-table"></i>List of all users</h4>
			</div>
									

			<div class="box-body">

				<!--
				<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">

					<thead>
						<tr>
							<th>Id</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Company Name</th>
							<th>Display Name</th>
						</tr>
					</thead>

					<tfoot>
			            <tr>
			                <th>Id</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Company Name</th>
							<th>Display Name</th>
			            </tr>
			        </tfoot>

					<tbody>
						<?php // foreach ($model->findAll() as $row) { ?>
							<tr>
								<td><?php // echo $row->id; ?></td>
								<td><?php // echo $row->last_name; ?></td>
								<td><?php // echo $row->first_name; ?></td>
								<td><?php // echo $row->company_name; ?></td>
								<td><?php // echo $row->display_name; ?></td>
							</tr>
						<?php // } ?>
					</tbody>

				</table>
				-->

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'datatables1',
					'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'columns'=>array(
						'id',
						'last_name',
						'first_name',
						'image',
						'company_name',
						'display_name',
						/*
						'username',
						'phone_number',
						'password',
						'linkedin',
						'role',
						'add_date',
						'last_login',
						'status',
						'role_id',
						*/
						array(
							'class'=>'CButtonColumn'
						),
						
					),
				)); 
				?>
			</div>
		</div>
	<!-- /BOX -->
	</div>
</div>