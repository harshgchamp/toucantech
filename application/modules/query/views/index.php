<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper flex-row-fluid" style="padding: 0 100px 0 100px;" > 
    <!--begin::Card-->
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
                        <img src="<?php echo GLOBAL_ASSETS_URL; ?>uploads/tasks/QueryTask.png" alt="PrintNumber Task" class="img-fluid" title="PrintNumber Task" style="border: 1px solid #000" />
                    </div>  

                    <div style=" width:50%;float:left;margin-left:50px; ">  
                        <h4>Solution: 
                        <pre>
                        SELECT 
                        emails.emailaddress
                    FROM
                        emails  
                    INNER JOIN profiles ON
                        emails.userRefId = profiles.userRefId
                    WHERE
                        profiles.deceased = 0
                    GROUP BY
                        profiles.userRefId,
                        emails.emailaddress
                    HAVING COUNT(*) > 1 AND SUM(emails.default) > 0;
                        </pre>
                        </h4>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div> 