<?php $count=0; ?>
<div class="white_outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 "><h3><?php echo $client_project->name; ?></h3></div>
		</div>
	</div>
</div>

<div class="dark-wrapper">
	<div class="container inner">
		<div class="row">
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="master">
 					<?php foreach($supplier_projects as $project){
					$count++;?>
					<!--<li role="presentation" class="" id='link-<?php //echo $count; ?>'><a href="#tab-<?php //echo $count; ?>" aria-controls="tab-<?php //echo $count; ?>" role="tab" data-toggle="tab"><?php //echo $project->suppliers->users->company_name; ?></a></li>-->
					<li role="presentation" class="">
					<?php echo CHtml::ajaxLink($project->suppliers->users->company_name, array('/client/introduction','pId'=>$project->id),array('type' =>'GET','update'=>'#intro-content')); ?>
					</li>
 					<?php } ?>
 				</ul>
				<?php $count=0; ?>
				<!-- Tab panes -->
				<!--<div class="tab-content">
					<!--<div id='intro-content'></div>
					<?php /*foreach($supplier_projects as $project){ $count++;?>
					<div role="tabpanel" class="tab-pane" id="tab-<?php echo $count; ?>">
						<div class="row"><br />
							<div class="col-md-12">
								<div class="col-md-12">
									<?php $this->Widget('WidgetChatController',array('pid'=>base64_encode($project->id)));?>
								</div>
							</div>
						</div>
					</div>
					<?php }*/ ?>
					
				</div>-->
			</div>
			<div class="col-md-12">
				<div id='intro-content'>
					<?php $this->renderPartial('introduction',array('pId'=>$pId)); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
<?php
$urlLink	=	Yii::app()->request->getParam('iCount');
$selectLink	=(!empty($urlLink))?$urlLink:1;?>
$("#tab-<?php echo $selectLink; ?>").addClass("active");
$("#link-<?php echo $selectLink; ?>").addClass("active");
</script>