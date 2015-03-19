<?php $pId	=	base64_decode(Yii::app()->request->getParam('pid')); ?>
<header class="navbar navbar-fixed-top bg-light np header-left">
<ol class="breadcrumb p20">
	<li class="crumb-active">
		<a href="#" class="fs24 font_newlight">Project Details</a>
	</li>
	<li class="crumb-active">
		<a href="<?php echo Yii::app()->createUrl('/client/introductions'); ?>" class="fs12 font_newlight breadcrum-color"><span aria-hidden="true" class="icon-users fs12 mr5" style=""></span> Introduction</a>
	</li>				
</ol>
</header>
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn" style="">
<!-- begin: .tray-left -->
	<aside class="aside-left-panel col-md-3 va-t pn">
		<div class="animated-delay  layout-left" data-animate='["100","fadeIn"]'>
			<div class="col-md-12 np">
				<div class="panel">
					<div class="project-heading" id="project-tabs">
						<ul class="nav project-tabs project-tabs-left col-sm-12 np">
							<li class="active col-sm-6 np">
								<a href="#pstatus" data-toggle="tab">Project Status</a>
							</li>
							<li class="col-sm-6 np">
								<a href="#pdetail" data-toggle="tab" class="">Project Details</a>
							</li>
						</ul>
					</div>
					<div class="project-body">
						<div class="tab-content pn br-n">
							<div id="pstatus" class="tab-pane active">
								<div class="col-md-12 pl20 pb30 vp-bg pr20 pt25">
									<div class="col-sm-12 np mt10 mb10">
										<span class="grey-text fs10 display_inline mb5">Fund Transfered</span>
										<div class="col-sm-12 dark-blue-new np fs18 font_newregular mb10">$50,000 /  $150,000</div>
										<div class="col-sm-12 np">
											<div class="progress progress-bar-sm nm mt5">
												<div style="width: 30%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" role="progressbar" class="progress-bar progress-bar-orange">															</div>
											</div>
										</div>
									</div>
								</div>
								<div id="milestonesHtml">
									<?php $this->renderPartial('milestoneListingPartial',array("pitch"=>$pitch,'pId'=>$pId,'mileStoneStatus'=>$mileStoneStatus)); ?>
								</div>
							</div>	
							<div id="pdetail" class="tab-pane">
								<div class="col-md-12 pl30 pb30 vp-bg pr20 pt25">
									<div class="col-md-4 np">
										<?php
											$avtar_img	=	Yii::app()->theme->baseUrl."/style/images/avatar.png";
											if($proposal->suppliers->image != "")
											{
												$avtar_img = $proposal->suppliers->image;
											}
											?>
										   <img src="<?php echo $avtar_img; ?>" class="img-circle" alt="Team Member" id="profile_img" width="80" />
									</div>
									<div class="col-md-8 np mt10">
										<h3 class="font_newlight nm blue-new mb10 mt5"><?php echo $proposal->suppliers->users->first_name; ?></h3>
										<span class="fs12 mr10 display_block"><?php echo $proposal->suppliers->users->role; ?></span>
									</div>
								</div>
								<div class="col-md-12 np mt20">
									<div class="col-sm-12 np">
										<h4 class="font_newregular pl30 fs12 display_inline  blue-new mb5">Supplier Info</h4>
									</div>
									<div class="col-md-12 bt-dark pl30 pt20 pb20">
										<a class="fs18 font_newregular team-text-blue" href=""><?php echo $proposal->suppliers->users->company_name; ?></a>
										<div class="col-sm-12 np mt10">
											<span class="col-sm-12 np mt5 mb5"><span class="icon-pointer mr5 icon-grey-color" aria-hidden="true"></span> 
											<?php $city="";
											foreach($proposal->suppliers->users->usersOffices as $office){
												if($office->dep_id == 1){
													echo $city	=	$office->city->name.", ".$office->city->countries->name;
													break;
												}
											}?>
											</span>
											<span class="col-sm-12 np mt5 mb5"><span class="icon-user mr5 icon-grey-color" aria-hidden="true"></span> <?php echo $proposal->suppliers->number_of_employee; ?> Employee </span>
										</div>
									</div>
									<div class="col-sm-12 np">
										<h4 class="font_newregular pl30 fs12 display_inline  blue-new mb5">Project Summary</h4>
										<!--<a href="" class="orange-new fs12 display_inline pull-right mb5 mt5 mr25">Edit</a>-->
									</div>
									<div class="col-md-12 bt-dark p30 pb10 pt10">
										<div class="col-sm-12 np mt10">
											<p class="fs12 lh-20">
												<?php echo $proposal->clientProjects->description; ?> 		
											 </p>
										</div>
									</div>
									<div class="col-md-12 np mt30">
										<div class="col-sm-12 np">
											<h4 class="font_newregular pl30 fs12 display_inline  blue-new mb5">Reference Files</h4>
											<div class="display_inline pull-right fs12  mb5 mt5 mr25">
												<a href="javascript:void(0);" class="orange-new" id="add-link-box" title="Link"><span class="icon-link fs14" aria-hidden="true"></span></a>
												<a href="#" class="orange-new" id="projectAttachment" title="Attachment"><span class="icon-paper-clip fs14" aria-hidden="true"></span></a>
											</div>
										</div>
										<div class="col-md-12 bt-dark pb10 pt10 pl0 pr0">
											<div class="col-sm-12 np mt10">
												<div class="col-sm-12 pl20 pr20 mb20 form-horizontal admin-form theme-primary" id="link-box">
													<div class="col-sm-12">
														<label class="field prepend-icon">
															<input type="text" name="docName" id="docName" required="required" class="gui-input" placeholder="Link Title">
															<label for="firstname" class="field-icon"><span class="icon-link" aria-hidden="true"></span></label>
														</label>															
													</div>
													<div class="col-sm-12 mt25">
														<label class="field prepend-icon">
															<input type="text" name="docLink" id="docLink" required="required" data-parsley-type="url" class="gui-input" placeholder="Paste your link here">
															<label for="firstname" class="field-icon"><span class="icon-link" aria-hidden="true"></span></label>
														</label>
													</div>
													<div class="col-sm-12 np text-center mt10">
														<a href="#" class="orange-new mr20" id="addDocument" title="Add Link"><span aria-hidden="true" class="icon-check fs30"></span></a>
														<a href="#" class="orange-new" id="hideDocument" title="Add Link"><span class="icon-close fs30" aria-hidden="true"></span></a>
													</div>
												</div>
												<?php foreach($proposal->clientProjects->clientProjectDocuments as $ref){ ?>
												<?php if($ref->status==1){ ?>
													<div class="ref-files" id="ref-<?php echo $ref->id; ?>" >
														<a href="<?php echo (($ref->ref_type==1)?"http://":'').$ref->path; ?>" target="_blank" class="orange-new"><span class="<?php echo ($ref->ref_type==2)?'icon-paper-clip':'icon-link';?> fs12" aria-hidden="true"></span> <?php echo $ref->name; ?></a>
														<div class="pull-right ref-file-show">
															<a href="#" onClick="editReferenceFile(<?php echo $ref->id; ?>)" title="Edit">
															<span aria-hidden="true" class="icon-pencil orange-new mr10 <?php if($ref->ref_type=="2"){echo "hide"; } ?>"></span></a>
															<a href="#" id="delRef-<?php echo $ref->id; ?>" onClick="deleteReferenceFiles(<?php echo $ref->id; ?>)" title="Delete"><span aria-hidden="true" class="icon-trash orange-new mr5"></span></a>
														</div>
													</div>
												<?php }} ?>
												<div id="appendReferenceFiles"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside>
