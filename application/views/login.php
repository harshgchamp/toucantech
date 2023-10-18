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
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>ToucanTech Panel</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="description" content="ToucanTech Panel"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link href="<?php echo GLOBAL_ASSETS_URL; ?>css/pages/login/login-1.css" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo GLOBAL_ASSETS_URL; ?>css/style.bundle.min.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="<?php echo GLOBAL_ASSETS_URL; ?>media/logos/favicon.png"/>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  id="kt_body"  class="header-fixed header-mobile-fixed subheader-enabled page-loading"  >
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
                <!--begin::Aside-->
                <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #fff;">
                    <!--begin::Aside Top-->
                    <div class="d-flex flex-column-auto flex-column" style="padding-top:100px;">
                        <!--begin::Aside header-->
                        <a href="#" class="text-center mb-10">
                            <img src="<?php echo GLOBAL_ASSETS_URL; ?>media/logos/admin-logo.png" title="ToucanTech Panel" alt="ToucanTech Panel" style="width: 250px;"/>
                        </a> 
 
                        <h4 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color:#000;font-size:20!important;"><br/>A single system for smarter community management
                        </h4>
                        <!--end::Aside title-->
                    </div>
                    <!--end::Aside Top-->

                    <!--begin::Aside Bottom-->
                    <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center"></div>
                    <!--end::Aside Bottom-->
                </div>
                <!--begin::Aside--> 
                <!--begin::Content-->
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin">
                            
                            <!--begin::Form-->
                            <form class="form" novalidate="novalidate" method="post" action="<?php echo base_url('auth/login'); ?>"  id="kt_login_signin_form">
                                <!--begin::Title-->

                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">ToucanTech Panel</h3>
                                     
                                    <p style="color:#FF0000;"><?php echo $this->session->flashdata('error'); ?></p>
                                    <p style="color:#00ff80;"><?php echo $this->session->flashdata('success'); ?></p>
                                </div>
                                <!--begin::Title-->

                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email *</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email" autocomplete="off"/>
                                </div>
                                <!--end::Form group-->

                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password *</label> 
                                    </div> 
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off"/>
                                </div>
                                <!--end::Form group--> 
                                <!--begin::Action-->
                                <div class="pb-lg-0 pb-5">
                                    <input type="hidden" name="<?php echo $csrf['name'];?>" value="<?php echo $csrf['hash'];?>" /> 
                                    <button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button> 

                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin--> 
                    </div>
                    <!--end::Content body--> 
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
<?php
ob_end_flush();
?>
        <script src="<?php echo GLOBAL_ASSETS_URL; ?>plugins/global/plugins.bundle.js"></script>
        <script src="<?php echo GLOBAL_ASSETS_URL; ?>js/scripts.bundle.js"></script> 

        <!--begin::Page Scripts(used by this page)-->
        <script src="<?php echo GLOBAL_ASSETS_URL; ?>js/pages/custom/login/login-general.js?v=1.0"></script>
         
    </body>
    <!--end::Body-->
</html>