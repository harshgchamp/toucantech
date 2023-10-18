<?php
ob_start("minifier"); 
function minifier($code) {
    $search = array(
        // Remove whitespaces after tags
        '/\>[^\S ]+/s',
        // Remove whitespaces before tags
        '/[^\S ]+\</s'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>ToucanTech Panel - <?php echo $title; ?> </title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="description" content="ToucanTech"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!--begin::Fonts-->
        <link href="<?php echo GLOBAL_ASSETS_URL; ?>css/fonts.css?v=1.0" rel="stylesheet" type="text/css"/>
        <link href="<?php echo GLOBAL_ASSETS_URL; ?>plugins/global/plugins.bundle.css?v=1.0" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo GLOBAL_ASSETS_URL; ?>css/style.bundle.min.css?v=1.0" rel="stylesheet" type="text/css"/>

        <link href="<?php echo GLOBAL_ASSETS_URL; ?>plugins/custom/datatables/datatables.bundle.css?v=1.0" rel="stylesheet" type="text/css"/> 
        <link rel="shortcut icon" href="<?php echo GLOBAL_ASSETS_URL; ?>media/logos/favicon.ico"/>
        <script src="<?php echo GLOBAL_ASSETS_URL; ?>plugins/global/plugins.bundle.js?v=1.0"></script>
        <style>
            #toast-container > div {
                opacity:1;
            }
        </style> 
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed page-loading" >
        <!--begin::Main--> 
        <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
            <!--begin::Logo-->
            <a href="<?php echo base_url('members'); ?>" >
                <img alt="ToucanTech" title="ToucanTech" src="<?php echo GLOBAL_ASSETS_URL; ?>media/logos/admin-logo.png" class="max-h-30px" />
            </a>  
        </div> 
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <!--begin::Header-->
                    <div id="kt_header" class="header flex-column  header-fixed " >
                        <!--begin::Top-->
                        <div class="header-top">
                            <!--begin::Container-->
                            <div class=" container ">
                                <!--begin::Left-->
                                <div class="d-none d-lg-flex align-items-center mr-3" style="background-color: #fff;">
                                    <!--begin::Logo-->
                                    <a href="<?php echo base_url('admin/dashboard'); ?>" class="mr-20">
                                        <img alt="ToucanTech - Panel" src="<?php echo GLOBAL_ASSETS_URL; ?>media/logos/admin-logo.png" class="max-h-35px" title="ToucanTech - Panel" />
                                    </a> 
                                </div>  
                                <div class="topbar">  
                                    <div class="topbar-item">
                                        <div class="btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                            <div title="Admin" class="d-flex flex-column text-right pr-3">

                                                <span class="text-white font-weight-bolder font-size-sm d-none d-md-inline">Admin</span>
                                            </div>
                                            <span title="Admin" class="symbol symbol-35">

                                            </span>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="header-bottom"> 
                            <div class=" container "> 
                                <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper"> 
                                    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default " > 
                                        <ul class="menu-nav">
                                            <li class="menu-item"><a title="Dashboard"  href="<?php echo base_url('admin/dashboard'); ?>" class="menu-link"><span class="menu-text">Dashboard</span><span class="menu-desc">Overview and Statistics</span><i class="menu-arrow"></i></a> </li>
                                            <li class="menu-item"><a title="Useful Workflow Tools"  href="<?php echo base_url('admin/tools'); ?>" class="menu-link"><span class="menu-text">Tasks</span><span class="menu-desc">Useful Workflow Tools</span><i class="menu-arrow"></i></a> </li>  
                                        </ul> 
                                    </div> 
                                </div> 
                            </div> 
                        </div>
                    </div>  
                    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
<?php echo $content_for_layout; ?>
                    </div>
                </div>
            </div> 
        </div> 

        <!--begin::Footer-->
        <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
            <!--begin::Container-->
            <div class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->

                <span class="text-muted font-weight-bold mr-2">&copy;<?php echo date("Y"); ?>  All Rights Reserved.</span>
                <span style="text-align: right;" class="text-muted font-weight-bold mr-2"></span> 
            </div>
            <!--end::Container-->
        </div>
        <!--end::Footer-->
    </div></div></div>
<!--end::Main-->

<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">Admin Profile</h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="offcanvas-content pr-5 mr-n5">
        <!--begin::Header-->
        <div class="d-flex align-items-center mt-5">
            <div class="symbol symbol-100 mr-5">
                <?php
                $user_profile_img = GLOBAL_ASSETS_URL . 'media/users/default.jpg';
                ?>
                <div class="symbol-label" style="background-image:url('<?php echo $user_profile_img; ?>')"></div>
                <i class="symbol-badge bg-success"></i>
            </div>
            <div class="d-flex flex-column">
                <div class="navi mt-2"> 
                    <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a> 
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Separator-->
    <div class="separator separator-dashed mt-8 mb-5"></div> 
    <!--end::Content-->
</div>
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
        </g>
        </svg><!--end::Svg Icon--></span>
</div>  
<!--end::Scrolltop-->
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings =  {}; 
    </script>
<!-- ::main file Config-->
<script src="<?php echo GLOBAL_ASSETS_URL; ?>js/scripts.bundle.js?v=1.0"></script>
<!-- ::main file Config-->
<script src="<?php echo GLOBAL_ASSETS_URL; ?>plugins/custom/datatables/datatables.bundle.js?v=1.0"></script>
<script src="<?php echo GLOBAL_ASSETS_URL; ?>js/pages/crud/datatables/extensions/buttons.js?v=1.0"></script>
<!--end::Page Scripts-->

<?php
$toast_success_msg = $toast_error_msg = "";
if ($this->session->userdata('success')) {
    $toast_success_msg = $this->session->userdata('success');
    $this->session->unset_userdata('success');
} elseif ($this->session->userdata('error')) {
    $toast_error_msg = $this->session->userdata('error');
    $this->session->unset_userdata('error');
}
?>
<script>
    $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
     

<?php if ($toast_success_msg) { ?>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn"
        };
        toastr.success("<?php echo $toast_success_msg; ?>");
<?php } elseif ($toast_error_msg) { ?>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn"
        };
        toastr.error("<?php echo $toast_error_msg; ?>");
<?php } ?> 
</script>  
</body>
</html>