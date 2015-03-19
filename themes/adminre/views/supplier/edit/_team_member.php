<?php if(Yii::app()->user->hasFlash('team_success')){?>
		<div class="alert alert-success" class="team_success mt10">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<p id="messageResponse2">
				<strong><?php echo Yii::app()->user->getFlash('team_success'); ?></strong></p>
		</div>
<?php } ?>
<?php if(Yii::app()->user->hasFlash('team_error')){?>
		<div class="alert alert-success" class="team_error mt10">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			<p id="messageResponse2">
				<strong><?php echo Yii::app()->user->getFlash('team_error'); ?></strong></p>
		</div>
<?php } ?>
<div class="col-md-3">
    <div class="team_class text-center pt15 ">
        <a class="btn btn-primary mt15" data-toggle="modal" data-target="#add_team_modal" onclick="edit_team_member();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> add member </a>
    </div>
</div>

<?php $team_users=UsersTeamMembers::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id)); foreach($team_users as $member) { ?>
<div class="col-md-3 pr0" id="<?php echo 'mem_'.$member->id; ?>">
    <div class="team_class pt15">
        <img src="<?php echo (empty($member->image)?$this->res["avtar"]:$member->image); ?>" class="img-circle  ma5" alt="" width="50" />
        <input type="button" value="Edit" onclick="edit_team_member('<?php echo $member->id; ?>')" />
        <input type="button" value="Delete" onclick="delete_team_member('<?php echo $member->id; ?>')" />
        <span class="pull-right pa5">
            <?php echo $member->name; ?> <br/>
            <p><small> Designation : <?php echo $member->designation; ?></small><br>
            <small> Department : <?php echo $member->dep; ?></small></p>
			<?php echo (empty($member->facebook)?"":Chtml::link('Fb',$member->facebook,array('target'=>'_blank'))); ?>
			<?php echo (empty($member->twitter)?"":Chtml::link('Twitter',$member->twitter,array('target'=>'_blank'))); ?>
			<?php echo (empty($member->linkedin)?"":Chtml::link('Li',$member->linkedin,array('target'=>'_blank'))); ?>
			<span class="ico-facebook-sign"></span>
           </span>
    </div>
</div>
<?php } ?>




<div class="modal fade" id="add_team_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div id="team_content"></div>
    <?php //echo $this->renderPartial("_team_member_form"); ?>
</div>

<script type="text/javascript">

    function edit_team_member(id) {
		if(typeof id === 'undefined'){
			id = 0;
			console.log("edit" + id);
		}

        $.ajax({
            type: 'POST',
            url: "<?php echo CController::createUrl('/supplier/ajaxHandlerForAddingTeam');?>",
            data: "id="+id+"&action=edit",
            datatype: 'json',
            success: function(data) {
				$("#team_content").html("");
				$("#team_content").html(data);
				var options = {
					"backdrop" : "static"
				}
				$("#add_team_modal").modal(options);
            }
        });

    }


    function delete_team_member(id) {
        
		var actionconfirm = confirm('Are you sure you want delete?');
		if(actionconfirm)
			$.ajax({
				type: 'POST',
				url: "<?php echo CController::createUrl('/supplier/ajaxHandlerForAddingTeam');?>",
				data: "id="+id+"&action=rm",
				datatype: 'json',
				success: function(data) {
					if(data)
                    {
                        $("#mem_"+id).addClass("hide");
                        var teamCount = $("#people_count").html();
                        teamCount = parseInt(teamCount) - 1;
                        $("#people_count").html(teamCount);
                    }						
					else
						alert("There was some error");

				}
			});

    }
</script>