<!-- end: .tray-left -->
	<!-- begin: .tray-center -->
	<div class="tray tray-center va-t posr pl0 pr0 layout-left">
		<div class="admin-panels mn pn ui-sortable pl20 pr20" data-animate="fadeIn">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-block-new">
						<div class="tab-content tab-content-new animated-waypoint" data-animate="fadeIn" id='intro-content'>
							<?php $this->renderPartial('introduction',array('pId'=>$id)); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end: .tray-center -->
	
</section>

<div class="modal fade" id="createMilestones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content col-md-12 np">
			<div class="modal-header pa20 add_member_p_head">
				<h2 class="modal-title fs24 text-center " id="myModalLabel"> Add Milestone</h2>
			</div>
			<div class="modal-body col-md-12 np pt40 mb20" id="milestonesRender">
				<!-- Ajac Loaded Content -->
			</div>
			<div class="modal-footer pt20 pb20 pl20 pr20 col-md-12">
				<button type="button" class="btn btn-orange fs12 " id="buttonMilestones">Done</button>
				<button type="button" class="btn btn-default2 pa10 fs12" id="cancelButton" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="introID" value="<?php echo (isset($id))?$id:'';?>"/>
<input type="hidden" id="clientProjectId" value="<?php echo $proposal->clientProjects->id; ?>">
<input type="hidden" id="hiddenRefId" value="0">
<script type="text/javascript">
$(document).ready(function(){

	$('.slimscroll-long').slimscroll({height : $( window ).height()+'px',});
	$('.selectpicker').selectpicker();
	
	$('#add-link-box').click(function(){
		$('#link-box').fadeIn(500);
		inputBlank();
	});
	
	$("#hideDocument").click(function(){
		$('#link-box').hide();
		inputBlank();		
	});
	
	$("#notification-toggle").hover(function(){
		$.each($('div.progress-bar'),function(){
			$(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');				
		});
	});	
	
	
	
	$(document).on("click","#buttonMilestones",function(e){
		if($('#milestonesForm').parsley().validate() == true){
			var data = $('#milestonesForm').serialize();
			$('#buttonMilestones').val('Please Wait');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/client/activeProject');?>",
				data:data,
				success :function(data){
					var response = JSON.parse(data);
					if(response.hasOwnProperty('error')){
						$('#buttonMilestones').val('Done');
					}
					else{
						$('#buttonMilestones').val('Done');
						$('#milestonesForm').trigger("reset");
						var pitchId = $("#introID").val();
						$.ajax({
							type: 'POST',
							url:"<?php echo CController::createUrl('/client/renderMilestones');?>",
							data:"pId=" + pitchId,
							success :function(data){
								$("#milestonesHtml").html(data);
								$("#cancelButton").trigger("click");
							}
						});
					}
				}
			});
		}
		else{
			e.preventDefault();
		}
	});
	
	
	
	
	$("#PitchHasMilestones_due_date").datepicker({
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		showButtonPanel: false,
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {$("#PitchHasMilestones_due_date").parsley().validate();},
	});
	
	$('#projectAttachment').click(function() {
		filepicker.setKey("ANQWcFDQRUiGfBqjfgINQz");
		filepicker.pickMultiple({mimetypes: ['image/*', 'text/plain', 'application/pdf'],},
		function(InkBlob){
			for(i in InkBlob){
				addReferenceFiles(InkBlob[i].url,InkBlob[i].filename,"2");
			}
		},function(FPError) {
				console.log(FPError.toString());
			}
		);
	});
	
	$("#addDocument").click(function(){
		var docLink = $("#docLink").val();
		var docName = $("#docName").val();
		if($("#docLink").parsley().validate()==true && $("#docName").parsley().validate()==true)
			addReferenceFiles(docLink,docName,"1");
		return false;			  
	});
});
        
