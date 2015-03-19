<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>

        <!-- SEARCH BAR -->
        <!-- <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div> -->
        <!-- /SEARCH BAR -->

        <!-- SIDEBAR MENU -->
        <ul>
            <li>
                <?php
                    echo CHtml::link('<i class="fa fa-list fa-fw"></i>
                        <span class="menu-text">New Leads</span>
                        <span class="selected"></span>', array("/admin/"), array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>             
            </li>

            <li>
                <?php
                    echo CHtml::link('<i class="fa fa-list fa-fw"></i>
                        <span class="menu-text">Intermediary Leads</span>
                        <span class="selected"></span>', array("/admin/default/intermediary"), array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>             
            </li>
            
            <li class="has-sub">
                <!-- <span class="arrow"></span> -->
                <?php
                    echo CHtml::link('<i class="fa fa-folder-open fa-fw"></i>
                            <span class="menu-text">Active Projects</span>', array('/admin/clientProjects/active'), array(
                            'class'=>'',
                        )
                    );
                ?>
                
                <!--
                <ul class="sub">
                    <li><a class="" href="#"><span class="sub-menu-text">Items</span></a></li><li><a class="" href="notifications.html"><span class="sub-menu-text">Hubspot Notifications</span></a></li>
                    <li class="has-sub-sub">
                        <a href="javascript:;" class=""><span class="sub-menu-text">Third Level Menu</span>
                        <span class="arrow"></span>
                        </a>
                        <ul class="sub-sub">
                            <li><a class="" href="#"><span class="sub-sub-menu-text">Item 1</span></a></li>
                            <li><a class="" href="#"><span class="sub-sub-menu-text">Item 2</span></a></li>
                        </ul>
                    </li>
                </ul>
                -->
            </li>

            <li class="has-sub">
                <?php
                    echo CHtml::link('<i class="fa fa-users fa-fw"></i>
                        <span class="menu-text">Clients</span>
                        <span class="arrow"></span>', 'javascript:;', array(
                            'class'=>'',
                            'type'=>'raw',   
                    ));
                 ?>
                <ul class="sub">
                    <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Client Profiles</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li>
                                <?php
                                    echo CHtml::link('<span class="sub-sub-menu-text">Manage Profiles</span>',
                                        array('/admin/clientProfiles/admin'), array(
                                            'class'=>'',
                                            'type'=>'raw',
                                        )
                                    );
                                ?>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub-sub">
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Client Projects</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                        <ul class="sub-sub">
                            <li>
                                <?php
                                    echo CHtml::link('<span class="sub-sub-menu-text">Manage Projects</span>',
                                        array('/admin/clientProjects/admin'), array(
                                            'class'=>'',
                                            'type'=>'raw',
                                        )
                                    );
                                ?>
                            </li>
                            <li>
                                <?php
                                    echo CHtml::link('<span class="sub-sub-menu-text">Create Project</span>',
                                        array('/admin/clientProjects/create'), array(
                                            'class'=>'',
                                            'type'=>'raw',
                                        )
                                    );
                                ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                                <?php
                                echo CHtml::link('<i class="fa fa-suitcase fa-fw"></i>
                                                <span class="menu-text">Suppliers</span>
                                                <span class="arrow"></span>', 'javascript:;', array(
                                                                                            'class'=>'',
                                                                                            'type'=>'raw',
                                                                                            )
                                                );
                                 ?>

                                <ul class="sub">
                                    <li>
                                        <?php
                                            echo CHtml::link('<span class="sub-menu-text">View Suppliers</span>', Yii::app()->createUrl('admin/suppliers/admin'), array(
                                                    'class'=>'',
                                                    'type'=>'raw',
                                                )
                                            );
                                        ?>
                                    </li>
                                     <li>
                                        <?php
                                            echo CHtml::link('<span class="sub-menu-text">Manage Faq</span>', Yii::app()->createUrl('admin/suppliersFaqAnswers/createUpdateFaq'), array(
                                                    'class'=>'',
                                                    'type'=>'raw',
                                                )
                                            );
                                        ?>
                                    </li>
                                </ul>
                            </li>
            <li>
                <?php
                    echo CHtml::link('<i class="fa fa-bullseye fa-fw"></i>
                        <span class="menu-text">Milestones</span>', array('/admin/clientMilestones/admin'), array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>
            </li>
            <li>
                <?php
                    echo CHtml::link('<i class="fa fa-envelope fa-fw"></i>
                            <span class="menu-text">Broadcast Message</span>', array('/admin/chatMessages'), array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>
            </li>

            <li class="has-sub">
                                <?php
                                echo CHtml::link('<i class="fa fa-pencil-square-o fa-fw"></i>
                                                <span class="menu-text">User Management</span>
                                                <span class="arrow"></span>', 'javascript:;', array(
                                                                                            'class'=>'',
                                                                                            'type'=>'raw',
                                                                                            )
                                                );
                                 ?>

                                <ul class="sub">
                                    <li>
                                        <?php
                                            echo CHtml::link('<span class="sub-menu-text">View Users</span>', Yii::app()->createUrl('admin/users/admin'), array(
                                                    'class'=>'',
                                                    'type'=>'raw',
                                                )
                                            );
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                            echo CHtml::link('<span class="sub-menu-text">Create New User</span>',  Yii::app()->createUrl('admin/users/create'), array(
                                                    'class'=>'',
                                                    'type'=>'raw',
                                                )
                                            );
                                        ?>
                                    </li>
                                </ul>
                            </li>
            <li class="has-sub">

                <?php
                    echo CHtml::link('<i class="fa fa-plus fa-fw"></i>
                        <span class="menu-text">More</span>
                        <span class="arrow"></span>', 'javascript:;', array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>
                <ul class="sub">
                    <li>
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Link 1</span>', '#', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                    </li>
                   
                    <li class="has-sub-sub">
                    <?php
                            echo CHtml::link('<span class="sub-menu-text">Skills</span>
                                <span class="arrow"></span>', 'javascript:;', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                    <ul class="sub-sub">
                         <li><a class="" href="<?php echo Yii::app()->createUrl('admin/skills/create');?>"><span class="sub-sub-menu-text">Create Skills</span></a></li>
                         <li><a class="" href="<?php echo Yii::app()->createUrl('admin/skills/admin');?>"><span class="sub-sub-menu-text">Manage Skills</span></a></li>
                    </ul>
                    </li>
                    <li>
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Link 3</span>', '#', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
                    </li>
                </ul>
            </li>
            
        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>
<!-- /SIDEBAR -->

<div id="main-content">
    <div class="container">
        <div class="row">
            <div id="content" class="col-lg-12">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endContent(); ?>