 <style>
    .classsegments{
        width: 100%;
        padding: 10px;
        border: 1px solid #e2e2e2;
        min-height: 200px;
    }
</style>
 <h4>Stories/Projects</h4>


<div class="col-md-12">
    <?php
    //CVarDumper::Dump($stories,10,1);
    if(count($stories) > 0)
    {
        for($i=0;$i<count($stories);$i++)
        {

            if($stories[$i]->portfolio_type==0)
            {
                $page = "0";
            }elseif($stories[$i]->portfolio_type==1)
            {
                $page = "1";
            }else{
                $page = "2";
            }
            ?>
            <div class="col-md-3">
                <div class="awardcerification mt10">
                <?php
                $proImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
                
                foreach($stories[$i]->suppliersPortfolioImages as $portImg)
                {
                    $proImg = $portImg->image;
                    break;
                }
                if($stories[$i]->image!="")
                {
                    $proImg = $stories[$i]->image;
                }
                 ?>
                    <img width="80" class="img-circle" id="user_profile_img" src="<?php echo $proImg; ?>"/><br />
                    <strong>
                        <?php echo $stories[$i]->project_name; ?>
                    </strong>
                    <div class="col-md-12 mt10 mb10">
                       <a href="<?php echo Yii::app()->createUrl('/supplier/stories',array('sid'=>base64_encode($stories[$i]->id),'page'=>$page,'view'=>'1')); ?>">View</a> &nbsp;|  <a href="<?php echo Yii::app()->createUrl('/supplier/stories',array('sid'=>base64_encode($stories[$i]->id),'page'=>$page)); ?>">Edit</a> &nbsp;| <a class="delete" href="<?php echo Yii::app()->createUrl('/supplier/StoriesDelete',array('sid'=>base64_encode($stories[$i]->id))); ?>">Delete</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
     ?>
    <div class="col-md-3">
        <div class="team_class text-center pt15 " style="height: 100px;">
            <?php echo CHtml::link( '<button type="button" class="btn btn-primary  text-center model_text" >Add Story</button>', array( '/supplier/stories'));?>

        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
       $(".delete").click(function(){
            var cnfrm = confirm("Are you sure you want to delete this record?");
            if(cnfrm)
            {
                return true;
            }else{
                return false;
            }
       })
    });
</script>
