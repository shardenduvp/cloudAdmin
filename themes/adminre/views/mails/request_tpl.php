<style>	
.grey{
	background-color:#999;
}
.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#ccc;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';
	margin-top:45px; 
}
.mail_logo{
	background:#ccc;	
}
.mail_logo img{
	width:100px;
	height:42px;
}
.mail_set span{
	color:#656565;
	font-style:italic;
}
</style>
<div class="grey">
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff; color:#333; padding:8px;" width="800">
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>	
	</tr>-->
	<tr style="background-color:#fff;"><td  style="padding:10px" colspan="2">Dear Admin,<br /><br /></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px"  width="30%">Name:</td><td width="70%"><?php echo $data->name;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Company Name:</td><td><?php echo $data->company_name;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Email:</td><td><?php echo $data->email;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Request Type:</td><td><?php echo $data->request_type;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Application Type:</td><td><?php echo $data->application_type;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Project Description:</td><td><?php echo $data->project_description;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Budget:</td><td><?php echo $data->budget_min.' to '.$data->budget_max;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Deadline:</td><td><?php echo $data->dead_line;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Language:</td><td><?php echo $data->language;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Size of company:</td><td><?php echo $data->size_of_company;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Progress Status:</td><td><?php echo $data->progress_status;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px">Document Link:</td><td><?php echo $data->document_link;?></td></tr>
	<tr style="background-color:#fff;"><td  style="padding:10px" colspan="2">All the best! <br />VenturePact Team</td></tr>
</table>
</div>                            