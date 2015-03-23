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
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff ; color:#333;">
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hi Admin,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            <?php echo $message;?>

		</td>	
	</tr>
	
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            Regards,<br />
			<?php echo $name;?><br />
		</td>	
	</tr>
</table>
</div>  