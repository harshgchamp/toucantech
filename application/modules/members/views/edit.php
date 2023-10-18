<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
?>  
<div class="content-wrapper flex-row-fluid" style="padding: 0 100px 0 100px;">
    <!--begin::Card-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Card-->
            <div class="card card-custom ">
                <div class="card-header">
                    <h3 class="card-title">
                        Edit <?php echo ucwords(strtolower($title)); ?>
                    </h3> 
                </div>
                <!--begin::Form-->
                
                <form class="form" id="kt_form_1" method="post"  action="<?php echo base_url($module_name .  '/edit'); ?>" enctype="multipart/form-data" >
                    <div class="card-body"> 
                        
                        <div class="form-group row">
                            <label for="client_id" class="col-form-label text-right col-lg-3 col-sm-12">Client <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select  class="form-control form-control-lg form-control-solid select2" id="kt_select2_1" name="client_id"    >
                                    <option value="" disabled selected>Select Client</option>
                                                <?php $selected = ""; 
                                                foreach ($clients_list as $k => $v) { 
                                                    if(isset($post['client_id'])){
                                                    if($v['id'] == $post['client_id']){
                                                        $selected = " selected ";
                                                    }else{
                                                        $selected = " ";
                                                    }
                                                    }
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $v['id']; ?>"   ><?php echo $v['client_name']; ?></option>
                                                <?php } ?>
                                </select>
                                <span  id="is_unique_member" class="error" for="is_unique_member" style="color:#F76469;"><?php echo form_error('is_unique_member'); ?></span>
                             </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label for="member_name" class="col-form-label text-right col-lg-3 col-sm-12">Full Name <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text"   class="form-control form-control-lg form-control-solid" name="member_name" placeholder="Enter Full Name" id="member_name" value="<?php echo (isset($post['member_name']) && $post['member_name']!= '' ) ? $post['member_name'] : ''; ?>" /> 
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label for="member_email" class="col-form-label text-right col-lg-3 col-sm-12">Email <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="email"   class="form-control form-control-lg form-control-solid" name="member_email" placeholder="Enter Email" id="member_email" value="<?php echo (isset($post['member_email']) && $post['member_email']!= '' ) ? $post['member_email'] : ''; ?>" /> 
                                <span  id="member_email" class="error" for="client_email" style="color:#F76469;"><?php  echo form_error('member_email'); ?></span>
                                
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="member_mobile" class="col-form-label text-right col-lg-3 col-sm-12">Mobile <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text"   class="form-control form-control-lg form-control-solid" name="member_mobile" placeholder="Enter Mobile" id="member_mobile" value="<?php echo (isset($post['member_mobile']) && $post['member_mobile']!= '' ) ? $post['member_mobile'] : ''; ?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" /> 
                                <span  id="member_mobile" class="error" for="" style="color:#F76469;"><?php echo form_error('member_mobile'); ?></span>
                                
                            </div>
                        </div>
                        
                        <div class="form-group row"> 
                            <label for="member_doj" class="col-form-label text-right col-lg-3 col-sm-12">Date of Joining <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" placeholder="Enter Date of Joining" class="form-control form-control-lg form-control-solid" value="<?php echo (isset($post['member_doj']) && $post['member_doj'] != '0000-00-00' && $post['member_doj'] != '1970-01-01') ? panel_date_show_format($post['member_doj']) : ""; ?>" name="member_doj" id="datepicker1" autocomplete="off" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="member_address" class="col-form-label text-right col-lg-3 col-sm-12">Address</label> 
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <textarea name="member_address" id="member_address" rows="2" placeholder="Enter Address" class="form-control form-control-lg form-control-solid"><?php echo (isset($post['member_address']) && $post['member_address'] != '' ) ? $post['member_address'] : ''; ?></textarea>
                            </div>
                        </div>
                         
                        <div class="form-group row"> 
                            <label for="member_logo" class="col-form-label text-right col-lg-3 col-sm-12">Member Logo</label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input class="form-control form-control-lg form-control-solid" type="file" class="" name="member_logo" id="member_logo">       
                                <br/>
                                <p>Existing Member Logo</p>
                                <?php if (isset($post['member_logo']) && $post['member_logo'] != '') { ?>
                                    <img style="width: 50px;height:50px;" src="<?php echo GLOBAL_ASSETS_URL; ?>uploads/members/<?php echo md5($post['id']) . "." . $post['member_logo']; ?>" class="rounded img-fluid mb-2 profile-img-90-xs"  >
                                <?php } else { ?>
                                    <img  src="<?php echo GLOBAL_ASSETS_URL; ?>media/users/default.jpg" alt="user" class="rounded img-fluid mb-2 profile-img-90-xs"  >
                                <?php } ?>
                            </div>
                        </div> 
                    </div> 
                    
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /> 
                                <input type="hidden" name="edited_id" value="<?php echo enc_val($post['id']); ?>">
                                <a  class="btn btn-default font-weight-bold" name="submitButton" href="<?php echo base_url($module_name); ?>">Back</a>&nbsp;&nbsp;
                                 <button id="checkBtn" type="submit" class="btn btn-primary font-weight-bold mr-2" name="submitButton">Submit</button>
                             </div>
                        </div>
                    </div> 
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div> 
    </div>
</div> 
<script>
    var KTFormControls = function () {
        // Private functions
        var _initDemo1 = function () {
            FormValidation.formValidation(
                    document.getElementById('kt_form_1'),
                    {
                        fields: {
                            member_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Name is required'
                                    }
                                }
                            },
                            member_email: {
                                validators: {
                                    emailAddress: {
                                        message: 'The value is not a valid email address'
                                    },
                                    notEmpty: {
                                        message: 'Email is required'
                                    }
                                    
                                }
                            },  
                            member_mobile: {
                                validators: {
                                    notEmpty: {
                                        message: 'Mobile is required'
                                    },
                                    phone: {
                                        country: 'US',
                                        message: 'The value is not a valid Phone number'
                                    }
                                }
                            },
                            member_doj: {
                                validators: {
                                    notEmpty: {
                                        message: 'DOJ is required'
                                    }
                                }
                            },
                            client_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'Client is required'
                                    }
                                }
                            },
                            
                        },
                        plugins: { 
                            trigger: new FormValidation.plugins.Trigger(), 
                            bootstrap: new FormValidation.plugins.Bootstrap(), 
                            submitButton: new FormValidation.plugins.SubmitButton(), 
                            defaultSubmit: new FormValidation.plugins.DefaultSubmit()
                        }
                    }
            );
        }

        return {
            // public functions
            init: function () {
                _initDemo1();
            }
        };
    }();
   

    // Initialization  
    jQuery(document).ready(function () {
        KTFormControls.init();KTSelect2.init();
    });
    
    $('#datepicker,#datepicker1').datepicker({
     autoclose: true,
     format: 'dd-mm-yyyy'
  });
 
</script>
 