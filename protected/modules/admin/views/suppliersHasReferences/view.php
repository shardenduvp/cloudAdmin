<?php
/* @var $this SuppliersHasReferencesController */
/* @var $model SuppliersHasReferences */

$this->breadcrumbs=array(
	'Suppliers Has References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SuppliersHasReferences', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasReferences', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasReferences', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasReferences', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasReferences', 'url'=>array('admin')),
);
?>

<div class="dark-wrapper">
	<div class="row">
        <div class="col-sm-12">
            <div class="page-header">
              <h1>Portfolio Reference</h1>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 pull-right">
            <div role="tabpanel">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="clientStory">
                        <?php echo $this->renderPartial("_references",array("model"=>$model)); ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>