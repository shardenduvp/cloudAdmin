<?php
/* @var $this ClientProjectsController */
/* @var $model ClientProjects */

$status = array(
    '1' => 'Awaiting Approval',
    '2' => 'Introduction Sent'
);

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
    $('#datatables1').yiiGridView('update', {
        data: $(this).serialize()
    });
    return false;
});
");

?>



<!-- Modal -->
<div class="modal fade" id="approve_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- AJAX Loader -->
            <div class="ajax-loader loader-hidden"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/loaders/12.gif"></div>
            
            <div id="approve-data-ajax"></div>
        </div>
    </div>
</div>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <h1>New Leads</h1>
        </div>
    </div>
</div>

<?php if(Yii::app()->user->hasFlash('successFlash')) { ?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('successFlash'); ?>
</div>
<?php } ?>

<?php if(Yii::app()->user->hasFlash('failureFlash')) { ?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Failed!</strong> <?php echo Yii::app()->user->getFlash('failureFlash'); ?>
</div>
<?php } ?>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div>
<!-- search-form -->


<div class="row">
    <div class="col-md-12 full-width">
        <!-- BOX -->
        <div class="box border custom-table">

            <div class="box-title">
                <h4><i class="fa fa-table"></i>List of all New Leads</h4>
            </div>
                                    

            <div class="box-body">
            <?php $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'datatables1',
                'itemsCssClass'=>'datatable table table-striped table-bordered table-hover',
                'dataProvider'=>$model->leadSearch(),
                'filter'=>$model,
                'pagerCssClass'=>'box-body',
                'template'=>'{items}{summary}{pager}',
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
                        'value'=>'CHtml::link($data->name, array("/admin/clientProjects/listSuppliers", "id"=>$data->id))',
                    ),
                    array(
                        'name'=>'client_company_name',
                        'type'=>'html',
                        'value'=>'CHtml::link($data->clientProfiles->users->company_name, array("/admin/clientProfiles/view", "id"=>$data->clientProfiles->users->id))',
                    ),
                    array(
                        'name'=>'client_name',
                        'type'=>'html',
                        'value'=>'CHtml::link(ucwords($data->clientProfiles->users->first_name.\' \'.$data->clientProfiles->users->last_name), array("/admin/clientProfiles/view", "id"=>$data->clientProfiles->users->id))',
                    ),
                    array(
                        'name'=>'start_date',
                        'value'=>'(empty($data->start_date))?"Not Provided":date("jS M Y", strtotime($data->start_date))',
                    ),
                    array(
                        'name'=>'status',
                        'header'=>'Status', 
                        'filter'=>CHtml::activeDropDownList($model, 'status',
                            $status,
                            array('empty'=>'Select Status',"")), 
                        'value'=>'($data->status<=1)?"Awaiting Approval":"Introductions Sent"',            
                    ),
                    array(
                        'name'=>'suppliers_name',
                        'type'=>'html',
                        'value'=>'$data->getSuppliers($data)',
                    ),
                    array(
                        'name'=>'modify_date',
                        'value'=>'(empty($data->modify_date)) ? "Not Provided" : date("jS M Y", strtotime($data->modify_date))',
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Approve',
                        'template'=>'{approve}{done}',
                        'buttons'=>array(
                            'approve'=>array(
                                'label'=>'APPROVE PROJECT',
                                'url'=>'Yii::app()->createUrl("/admin/default/getApproveView", array("id"=>$data->id))',
                                'options'=>array(
                                    'data-toggle'=>'modal',
                                    'data-target'=>'#approve_modal',
                                ),
                                'visible'=>'($data->status<=1)?true:false',
                                'click'=>'function(e) {
                                    $("#approve-data-ajax").empty();
                                    $(".ajax-loader").show();
                                    $.ajax({
                                        type:"POST",
                                        url:$(this).attr("href"),
                                        success:function(data) {
                                            $(".ajax-loader").hide();
                                            $("#approve_modal").html(data);
                                        },
                                        error:function() {
                                            $("#approve_modal").html("Error in connection.");
                                        }
                                    });
                                }',
                            ),
                            'done'=>array(
                                'label'=>'APPROVED',
                                'url'=>'Yii::app()->createUrl("#")',
                                'visible'=>'($data->status<=1)?false:true',
                            ),
                        ),
                    ),
                    array(
                        'class'=>'CButtonColumn',
                        'header'=>'Search',
                        'template'=>'{search}',
                        'buttons'=>array(
                            'search'=>array(
                                'label'=>'SEARCH SUPPLIERS',
                                'url'=>'Yii::app()->createUrl("site/index")',
                            ),
                        ),
                    ),
                ),
            )); ?>
            </div>
        </div>
    <!-- /BOX -->
    </div>
</div>