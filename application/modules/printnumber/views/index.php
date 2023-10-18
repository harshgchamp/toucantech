<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper flex-row-fluid" style="padding: 0 100px 0 100px;" >
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <?php echo ucwords(strtolower($title)); ?>
                        </h3>
                    </div> 
                </div>
                <div class="card-body">   
                    <div style="  width: 45%; height: 550px; float:left;">   
                        <img src="<?php echo GLOBAL_ASSETS_URL; ?>uploads/tasks/PrintNumber.png" alt="PrintNumber Task" class="img-fluid" title="PrintNumber Task" style="border: 1px solid #000" />
                    </div>  

                    <div style=" width:50%;float:left;margin-left:50px; ">  
                        <h3>Solution: </h3>
                        <p>
                        <?php
                        for ($i = 1; $i <= 100; $i++) {
                            $output = "";

                            if ($i % 3 === 0 && $i % 5 === 0) {     /* Alternate:  if ( $i % 15 === 0 )  */
                                $output = "ToucanTech";
                            } elseif ($i % 3 === 0) {
                                $output = "Toucan";
                            } elseif ($i % 5 === 0) {
                                $output = "Tech";
                            }

                            if ($output === "") {
                                echo $i." ";
                            } else {
                                echo $output." ";
                            } 
                        }
                        ?>
                        </p>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div> 