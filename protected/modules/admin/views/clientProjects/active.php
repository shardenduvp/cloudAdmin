<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */


$this->breadcrumbs=array(
    'Client Projects'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List ClientProjects', 'url'=>array('index')),
    array('label'=>'Create ClientProjects', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $('#client-projects-grid').yiiGridView('update', {
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
            <h1>Active Projects</h1>
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
                <h4><i class="fa fa-table"></i>List of all Active Projects</h4>
            </div>
                                    

            <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
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
                    ),
                ),
                'columns'=>array(
                    array(
                        'name'=>'name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->name, array("/admin/clientProjects/view&id=".$data->id))'
                    ),
                    array(
                        'name'=>'client_search',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->clientProfiles->users->username, array("/admin/clientProfiles/view&id=".$data->clientProfiles->id))',
                    ),
                    array(
                        'name'=>'start_date',
                        'value'=>'(empty($data->start_date))?"Not Provided":date("jS M Y", strtotime($data->start_date))',
                    ),/*
                    array(
                        'name'=>'supplier_search',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->suppliers->name, array("/admin/suppliers/view&id=".$data->suppliers->id))',
                    ),*/
                    array(
                        'name'=>'modify_date',
                        'value'=>'(empty($data->modify_date)) ? "Not Provided" : $data->modify_date',
                    ),
                    array(
                        'name'=>'status',
                        'header'=>'Status', 
                        'filter'=>CHtml::activeDropDownList($model, 'status',
                            array('1'=>"Verified",'0'=>'Not Verified'),
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
                    ),
                ),
            )); ?>
            </div>
        </div>
    <!-- /BOX -->
    </div>
</div>