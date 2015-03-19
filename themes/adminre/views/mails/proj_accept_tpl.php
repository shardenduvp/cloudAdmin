


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
			Congratulations on selecting a service provider. We hope that you will have a phenomenal experience and look forward to hearing your feedback. 
			<br /><br/>
		If you face any issues during the engagament, please let us know. We will do our best to make sure that everything is resolved in an appropriate and timely manner.
			<br /><br/>
			As always, if you have any questions, feel free to reply to this email or <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a>.
			<br/>
		</td>	
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All The Best<br>
            Sam Shuk<br>
            Client Success Team, VenturePact<br />
			
    		
        </td>	
	</tr>
</table>
</div>
