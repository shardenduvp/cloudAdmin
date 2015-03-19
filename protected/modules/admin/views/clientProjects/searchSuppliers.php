<?php
Yii::app()->clientScript->registerScript('selectSupplier', "
    $('.selectSupplier').on('change', function(e) {
        if($(this).prop('checked') == true) {
            var url = $(this).attr('data-url');
            var project = $(this).attr('data-project');
            var supplier = $(this).attr('data-supplier');
            $.ajax({
                type:'POST',
                url:url,
                data:{'pid':project, 'sid':supplier},
                success: function(data) {
                    alert(data);
                },
                error: function() {
                    alert('Error');
                }
            });
        }
    });
");
?>

<!-- PAGE HEADER-->
<div class="row">
    <div class="col-sm-12">
        <div class="page-header mb0">
            <h1>Search Suppliers for Client</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="page-header custom">
          <h3><?php echo (!empty($client->clientProfiles->users->company_name)) ? $client->clientProfiles->users->company_name : "Not Provided"; ?> <small>Client Company</small></h3>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="page-header custom">
          <h3><?php echo (!empty($client->name)) ? $client->name : "Not Provided"; ?> <small>Project Name</small></h3>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 header-details">
        Skills Required :
        <?php 
            $requiredSkills = $client->clientProjectsHasSkills;
            foreach ($requiredSkills as $toSkills) {
                echo "[" . CHtml::link($toSkills->skills->name, array('/admin/skills/view', 'id'=>$toSkills->skills->id)) . "] ";
            }
        ?>
        &nbsp; &middot; &nbsp;
        Services Required :
        <?php 
            $requiredServices = $client->clientProjectsHasServices;
            foreach ($requiredServices as $toServices) {
                echo "[" . CHtml::link($toServices->services->name, array('/admin/services/view', 'id'=>$toServices->services->id)) . "] ";
            }
        ?>
        &nbsp; &middot; &nbsp;
        Industries Required :
        <?php 
            $requiredIndustries = $client->clientProjectsHasIndustries;
            foreach ($requiredIndustries as $toIndustries) {
                echo "[" . CHtml::link($toIndustries->industries->name, array('/admin/industries/view', 'id'=>$toIndustries->industries->id)) . "] ";
            }
        ?>
    </div>
</div>

<!-- list of selected suppliers -->
<div class="row">
    <div class="col-sm-12 full-width">
        <div class="box border custom-table p20">
            <?php
            foreach ($suppliers as $supplier) {
            ?>
                <div class="media">
                    <div class="media-left media-top pull-left">
                        <img class="media-object" src="<?php echo (!isset($supplier->image) || empty($supplier->image) || is_null($supplier->image)) ? Yii::app()->theme->baseUrl . '/adminPanel/img/user.png' : $supplier->image; ?>" alt="Supplier's Image" width="100px" height="100px">
                    </div>
                    <div class="media-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="media-heading"><?php echo CHtml::link((empty($supplier->users->company_name))?'Not Provided':$supplier->users->company_name, array('/admin/users/view', 'id'=>$supplier->users->id)); ?></h4>
                                <p>
                                    <i class="fa fa-map-marker"></i>
                                    <span><?php echo (!empty($supplier->location)) ? $supplier->location : "Not Provided."; ?></span>
                                </p>
                                <p>
                                    <?php
                                    $portfolios = $supplier->suppliersHasPortfolios;
                                    $aSkill = ""; $skillsTrace = array();
                                    foreach ($portfolios as $portfolio) {
                                        $skills = $portfolio->suppliersHasPortfolioHasSkills;
                                        foreach ($skills as $skill) {
                                            if(!in_array($skill->skills->id, $skillsTrace)) {
                                                $aSkill .= CHtml::link($skill->skills->name, array('/admin/skills/view', 'id'=>$skill->skills->id), array('class'=>'label vpblue')).' ';
                                                $skillsTrace[] = $skill->skills->id;
                                            }
                                        }
                                    }
                                    $aSkill = rtrim($aSkill, ', ');
                                    echo $aSkill;
                                    ?>
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <p>
                                    <strong>Services</strong><br/>
                                    <?php
                                    $aServices = ""; $servicesTrace = array();
                                    foreach ($portfolios as $portfolio) {
                                        $services = $portfolio->suppliersHasPortfolioHasServices;
                                        foreach ($services as $service) {
                                            if(!in_array($service->services->id, $servicesTrace)) {
                                                $aServices .= CHtml::link($service->services->name, array('/admin/services/view', 'id'=>$service->services->id), array('class'=>'label vpblue')).' ';
                                                $servicesTrace[] = $service->services->id;
                                            }
                                        }
                                    }
                                    $aServices = rtrim($aServices, ', ');
                                    echo $aServices;
                                    ?>
                                </p>
                                <p>
                                    <strong>Industries</strong><br/>
                                    <?php
                                    $aIndustries = ""; $industriesTrace = array();
                                    foreach ($portfolios as $portfolio) {
                                        $industries = $portfolio->suppliersPortfolioHasIndustries;
                                        foreach ($industries as $industry) {
                                            if(!in_array($industry->industries->id, $industriesTrace)) {
                                                $aIndustries .= CHtml::link($industry->industries->name, array('/admin/industries/view', 'id'=>$industry->industries->id), array('class'=>'label vpblue')).' ';
                                                $industriesTrace[] = $industry->industries->id;
                                            }
                                        }
                                    }
                                    $aIndustries = rtrim($aIndustries, ', ');
                                    echo $aIndustries;
                                    ?>
                                </p>
                            </div>
                            <div class="col-sm-2">
                                <div class="slideThree">
                                <?php
                                  echo CHtml::checkbox("Suppliers[selected][$supplier->id]", false, array(
                                                'value'=>'1',
                                                'id'=>"supplier".$supplier->id,
                                                'class'=>'selectSupplier',
                                                'data-url'=>Yii::app()->createUrl('/admin/clientProjects/addSupplier'),
                                                'data-project'=>Yii::app()->getRequest()->getQuery('pid'),
                                                'data-supplier'=>$supplier->id,
                                              ));
                                  echo CHtml::label("", "supplier".$supplier->id);
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                <hr class="separator" />
            <?php
            }
            ?>
        </div>
    </div>
</div>