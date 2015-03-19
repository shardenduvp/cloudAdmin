<?php
/* @var $this SkillsController */
/* @var $model Skills */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Skills', 'url'=>array('index')),
	array('label'=>'Create Skills', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#skills-grid').yiiGridView('update', {
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
         	<h1>Manage Skills</h1>
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
	<div class="col-md-12 full-width">
		<!-- BOX -->
		<div class="box border custom-table">

			<div class="box-title">
				<h4><i class="fa fa-table"></i>List of all users</h4>
			</div>
									

			<div class="box-body">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'skills-grid',
	'dataProvider'=>$model->parentSearch(),
	'template'=>'{items}{summary}{pager}',
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
	'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		array(
		'name'=>'skillcol',
		'header'=>'Added By',
		'filter'=>CHtml::activeDropDownList($model, 'skillcol',
                     		 array('0'=>"Admin",'1'=>'User'),
                      		array('empty'=>'Added By',"")), 
           'value'=>'($data->skillcol==1)?"User":"Admin"'
        ) ,
	   'add_date',
		array(
			'name'=>'parent_id',
			'header'=>'Parent',
			'value'=>'$data->parent_id!=0 && !empty($data->parent_id) ?Skills::model()->findByPk($data->parent_id)->name:"Parent";'
			),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


         </div>

		</div>
	<!-- /BOX -->
	</div>
</div>
