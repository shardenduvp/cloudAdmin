<div class="container full-width">
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									
									<div class="clearfix">
										<h3 class="content-title pull-left">FAQ</h3>
									</div>
									<div class="description">Frequently Asked Questions</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- FAQ -->
						<div class="row">
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
		
			<div class="form-horizontal">
				<?php $form=$this->beginWidget('CActiveForm', array(
							'method'=>'post',
						'enableAjaxValidation'=>false,
				)); ?>
							
				<div class="form-group">
					<div class="col-sm-4 tr-align">
						<?php echo CHtml::label('Suppliers','', array(
							'class'=>'control-label'
						)); ?>
					</div>
					<div class="col-sm-2 col-offset-sm-2">
					<?php $list = CHtml::listData($supplier,'id', 'users.first_name');
						  echo CHtml::dropDownList('id','', $list, array('empty' => 'Select a Supplier','class'=>'form-control'));
						?>
					</div>
					<div class="col-sm-4 col-offset-sm-2">
					<?php echo CHtml::submitButton('Get Questions',array('submit'=>Yii::app()->createUrl('admin/suppliersFaqAnswers/createUpdateFaq'),'class'=>'btn btn-primary buttonh')); ?>
					</div>
				</div>
		<?php $form=$this->endWidget(); ?>
	</div>
						<div class="hide-div alert alert-dismissible" role="alert"
						id="formResultDiv">
  							<span id="formResult"></span>
						</div>
		
								
							</div>
			
						</div>
							<!-- NAV -->

							<?php if($model!=null){?>
							
							<!-- /NAV -->
							<!-- CONTENT -->
							<div class="col-md-12">
								<div class="tab-content">
								   <div class="tab-pane active" id="tab1">
									  <div class="panel-group" id="accordion">
									 <?php 
									  $firstIteration=1;
									 foreach($model as $faq){ 
									 			$form=$this->beginWidget('CActiveForm', array(
												'method'=>'post',
											'action'=>Yii::app()->createUrl('admin/suppliersFaqAnswers/update',array('id'=>$faq->id)),
											'htmlOptions'=>array(
												'class'=>'form-horizontal'
												),
											'enableAjaxValidation'=>true,

							)); 
									 ?>
										  <div class="panel panel-info">
											 <div class="panel-heading">
												<h3 class="panel-title"> 
													<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1_<?php echo $faq->id;?>">
													<?php echo 'Q: '.$faq->faq->question;?>
													</a> 
												</h3>
											 </div>
											 <div id="collapse1_<?php echo $faq->id;?>" class="panel-collapse collapse <?php if($firstIteration==1){ echo 'in'; $firstIteration=2; }?>">
												<div class="panel-body"> 
													<div class="form-group">
														<?php echo $form->labelEx($faq,'answer',array('class'=>'col-md-2 control-label'));?>
														<div class="col-md-10">
														<?php echo $form->textArea($faq,'answer',array('rows'=>6, 'cols'=>70),array('class'=>'form-control' )); ?>
														<?php echo $form->error($faq,'answer'); ?>
														</div>
													</div>
													<div class="form-group">
														<?php echo $form->labelEx($faq,'publish',array('class'=>'col-md-2 control-label'));?>
														<div class="col-md-5">
														<?php echo $form->DropdownList($faq,'publish',array('0'=>'Not Published', '1'=>'Published'),array('class'=>'form-control' )); ?>
														<?php echo $form->error($faq,'publish'); ?>
														</div>
													</div>
													
													<?php 
echo CHtml::ajaxSubmitButton('Update',CHtml::normalizeUrl(array('suppliersFaqAnswers/update','id'=>$faq->id)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'beforeSend'=>'function(){
                     	$("#updateAnswer_'.$faq->id.'").button("loading");
                     }',
                     'success'=>'function(data) { 

                        if(data.status == "success" ){
                        $("#formResultDiv").removeClass("hide-div");
                        $("#formResultDiv").removeClass("alert-warning");
                        $("#formResultDiv").addClass("alert-success");
                        $("#formResult").html("Updated Successfully .");

                        $("#updateAnswer_'.$faq->id.'").button("reset");

                        }
                         else{
                         $("#formResultDiv").removeClass("hide-div");
                         $("formResultDiv").removeClass("alert-success");
                         $("formResultDiv").addClass("alert-warning");
						 $("#formResult").html("Something Went Wrong .");
                         
						 $("#updateAnswer_'.$faq->id.'").button("reset");

                        }       
                    }',
                    'error'=>'function(){
                    	$("#formResultDiv").removeClass("hide-div");
                    	$("formResultDiv").removeClass("alert-success");
                        $("formResultDiv").addClass("alert-warning");
						$("#formResult").html("Something Went Wrong .");

						 $("#updateAnswer_'.$faq->id.'").button("reset");

                    }'
                     ),array('id'=>'updateAnswer_'.$faq->id.'','class'=>'btn btn-primary pull-right','data-loading-text'=>'Updating ...','autocomplete'=>'off')); 
?>

												</div>
											 </div>
										  </div>
										  <?php $this->endWidget();
										  }
										   ?>
									   </div>
								   </div>

							</div>
							<?php } else{
								echo "<center><h3>Select A Supplier</h3></center>";
							}
							?>

							</div>
							</div>
							<!-- /CONTENT -->
				</div>
						<!-- /FAQ -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
</div><!-- /CONTENT-->
