Hi <?php echo $data['name'] ?>,<br /><br />

Please check my profile link <a href="<?php echo $data['link']; ?>"><?php echo $data['link']; ?></a><br /><br />

<?php
echo $data['description'];
 ?>

<br /><br />
Feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">Schedule a call</a> if you need any assistance.<br /><br />


All the best!<br />
VenturePact Team	