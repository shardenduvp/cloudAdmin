<div class="col-md-12 np">
<div class="col-md-12 p20"><?php echo CHtml::ajaxLink('<span aria-hidden="true" class="icon-note"></span> &nbsp;Add Milestone', array('/client/ajaxMilestones','pitchId'=>$pitch->id),array('type' =>'GET','success'=>'js:function(html){$("#milestonesRender").html(html);$("#createMilestones").modal("toggle");bindDatePicker($);}'),array('class'=>"btn width100 tab-btn-new fs12 mt10 pull-left", 'href'=>"javascript:void(0);", 'data-toggle'=>"modal",'data-target'=>"#create_milestone")); ?>
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
					<?php echo CHtml::ajaxLink('<span aria-hidden="true" class="icon-pencil orange-new mr5"></span>Edit', array('/client/editAjaxMilestones','pitchId'=>$pitch->id,'milesId'=>$miles->id),array('type' =>'GET','success'=>'js:function(html){$("#milestonesRender").html(html);$("#createMilestones").modal("toggle");bindDatePicker($);}'),array('class'=>"orange-new ml5 fs12", 'href'=>"javascript:void(0);", 'data-toggle'=>"modal",'data-target'=>"#create_milestone",'id'=>'edit-'.$miles->id)); ?>
				</p>
			</div>
			<div class="col-md-12 np">
<?php if($miles->status==1){?>
<form name="linked_2_pay_form-<?php echo $miles->id; ?>" target="_blank"  id="l2p-widget-form" method="POST" action="https://www.linked2pay.com/l2p/widgets/paymentForm/makePayment.xhtml" autocomplete="off" accept-charset="UTF-8">
	<input type="hidden" name="l2pCId" value="c8ed21db4f678f3b13b9d5ee16489088"/>
	<input type="hidden" name="l2pFieldCount" value="0"/>
	<input type="hidden" name="l2pWId" value="3381"/>
	<input type="hidden" name="l2pFName" class="l2p-required" value="<?php echo Yii::app()->user->name; ?>###<?php echo $miles->id; ?>" />
	<input type="hidden" name="l2pLName" class="l2p-required" value="<?php echo Yii::app()->user->name; ?>"/>
	<input type="hidden" name="l2pEmail" class="l2p-required" value="<?php echo Yii::app()->user->email; ?>" />
	<input type="hidden" name="l2pAmount" class="l2p-required" id="l2pAmount" value="<?php echo $miles->amount; ?>" />
	<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,3);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Fund the milestone"/>
</form>
<?php }else if($miles->status==2){?>
<form name="linked_2_pay_form-<?php echo $miles->id; ?>" target="_blank"  id="l2p-widget-form" method="POST" action="https://www.linked2pay.com/l2p/widgets/paymentForm/makePayment.xhtml" autocomplete="off" accept-charset="UTF-8">
	<input type="hidden" name="l2pCId" value="c8ed21db4f678f3b13b9d5ee16489088"/>
	<input type="hidden" name="l2pFieldCount" value="0"/>
	<input type="hidden" name="l2pWId" value="3381"/>
	<input type="hidden" name="l2pFName" class="l2p-required" value="<?php echo Yii::app()->user->name; ?>###<?php echo $miles->id; ?>" />
	<input type="hidden" name="l2pLName" class="l2p-required" value="<?php echo Yii::app()->user->name; ?>"/>
	<input type="hidden" name="l2pEmail" class="l2p-required" value="<?php echo Yii::app()->user->email; ?>" />
	<input type="hidden" name="l2pAmount" class="l2p-required" id="l2pAmount" value="<?php echo $miles->amount; ?>" />
	<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,3);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Fund the requested milestone"/>
</form>
<?php }else if($miles->status==3){?>
	<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Request in Progress"/>
<?php }else if($miles->status==4){?>
	<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Milestone Funded"/>
<?php }else if($miles->status==5){?>
	<input type="button" onclick="return changeMileStoneStatus(<?php echo $miles->id; ?>,6);" class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" id="saveText-<?php echo $miles->id; ?>" value="Release Funds to Supplier"/>
<?php }else if($miles->status==6){?>
	<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Funds Released"/>
<?php }else if($miles->status==7){?>
	<input type="button" disabled class="btn width100 tab-btn-orange fs12 mt30 pull-left font_newregular" value="Milestone Complete"/>
<?php }?>
			</div>
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
	if(status==3)
		messagw	= "<h4> Are you sure you want to fund this milestone?</h4>";
	else if	(status==6)
		messagw	= "<h4> Are you sure you want to release fund for this milestone?</h4>";
	bootbox.confirm(messagw, function(result){
		if(result)
		{
		   $.post('<?php echo CController::createUrl('/client/milestoneStatusUpdate');?>',{id:id,status:status},function(response){
				if(response=="1")
				{
					if(status==3){
						$('#saveText-'+id).val('Request in Progress');
						$('#saveText-'+id).attr('disabled','disabled');
						document.forms["linked_2_pay_form-"+id].submit();
					}else if(status==6){
						$('#saveText-'+id).val('Funds Released');
						$('#saveText-'+id).attr('disabled','disabled');
					}
					
					
				}
			});
		}
	});
	return false;
}
/* popover script*/
$(document).ready(function(){
	$('.supplier-popover').each(function() {
		var $this = $(this);
		  $this.popover({
		  trigger: 'hover',
		  placement: 'right',
		  html: true,
		  content: $this.find('.supplier-progress').html()  
		});
	});
});
</script>