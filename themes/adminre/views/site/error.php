<section id="main" role="main">
            <!-- START Template Container -->
            <section class="container">
                <!-- START row -->
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="panel panel-minimal" style="margin-top:10%;">
                            <!-- Upper Text -->
                            <div class="panel-body text-center">
                                <i class="ico-file-remove2 longshadow fsize112 text-default"></i>
                            </div>
                            <div class="panel-body text-center">
                                <h1 class="semibold longshadow text-center text-default fsize32 mb10 mt0">WHOOPS!!</h1>
                                <h4 class="semibold text-primary text-center nm">Something went wrong...</h4>
                            </div>
                            <!--/ Upper Text -->

                            <!-- Button -->
                            <div class="panel-body text-center">
                            
<h2>Error </h2>
<div class="error">
<?php 

CVarDumper::dump($error,10,1);

?>
</div>



                            
                            <?php echo CHtml::link('Back To Home', array('/site/index'),array('class'=>"btn btn-default mb5"));?>
                               <!-- <span class="semibold text-default hidden-xs">&nbsp;&nbsp;OR&nbsp;&nbsp;</span>
                                <a href="javascript:void(0);" class="btn btn-success mb5">Report This Problem</a>-->
                            </div>
                            <!--/ Button -->
                        </div>
                    </div>
                </div>
                <!--/ END row -->
            </section>
            <!--/ END Template Container -->
        </section>