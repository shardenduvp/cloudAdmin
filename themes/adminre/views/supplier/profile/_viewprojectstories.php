 <div class="col-md-12">
  <?php if(count($stories) > 0){
        for($i=0;$i<count($stories);$i++)
        {
                      
            $proImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
            if($stories[$i]->image!="")
            {
                $proImg = $stories[$i]->image;
            }
            
            if($stories[$i]->portfolio_type==0)
            {
                $page = "0";
            }elseif($stories[$i]->portfolio_type==1)
            {
                $page = "1";
            }else{
                $page = "2";
            }
            
            $portfolioImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
            
            foreach($stories[$i]->suppliersPortfolioImages as $portImg)
            {
                $portfolioImg = $portImg->image;
                break;
            }
            
        ?>
            <div class="col-md-4 mt10" >
                <div class="storiesDetail" id="st_<?php echo $stories[$i]->id; ?>" style="border: 1px solid #e2e2e2;padding: 4px;">
                    <div id="portImg_<?php echo $stories[$i]->id; ?>">
                    <?php
                    foreach($stories[$i]->suppliersPortfolioImages as $portImg)
                    {
                        $portfolioImg = $portImg->image;
                        break;
                    }
                    if($stories[$i]->image!="")
                    {
                        $portfolioImg = $stories[$i]->image;
                    }
                     ?>
                    
                        <img src="<?php echo $portfolioImg //echo $proImg; ?>" width="240" height="180" />
                    </div>
                    <div class="awarddesc" id="portDesc_<?php echo $stories[$i]->id; ?>" style="display: none;width: 100%;height: 180px;"> <?php echo $stories[$i]->description; ?></div>
                   
                    <div> 
                        <b> <?php echo ($stories[$i]->is_discreet==0)?$stories[$i]->project_name:"Undisclosed"; ?> </b>
                        
                        <?php
                        
                        if($stories[$i]->portfolio_type=="0")
                        {
                            $portImg = Yii::app()->theme->baseUrl."/style/images/avatar.png";
                            if($stories[$i]->image!="")
                            {
                                $portImg = $stories[$i]->image;     
                            }
                            
                            
                            ?>
                            <hr />
                            <img width="50" alt="" class="img-circle  ma5" src="<?php echo $portImg; ?>"/> <?php echo ($stories[$i]->is_discreet==1)?$stories[$i]->project_name:$stories[$i]->company_name; ?> , 
                            <?php
                            if(isset($stories[$i]->location))
                            {
                                $selectedCity = Cities::model()->findByAttributes(array("id"=>$stories[$i]->location));
                                echo $selectedCity->name;    
                            }
                            
                             ?>
                            
                            <?php
                        }
                         ?>
                       
                         <?php
                        $condition	    =	array('suppliers_has_portfolio_id'=>$stories[$i]->id);
                        $skillsList	    =	SuppliersHasPortfolioHasSkills::model()->findAllByAttributes($condition);
                        $industryList	=	SuppliersPortfolioHasIndustries::model()->findAllByAttributes($condition);
                        $servicesList	=	SuppliersHasPortfolioHasServices::model()->findAllByAttributes($condition);
                        $portSkills = "";
                        if(count($skillsList) > 0)
                        {
                            echo "<hr>";
                            for($j=0;$j<count($skillsList);$j++)
                            {
                                $portSkills .=", ".$skillsList[$j]->skills->name;        
                            }
                        }
                        
                        if(count($industryList) > 0)
                        {
                            echo "<hr>";
                            for($j=0;$j<count($industryList);$j++)
                            {
                                $portSkills .=", ".$industryList[$j]->industries->name;        
                            }
                        }
                        
                        if(count($servicesList) > 0)
                        {
                            echo "<hr>";
                            for($j=0;$j<count($servicesList);$j++)
                            {
                                $portSkills .=", ".$servicesList[$j]->services->name;        
                            }
                        }
                        
                        
                        echo "<font class='font_size10'>".substr($portSkills,1,strlen($portSkills))."</font>";
                        
                          ?>
                          <hr />
                          <a href="<?php echo Yii::app()->createUrl('/supplier/stories',array('sid'=>base64_encode($stories[$i]->id),'page'=>$page,'view'=>'1')); ?>">View</a>
                          
                          
                    </div>
                </div>
            </div>
       <?php
       }
   }
    ?>     
  </div>
  

<script>
    $(document).ready(function(){
        $(".storiesDetail").hover(function(){
            var id = this.id;
            id = id.split("_");
            $("#portImg_" + id[1]).hide();
            $("#portDesc_" + id[1]).show();
         },function(){
            var id = this.id;
            id = id.split("_");
            $("#portDesc_" + id[1]).hide();
            $("#portImg_" + id[1]).show();
         });
    });
</script>