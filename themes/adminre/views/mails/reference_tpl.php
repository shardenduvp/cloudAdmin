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
			Hi <?php echo $name; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            Thank you for recommending <?php echo $supplier; ?>. We appreciate your time. <br /><br />

			We would also like to welcome you to the VenturePact marketplace. You can now find the top service providers and get vetted proposals for your projects. <br /><br />

			You can log in to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/login');?>">www.VenturePact.com</a> using the following username and password.<br /><br />

			<!-- Username: <?php //echo $email;?><br />
			Password: <?php //echo $password;?><br /><br /> -->

			* Please change the password as soon as possible. <br /><br />

			If you have any questions, please do not hesitate to reply to this email.<br/>
		</td>	
	</tr>
	
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            All The Best,<br />
			Sam Shuk<br />
			Client Success Team, VenturePact<br />

		</td>	
	</tr>
</table>
</div>
