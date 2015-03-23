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
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>	
	</tr>-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hey <?php echo $data["name"]; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            I am CoFounder of VenturePact and I noticed you just submitted your requirements. Just wanted to mention that we have relationships with over a hundred service providers and we are here to help you find the right software development company for your needs.<br />
			
</td>	
	</tr>
    <?php if($data['linkedin']==''){ ?>
	<tr style="background-color:#fff;">
		<td  style="padding:10px;">
                    Meanwhile, please click on the link below to verify your email address.<br />
<br/>
</td>
</tr>
	<tr align="center">
			<td style="text-align:center;"><a href="<?php echo Yii::app()->createAbsoluteUrl('site/VerifyActivation', array('link' => $link,'log'=>$password));?>" style="background: none repeat scroll 0 0 #48a53d;color: #FFFFFF;font-size: 18px; padding: 10px 15px;text-decoration: none;transition: all 600ms ease-in-out 0s; font-weight:bold; font-family:Arial, Helvetica, sans-serif; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
                Verify Email Address
            </a>
			<br/><br/><br />

		</td>	
	</tr>
    <?php }?>
    <tr>
    <td style="padding: 0px 10px;">
    
    
			Feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a> if you need any assistance or if you would rather tell us your requirements over the phone. You can also reply to this email if you have any questions, concerns or feedback.<br />
<br />

		</td>	
	</tr>
	
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
        	All the best!<br />
			Randy Rayess<br />
			CoFounder at VenturePact<br />
    		
        </td>	
	</tr>
</table>
</div>
