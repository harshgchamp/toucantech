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
                    <div style="  width: 45%;  float:left;">   
                        <img src="<?php echo GLOBAL_ASSETS_URL; ?>uploads/tasks/CommentTask.png?1=1" alt="PrintNumber Task" class="img-fluid" title="PrintNumber Task" style="border: 1px solid #000" /> 
                    </div>   
                    <div style=" width:50%;float:left;margin-left: 15px;"> 
                        
                    <pre style="font-size: 13px;">              
     /*
     * function to check the default email-id of given userId is valid or not
     * @return
       -1  => In case of userId is empty or email-id is unavailable
        0  => In case of default email-id format is valid (e.g. @gmail.com) but not 
              the one intended for business logic (e.g. different domain)
        1  => In case of default email-id format is valid and is the intended business email-id
        2  => In case of userId is not in a valid email format or is empty
     */

    private function checkDefaultEmailValid($userId=null) { 

    // Add comment 1 here 
    // If $userId is empty, return -1

    if(empty($userId)) { 

    return -1; 

    } 

    // Add comment 2 here 
    // retrieve array defaultEmail with email and respective attributes like 
    // validated_on and valid for given userId by custom method

    $defaultEmail = $this->getDefaultEmailByUserId($userId); 

    // Add comment 3 here 
    // If there is no defaultEmail associated with userId, will try to assign a 
    // default email based on business logic and retrieve the same again.

    if(empty($defaultEmail))  
    { 

    $this->set_default_email($userId); 

    $defaultEmail = $this->getDefaultEmailByUserId($userId);

    } 

    // Add comment 4 here 
    // If still not able to retrieve a defaultEmail, return -1 for invalid input

    if(empty($defaultEmail)) 

    { 

    return -1; 

    } 

    // Add comment 5 here 
    // If email-id format is valid and validated by the business logic within
    // the last 12 months, return 1 without validating the email again.

    if($defaultEmail['valid']>=1 && ($defaultEmail['validated_on'] > 
    (time() - strtotime('-12 months')))) 

    { 

    return 1; 

    } 

    // Add comment 6 here 
    // retrieve the default email from array defaultEmail 

    $email = $defaultEmail['email']; 

    // Add comment 7 here 
    // If email-id has invalid format or empty, return 2. 

    if (empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) { 

    return 2; 

    } 

    // Add comment 8 here 
    // if email-id has valid format and validate again by business logic 

    $validationResults = $this->checkIfValid($email); 

    // Add comment 9 here 
    // if email-id is valid (format,business purposes) return 1 else return 0. 

    if( ! $validationResults ) { 

    return 0; 

    } else { 

    return 1; 

    } 

    } 
    </pre>  
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div> 