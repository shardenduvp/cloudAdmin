<?php

if(Yii::app()->request->getParam('sid')!="")
{
    $id = base64_decode(Yii::app()->request->getParam('sid'));
    ?>
    <div style="clear: both;"></div>
    <div class="classsegments mt15">
    <?php
    $condition	=	array('suppliers_has_portfolio_id'=>$id);
    $imgList	=	suppliersPortfolioImages::model()->findAllByAttributes($condition);

    if(!empty($imgList))
    {
        for($i=0;$i<count($imgList);$i++)
        {
        ?>
        <div class="col-md-3">
            <img width="180" src="<?php echo $imgList[$i]->image; ?>" height="200" /><br />
            <?php
            if(!$is_view)
            {
                ?>
                <a onclick="return deleteStories();" href="<?php echo Yii::app()->createUrl('/supplier/StoryImageDelete',array('iid'=>base64_encode($imgList[$i]->id),'sid'=>Yii::app()->request->getParam('sid'))); ?>"  href="<?php echo Yii::app()->baseUrl;  ?>/index.php?r=supplier/StoryImageDelete&id=<?php echo base64_encode($imgList[$i]->id); ?>&sId=<?php echo Yii::app()->request->getParam('sid'); ?>">Delete</a>
                <?php
            }
             ?>
            
        </div>
        <?php
        }
    }
     ?>
    </div>
    <?php
}
 ?>
 <script>
 

function deleteStories()
{
   var cnfrm = confirm("Are you sure you want to delete this record?");
   if(cnfrm)
   {
       return true;
   }else{
        return false;
   }
}
 </script>
