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
			Dear <?php echo $supplier; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			<?php echo $name; ?> has reviewed your firm. Please <a href="<?php echo Yii::app()->createAbsoluteUrl('site/supplier'); ?>">click here</a><?php  //echo $link;?> to see the review.<br /><br />
		</td>	
	</tr>    
	
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All The Best,<br />
			Bhavya<br />
            Account Manager, Developer Relations<br/>
            VenturePact
        </td>	
	</tr>
</table>
</div>
