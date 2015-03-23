
<style>
/*    .grey{
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
    .mail_logo i
    \mg{
    	width:100px;
    	height:42px;
    }
    .mail_set span{
    	color:#656565;
    	font-style:italic;
    }*/
</style>
<div class="mail_set" style=" font-family:Arial, Helvetica, sans-serif; font-size:13px ; background:none;" >
<?php
$project = $data['projects'];
$team = $data['team'];
 ?>
    <?php 
    if(false)
    {
    ?>
    
            <table cellpadding="5" cellspacing="0" border="0" class="mail_set" style="background:#fff; color:#333;">
        	<!--<tr>
                <td >
        			<a href="#" class="mail_logo" style="margin-bottom:10px;">
        			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
        			</a>
        		</td>
        	</tr>-->
        	<tr style="background-color:#fff;">
        		<td  style="padding:10px">
        			Hi <?php echo $data["name"]; ?>,<br />
        		</td>
        	</tr>
        	<tr style="background-color:#fff;">
        		<td  style="padding:10px ; color:#000 !important;">
        
        	        Just a reminder that one or more of our service providers have pitched for your project. Please <a href="<?php echo Yii::app()->createAbsoluteUrl('client/pitch',array('id'=>$data['id'],'pid'=>$data['pid']));?>">click here</a> to view the entire proposal. Also, 
                    feel free to chat with the service providers to get all your doubts cleared.
                    
                     <br />  <br />
                    If you have any questions, feel free to reply to this email or <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a>.<br/><br />
                    All The Best,<br />
                    VenturePact Team<br />
        		</td>
        	</tr>
        
        
        </table>
    <?php
    }
     ?>
     
     <?php
     if(true)
     {
      ?>
         <table cellpadding="5" style="width: 100%; font-size:13px; font-family:Arial, Helvetica, sans-serif" >
        	<tr style="background-color:#fff;">
        		<td  style="padding:10px">
        			Hi <?php echo $data["name"]; ?>,<br /><br />
                    Just a reminder that one or more of our service providers have pitched for your project. Please <a href="<?php echo Yii::app()->createAbsoluteUrl('client/pitch',array('id'=>$data['id'],'pid'=>$data['pid']));?>">click here</a> to view the entire proposal. Also, 
                    feel free to chat with the service providers to get all your doubts cleared.
                    <?php
                    if(false)
                    {
                     ?>
                        feel free to <a href="<?php echo Yii::app()->createAbsoluteUrl('client/pitch',array('id'=>$data['id'],'pid'=>$data['pid']));?>">chat</a> with the service provider if you have any questions or if you would like some clarification.
                    <?php
                    }
                     ?>
        		</td>	
        	</tr>
         </table>   
        
         <table cellpadding="5" cellspacing="0" style="width: 100%;border: 1px solid #C0CDD1;margin-top: 10px;margin-bottom: 10px; font-size:13px; font-family:Arial, Helvetica, sans-serif;" >
            <tr style="background-color: #f5f5f5;" >
                <td style="text-align: center;padding: 8px 4px 8px 4px;"><b>Pitch</b></td>
            </tr>
            <tr>
                <td>
                    <b><?php echo $project->suppliers->name; ?></b><br />
                    <?php echo $project->suppliers->number_of_employee; ?> Employees <br />
                    Founded in <?php echo date( "Y",strtotime($project->suppliers->add_date)); ?><br />
                    Based in <?php echo $project->suppliers->cities->name; ?><br />
                    <?php $skillset=array(); foreach($project->suppliers->suppliersHasSkills as $skill) $skillset[]= $skill->skills->name; ?>
                    <?php echo implode( ',',$skillset); ?>
                </td>
            </tr>
         </table>
         
         <hr />
         
           <table cellpadding="5" style="width: 100%;border: 1px solid #C0CDD1; font-size:13px; font-family:Arial, Helvetica, sans-serif">
                <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                     <td class="border_right" style="padding-left:8px;">Price | Billing</td>
                     <td align="center" class="border_right" >Start Date</td>
                     <?php
                     if(!empty($project->time_estimation))
                     {
                        ?>
                  <td align="center" class="border_right">Timeline</td>
                        <?php
                     }
                      ?>
                     <?php
                     if(!empty($project->trial_period))
                     {
                      ?>
                  <td align="center" class="border_right">Trial</td>
                     <?php
                     }
                      ?>
                </tr>
                <tr style="background-color: #f8f8f8;">
                    <td>
                         $<?php echo $project->min_price; ?> -  $<?php echo $project->max_price; ?><br />
                           <?php if(empty($project->time_material)){ ?>
                          
                            <?php }else{ ?>
                           <?php echo $project->time_material; ?> | Billing: <?php echo $project->billing_schedule; ?> 
                                
                            <?php } ?>
                    </td>
                    <td>
                         <?php echo (empty($project->start_date)?"-":date( "d-M-Y",strtotime($project->start_date))); ?>
                    </td>
                    <?php
                     if(!empty($project->time_estimation))
                     {
                     ?>
                    <td>
                        <?php echo (empty($project->time_estimation)?"-":$project->time_estimation." Days"); ?>
                    </td>
                    <?php
                    }
                     ?>
                     <?php
                     if(!empty($project->trial_period))
                     {
                      ?>
                    <td>
                        <?php echo (empty($project->trial_period)?"-":$project->trial_period." Days"); ?> 
                    </td>
                    <?php
                    }
                     ?>
                </tr>
          </table>  
          
            <table cellpadding="5" style="width: 100%;border: 1px solid #C0CDD1;margin-top: 10px;margin-bottom: 10px; font-size:13px; font-family:Arial, Helvetica, sans-serif" >
                <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                    <td style="padding-left:8px;">About The Company</td>                 
                </tr>
                <tr>
                    <td style="padding-left:8px;">
                        <?php
                           if($project->default_q1_ans!="")
                           {
                               echo $project->default_q1_ans;
                           }else{
                               echo $project->suppliers->about_company;
                           }
                            
                         ?>
                     </td>
                </tr>
                <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                    <td style="padding-left:8px;">Why Us</td>                 
                </tr>
                <tr>
                    <td style="padding-left:8px;">
                        <?php echo (empty($project->default_q2_ans)?"Service Provider hasn't answered this question yet.":$project->default_q2_ans ); ?>
                     </td>
                </tr>
                
                <?php
                if(count($team) > 0)
                {
                 ?>
                    <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                        <td style="padding-left:8px;">The Team</td>                 
                    </tr>
                    <tr>
                        <td style="padding-left:8px;">
                         <?php
                        
                              for($i=0;$i<count($team);$i++){ 
                                    ?>
                                    <?php echo $team[$i]->first_name." ".$team[$i]->last_name; ?><br />
                                    <?php echo $team[$i]->experiance; ?><br />
                                    <hr />
                                    <?php
                             }
                         ?>
                         </td>
                     </tr>
                 <?php
                 }
                  ?>
                     <?php 
                     
                      
                           if(!empty($project->suppliersProjectTeams)){
                                ?>
   
                                <tr>
                                    <td>                            
                                        <?php                            
                                   
                                            foreach($project->suppliersProjectTeams as $item){ 
                                            ?>
                                            
                                                <?php echo $item->name ?><br />
                                                <?php echo $item->description ?><br />
                                                <hr />
                                                <?php
                                             } 
                                         ?>
                                     </td>
                                 </tr>
                                 <?php 
                           }
                       
                      ?> 
                                                   
                    
              
                       <?php
                       if(!empty($project->supplierDocuments)){ 
                            ?>
                              <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                                    <td>Attachment</td>                 
                              </tr>
                              <tr>
                                    <td>
                                       <?php
                                        foreach($project->supplierDocuments as $doc){
                                        ?>
                                            <a href="<?php echo $doc->path; ?>" class="btn btn-link <?php echo ($doc->extension=='image/jpeg'?'magnific':'');?>" title="View" target="_blank"> <?php echo (empty($doc->name)?"No-Name":$doc->name); ?></a><br />
                                          <?php
                                          }
                                          ?>
                                        </td>
                                  </tr>
                                  <?php
                       }?>
                  


                   
                     <?php if(!empty($project->clientProjects->clientProjectsQuestions))
                     {
                       ?>
                            <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                                <td>Custom Questions</td>                 
                            </tr>
                            <tr>
                                <td>
                               <?php     
                               
                                 $j = 1;

                                foreach($project->clientProjects->clientProjectsQuestions as $question)
                                {
                                   echo $j.")".$question->question."<br>";
                                   $project_ans = SuppliersProjectAnswer::model()->findByAttributes(array("question_id"=>$question->id,"suppliers_id"=>yii::app()->user->profileId));
			                               
                                   echo "Ans:".$project_ans->answer."<br>";
                                   $j++;
                                }
                                
                                ?>
                                 </td>
                           </tr>
                                <?php
                     }?>         
                
            </table>  
            <br />  
            If you have any questions, feel free to reply to this email or <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a>.<br/><br />
            All The Best,<br />
            VenturePact Team<br />
           
    
    <?php
    }
     ?>
</div>
