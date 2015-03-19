<div class="col-md-12 np">
<div class="col-md-12 p20"><?php echo CHtml::ajaxLink('<span aria-hidden="true" class="icon-note"></span> &nbsp;Add Milestone', array('/supplier/AjaxMilestones','pitchId'=>$pitch->id),array('type' =>'GET','success'=>'js:function(html){$("#milestonesRender").html(html);$("#createMilestones").modal("toggle");bindDatePicker($);}'),array('class'=>"btn width100 tab-btn-new fs12 mt10 pull-left", 'href'=>"javascript:void(0);", 'data-toggle'=>"modal",'data-target'=>"#create_milestone")); ?>
</div>
</div>
<?php 
	$count	=	0;
	if(!empty($pitch))
	foreach($pitch->pitchHasMilestones as $miles){
		$count++;
        
		$val	=	($miles->status==7);?>
	<div class="col-md-12 np <?php echo ($val)?'mt10 posr':'';?>">
		<div class="col-md-12 bt-dark p20 pt5 pb30">
			<div class="col-sm-12 np">
				<h3 class="font_newregular col-sm-6 np">#<?php echo $count;?> Milestone</h3>
				<h3 class="font_newregular col-sm-6 np dark-blue-new text-right">$<?php echo $miles->amount;?></h3>
			</div>
			<div class="col-sm-12 np">
				<h4 class="font_newregular mt0 col-sm-6 np dark-blue-new fs14"><?php echo date('d M Y',strtotime($miles->due_date));?></h4>
				<?php if($val){?>
				<label class="label-sm mt0 mb5 pull-right">Due On Completion</label>
				<?php }else{?>
				
				<div class="label-sm mt0 mb5 pull-right supplier-popover">Due On Completion
					<div class="supplier-progress">		
					<?php //CVarDumper::Dump($mileStoneStatus,10,1);die; ?>
						<?php foreach($mileStoneStatus as $stat){?>
						<div class="pb10 pt5 font_newlight">
						<img src="<?php echo Yii::app()->theme->baseUrl.'/images/'; echo ($miles->status>=$stat->id)?'progress-complete.png':$stat->image;?>" class="mr5" alt="" /><span class="mr10 ml15 fs16 popover-active "><?php echo $stat->title;?></span><span class="fs10 light-white">02 Feb 2015</span></div>
						<?php } ?>
					</div>
				</div>
			<?php }?>
				
				
			</div>
			<div class="col-sm-12 np mt10">
				<p class="fs14 lh-20 ">
                
					<?php echo $miles->overview;  ?>
                    <?php //echo CHtml::ajaxLink("Edit", array('/supplier/AjaxMilestones','milesId'=>$miles->id,'pitchId'=>$pitch->id,'pId'=>$pId),array('type' =>'GET','success'=>'js:function(html){$("#milestonesRender").html(html);$("#createMilestones").modal("toggle");}')); ?>
                    <?php echo CHtml::ajaxLink('<span aria-hidden="true" class="icon-pencil orange-new mr5"></span>Edit', array('/supplier/EditAjaxMilestones','pitchId'=>$pitch->id,'milesId'=>$miles->id),array('type' =>'GET','success'=>'js:function(html){$("#milestonesRender").html(html);$("#createMilestones").modal("toggle");bindDatePicker($);}'),array('class'=>"orange-new ml5 fs12", 'href'=>"javascript:void(0);", 'data-toggle'=>"modal",'data-target'=>"#create_milestone")); ?>
                    <!--a href="" title="Edit" class="orange-new ml5 fs12"><span aria-hidden="true" class="icon-pencil orange-new mr5"></span>Edit</a-->
				</p>
			</div>
			<?php if($miles->status==1){?>
				<div class="col-md-12 np">
					<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,2);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Request Fund"/>
				</div>
			<?php }elseif($miles->status==2 || $miles->status==3){
				?>
				<div class="col-md-12 np">
					<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Request in Progress"/>
				</div>	
			<?php }elseif($miles->status==4){
				?>
				<div class="col-md-12 np">
					<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,5);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Request for Release"/>
				</div>		
				<?php
			}elseif($miles->status==5){
				?>
				<div class="col-md-12 np">
					<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Funds Release Requested"/>
				</div>
				<?php
			}elseif($miles->status==6){
				?>
				<div class="col-md-12 np">
					<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,7);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Confirm Payment"/>
				</div>
				<?php
			}else{
				?>
				<div class="col-md-12 np">
					<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Milestone Completed"/>
				</div>
				<?php
			} ?>
		</div>
		<?php if($val){?>
		<div class="request-fund text-center"><span class="icon-check fs40" aria-hidden="true"></span></div>
		<?php }?>
	</div>
	<?php }?>

<script>
function changeMileStoneStatus(id,status)
{
	var messagw='';
	if(status==2)
		messagw	= "<h4> Are you sure you want to request fund?</h4>";
	else if	(status==5)
		messagw	= "<h4> Are you sure you want to request release fund for this milestone?</h4>";
	else if	(status==7)
		messagw	= "<h4> Are you sure payment for this milestone is confirmed?</h4>";
	bootbox.confirm(messagw, function(result){
		if(result)
		{
		   $.post('<?php echo CController::createUrl('/supplier/milestoneStatusUpdate');?>',{id:id,status:status},function(response){
				if(response=="1")
				{
					if(status==2){
						$('#saveText-'+id).val('Fund Requested');
						$('#saveText-'+id).attr('disabled','disabled');
					}else if(status==5){
						$('#saveText-'+id).val('Funds Release Requested');
						$('#saveText-'+id).attr('disabled','disabled');
					}else if(status==7){
						$('#saveText-'+id).val('Milestone Completed');
						$('#saveText-'+id).attr('disabled','disabled');
					}
					
				}else{
					if(status==5)
					{
						$('#saveText-'+id).val('Funds Release Requested');
						$('#saveText-'+id).attr('disabled','disabled');
						window.open(response, '_blank');
					}
				}
			});
		}
	});
	return false;
}

</script>