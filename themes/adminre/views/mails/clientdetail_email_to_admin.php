
<div class="mail_set" style=" font-family:Arial, Helvetica, sans-serif; font-size:13px ; background:none;" >


     
     <?php
      $project_detail	=	ClientProjects::model()->findByAttributes(array('id'=>$data['client_project_detail']->id));
      ?>
         <table cellpadding="5" style="width: 100%; font-size:13px; font-family:Arial, Helvetica, sans-serif" >
        	<tr style="background-color:#fff;">
        		<td style="padding:10px">
        			Hi Admin,<br /><br />
                    New Project detail : 
        		</td>	
        	</tr>
         </table>   
        
         <table cellpadding="5" cellspacing="0" style="width: 100%;border: 1px solid #C0CDD1;margin-top: 10px;margin-bottom: 10px; font-size:13px; font-family:Arial, Helvetica, sans-serif;" >
            <tr>
                <b>Client Detail</b>
            </tr>
            <tr>
                <td>
                <?php
                $client_detail	=	ClientProfiles::model()->findByAttributes(array('id'=>$project_detail->client_profiles_id));
                 ?>
                     <?php echo $client_detail->first_name; ?> <?php echo $client_detail->last_name; ?><br />
                     <?php echo $client_detail->email; ?><br />
                     <?php echo $client_detail->cities->states->name; ?><br />
                     <?php echo $client_detail->cities->name; ?>
                </td>
            </tr>
         </table>
         
         <hr />
         
           <table cellpadding="5" style="width: 100%;border: 1px solid #C0CDD1; font-size:13px; font-family:Arial, Helvetica, sans-serif">
                <tr style="font-weight:bolder!important ;background-color: #01cbc1;padding: 3px;color: #fff;">
                     <td colspan="2">Project Detail</td>
                     <td></td>       
                </tr>
                <tr style="background-color: #f8f8f8;">
                     <td>Looking For</td>
                     <td><?php echo ($project_detail->current_status==2)?"A team to execute on a project":"A developer to augment your team"; ?></td>          
                </tr>
                <tr style="background-color: #f8f8f8;">
                     <td>Job Title</td>
                     <td><?php echo $project_detail->name; ?></td>          
                </tr>
                
                <tr style="background-color: #f8f8f8;">
                     <td>Categories</td>
                     <td>
                        <?php
                         $service_text = "";
                         
                         $services	= ClientProjectsHasServices::model()->findAllByAttributes(array('client_projects_id'=>$project_detail->id));
                        // CVarDumper::Dump($services,10,1);
                         foreach($services as $ser)
                         {
                            $service_text .= ",".$ser->services->name;
                         }
                         echo substr($service_text,1,strlen($service_text));
                        
                         ?>
                     </td>          
                </tr>
               <tr style="background-color: #f8f8f8;">
                     <td>Language Skills</td>
                     <td>
                     <?php
                         $language_skills_text = "";
                         
                         $languages	= ClientProjectsHasSkills::model()->findAllByAttributes(array('client_projects_id'=>$project_detail->id));
                         //CVarDumper::Dump($languages,10,1);die;
                         foreach($languages as $lan)
                         {
                            $language_skills_text .= ",".$lan->skills->name;
                         }
                         echo substr($language_skills_text,1,strlen($language_skills_text));
                        
                         ?>
                     </td>          
                </tr>
               <tr style="background-color: #f8f8f8;">
                     <td>Start Date</td>
                     <td><?php echo $project_detail->start_date; ?></td>          
                </tr>
                <tr style="background-color: #f8f8f8;">
                     <td>Summary</td>
                     <td><?php echo $project_detail->description; ?></td>          
                </tr>

                <tr style="background-color: #f8f8f8;">
                     <td>Budget</td>
                     <td><?php echo $project_detail->min_budget ?> - <?php echo $project_detail->max_budget; ?></td>          
                </tr>
                
                <tr style="background-color: #f8f8f8;">
                     <td>Preference</td>
                     <td>
                        <?php 
                        if($project_detail->preferences=="regoin")
                        {
                            echo "Regions";
                        }else{
                            echo $project_detail->preferences;     
                        }
                        ?>
                        <?php
                            if($project_detail->regions)
                            {
                                $array_regions = $project_detail->regions;
                                $array_regions = explode(",",$array_regions);
                                $regoins_new = "";
                                
                                for($i=0;$i<count($array_regions);$i++)
                                {
                                    if(isset($array_regions[$i]))
                                    {
                                        //echo $array_regions[$i].",";
                                        $regions	= Countries::model()->findAllByAttributes(array('id'=>$array_regions[$i]));
                                        //CVarDumper::Dump($regions[0]->name,10,1);
                                        $regoins_new .= ",".$regions[0]->name;    
                                    }
                                    
                                }
                                if($regoins_new!="")
                                {
                                    echo "<br>";
                                    echo substr($regoins_new,1,strlen($regoins_new));    
                                }
                            }
                                
                           
                         ?>
                         
                     </td>          
                </tr>
                
                <tr style="background-color: #f8f8f8;">
                     <td>Mockup</td>
                     <td>
                     <?php
                     
                         
                     $doc = ClientProjectDocuments::model()->findAllByAttributes(array('client_projects_id'=>$project_detail->id));

                     foreach($doc as $doc1)
                     {
                        
                        ?>
                        <a href="<?php echo $doc1->path ?>" target="_blank"><?php echo $doc1->name; ?></a><br />                        
                        <?php                                                
                     }
                     
                      ?>
                     </td>          
                </tr>
                
          </table>  
          
            
            <br />  
            If you have any questions, feel free to reply to this email or <a href="<?php echo Yii::app()->createAbsoluteUrl('site/call');?>">schedule a call</a>.<br/><br />
            All The Best,<br />
            VenturePact Team<br />
   
</div>
