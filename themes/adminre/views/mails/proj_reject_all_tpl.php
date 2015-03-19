


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
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hi <?php echo $name; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			I am sorry that none of the 3 providers fit your needs. We will go ahead and find a few more service providers and you will start receiving proposals from them shortly.<br /><br />

If you have already selected a service provider outside of the VenturePact network, do let us know by replying to this email. This way we would cancel the request for additional service providers and would potenitally invite your service provider to apply to the VenturePact marketplace. 
<br /><br/>

If you would like to tell us about your experience over a call, feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">Schedule a call</a>.
			<br />
		</td>	
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			All The Best,<br />
			VenturePact Team
        </td>	
	</tr>
</table>
</div>
