<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'Update SuppliersHasPortfolio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SuppliersHasPortfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>

<div class="dark-wrapper">
	<div class="row">
        <div class="col-sm-12">
            <div class="page-header">
              <h1>Portfolio</h1>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 pull-right">
            <div role="tabpanel">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="clientStory">
                        <?php echo $this->renderPartial("_portfolio",array("model"=>$model)); ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<script type="text/javascript">
    
function fetchAnswers(element){
    //alert(element.attr('data-id'));
    $(".loader-small").fadeIn('slow');
    $("#answersBody").html("");
    $.ajax({
        type:"POST",
        url:"<?php echo Yii::app()->createUrl('admin/suppliersReferencesQuestions/fetchAnswers');?>",
        data:"id="+element.attr('data-id'),
        success:function(response){
            $(".loader-small").fadeOut('slow');
            $("#answersBody").html(response);
        }
    });
}


</script>


