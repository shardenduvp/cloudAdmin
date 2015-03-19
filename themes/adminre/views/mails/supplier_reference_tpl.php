<?php
//$data['supplier_id']
//$suppliers = Suppliers::model()->findAllByAttributes(array("id"=>yii::app()->user->profileId));
 ?>
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
			Hi <?php echo $data["client_first_name"]." "; ?>,<br />
		</td>	
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
		
			I am Sam from VenturePact, an invite only marketplace that connects companies with top tier software development firms. <?php echo $data["first_name"]." ".$data["last_name"] ?> mentioned that they have worked with you in the past.
			<br/><br/>
			We, at VenturePact, believe customer feedback is essential as it helps service providers improve and allows clients to make better decisions. We were wondering if you can take a minute to review & rate your experience with <?php echo $data["first_name"]." ".$data["last_name"] ?> from <?php echo $data["company_name"]; //$suppliers[0]->name; ?> for our platform.
			<br/><br/>
			Following is a link to the feedback form.<br /><br />
            
            <a href="<?php echo Yii::app()->createAbsoluteUrl('client/supplierReference', array('link' => $link));?>" style="margin-top: 3px;background: none repeat scroll 0 0 #48a53d;color: #FFFFFF;font-size: 18px; padding: 10px 15px;text-decoration: none;transition: all 600ms ease-in-out 0s; font-weight:bold; font-family:Arial, Helvetica, sans-serif; -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;margin-left:200px; float: left;">Recommend</a>
			<br/><br/><br/><br />
			Thanks a lot for your help and your time. <br />
			
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
