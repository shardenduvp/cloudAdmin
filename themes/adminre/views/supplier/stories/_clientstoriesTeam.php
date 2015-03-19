<div class="col-md-12 border_style_div mt15">
<h4>Team Members</h4>
<?php
$condition	    =	array('suppliers_has_portfolio_id'=>base64_decode(Yii::app()->request->getParam('sid')));
$ClientStories	=	SuppliersPortfolioHasTeam::model()->findAllByAttributes($condition);
//CVarDumper::Dump($ClientStories,10,1);
if(count($ClientStories) > 0)
{
    for($i=0;$i<count($ClientStories);$i++)
    {
        ?>
        <div class="col-md-3 pr0">
            <div class="team_class pt15">
            <?php
            $proImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
        	if(!empty($ClientStories[$i]->image))
    		{
    			$proImg = $ClientStories[$i]->image;
    		}
             ?>
                <img width="50" alt="" class="img-circle  ma5" src="<?php echo $proImg ?>">
                
                <span class="pull-right pa5">
                    <?php echo $ClientStories[$i]->name; ?> <br>
                    <p><small> Designation : <?php echo $ClientStories[$i]->designation; ?></small><br>
                    <small> Department : <?php echo $ClientStories[$i]->dep; ?></small></p>
                    <?php 
                    if($ClientStories[$i]->facebook !="")
                    {
                        ?>
                        <a href="<?php echo $ClientStories[$i]->facebook; ?>" target="_blank">FB</a> 
                        <?php    
                    }
                     ?>
                     
                     <?php 
                    if($ClientStories[$i]->twitter !="")
                    {
                        ?>
                        | <a href="<?php echo $ClientStories[$i]->twitter; ?>" target="_blank">T</a> 
                        <?php    
                    }
                     ?>
                     
                     <?php 
                    if($ClientStories[$i]->linkedin !="")
                    {
                        ?>
                       | <a href="<?php echo $ClientStories[$i]->linkedin; ?>" target="_blank">LI</a>  
                        <?php    
                    }
                     ?>
        		
                </span>
            </div>
            
            <div>
                <?php
                if(!$is_view)
                {
                    ?>
                        <a href="<?php echo Yii::app()->baseUrl;  ?>/index.php?r=supplier/ClientStoriesTeam&id=<?php echo base64_encode($ClientStories[$i]->id); ?>&pid=<?php echo Yii::app()->request->getParam('sid'); ?>">Edit</a> |
                        <a href="<?php echo Yii::app()->baseUrl;  ?>/index.php?r=supplier/ClentTeamDelete&id=<?php echo base64_encode($ClientStories[$i]->id); ?>&pid=<?php echo Yii::app()->request->getParam('sid'); ?>">Delete</a>
                    <?php
                }
                 ?>
            </div>
        </div>
        
        <?php
    }
}
 ?>

    <?php
    if(!$is_view)
    {
        ?>
    <div class="col-md-3">
        <div class="team_class text-center pt15 ">
            <?php echo CHtml::link( '<button type="button" class="btn btn-primary  text-center model_text" >Add Member</button>', array( '/supplier/ClientStoriesTeam&pid='.Yii::app()->request->getParam('sid')));?>
        </div>
    </div>
    <?php
    }
     ?>
</div>

