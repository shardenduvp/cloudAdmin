<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'pitch','class'=>"forms"))); ?>
<div class="col-md-12 mb20 mt20">
	<div class="col-md-1"></div>
	<div class="col-md-10 posr">
		<div class="col-md-12 pl0">
			<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">1</span></div>
			<h3 class="col-sm-11 mt5 font_newregular fs18">How will you like to pay?</h3>
		</div>	
		<?php echo $form->hiddenField($pitch,'billing_type'); ?>
		<?php echo $form->hiddenField($pitch,'suppliers_projects_id',array('value'=>$pId)); ?>
		<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary" >
			<div class="col-sm-11" id="slidetoggle">
				<h3 class="font_newregular team-text-blue nm mt5 fs18">Time &amp; Material</h3>
				<p class="fs14 mt10">You have the option to select from weekly and monthly billing options</p>
			</div>
			<div class="col-sm-1 text-center mt10">
				<div id="checkboxExample" class="check-circle-base"></div>
			</div>
			<div class="col-md-12 slidetoggle tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary time-box">
				<div class="col-md-12 admin-form theme-primary mt20 pl0">
					<?php
					echo $form->radioButtonList($pitch,'tm_billing_schedule_type',array('0'=>'Weekly Billing ','1'=>'Monthly Billing',),
                    array(
					'separator'=>' ',
					'template'=>'<div class="col-md-4">
						<div class="radio-custom radio-danger mb5">
							{input}
							{label}	
						</div>
					</div>'));?>
				<!--
				
					<div class="col-md-4">
						<div class="radio-custom radio-danger mb5">
							<input type="radio" id="checkbox-wb" name="tm_billing_type" value="0" 'data-parsley-required'="true"/>
							<label class="fs14 pl25" for="checkbox-wb">&nbsp;Weekly Billing</label>
						</div>
					</div>
					<div class="col-md-4 ml10">
						<div class="radio-custom radio-danger mb5">
							<input type="radio" id="checkbox-mb" name="tm_billing_type" value="1" 'data-parsley-required'="true"/>
							<label class="fs14 pl25" for="checkbox-mb">&nbsp;Monthly Billing</label>
						</div>
					</div>-->
				</div>
				<div class="col-md-12 mt10">
					<div class="col-md-4 pl0">
						<label class="field prepend-icon" id="input-wb">
							<?php echo $form->textField($pitch,'tm_amount',array('disabled'=>'disabled','placeholder'=>"Enter Amount",'title'=>"Enter Amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'1'));?>
							<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
							</label>
						</label>
					</div>
					<div class="col-md-4 pl0 ml15">
						<label class="field prepend-icon" id="input-mb">
							<?php echo $form->textField($pitch,'tm_amount',array('disabled'=>'disabled','placeholder'=>"Enter Amount",'title'=>"Enter Amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'2'));?>
							<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
							</label>
						</label>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-md-1"></div>
</div>
<div class="col-md-12 mb30 posr">
	<div class="col-md-1"></div>
	<div class="col-md-10">						
		<div class="col-md-12 tab-slide-white pt20 pb20 mt10 form-horizontal admin-form theme-primary">
			<div class="col-sm-11" id="slidetoggle2">
				<h3 class="font_newregular team-text-blue nm mt5 fs18">Fixed Price</h3>
				<p class="fs14 mt10">You can create milestones for doing the payments</p>
			</div>
			<div class="col-sm-1 text-center mt10">
				<div id="checkboxExample1" class="check-circle-base"></div>
			</div>
			<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary fixed-box">
				<div class="col-md-12 admin-form theme-primary mt20 pl0">
					<div class="col-md-12">
						<div class="col-md-5 pl0">
							<label for="checkbox-wb" class="fs14 mb10">Total Price</label>
							<label class="field prepend-icon">
								<?php echo $form->textField($pitch,'fp_total_price',array('placeholder'=>"Enter total amount",'data-parsley-required'=>"true",'title'=>"Enter total amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'3'));?>
								<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
								</label>
							</label>
						</div>
						<div class="col-md-4 mt30">
						  <a id="break" class="orange-new fs14 display_inline mt10" href="#"><span aria-hidden="true" class="icon-calculator"></span> &nbsp;Break into Milestones</a>
						</div>										
					</div>
				</div>
				<?php 
				$mCount = 0;
				if(empty($milestones)){ ?>
				<div id="showMilestone" class="col-md-12 admin-form theme-primary pt30 mt40 pb10 bt pl0 hide">
					<div class="col-md-12">
						<div class="col-md-5 pl0">
							<label for="checkbox-wb" class="fs14 mb10">Milestone</label>
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'overview[]',array('placeholder'=>"Milestone description",'title'=>"Milestone description",'class'=>'gui-input','tabindex'=>'4'));?>
								<label class="field-icon" for="firstname"><i class="icon-bubbles"></i>
								</label>
							</label>
						</div>
						<div class="col-md-3 pl0">
							<label for="checkbox-wb" class="fs14 mb10">Amount</label>
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'amount[]',array('placeholder'=>"Enter amount",'title'=>"Enter amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'5'));?>
								<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
								</label>
							</label>
						</div>
						<div class="col-sm-1 mt30" id="addMilestone">
							<a href="#"><img alt="Add" class="mt5" src="<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>"></a>
						</div>
					</div>
				</div>
				<?php }else{?>
				<div id="showMilestone" class="col-md-12 admin-form theme-primary pt30 mt40 pb10 bt pl0">
					<?php foreach($milestones as $stone){ ?>
					<?php if($mCount == 0){ ?>
					<div class="col-md-12">
						<div class="col-md-5 pl0">
							<label for="checkbox-wb" class="fs14 mb10">Milestone</label>
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'overview[]',array('value'=>$stone->overview,'placeholder'=>"Milestone description",'data-parsley-required'=>"true",'title'=>"Milestone description",'class'=>'gui-input','tabindex'=>'4'));?>
								<label class="field-icon" for="firstname"><i class="icon-bubbles"></i>
								</label>
							</label>
						</div>
						<div class="col-md-3 pl0">
							<label for="checkbox-wb" class="fs14 mb10">Amount</label>
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'amount[]',array('value'=>$stone->amount,'placeholder'=>"Enter amount",'data-parsley-required'=>"true",'title'=>"Enter amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'5'));?>
								<label class="field-icon" for="firstname"><i class="fa fa-usd"></i>
								</label>
							</label>
						</div>
						<div class="col-sm-1 mt30" id="addMilestone">
							<a href="#"><img alt="Add" class="mt5" src="<?php echo Yii::app()->theme->baseUrl."/images/add_icon.png"; ?>"></a>
						</div>
					</div>
					<?php } else { ?>
					<div class="col-md-12 mt10" id="mileDiv_<?php echo $mCount; ?>" >
						<div class="col-md-5 pl0">
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'overview[]',array('value'=>$stone->overview,'placeholder'=>"Milestone description",'data-parsley-required'=>"true",'title'=>"Milestone description",'class'=>'gui-input','tabindex'=>'4'));?>
								<label class="field-icon" for="firstname"><i class="icon-bubbles"></i>
							</label>
						</div>
						<div class="col-md-3 pl0">
							<label class="field prepend-icon">
								<?php echo $form->textField($milestone,'amount[]',array('value'=>$stone->amount,'placeholder'=>"Enter amount",'data-parsley-required'=>"true",'title'=>"Enter amount",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'5'));?>
								<label class="field-icon" for="firstname"><i class="fa fa-usd"></i></label>
							</label>
						</div>
						<div class="col-sm-1 mt10">
							<a class="orange-new fs24 display_inline pl2" href="#" onclick="remove_milestone(<?php echo $mCount; ?>)"><span aria-hidden="true" class="icon-close"></span></a>
						</div>
					</div>
					<?php } ?>
					<?php $mCount++; ?>
					<?php } ?>
				</div>
				<?php } ?>
				<div id="errorMilestone" class="col-md-12 admin-form theme-primary mt20 pl0 hide">
					<span class="errorMessage">Milestone Sum should be equal to or less then Total Price</span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="col-md-12 mt30 mb20">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="col-md-12 pl0">
			<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">2</span></div>
			<h3 class="col-sm-11 mt5 font_newregular fs18">What will be the project duration?</h3>
		</div>							
		<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
			<div class="col-sm-11">
				<div class="col-md-3 np">
					<?php echo $form->textField($pitch,'duration',array('placeholder'=>"Enter duration",'data-parsley-required'=>"true",'title'=>"Enter duration",'data-parsley-type'=>"digits",'class'=>'gui-input','tabindex'=>'6'));?>
				</div>
				<div class="dropdown col-sm-2 np">		
					<select name="duration_type" class="selectpicker show-tick form-control" data-live-search="false">
						<option value="0">Days</option>
						<option value="1">Weeks</option>
						<option value="2">Months</option>
					</select>
				</div>
			</div>
			<div class="col-sm-1 text-center mt10">
				<div id="checkboxExample2" class="check-circle-base"></div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="col-md-12 mt30 mb20">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="col-md-12 pl0">
			<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">3</span></div>
			<h3 class="col-sm-11 mt5 font_newregular fs18">By when do you plan to start?</h3>
		</div>							
		<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
			<div class="col-sm-11">
				<div class="col-md-5 np">
					<label class="field prepend-icon">
						<?php echo $form->textField($pitch,'start_date',array('value'=>date('Y-m-d',strtotime($pitch->start_date)),'placeholder'=>"Select an estimated start date",'data-parsley-required'=>"true",'title'=>"Select an estimated start date",'class'=>'gui-input','tabindex'=>'8'));?>
						<label class="field-icon" for="firstname"><span aria-hidden="true" class="icon-calendar"></span>
						</label>
					</label>
				</div>
			</div>
			<div class="col-sm-1 text-center mt10">
				<div id="checkboxExample3" class="check-circle-base"></div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<div class="col-md-12 mt30 mb20">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="col-md-12 pl0">
			<div class="col-sm-1 circle-blue"><span class="fs14 font-newbold">4</span></div>
			<h3 class="col-sm-11 mt5 font_newregular fs18">Will you like to provide a trial period?</h3>
		</div>							
		<div class="col-md-12 tab-slide-white pt20 pb20 mt20 form-horizontal admin-form theme-primary">
			<div class="col-sm-11">
				<div class="col-md-4 np">
					<?php echo $form->textField($pitch,'trial',array('placeholder'=>"Enter a period",'title'=>"Enter a period",'class'=>'gui-input','tabindex'=>'9','data-parsley-type'=>"digits"));?>
				</div>
				<div class="col-md-1 np">		
					<button class="button button-grey" type="">Days</button>
				</div>
			</div>
			<div class="col-sm-1 text-center mt10">
				<div id="checkboxExample4" class="check-circle-base"></div>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
<input type="hidden" id="milehidden" value="<?php echo $mCount; ?>">
<?php $this->endWidget(); ?>