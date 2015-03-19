<?php
/* @var $this SuppliersHasPortfolioController */
/* @var $model SuppliersHasPortfolio */

$this->menu=array(
	array('label'=>'List SuppliersHasPortfolio', 'url'=>array('index')),
	array('label'=>'Create SuppliersHasPortfolio', 'url'=>array('create')),
	array('label'=>'View SuppliersHasPortfolio', 'url'=>array('view', 'id'=>$setVariable['model']->id)),
	array('label'=>'Manage SuppliersHasPortfolio', 'url'=>array('admin')),
);
?>

<div class="dark-wrapper">
	<div class="row">
        <div class="col-sm-12">
            <div class="page-header">
              <h1>Update Project Details</h1>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-12 pull-right">
            <div role="tabpanel">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="clientStory">
                        <?php echo $this->renderPartial("_form",array(  "model"=>$setVariable['model'],
                                                                        "industries"=>$setVariable['industries'],
                                                                        "services"=>$setVariable['services'],
                                                                        "selectedIndustries"=>$setVariable['selectedIndustries'],
                                                                        "selectedSkills"=>$setVariable['selectedSkills'],
                                                                        "skills"=>$setVariable['skills'],
                                                                        "selectedServices"=>$setVariable['selectedServices'],
                                                                        "portfolio_type"=>1,
                                                                )); ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>

<script>
    function allscreenshots(id,doc,screenshots)
{
    $('#' + id).click(function(){
        filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
        filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
        function(InkBlob){
            for(i in InkBlob){
              
                var docs = $('#' + doc).val();
                var delDoc = InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url;
                docs = docs+InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url+",";
                $('#' + doc).val(docs);
                var data = '<tr id="delImg_'+ i +'"><td><span class="label label-success">'+InkBlob[i].mimetype+'</span>'+InkBlob[i].filename+'('+Math.round(((InkBlob[i].size)/1024),2)+' KB)</td><td><a href="'+InkBlob[i].url+'" target="_blank">View</a></td><td>&nbsp;&nbsp;<a id="'+ delDoc + "##" + i +'" class="deleteScreen">Delete</a></td></tr>';
                $('#' + screenshots).append(data);
                lodaFilepicker($);
                autoSaveClient("client-form");
            }
            console.log($('#' + doc).val());
        },
        function(FPError){
            console.log(FPError.toString());
        }
        );
    });
} 
</script>
