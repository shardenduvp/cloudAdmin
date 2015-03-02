
<style type="text/css">
.img45
{
    height: 45px;
    width: 45px;    
}
.img75
{
    height: 75px;
    width: 75px;
}
</style>
<!-- begin: .tray-center -->
<div class="tray tray-center va-t posr pl0 pr0 pt0 new-modal-bg layout-left">
    Conversation for Propsal#
    <?php echo $project->clientProjects->name; ?>

    <div class="admin-panels mn pn ui-sortable pl20 pr20 pt25" data-animate="fadeIn">
        <div class="row" id="chat-box" data-room="<?php echo base64_encode($project->chat_room_id); ?>" data-user="<?php echo base64_encode($roomUser->id); ?>" data-u="<?php echo base64_encode($project->id); ?>">
            <div class="col-sm-12">
                <!-- Add user widget -->
                <div class="col-md-12 pa10 pl0 pr0">
                    <div class="col-md-3">
                    <?php foreach ($allusers as $key => $user) {
                        $userimg = $user->users->image;
                     ?>
                        <a href="" class="posr mr5">
                            <img  src="<?php echo (empty($userimg)?$this->res['avtar'] :$userimg);?>" class="img-circle border_grey img45" alt="<?php echo $user->users->first_name; ?> " title="<?php echo $user->users->first_name; ?> " />
                            <span class="tab-notification online-dot"></span>
                        </a>
                        <?php }// end of all users ?>
                       
                    </div>
                    <div class="col-md-1 pull-right hide">
                        <a href=""><span class="tab-circle-grey ml20 text-center"><span class="icon-user-follow text_white fs18" aria-hidden="true"></span></span></a>
                    </div>
                </div>

                <!-- / Add user widget -->
                <div class="col-md-12 np mt10 animated-waypoint" data-animate="fadeIn">
                    <small><i> <div id="txtChatStatus"> </div></i></small>
                    <textarea id="txtChatBox" rows="4" class="col-sm-12 status-box p10" placeholder="Write your message here..."></textarea>
                    


                    <div class="col-md-12 status-box-bot p10">
                        <div class="col-md-4 mt10">
                            <a href="" class="status-color fs13"><span class="icon-paper-clip fs16" aria-hidden="true"></span> Attachment</a>
                        </div>
                        <div class="pull-right">
                            <div class="dropdown display_inline pl0">                               
                                <button class="btn status-btn dropdown-toggle fs12 mr10" type="button" id="menu1" data-toggle="dropdown">Send Pitch / Decline
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  data-toggle="modal" data-target="#create-pitch" onclick="sendpitch()">Send Pitch</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"  data-toggle="modal" data-target="#declined_partner">Declined a Client </a></li>
                                    </ul>
                                </div>
                                <input type="button" id="btnChatBox" value="Send Message" class="btn tab-btn-orange font_newregular fs12 mt0">

                            </div>
                        </div>
                    </div>

                    <div id="chattingscroll">
                        <?php foreach($chatData as $chat ){ 
                            //$cmessage  = str_replace("dummy", $chat->add_date, $chat->message);
                            
                            switch($chat->chat_template_id)
                            {
                                case '0':
                                    echo $chat->message;
                                    break;
                                case '1':
                                    // pitch code
                                echo '<div class="tab-slide-white col-md-12 np pt10 mt20 animated-waypoint " data-animate="fadeIn">';
                                echo $chat->message;
                                //seen by code and action button 
                                echo '</div>';
                                    break;
                                case '3':
                                    
                                    break;
                            }
                            
                        }
                      ?>


                        <!-- Deal Closed  -->
                        <div class="tab-slide-detail col-md-12 pa10 mt20 animated-waypoint hide" data-animate="fadeIn">
                            <div class="col-sm-3 pl0">
                                <div class="col-sm-1 np"><img alt="Dots icon" src="images/dots-icon.png"></div>
                                <div class="col-sm-10 text-center np mt20">
                                    <span aria-hidden="true" class="icon-check dark-blue-new fs30 display_block mb5" style=""></span>
                                    <span class="fs14 font_newregular display_block dark-blue-new">Deal Closed</span>
                                    <span class="fs10 display_block font_newlight text-white">14 Feb 2015</span>
                                </div>
                            </div>
                            <div class="col-sm-8 pl0">
                                <div class="col-sm-4 pt10 pb10 mt20 tab-price-div-b">
                                    <span class="fs10">Fixed Price</span>
                                    <h3 class="font_newregular text_white nm mt5">$15,000 Weekly</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div-b">
                                    <span class="fs10">Start Date:</span>
                                    <h3 class="font_newregular text_white nm mt5">20 Jun 2015</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div-b">
                                    <span class="fs10">Duration:</span>
                                    <h3 class="font_newregular text_white nm mt5">200 Days</h3>
                                </div>
                                <div class="col-sm-2 pt10 pb10 mt20 tab-price-div-last-b">
                                    <span class="fs10">Trial:</span>
                                    <h3 class="font_newregular text_white nm mt5">20 Days</h3>
                                </div>
                            </div>  
                            <div class="col-md-1 pr0">
                                <img class="pull-right" alt="Dots icon" src="images/dots-icon.png">
                            </div>
                        </div>
                        <!--/ Deal Closed  -->

                        <!-- pitch without Milestone  -->
                        <div class="tab-slide-white col-md-12 np pt10 mt20 animated-waypoint hide" data-animate="fadeIn">
                            <div class="col-sm-3 pl10 pr10">
                                <div class="col-sm-1 np"><img alt="Dots icon" src="images/dots-icon.png"></div>
                                <div class="col-sm-10 text-center np mt20">
                                    <span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"><div class="badge badge-red p4"><span class="icon-check" aria-hidden="true"></span></div></span>
                                    <span class="fs14 font_newregular display_block dark-blue-new">Pitch Sent</span>
                                    <span class="fs10 display_block font_newlight">14 Feb 2015</span>
                                </div>
                            </div>
                            <div class="col-sm-8 pl10 pr10">
                                <div class="col-sm-4 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Time & Material</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">$12,000 Weekly</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Start Date:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">20 Jun 2015</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Duration:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">200 Days</h3>
                                </div>
                                <div class="col-sm-2 pt10 pb10 mt20 tab-price-div-last">
                                    <span class="fs10">Trial:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">20 Days</h3>
                                </div>
                            </div>  
                            <div class="col-md-1 pl10 pr10">
                                <img class="pull-right" alt="Dots icon" src="images/dots-icon.png">
                            </div>
                           <!--  <div class="col-md-12 bt mt10 p10 pl30 bgwhite">
                                <a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 pull-left"><span class="icon-note" aria-hidden="true"></span> &nbsp;Edit Pitch </a>
                                <div class="pull-right mr20 mt5">
                                    <span class="fs10 grey-text mr10">Seen By:</span>
                                    <a href=""><img width="30" class="img-circle" src="images/arshiya.png"></a>
                                    <a href=""><img width="30" class="img-circle" src="images/big-p.png"></a>
                                    <a href=""><img width="30" class="img-circle" src="images/vp-tag.png"></a>
                                </div>
                            </div> -->
                        </div>
                        <!--/ pitch without Milestone  -->

                        <!-- Pitch With Milestone -->
                        <div class="tab-slide-white col-md-12 np pt10 mt20 animated-waypoint hide" data-animate="fadeIn">
                            <div class="col-sm-3 pl10 pr10">
                                <div class="col-sm-1 np"><span class="dots-img"></span></div>
                                <div class="col-sm-10 text-center np mt20">
                                    <span style="" class="icon-doc fs30 display_block mb8 dark-blue-new" aria-hidden="true"><div class="badge badge-red p4"><span class="icon-check" aria-hidden="true"></span></div></span>
                                    <span class="fs14 font_newregular display_block dark-blue-new">Pitch Sent</span>
                                    <span class="fs10 display_block font_newlight">14 Feb 2015</span>
                                </div>
                            </div>
                            <div class="col-sm-8 pl10 pr10">
                                <div class="col-sm-4 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Time & Material</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">$12,000 Weekly</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Start Date:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">20 Jun 2015</h3>
                                </div>
                                <div class="col-sm-3 pt10 pb10 mt20 tab-price-div">
                                    <span class="fs10">Duration:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">200 Days</h3>
                                </div>
                                <div class="col-sm-2 pt10 pb10 mt20 tab-price-div-last">
                                    <span class="fs10">Trial:</span>
                                    <h3 class="font_newregular team-text-blue nm mt5">20 Days</h3>
                                </div>
                                <div class="col-md-12 np milestone-box">
                                    <span class="fs14 blue-new mb10"><span class="icon-direction fs16" aria-hidden="true"></span> Paid in 5 Milestones</span>
                                    <table class="table table-hover fs14 ml10 mt10">
                                        <tbody>
                                            <tr>
                                                <td>#1 </td>
                                                <td data-original-title="dummy text" data-container="body" data-toggle="tooltip" data-placement="top" title="">Once prototype is done</td>
                                                <td>$50,000</td>
                                            </tr>
                                            <tr>
                                                <td>#2 </td>
                                                <td data-original-title="dummy text" data-container="body" data-toggle="tooltip" data-placement="top" title="">Once prototype is done</td>
                                                <td>$50,000</td>
                                            </tr>
                                            <tr>
                                                <td>#3 </td>
                                                <td data-original-title="dummy text" data-container="body" data-toggle="tooltip" data-placement="top" title="">Once prototype is done</td>
                                                <td>$50,000</td>
                                            </tr>
                                            <tr>
                                                <td>#4 </td>
                                                <td data-original-title="dummy text" data-container="body" data-toggle="tooltip" data-placement="top" title="">Once prototype is done</td>
                                                <td>$50,000</td>
                                            </tr>
                                            <tr>
                                                <td>#5</td>
                                                <td data-original-title="dummy text" data-container="body" data-toggle="tooltip" data-placement="top" title="">Once prototype is done</td>
                                                <td>$50,000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>  
                            <div class="col-md-1 pl10 pr10">
                                <span class="dots-img"></span>
                            </div>
                            <div class="col-md-12 bt mt10 p10 pl30 bgwhite">
                                <a href="javascript:void(0);" class="btn tab-btn-new fs12 mt5 mb5 pull-left"><span class="icon-note" aria-hidden="true"></span> &nbsp;Edit Pitch </a>
                                <div class="pull-right mr20 mt5">
                                    <span class="fs10 grey-text mr10">Seen By:</span>
                                    <a href=""><img width="30" class="img-circle" src="images/arshiya.png"></a>
                                    <a href=""><img width="30" class="img-circle" src="images/big-p.png"></a>
                                    <a href=""><img width="30" class="img-circle" src="images/vp-tag.png"></a>
                                </div>
                            </div>
                        </div>
                        <!--/ Pitch With Milestone -->

                        <!-- Plain Chat Message template  -->
                        <div class="col-md-12 np pt15 pb10 bt bb animated-waypoint hide" data-animate="fadeIn">
                            <div class="col-md-1">
                                <a href=""><img class="img-circle" src="images/arshiya.png"></a>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fs14 display_block font_newregular mb5 mt5 team-text-blue">Bijal Kakka:</h5>
                                <h6 class="fs12 display_block nm">2 days ago</h6>
                            </div>
                            <div class="col-md-9">
                                <p class="tsm-text mb5">Hi Pratham,</p>
                                <p class="tsm-text mb15">
                                    Pleasure meeting you. You can view my work. We are a team of 40 with a full fledge system in place. We are agile. <a class="orange-new fs14" href=""><span aria-hidden="true" class="icon-paper-clip fs16"></span>officedocument.doc</a>
                                </p>
                                <div class="pull-right mr20 mt5">
                                    <span class="fs10 grey-text mr10">Seen By:</span>
                                    <a href=""><img width="30" src="images/arshiya.png" class="img-circle"></a>
                                    <a href=""><img width="30" src="images/big-p.png" class="img-circle"></a>
                                    <a href=""><img width="30" src="images/vp-tag.png" class="img-circle"></a>
                                </div>
                            </div>
                        </div>
                        <!--/ Plain Chat Message template  -->

                        <!-- Introduction message notification  -->
                        <div class="tab-slide-white col-md-12 np pt20 pb20 mt30 animated-waypoint" data-animate="fadeIn">
                            <div class="col-md-3">
                                <a class="text-center team-text-blue" href="javascript:void(0);">
                                    <span aria-hidden="true" class="icon-users fs30 display_block mb10" style=""></span>
                                    <span class="fs14 display_block mb5">Introduced</span>
                                    <span class="fs10 display_block font_newlight tab-color time" data-last="<?php echo $project->add_date; ?>"><?php echo $project->add_date; ?></span>
                                </a>
                            </div>
                            <div class="col-sm-9 pl10 pr10">
                                <p class="fs14">
                                    <?php echo $admin->first_name; ?> introduced <?php echo $project->clientProjects->clientProfiles->users->first_name;  ?> to <?php echo $project->suppliers->users->first_name;  ?>
                                </p>
                            </div>
                        </div>
                        <!--/ Introduction message notification  -->


                        <!-- Introduction  -->
                        <div class="col-md-12 np pt15 pb10 bt bb mt30 animated-waypoint" data-animate="fadeIn">
                            <div class="col-md-1">
                                <?php $adminImg = $admin->image; ?>
                                <a href="">
                                    <img class="img-circle img45"  src="<?php echo (empty($img)?$this->res['avtar'] :$img);?>"></a>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="fs14 display_block font_newregular mb5 mt5 team-text-blue"><?php echo $admin->first_name; ?>:</h5>
                                    <h6 class="fs12 display_block nm time" data-last="<?php echo $project->add_date; ?>" ><?php echo $project->add_date; ?></h6>
                                </div>
                                <div class="col-md-9">
                                    <p class="tsm-text mb5">Hi <?php echo $project->suppliers->users->first_name;  ?>,</p>
                                    <p class="tsm-text mb15">
                                        Pleasure meeting you. You can view my work. We are a team of 40 with a full fledge system in place. We are agile. 
                                    </p>
                                    <div class="col-md-12 np mb20">
                                        <!-- client section  -->
                                        <?php $cImage = $project->clientProjects->clientProfiles->users->image;?>
                                        <div class="col-md-3 pa10 text-center pl0">
                                            <a class="tm-hover" href="">
                                                <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                                <img alt="Team Member" src="<?php echo (empty($cImage)?$this->res['avtar'] :$cImage);?>" class='img75 img-circle' />
                                                <h5 class="fs12 display_block font_newregular mb5 team-text-blue">
                                                    <?php echo $project->clientProjects->clientProfiles->users->first_name; ?></h5>
                                                    <h6 class="fs10 display_block nm text-color-navy mt5">Founder and CEO</h6>
                                                    <h6 class="fs10 font_newbold display_block nm chat-color mt5">
                                                        <?php echo $project->clientProjects->clientProfiles->users->company_name; ?>
                                                    </h6>
                                                </a>
                                            </div>
                                            <div class="col-md-1 pa10 text-center pl0">
                                                <span style="" class="fa fa-long-arrow-left fs30 display_block mt10 tab-icon-color" aria-hidden="true"></span>
                                                <span style="" class="fa fa-long-arrow-right fs30 display_block tab-icon-color" aria-hidden="true"></span>
                                            </div>
                                            <!-- Supplier section  -->
                                            <?php $sImage = $project->suppliers->users->image;?>
                                            <div class="col-md-3 pa10 text-center pl0">
                                                <a class="tm-hover" href="">
                                                    <div class="tm-show2"><span class="fa fa-linkedin-square fa-lg mt5"></span></div>
                                                    <img alt="Team Member" src="<?php echo (empty($sImage)?$this->res['avtar'] :$sImage);?>" class='img75 img-circle' />
                                                    <h5 class="fs12 display_block font_newregular mb5 team-text-blue">
                                                        <?php echo $project->suppliers->users->first_name; ?></h5>
                                                        <h6 class="fs10 display_block nm text-color-navy mt5">Founder and CEO</h6>
                                                        <h6 class="fs10 font_newbold display_block nm chat-color mt5">
                                                           <?php echo $project->suppliers->users->company_name; ?>

                                                       </h6>
                                                   </a>
                                               </div>
                                           </div>
                                           <p class="tsm-text mb15">
                                            I hope this will be a good begining. I will always be there to assist you at all stages of the project. Feel free to drop me a line at any point in time.
                                        </p>
                                        <p class="tsm-text mb15">
                                            Look forward to great begining
                                        </p>
                                        <div class="pull-right mr20 mt5">
                                            <span class="fs10 grey-text mr10">Seen By:</span>
                                            <a href=""><img width="30" src="images/arshiya.png" class="img-circle"></a>
                                            <a href=""><img width="30" src="images/big-p.png" class="img-circle"></a>
                                            <a href=""><img width="30" src="images/vp-tag.png" class="img-circle"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Introduction  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: .tray-center -->

            <?php $chatTemplates=ChatTemplate::model()->findAllByAttributes(array('status'=>1)); ?>
            <script type="text/javascript">
            var username = "<?php echo $roomUser->users->first_name; ?>";
            var templates = <?php echo CJSON::encode($chatTemplates); ?>;
            var url = "<?php echo (empty($roomUser->users->image)?$this->res['avtar']:$roomUser->users->image); ?>";

            </script>
            <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script>

            <script type="text/javascript">



            </script>


           
