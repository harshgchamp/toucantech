<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .thumb{
        margin: 10px 5px 0 0;
        min-height: 100px;
        max-height: 100px;
        min-width: 100px;
        max-width: 100px;
    }
    .tableLabel label{
        margin-bottom: 0;
    }
    .table td, .table th{
        border: 1px solid #E4E6EF;
    }
    .toolsactive{
        background-color: #F64E60;
    }
    .font-weight-bold{
        font-weight: 600 !important;
    }
</style>
<div class="content-wrapper flex-row-fluid" style="padding-left: 100px;padding-right: 100px;"> 
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Nav Panel Widget 2-->
            <div class="card card-custom gutter-b">
                <!--begin::Body-->
                <div class="card-body ">
                    <!--begin::Nav Tabs-->
                    <?php if (isset($tools) && count($tools) > 0) { ?>
                        <ul class="dashboard-tabs nav nav-pills nav-danger row row-paddingless m-0 p-0" role="tablist">
                            <!--begin::Item-->
                            <?php
                            foreach ($tools as $k => $v) {  ?> 
                                <li class="nav-item d-flex col flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                    <a  title="<?php echo ucwords(strtolower($v['module_display_name'])); ?>" class="<?php echo $v['module_slug']; ?> nav-link border py-10 d-flex flex-grow-1 rounded flex-column align-items-center" href="<?php echo base_url($v['module_slug']); ?>" onmouseover="red('<?php echo $v['module_slug']; ?>');" onmouseout="redout('<?php echo $v['module_slug']; ?>');" > 
                                        <span class="nav-text font-size-lg py-2 font-weight-bold text-center">
                                            <?php echo ucwords(strtolower($v['module_display_name'])); ?>
                                        </span>
                                    </a>
                                </li> 
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
                <!--end::Body-->
            </div> 
        </div>
    </div>
</div><!--end row-->
<script>
    function red(v) {
        $("." + v + ".nav-link").addClass("active");
        $("#" + v).hide();
        $("#" + v + "_1").show();
    }

    function redout(v) {
        $("." + v + ".nav-link").removeClass("active");
        $("#" + v).show();
        $("#" + v + "_1").hide();

    }
</script>