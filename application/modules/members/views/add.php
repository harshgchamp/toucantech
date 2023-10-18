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
                        Add <?php echo ucwords(strtolower($title)); ?>
                    </h3> 
                </div>
                <!--begin::Form-->

                <form class="form" id="kt_form_1" method="post"  action="<?php echo base_url($module_name . '/add'); ?>" enctype="multipart/form-data" >
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="member_email" class="col-form-label text-right col-lg-3 col-sm-12">Email <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="email"   class="form-control form-control-lg form-control-solid" name="member_email" placeholder="Enter Email" id="member_email" value="<?php echo (isset($post['member_email']) && $post['member_email'] != '' ) ? $post['member_email'] : ''; ?>" /> 
                                <span  id="member_email" class="error" for="client_email" style="color:#F76469;"><?php echo form_error('member_email'); ?></span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="member_name" class="col-form-label text-right col-lg-3 col-sm-12">Full Name <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <input type="text" class="form-control form-control-lg form-control-solid" name="member_name" placeholder="Enter Full Name" id="member_name" value="<?php echo (isset($post['member_name']) && $post['member_name'] != '' ) ? $post['member_name'] : ''; ?>" /> 
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="school_id" class="col-form-label text-right col-lg-3 col-sm-12">School <span class="red-star">*</span></label>
                            <div class="col-lg-9 col-md-9 col-sm-12">
                                <select class="form-control form-control-lg form-control-solid select2"  id="school_id"  multiple="multiple" name="school_id[]"  style="width: 100%">
                                    <option value="" disabled>Select School</option>
                                    <?php
                                    $selected = "";
                                    foreach ($schools_list as $k => $v) {
                                        if (isset($post['school_id'])) {
                                            if ($v['id'] == $post['school_id']) {
                                                $selected = " selected ";
                                            } else {
                                                $selected = " ";
                                            }
                                        }
                                        ?>
                                        <option  value="<?php echo $v['id']; ?>" <?php echo $selected; ?>><?php echo $v['school_name']; ?></option><?php } ?>

                                </select>
                            </div>
                        </div>


                    </div> 

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" /> 
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
                            "school_id[]": {
                                validators: {
                                    notEmpty: {
                                        message: 'School is required'
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

    var KTSelect2 = function () {
        // Private functions
        var demos = function () {
            // multi select
            $('#school_id').select2({
                placeholder: "Select School",
            });
        }
        // Public functions
        return {
            init: function () {
                demos();
            }
        };
    }();

// Initialization
    jQuery(document).ready(function () {
        KTSelect2.init();
    });

    // Initialization  
    jQuery(document).ready(function () {
        KTFormControls.init();
        KTSelect2.init();
    });
</script>
