

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
		<div class="box border inverse">

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

				<?php
				
				$this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'datatables1',
					'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'pagerCssClass'=>'box-body',
                	'pager'=>array(
                    'header'=>'',
                    'firstPageLabel'=>'&laquo;',
                    'lastPageLabel'=>'&raquo;',
                    'prevPageLabel'=>'<',
                    'nextPageLabel'=>'>',
                    'hiddenPageCssClass'=>'disabled',
                    'selectedPageCssClass'=>'active',
                    'htmlOptions'=>array(
                        'class'=>'pagination',
                    )
                ),
					'columns'=>array(
						array('name'=>'id','htmlOptions'=>array('class'=>'center')),
						'last_name',
						'first_name',
						 
						array(
            				'name'=>'username',
            				'header'=>'Username',
            				'type'=>'raw',
            				'value'=>array($this,'assignLinks')
        				),
						array('name'=>'role_id',
							'header'=>'Role', 
            				'filter'=>CHtml::activeDropDownList($model, 'role_id',
                     		 array('1'=>'Admin','2'=>'Client','3'=>'Supplier'),
                      		array('empty'=>'Select Roles',"")), 
            				'value'=>'ucfirst($data->role0->name)'
            			),
						'company_name',
						array(
            				'name'=>'status',
            				'header'=>'Status', 
            				'filter'=>CHtml::activeDropDownList($model, 'status',
                     		 array('1'=>"Verified",'0'=>'Un-Verified'),
                      		array('empty'=>'Select Status',"")), 
            				'value'=>'($data->status==1)?"Verified":"Not Verified"',            
        				),
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
						)
				)
			));  
?>
			</div>
		</div>
	<!-- /BOX -->
	</div>
</div>