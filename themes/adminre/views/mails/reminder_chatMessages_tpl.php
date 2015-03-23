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
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff; color:#333;">

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Dear <?php echo $data["name"]; ?>,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			You have a new message on VenturePact.<br /><br />

            <strong><?php echo $data["from"]; ?></strong> : <?php echo (!empty($data["message"])?$data["message"]:""); ?>
            <br /><br />

            Please go to <a href="http://VenturePact.com">VenturePact.com</a> to check your messsages.
		</td>
	</tr>

<!--
    <tr>
    <td style="padding: 0px 10px;">
    Feel free to reply to this email or <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">Schedule a call</a> if you need any assistance. <br/><br/>
    </td>
    </tr>
-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            All The Best,<br />
			VenturePact Team<br />

		</td>
	</tr>
</table>
</div>
