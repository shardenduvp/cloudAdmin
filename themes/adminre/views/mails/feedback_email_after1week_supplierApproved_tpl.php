


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
.mail_logo i
\mg{
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
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>
	</tr>-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hi <?php echo $data["name"]; ?>,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
		We just wanted to see how your engagement with <?php echo $data["supplier_name"]; ?> is coming along. If you have any concerns or questions, feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a> or reply to this email.

		<br /><br />
		 If you are satisfied so far, we would love for you to <a href="<?php echo (isset($data["references_id"]))?Yii::app()->createAbsoluteUrl('client/references',array('id'=>$data["references_id"])):'';?>">recommend <?php echo $data["supplier_name"]; ?></a> for the benefit of future clients. As a token of appreciation, we will offer you up to 10 hours of free testing services covered by VenturePact.


		<br />

		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All The Best,<br />
			VenturePact Team<br />

        </td>
	</tr>
</table>
</div>
