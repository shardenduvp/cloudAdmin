
<?php
/* @var $this SuppliersController */
/* @var $model Suppliers */
/* @var $form CActiveForm */
?>
<div class="box">
  <div class="panel-body">
    <div class="row">

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'suppliers-form',
			'action'=>Yii::app()->createUrl('admin/suppliers/update',array('id'=>$model->id)),
			'htmlOptions'=>array(
				'class'=>'form-horizontal',
				'id'=>'suppUpdate'
				),
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>true,
		)); ?>

		<div class="col-md-12">

			<!-- Error Fields -->
			<div class="row">
				<div class="col-md-12">
					<?php echo $form->errorSummary($model); ?>
					<div class=" hide-div alert alert-dismissible" role="alert" id="formResultDivSupplier">
  					<span id="formResultSupplier"></span>
					</div>
				</div>
			</div>

			<!-- Form Groups -->
			<div class="row">
				<!-- Profile Image -->
        <div class="col-md-2" align="center">
          <img alt="User Pic"
            class="img-circle"
            id="supImg"
            style="width:100px;height:100px;"
            src="<?php if($model->image==null){
                    echo Yii::app()->theme->baseUrl."/adminPanel/img/user.png";
                  }else{
                    echo $model->image;
                  }
                  ?>"
          />
          <!-- Image File Picker -->
          <div class="btn btn-link">
						<?php echo $form->hiddenField($model,'image',array('class'=>'form-control','readonly'=>'true','id'=>'image2')); ?>
						<a href="javascript:void(0)" id="openBrow2">Browse</a>
            <?php echo $form->error($model,'image'); ?>
          </div>
        </div>
        <!-- Edit Basic Information -->
        <div class="col-md-10">
        	<div class="row">
        		<div class="col-md-6 col-md-offset-1">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($user,'company_name',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($user,'company_name',array('class'=>'form-control')); ?>
        				<?php echo $form->error($user,'company_name'); ?>
        			</div>
        		</div>
        		<div class="col-md-5">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'skype_id',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'skype_id',array('class'=>'form-control', 'placeholder'=>'Skype')); ?>
        				<?php echo $form->error($model,'skype_id'); ?>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-3 col-md-offset-1">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'foundation_year',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'foundation_year',array('class'=>'form-control', 'placeholder'=>'Foundation Year')); ?>
        				<?php echo $form->error($model,'foundation_year'); ?>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'number_of_employee',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'number_of_employee',array('class'=>'form-control', 'placeholder'=>'No of Employee')); ?>
        				<?php echo $form->error($model,'number_of_employee'); ?>
        			</div>
        		</div>
        		<div class="col-md-2">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'project_size',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'project_size',array('class'=>'form-control', 'placeholder'=>'Project Size')); ?>
        				<?php echo $form->error($model,'project_size'); ?>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="form-group ps10">
        				<?php echo $form->labelEx($model,'per_hour_rate',array('class'=>'control-label')); ?>
        				<?php echo $form->textField($model,'per_hour_rate',array('class'=>'form-control', 'placeholder'=>'Per Hour Rate (20-30)')); ?>
        				<?php echo $form->error($model,'per_hour_rate'); ?>
        			</div>
        		</div>
        	</div>
        </div>
			</div>

			<hr/>

			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<h4>Location Information</h4>
						</div>
					</div>
					<div class="row" id="locContainer">
						<?php
							$office_list=CHtml::listData(OfficeType::model()->findAll(), 'id', 'name');
							$offices = UsersOffices::model()->findAllByAttributes(array('user_id'=>$model->users->id));
							echo CHtml::hiddenField("", count($offices), array('id'=>'locCount'));
							$location = array();
							$count = 0;
							if(!empty($offices)) {
							  foreach ($offices as $office) {
							  	$count++;
							  	?>
							  	<div class="col-md-6 locDivs">
										<div class="row">
											<div class="well well-sm clearfix ml10 prel">
                        <?php echo CHtml::link('<span class="fa fa-times"></span>', array('/supplier/deleteOffice', 'oid'=>base64_encode($office->id), 'action'=>'delete'), array('class'=>'location_delete', 'onclick'=>'return deletetlocation($(this))')); ?>
                        <div class="col-md-6">
													<div class="form-group ps10">
														<?php echo CHtml::label('Department',"offices".$count,array('class'=>'control-label')); ?>
														<?php echo CHtml::dropDownList("location[".$count."][dep]", $office->dep_id, $office_list, array('class'=>'form-control', 'id'=>"offices".$count)); ?>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group ps10 locationInput">
													<?php echo CHtml::label('Location',"location".$count,array('class'=>'control-label')); ?>
													<?php echo CHtml::textField("location[".$count."][name]", $office->city->name, array('class'=>'form-control', 'id'=>"location".$count)); ?>
													<input type="hidden" name="location[<?php echo $count; ?>][id]" class="id" value="<?php echo $office->id; ?>" />
													<input type="hidden" name="location[<?php echo $count; ?>][cityid]" class="cityid" value="<?php echo $office->city_id; ?>" />
													</div>
												</div>
											</div>
										</div>
									</div>
							  	<?php
							  }
							}
						?>
						<div class="col-md-6" id="addLocationDiv">
							<div class="row">
								<div class="well well-sm clearfix ml10 h96">
								<a class="btn btn-link" onclick="locationaddNew()">+&nbsp;Add Location</a>
								</div>
							</div>
						</div>
						<!-- Hidden Template -->
						<div class="hide" id="dummy_location">
							<div class="col-md-6" id="loc_new">
								<div class="row">
									<div class="well well-sm clearfix ml10">
                    <?php echo CHtml::link('<span class="fa fa-times"></span>', array('/supplier/deleteOffice', 'oid'=>'s', 'action'=>'delete'), array('class'=>'location_temp_delete', 'onclick'=>'return deletetemplocation($(this))')); ?>
										<div class="col-md-6">
											<div class="form-group ps10">
												<?php echo CHtml::label('Department',"",array('class'=>'control-label deptLabel')); ?>
												<?php echo CHtml::dropDownList("", "", $office_list, array('class'=>'form-control deptField', 'onChange'=>'deptChange($(this));')); ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group ps10 locationInput">
											<?php echo CHtml::label('Location',"",array('class'=>'control-label locLabel')); ?>
											<?php echo CHtml::textField("", "", array('class'=>'form-control locField')); ?>
											<input type="hidden" name="" class="depid" value="" />
											<input type="hidden" name="" class="id" value="" />
											<input type="hidden" name="" class="cityid" value="" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<hr/>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<h4>About Information</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'about_company',array('class'=>'control-label')); ?>
								<?php echo $form->textArea($model,'about_company',array('class'=>'form-control noresize', 'placeholder'=>'Description')); ?>
								<?php echo $form->error($model,'about_company'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ps10">
								<?php echo $form->labelEx($model,'offers',array('class'=>'control-label')); ?>
								<?php echo $form->textArea($model,'offers',array('class'=>'form-control noresize', 'placeholder'=>'e.g Free Trial for 20 Days')); ?>
								<?php echo $form->error($model,'offers'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12">
					<div>
						<?php 
							echo CHtml::ajaxSubmitButton('Update Suppliers Details',CHtml::normalizeUrl(array('suppliers/update','id'=>$model->id)),
			          array(
			            'dataType'=>'json',
			            'type'=>'post',
			            'beforeSend'=>'function(){
			              $("#updateBtnSupplier").button("loading");
			            }',
			            'success'=>'function(data) { 
			            	$.each( data.locations, function( index, value ){
			            	  if(value.id!="" && value.cityid != ""){
			            	  	var idF = $("input[name=\'location["+index+"][id]\']");
			            	    idF.val(value.id);
			            	    var anchor = idF.closest(".locDivs").find(".location_temp_delete").attr("href");
			            	    if(typeof anchor !="undefined"){
			            	      anchor = anchor.replace("oid=s","oid="+value.e_id);
			            	      idF.closest(".locDivs").find(".location_temp_delete").attr("href",anchor);                
			            	    }  
			            	  }
			            	});
			              if(data.status == "success" ){
			              $("#formResultDivSupplier").removeClass("hide-div");
			              $("#formResultDivSupplier").removeClass("alert-warning");
			              $("#formResultDivSupplier").addClass("alert-success");
			              $("#formResultSupplier").html("Updated Successfully .");
			              $("#updateBtnSupplier").button("reset");
			              $(".location_temp_delete").addClass("location_delete").removeClass("location_temp_delete").attr("onclick", "return deletetlocation($(this))");
									}
			            else{
			              $("#formResultDivSupplier").removeClass("hide-div");
			              $("#formResultDivSupplier").removeClass("alert-success");
			              $("#formResultDivSupplier").addClass("alert-warning");
										$("#formResultSupplier").html("Something Went Wrong .");
										$("#updateBtnSupplier").button("reset");
									}    
								}',
			          'error'=>'function(){
			            $("#formResultDivSupplier").removeClass("hide-div");
			            $("#formResultDivSupplier").removeClass("alert-success");
			            $("#formResultDivSupplier").addClass("alert-warning");
									$("#formResultSupplier").html("Something Went Wrong .");
									$("#updateBtnSupplier").button("reset");
								}'
							),
							array(
							  'id'=>'updateBtnSupplier',
							  'class'=>'btn btn-primary pull-right',
							  'data-loading-text'=>'Updating ...',
							  'autocomplete'=>'off'
						  )
						); 
						?>
					</div>
				</div>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>

