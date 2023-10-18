<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .seperator{margin-top: 50px;}
</style>
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
                    <div class="card-toolbar"> 
                        <!--begin::Button--> 
                        <a href="<?php echo base_url($module_name . '/add'); ?>" class="btn btn-primary font-weight-bolder">
                            <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" cx="9" cy="15" r="6"/>
                                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>Add <?php echo ucwords(strtolower($title)); ?>
                        </a> 
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">

                    <form id="kt_form_1"  method="post" action="<?php echo base_url($module_name . '/filterRecords'); ?>">
                        <div class="row"> 
                            <div class="col-md-3">
                                <label for="kt_select2_1">School</label> 
                                <select class="form-control form-control-md form-control-solid select2" id="kt_select2_1" name="school_id" >
                                    <option value="" selected>Select School</option>
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
                                        <option <?php echo $selected; ?> value="<?php echo $v['id']; ?>"   ><?php echo $v['school_name']; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>

                            <div class="col-md-3">
                                <label for="kt_select2_2">Country</label> 
                                <select class="form-control form-control-md form-control-solid select2" id="kt_select2_2" name="country_iso" >
                                    <option value="" selected>Select Country</option>
                                    <?php
                                    $selected = "";
                                    foreach ($countries_iso_list as $k => $v) {
                                        if (isset($post['country_iso'])) {
                                            if ($k == $post['country_iso']) {
                                                $selected = " selected ";
                                            } else {
                                                $selected = " ";
                                            }
                                        }
                                        ?>
                                        <option <?php echo $selected; ?> value="<?php echo $k; ?>" ><?php echo $v . ' (' . $k . ')'; ?></option>
                                    <?php } ?>
                                </select> 
                            </div>
                            <div class="card-footer" style="border-top:none;">
                                <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /> 
                                <div class="col-lg-12">
                                    <button  type="button" name="submit_btn" value="submit_btn" class="btn btn-primary btn-primary--icon" id="submit_btn">
                                        <span>
                                            <i class="la la-search"></i>
                                            <span>Search</span>
                                        </span>
                                    </button>
                                    &nbsp;&nbsp;
                                    <button type="reset" class="btn btn-secondary btn-secondary--icon" id="kt_reset" onclick="location.href = '<?php echo base_url($module_name); ?>'">
                                        <span>
                                            <i class="la la-close"></i>
                                            <span>Reset</span>
                                        </span>
                                    </button>
                                    &nbsp;&nbsp;
                                    <?php
                                    if (isset($post['download_filter_btn']) || 1) {
                                        ?>
                                        <input type="hidden" id="download_btn_val" name="download_btn_val" value="1" />
                                        <button type="button" name="download_btn"  class="btn btn-primary btn-primary--icon" id="download_btn">
                                            <span>
                                                <i class="la la-cloud-download"></i>
                                                <span>Download</span>
                                            </span>
                                        </button>
                                        &nbsp;&nbsp;
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable2">
                        <thead>
                            <tr>
                                <th>#</th> 
                                <th>School Name</th>
                                <th>Country</th>
                                <th>Member Name</th>
                                <th>Email</th> 
                                <th>Status</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            if (isset($records) && !empty($records)) {
                                ?>
                                <?php foreach ($records as $k => $v) { ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $v['school_name']; ?></td>
                                        <td><?php echo country_iso_list($v['country_iso']); ?></td>
                                        <td><?php echo $v['member_name']; ?></td>
                                        <td><?php echo $v['member_email']; ?></td>
                                        <td>
                                            <?php if (isset($v['status']) && $v['status'] == 1) { ?>
                                                <span class="label label-lg font-weight-bold label-light-primary label-inline"><?php echo get_record_status($v['status']); ?></span>
                                            <?php } elseif (isset($v['status']) && $v['status'] == 0) { ?>
                                                <span class="label label-lg font-weight-bold label-light-danger label-inline"><?php echo get_record_status($v['status']); ?></span>
        <?php } ?>
                                        </td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <tr> <th colspan="7" class="text-center">No Record Found</th></tr>
<?php } ?> 
                        </tbody>
                    </table>
                    
                    <div class="seperator"></div>
                    <h3>School Members</h3>
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable2">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>School Name</th>
                                <th>Total Members</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count = 1;
                            if (isset($school_members) && !empty($school_members)) {
                                ?>
                                    <?php foreach ($school_members as $k => $v) { ?>
                                    <tr> 
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $v['school_name']; ?></td>
                                        <td><?php echo $v['total_members']; ?></td>
                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <tr> <th colspan="7" class="text-center">No Record Found</th></tr>
<?php } ?> 
                        </tbody>
                    </table>
                    
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
<script>

    var KTSelect2 = function () {
        var selects = function () {
            $('#kt_select2_1').select2({
                placeholder: "Select School"
            });
            $('#kt_select2_2').select2({
                placeholder: "Select Country"
            });

        }
        return {
            init: function () {
                selects();
            }
        };
    }();

    // Initialization  
    jQuery(document).ready(function () {
        KTSelect2.init();
        KTFormControls.init();
    });

    $(document).ready(function () {
        $('#submit_btn').click(function (e) {  
            $('#download_btn_val').val('0');
            $('#kt_form_1').submit();
        }); 
        
        $('#download_btn').click(function (e) { 
            $('#download_btn_val').val('1');
            $('#kt_form_1').submit();
        });
    });
</script>