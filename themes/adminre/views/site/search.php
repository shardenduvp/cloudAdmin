<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/css/selectize.css" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/selectize/js/selectize.min.js"></script>
<!-- Intro Section -->
<section id="intro" class="bgwhite section_top">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<?php
				$forQ		=	Yii::app()->request->getParam('keyword');
				$skillsQ	=	Yii::app()->request->getParam('skills');
				$servicesQ	=	Yii::app()->request->getParam('services');
				$industryQ	=	Yii::app()->request->getParam('industry');
				$queryQ		=	array();
				if(!empty($forQ))
					$queryQ[]			=	$forQ;

				if(!empty($skillsQ))
					foreach($skillsQ as $skillsQ1)
						$queryQ[]	=	$skillsQ1;
				
				if(!empty($servicesQ))
					foreach($servicesQ as $servicesQ1)
						$queryQ[]	=	$servicesQ1;
				
				if(!empty($industryQ))
					foreach($industryQ as $industryQ1)
						$queryQ[]	=	$industryQ1;
				?>
				<h3 class="ma20 ml0 font_light">Showing you the best results for "<span id='searchQuery'><?php echo implode(',',array_filter($queryQ))?></span>"</h3>
			</div>
		</div>
	</div>
</section>

<!-- Intro Section -->
<section class="section_mid">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 mb10 mt20">
		<?php echo CHtml::link('Get Connected (<span id="supllierCount">0</span> selected)',array('/site/newProject'),array('class'=>'btn btn-teal btn-cons font_big font_bold','id'=>'getIntro'));?>
    </div>
	<div class="col-lg-12 col-md-12 mt20">
		<div class="col-lg-9 pl0 pr20" id='search-Result'>
		<?php $this->renderPartial('_search',array("suppliers"=>$suppliers,'data'=>$data));?>
		</div>
		<div class="col-lg-3 pr0 pl30">
			<div class="col-md-12 col-md-12 np">
				<h3 class="text_upper dark_blue font_bold mt0">Share Some More Details to Get the Best Match.</h3>
			</div>
		<?php $form=$this->beginWidget('CActiveForm',array('id'=>'form-search','method'=>'GET','action' => Yii::app()->createUrl('/site/search')));?>
			<div class="col-md-12 np mt15">
				<p class="small_heading">Select Prefered Rate & Region</p>
				<ul class="list-group">
					<li class="list-group-item pa10">
						<div class="checkbox pl0">
							<span class="checkbox custom-checkbox custom-checkbox-grey pt5 pb5">
								<input type="checkbox" name="customcheckbox6" id="customcheckbox6" />
								<label for="customcheckbox6" class="">&nbsp;&nbsp;USA, Canada, Australia - $100/hr</label>
							</span>
						</div>
					</li>
					<li class="list-group-item pa10">
						<div class="checkbox pl0">
							<span class="checkbox custom-checkbox custom-checkbox-grey pt5 pb5">
								<input type="checkbox" name="customcheckbox7" id="customcheckbox7" />
								<label for="customcheckbox7" class="">&nbsp;&nbsp;Middle East, Central Europe - $50/hr</label>
							</span>
						</div>
					</li>
					<li class="list-group-item border_bottom pa10">
						<div class="checkbox pl0">
							<span class="checkbox custom-checkbox custom-checkbox-grey pt5 pb5">
								<input type="checkbox" name="customcheckbox8" id="customcheckbox8" />
								<label for="customcheckbox8" class="">&nbsp;&nbsp;East, Sount East Asia - $30/hr</label>
							</span>
						</div>
					</li>
				</ul>
			</div>
            
            <div class="col-md-12 np mt20">
				<p class="small_heading">By Keyword</p>
				<div class="col-lg-12 np">
					<?php echo CHtml::textField('keyword', (!empty($_REQUEST['keyword'])?$_REQUEST['keyword']:''),array('class'=>'form-control','id'=>'satnam-keyword')); ?>
       			</div>
			</div>
            
			<div class="col-md-12 np mt20">
				<p class="small_heading">For Skills</p>
				<div class="col-lg-12 np">
                	<select id="satnam-skills" class="form-control required" placeholder="Yii, Rails, Oracle SQL" multiple name="skills[]" data-parsley-id='226'>
						<?php 
						$skills		=	Skills::model()->findAllByAttributes(array('skillcol'=>0));
						foreach($skills as $skill){?>
						<option value="<?php echo $skill->name;?>" <?php echo (!empty($data['skills']) && in_array($skill->name,$data['skills']))?'selected="selected"':'';?> >
							<?php echo $skill->name;?>
						</option>
						<?php } ?>
					</select>		
				</div>
			</div>
			<div class="col-md-12 np mt20">
				<p class="small_heading">From Services</p>
				<div class="col-lg-12 np">
					<select id="satnam-services" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="services[]" data-parsley-id='126'>
						<option default>Select a Service</option>
						<?php 
						$services	=	Services::model()->findAllByAttributes(array('status'=>1));
						foreach($services as $service){?>
						<option value="<?php echo $service->name;?>" <?php echo (!empty($data['services']) && in_array($service->name,$data['services']))?'selected="selected"':'';?>><?php echo $service->name;?> </option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-12 np mt20">
				<p class="small_heading">Specify Industry</p>
				<div class="col-lg-12 np">
					
					<select id="satnam-industry" class="form-control required" placeholder="Web app, iOS app, ERP" multiple name="industry[]" data-parsley-id='426'>
						<option default>Select a Industry</option>
						<?php 
						
						
						print_r($data);
						
						$industries		=	Industries::model()->findAllByAttributes(array('status'=>1));
						foreach($industries as $industry){?>
							<option value="<?php echo $industry->name;?>" <?php echo (!empty($data['industry']) && in_array($industry->name,$data['industry']))?'selected="selected"':'';?> ><?php echo $industry->name;?> </option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-12 np mt20 mb20">
				<?php echo CHtml::button("Find Best Match",array('class'=>'btn btn-danger btn-cons text_upper full_width','id'=>'filterClick')); ?>
			</div>
            
            <?php $this->endWidget(); ?>
			<div class="col-md-12 np mt20 mb20 text-center">
				
				<h3>Hi, I'm Josh</h3>
				<p class="profile_text">Let me do the hard work for you.</br>
					<a href="#">CLICK HERE</a></br>
					Share some details with me and I’ll find the best matched for you.
				</p>
			</div>

		</div>
	</div>
  </div>
  </div>
</section>
<!-- jQuery -->
<script type="text/javascript">
$("#satnam-skills").selectize({delimiter: ",",persist: false,});
$("#satnam-services").selectize({delimiter: ",",persist: false,});
$("#satnam-industry").selectize({delimiter: ",",persist: false,});
$(document).ready(function () {
	$('#getIntro').click(function(e){
		if($(".selectedSupplier:checked").length<1){
			e.preventDefault();
			alert('Please select atleast one suppplier');
		}
	});

	$('#filterClick').click(function(){
		$.ajax({
			type: "GET",
			url: "<?php echo Yii::app()->createUrl("/site/search");?>",
			data: $('#form-search').serialize()+'&ajax=1',
			success: function(returnedData){
				var Query = [];
				var keyword	=	$("#satnam-keyword").val();
				//if(!keyword)
					Query.push(keyword);
				var skills	=	$("#satnam-skills").val();
				//if(!skills)
					Query.push(skills);
				//if(!$("#satnam-services").val())
					Query.push($("#satnam-services").val());
				//if(!$("#satnam-industry").val())
					Query.push($("#satnam-industry").val());

				$('#searchQuery').html(Query.join(','));
				$('#search-Result').html( returnedData );
			}
		});
	});
	$(".selectedSupplier").on("change", function(){
		var $limit = 5;
		if($(".selectedSupplier:checked").length <= $limit){
			var checkedVals = $('.selectedSupplier:checked').map(function(){return this.value;}).get();
			$('#supllierCount').html(checkedVals.length);
			$.ajax({
				type: "POST",
				url: "<?php echo Yii::app()->createUrl("/site/newProject");?>",
				data: "list="+checkedVals,
				sucess:function(){}
			});
			localStorage.setItem('searchForm',$('#form-id').serialize());
			localStorage.setItem('selectedSuplliers',checkedVals);
		}
		else{
			$(this).prop("checked", "");
			alert('Not allowed to select more than '+$limit);
		}
	})	
});
</script>
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/style/css/custom.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algolia.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/algoliasearch.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/typeahead.bundle.min.js',CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/javascript/algolia/hogan.common.js',CClientScript::POS_END);?>