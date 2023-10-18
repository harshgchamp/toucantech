<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--begin::Row--> 
<div class="content-wrapper flex-row-fluid" style="padding-left: 100px;padding-right: 100px;">
    <!--begin::Row--> 
    <div class="row">
        <div class="col-xl-3"> 
            <div class="card card-custom bg-light-success card-stretch gutter-b"> 
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-success">
                        <img src="<?php echo GLOBAL_ASSETS_URL; ?>media/images/clients.png" alt="Total Schools" title="Total Schools" />
                    </span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $total_schools; ?></span>
                    <span class="font-weight-bold text-muted  font-size-sm">Total Schools</span>
                </div> 
            </div> 
        </div>
        <div class="col-xl-3"> 
            <div class="card card-custom bg-light-danger card-stretch gutter-b"> 
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-danger"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $total_members; ?></span>
                    <span class="font-weight-bold text-muted font-size-sm">Total  Members</span>
                </div> 
            </div> 
        </div>
        <div class="col-xl-3"> 
            <div class="card card-custom bg-light-info card-stretch gutter-b"> 
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-info"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $total_active_schools; ?></span>
                    <span class="font-weight-bold text-muted  font-size-sm">Active Schools</span>
                </div> 
            </div> 
        </div>
        <div class="col-xl-3"> 
            <div class="card card-custom bg-light-warning card-stretch gutter-b"> 
                <div class="card-body">
                    <span class="svg-icon svg-icon-2x svg-icon-warning"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
                                <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
                                <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
                                <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                    <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo $total_active_members; ?></span>
                    <span class="font-weight-bold text-muted  font-size-sm">Active Members</span>
                </div> 
            </div> 
        </div>
        <div class="card-body">
            <h3 class="card-title">
                Latest Log Activity
            </h3>  
            <table class="table table-bordered table-hover table-checkable" id="kt_datatable2">
                <thead>
                    <tr>
                        <th>#</th>  
                        <th>User</th>  
                        <th>Activity</th>  
                        <th>Date</th>    
                        <th>IP Address</th>    
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $count = 1;
                    if (isset($activities) && !empty($activities)) {
                        ?>
                        <?php foreach ($activities as $k => $v) { ?>
                            <tr>
                                <td><?php echo $count++; ?></td>  
                                <td><?php echo $v['full_name']; ?></td> 
                                <td><?php echo $v['activity']; ?></td> 
                                <td><?php echo date("M j, Y, g:i A", strtotime($v['created_at'])); ?></td>    
                                <td><?php echo $v['ip_address'] ?></td>  
                            </tr> 
                        <?php } ?>
                    <?php } ?>
                </tbody> 
            </table> 
        </div>
    </div>
    <!--End::Row-->   
</div>
