


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
			Hi <?php echo $name; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
		Quick reminder that you have a call scheduled tomorrow at 10:00 AM IST with VenturePact.<br/><br/>
        We will try to scope out your requirements and understand your preferences. It should not take more than 15-20 minutes.
		<br /><br/>
		If you would like to reschedule, please click <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">here</a>.
		<br/>

		</td>	
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	Regards,<br />
			Pratham Mittal<br />
			CoFounder at VenturePact<br />
    		
        </td>	
	</tr>
</table>
</div>                            