function bindDatePicker($)
{
	$("#PitchHasMilestones_due_date").datepicker({
		prevText: '<i class="fa fa-chevron-left"></i>',
		nextText: '<i class="fa fa-chevron-right"></i>',
		showButtonPanel: false,
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {$("#PitchHasMilestones_due_date").parsley().validate();},
	});
}

function inputBlank()
{
	$("#docLink").val("");
	$("#docName").val("");
	$("#hiddenRefId").val("0");		
}

function addReferenceFiles(docLink,docName,refType)
{
	var clientProjectId = $("#clientProjectId").val();
	var hiddenRefId 	= $("#hiddenRefId").val();
	$.ajax({
		type: 'POST',
		url:"<?php echo CController::createUrl('/client/AddReferenceFiles');?>",
		data:"docLink=" + docLink + "&clientProjectId=" + clientProjectId + "&docName=" + docName + "&refType=" + refType + "&hiddenRefId=" + hiddenRefId,
		success :function(data){
			var response = JSON.parse(data);
			if(response.id > 0){
				var displayNone = "";
				if(refType==2)
				{
					displayNone = "style='display:none;'";
				}
				var ref = '<div class="ref-files" id="ref-'+ response.id +'"><a href="http://' + docLink + '" target="_blank" class="orange-new"><span class="icon-link fs12" aria-hidden="true"></span> ' + docName + '</a><div class="pull-right ref-file-show"><a '+ displayNone +' onclick="editReferenceFile('+ response.id +')" title="Edit"><span aria-hidden="true" class="icon-pencil orange-new mr10"></span></a><a onClick="deleteReferenceFiles('+ response.id +')" title="Delete"><span aria-hidden="true" class="icon-trash orange-new mr5"></span></a></div></div>';
				if(hiddenRefId == 0)
				{
					$("#appendReferenceFiles").append(ref);
				}else{
					var editRef = '<a href="http://' + docLink + '" target="_blank" class="orange-new"><span class="icon-link fs12" aria-hidden="true"></span> ' + docName + '</a><div class="pull-right ref-file-show"><a '+ displayNone +' onclick="editReferenceFile('+ response.id +')" title="Edit"><span aria-hidden="true" class="icon-pencil orange-new mr10"></span></a><a onClick="deleteReferenceFiles('+ response.id +')" title="Delete"><span aria-hidden="true" class="icon-trash orange-new mr5"></span></a></div>';
					$("#ref-" + response.id).html(editRef);
				}
				$("#hiddenRefId").val("0");
				inputBlank();
				$('#link-box').hide();
			}
		}
	});
}
function editReferenceFile(id)
{
	$.ajax({
		type: 'GET',
		url:"<?php echo CController::createUrl('/client/ajaxfetchreferenceFiles');?>",
		data:"id=" + id,
		success :function(data){
			var response = JSON.parse(data);
			$("#docLink").val(response.path);
			$("#docName").val(response.name);
			$("#hiddenRefId").val(response.id);
			$('#link-box').show();
		}
	});
}
function deleteReferenceFiles(refId)
{
	$("#ref-"+refId).hide();			
}
function undoReferenceFiles(refId)
{
	
}
</script>