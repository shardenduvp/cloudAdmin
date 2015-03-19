<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'milestonesForm','class'=>"forms"))); ?>
 <div class="col-md-12 mb20 admin-form theme-primary" >
 <div class="col-md-12  ">
		<label class="field prepend-icon">
			<?php echo $form->textArea($milestone,'overview',array('placeholder'=>"Write Milestone Description",'title'=>"Write Milestone Description",'class'=>'gui-textarea form-control','tabindex'=>'1'));?>
			<label class="field-icon" for="comment"><span class="icon-bubbles" aria-hidden="true"></span>
		</label>
		</label>
    </div>
	 <div class="col-md-12 np mt25">
       <div class="col-md-6 ">
		<label class="field prepend-icon">
			<?php echo $form->textField($milestone,'due_date',array('placeholder'=>"Select due date",'data-parsley-required'=>"true",'title'=>"Select due date",'class'=>'gui-input','tabindex'=>'2'));?>
			<label for="firstname" class="field-icon"><span class="icon-calendar" aria-hidden="true"></span>
		</label>
		</label>
		
    </div>
	<div class="col-md-6 ">
			<label class="field prepend-icon">
            <?php echo $form->textField($milestone,'amount',array('placeholder'=>"Amount to be Paid",'data-parsley-required'=>"true",'title'=>"Amount to be Paid",'data-parsley-type'=>"number",'class'=>'gui-input','tabindex'=>'3'));?>
			
			<label for="firstname" class="field-icon"><i class="fa fa-dollar"></i>
		</label>
		</label>
    </div>
	</div>
</div>
<?php echo $form->hiddenField($milestone,'id',array());?>
<?php echo $form->hiddenField($milestone,'proposal_pitches_id',array('value'=>$pitch));?>

 <?php $this->endWidget(); ?>