<?php
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END);
?>
<script type="text/javascript">
	var locCount = $("#locCount").val();
	var algolia, index;

	$(document).ready(function() {
		algolia = new AlgoliaSearch('L8YWR0XFJ6', '4bba2c1bb6dc58cdac2c3a02780bc9e0');
		index = algolia.initIndex('city');
		$(".locationInput input:text").typeahead({ hint: false },{source:index.ttAdapter({ "hitsPerPage": 10 }),displayKey:'label'}).on('typeahead:selected', function($e,datum){
		    console.log(datum.id);
		    $(this).closest(".locationInput").find('.cityid').val(datum.id);

		});
		$('.twitter-typeahead').css('display', 'block');

        $('#openBrow2').click(function(){
            filepicker.setKey("AlqJxqOBnROGcRhBT1jPFz");
            filepicker.pickMultiple({mimetypes: ['image/*'],},
            function(InkBlob){
                for(i in InkBlob){
                    //var docs = $('#docs').val();
                    //docs = docs+InkBlob[i].mimetype+"|"+InkBlob[i].filename+"|"+InkBlob[i].size+"|"+InkBlob[i].url+",";
                    //$('#docs').val(docs);
                    var data =InkBlob[i].url;
                    $('#image2').val(data);
                    $('#supImg').attr('src', data);
                }
                console.log($('#docs').val());
            },
            function(FPError){
                console.log(FPError.toString());
            }
            );
        });

	});

	function doAutoComplete() {
		algolia = new AlgoliaSearch('L8YWR0XFJ6', '4bba2c1bb6dc58cdac2c3a02780bc9e0');
		index = algolia.initIndex('city');
		$(".locationInput input:text").typeahead({ hint: false },{source:index.ttAdapter({ "hitsPerPage": 10 }),displayKey:'label'}).on('typeahead:selected', function($e,datum){
		    console.log(datum.id);
		    $(this).closest(".locationInput").find('.cityid').val(datum.id);
		});
	}

	function locationaddNew() {
		locCount++;
    var d = $("#dummy_location").html();
    var dummy = $(d);
    dummy.addClass("locDivs").attr("id", "");
    dummy.find(".id").attr("name", "location[" + locCount + "][id]").val('');
    dummy.find(".cityid").attr("name", "location[" + locCount + "][cityid]").val('');
    dummy.find(".depid").attr("name", "location[" + locCount + "][dep]").val('');
    dummy.find(".deptLabel").attr("for", "location"+locCount);
    dummy.find(".locLabel").attr("for", "location"+locCount);
    dummy.find(".deptField").attr("name", "location[" + locCount + "][dep]");
    dummy.find(".deptField").attr("id", "location" + locCount);
    dummy.find(".locField").attr("name", "location[" + locCount + "]").val('');
    dummy.find(".deptField").attr("id", "location" + locCount);
    if ($(".mydivclass")[0]){
	    dummy.insertAfter("#locContainer .locDivs:last");
		} else {
		  $('#locContainer').append(dummy);
		}
	  $("#addLocationDiv").remove().insertAfter("#locContainer .locDivs:last");
    doAutoComplete();
	}

	function deptChange(e) {
		var selected = e.val();
		e.closest('.locDivs').find('.depid').val(selected);
	}

	function deletetlocation(elem) {
    if (elem != 'undeinfed') {
        $.ajax({
            type: 'GET',
            data: '',
            url: elem.attr('href'),
            datatype: "json",
            success: function(data) {
                console.log(data);
                if(data){
                  elem.closest('.locDivs').attr('id', 'deleteNode');
                  var parent = $('#locContainer');
                  $('#deleteNode',parent).remove();
                }else
                {
                    console.log('Error deleting location');
                }
                return false;
            },
            error: function(a, b, c) {
                console.log("Errors : " + JSON.stringify(a) + " | " + JSON.stringify(b) + " | " + JSON.stringify(c));
            }
        });
        
    }
    return false;
	}

	function deletetemplocation(elem) {
		elem.closest('.locDivs').attr('id', 'deleteNode');
		var parent = $('#locContainer');
		$('#deleteNode',parent).remove();
		return false;
	}
</script>
