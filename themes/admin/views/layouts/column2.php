<?php /* @var $this Controller */ ?>

<?php $this->beginContent('//layouts/main'); ?>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>

        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Search"><i class="fa fa-search search-icon"></i>
        </div>
        <!-- /SEARCH BAR -->

        <!-- SIDEBAR MENU -->
        <ul>
            <li class="active">
                <?php
                    echo CHtml::link('<i class="fa fa-list fa-fw"></i>
                        <span class="menu-text">New Leads</span>
                        <span class="selected"></span>', '#', array(
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
                            <span class="menu-text">Active Projects</span>', array('/admin/clientProjects/admin'), array(
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

            <li>
                <?php
                    echo CHtml::link('<i class="fa fa-users fa-fw"></i>
                        <span class="menu-text">Clients</span>', array('/admin/clientProfiles/admin'), array(
                            'class'=>'',
                            'type'=>'raw',
                        )
                    );
                ?>
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
                            <span class="menu-text">Broadcast Messages</span>', '#', array(
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
                    <li>
                        <?php
                            echo CHtml::link('<span class="sub-menu-text">Link 2</span>', '#', array(
                                    'class'=>'',
                                    'type'=>'raw',
                                )
                            );
                        ?>
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