<?php if(empty($references))
	echo "You don't have any reference requests at this moment.";
?>
<?php foreach($references as $reference){ ?>
<?php $supplier			=	Suppliers::model()->findBYPk($reference->suppliers_id); ?>
<?php $default_logo 	= 	Yii::app()->theme->baseUrl."/style/images/avatar.png"; ?>
<?php $city="";
foreach($supplier->users->usersOffices as $office){
	if($office->dep_id == 1){
		$city	=	$office->city->name.", ".$office->city->countries->name;
		break;
	}
}?>
	<div class="col-md-12 bb pt10 pb10">
		<div class="col-md-3 pa10 text-center pl0">
			<!--Remove Hyper link-->
			<img width="70" height="70" alt="logo" class="tag-img-border1 image-circle" src="<?php echo !empty($supplier->image)?$supplier->image:$default_logo ?>">
			<h5 class="fs14 display_block font_newregular mb5 team-text-blue"><?php echo $supplier->users->company_name; ?></h5>
			<span class="fs12 mr10 display_block loc-gray"><span aria-hidden="true" class="icon-pointer mr5 icon-grey-color"></span><?php echo $city; ?></span>
		</div>
		<div class="col-md-9 pa10">
			<div class="col-md-12 pl0 pr0">
				<div class="col-md-8 pl0 pr0">
					<h3 class="mt0 display_inline mr5 font_newregular"><?php echo $reference->suppliersHasPortfolio->project_name; ?></h3>																
					<?php
					$link = $reference->client_email.",".$reference->client_profiles_id.",".$reference->suppliers_id.",".$reference->id ;
					$link = base64_encode($link);
					$now = time();
					$dt = new DateTime($reference->add_date);
					$your_date = strtotime($dt->format('d-m-Y'));
					$datediff = $now - $your_date;
					$checkDay = floor($datediff/(60*60*24));
					?>
					<span class="grey-text display_inline fs12"><?php echo (($checkDay==0)?"Today":$checkDay." days ago"); ?></span>
				</div>
				<?php if($reference->status > 0){ ?>
				<div class="col-md-4 pl0 pr0">
					<?php echo CHtml::ajaxLink('<span class=" pull-right fs14 orange-new"><span aria-hidden="true" class="icon-note "></span> Edit</span>', array('/client/ajaxreview','rId'=>$reference->id),array('type' =>'GET','success'=>'js:function(html){$("#review-content").html(html);$(".edit-review").modal("toggle");}'),array("data-toggle"=>"modal","data-target"=>".edit-review","id"=>"ref_".$reference->id,"class"=>"mr20")); ?>
				</div>
				<?php } ?>
			</div>
			<?php if($reference->status > 0){ ?>
			<p class="tsm-text fs14 mb15">
				<?php
					//$moreText = "Not Set";
					$moreText = "";
					foreach($reference->suppliersReferencesQuestions as $answer){
						if($answer->answers != ""){
							$moreText = $answer->answers;
							break;
						}
					}
					echo $moreText;
				?>
			</p>
			<a href="#" class="orange-new fs14 font_newregular mt5" data-toggle="modal" data-target="#view-review-<?php echo $reference->id; ?>">More</a>
			<?php }else{ ?>
			<div class="col-md-12 pl0 pr0 pt5">
				<?php echo CHtml::ajaxLink('<span aria-hidden="true" class="icon-note"></span> Write a Review', array('/client/ajaxreview','rId'=>$reference->id),array('type' =>'GET','success'=>'js:function(html){$("#review-content").html(html);$(".edit-review").modal("toggle");}'),array("data-toggle"=>"modal","data-target"=>".edit-review","id"=>"ref_".$reference->id,"class"=>"btn btn-default1 pa5 fs12 highlight bg-none")); ?>				
			</div>
			<?php } ?>													
		</div>
	</div>
<?php } ?>