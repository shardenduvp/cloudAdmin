<style>
.grey{
	background-color:#fff;
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
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>
	</tr>-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			 HI Admin,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">



			<?php echo $data["reportee"]->username; ?> has reported issue for review id #<?php echo $data["ref"]->id; ?>

		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			All the best!<br />
            VenturePact Team<br />
		</td>
	</tr>
</table>
</div>
