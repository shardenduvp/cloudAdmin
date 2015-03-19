<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3>Sign Up as Client</h3></div>
		</div>
	</div>
</div>   

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<?php
				$check = 0;
				if(isset($_POST) && !empty($_POST))
					$check = 1;
			?>
			<div class="col-sm-6 ">
				Not a Client? <?php echo CHtml::link('Sign up as Supplier', array('/site/supplierSignup'));?>           
				<h3>New User? Register Now!</h3>         
				<?php $form=$this->beginWidget('CActiveForm', array('enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'sign_up','class'=>"forms",'data-parsley-validate'=>'data-parsley-validate','onsubmit'=>'return validate();'))); ?>
					<div class="form-group col-md-12 pa0 mt10">
						<label for="name1">Name</label>
						<?php echo $form->textField($users,'first_name',array('placeholder'=>"Name (Required)",'required'=>'required','title'=>"Name (Required)",'data-parsley-pattern'=>"^[a-zA-Z ]+$",'data-parsley-minlength'=>"2",'class'=>'form-control text-input defaultText required alphanum minlength','length'=>"2",'tabindex'=>'1'));?>
						<?php if($check == 1)echo $form->error($users,'first_name'); ?>
					</div>        
					<div class="form-group">
						<label for="exampleInputEmail1">Email </label>
						<?php echo $form->emailField($users,'username',array('placeholder'=>"Email (Required)",'required'=>'required','data-parsley-type'=>"email",'title'=>"Email (Required)",'class'=>'form-control text-input defaultText required email','tabindex'=>'3')); ?>
						<?php if($check == 1)echo $form->error($users,'username'); ?>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<?php echo $form->passwordField($users,'password',array('placeholder'=>"Password (Required)",'required'=>'required','title'=>"Password (Required)",'data-parsley-minlength'=>"6",'class'=>'form-control text-input defaultText required minlength','length'=>"6",'tabindex'=>'4'));?>
						<?php if($check == 1)echo $form->error($users,'password'); ?>
					</div>
					<!--
					<div class="form-group">
						<label for="city">City</label>
						<?php
							$city = "";
							if(isset($_POST['city']) && !empty($_POST['city']))
								$city = $_POST['city'];
						?>
						<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
							'model' => $users,
							'value' => $city,
							'name' => 'city',
							'id'=>'testCity',
							'source'=>'js: function(request, response){
								$.ajax({
									url: "'.$this->createUrl('autoCity').'",
									dataType: "json",
									data: {
										term: request.term,
										brand: $("#type").val()
									},
									success: function (data) {response(data);}
								})
							}',
							'options'=>array('class'=>'form-control text-input defaultText required','required'=>'required','placeholder'=>"Location (Required)",'title'=>'Location (Required)','tabindex'=>'5',
							'select' => 'js:function(event, ui){ $("#cityId").val(ui.item.id);$("#testCity").attr("readonly","readonly")}',
							
							'click'=>'js:function( event, ui){alert("test");return false;}',
							),
							'htmlOptions'=>array('value'=>'Search',)
							));
						?>
						<?php echo $form->error($users,'city'); ?>
					</div>
					-->
					<div class="checkbox">
						<label>
							<?php 
								$users->role_id=2;
								echo $form->hiddenField($users,'role_id');
								echo $form->hiddenField($users,'cities_id',array('id'=>'cityId'));
							?>
							<input type="checkbox" name="terms" required="required" class="checkbox"  /> <p class="text-left">I agree to <a href="#">Terms & Conditions</a>
						</label>
					</div>
					<?php echo CHtml::submitButton('Sign Up',array('id'=>'signup','class'=>'btn btn-primary bm0 pull-left','tabindex'=>'5')); ?>
				<?php $this->endWidget(); ?>
			</div>
			<div class="col-sm-6">
			<h3>New User? Registered with Linkedin </h3>
			<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
			<div class="connect"><?php echo CHtml::link('Connect with Linkedin', array('/site/linkedin','lType'=>'initiate','role'=>2),array('class'=>'btn btn-lg btn-primary share-linkedin'));?></div>
			</div>
		</div>
	</div>
<!-- /.container --> 
</div>
<script type="application/javascript">
	$(document).ready(function(){
		$(":input").focusout(function(){
			$(this).parsley().validate();
		});
		$("#signup").click(function(){
			var city_id = $("#cityId").val();
			if(!city_id)
				$("#testCity").val("");
		});
		$("#testCity").attr("placeholder","City (Required)");
		$("#testCity").attr("required","required"); 
		$("#testCity").attr("tabindex","5");
		$("#testCity").addClass("form-control");
		$( "#testCity").focus(function(){$this=$("#testCity");$this.removeAttr("readonly");$this.val('');$("#cityId").val('');});
	});
</script>
