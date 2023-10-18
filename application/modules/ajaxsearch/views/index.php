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

                    <form id="kt_form_1"  method="post" action="<?php echo base_url($module_name . '/filterRecords'); ?>">
                        <div class="row"> 
                            <div class="col-md-3">
                                <label for="search_name">Name</label> 
                                <input type="text" class="form-control form-control-lg form-control-solid" name="search_name" placeholder="Enter Name" id="search_name" />
                                <small>e.g.: john</small>
                            </div> 
                            <div class="card-footer" style="border-top:none;">
                                <div class="col-lg-12">
                                    <button  type="button" class="btn btn-primary btn-primary--icon" id="searchBtn">
                                        <span>
                                            <i class="la la-search"></i>
                                            <span>Search</span>
                                        </span>
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </form> 
                    <div id="search-results"></div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
<script>
    $(document).ready(function () {
        $('#searchBtn').click(function (e) {
            let csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
            let csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
            let search_name = $("#search_name").val();
            if (search_name === '') {
                $("#search_name").css("border", "1px solid #F97F73");
                $("#search_name").focus();
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxsearch/search'); ?>",
                    data: {search_term: search_name, [csrfName]: csrfHash},
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        let table = '<table class="table table-bordered">';
                        if (data.message) {
                            // Display  "No records found" result message
                            table += '<tr><th>' + data.message + '</th></tr>';
                        } else {
                            table += '<tr><th>#</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>';
                            // Loop through the results and table rows
                            $.each(data, function (index, record) {
                                table += '<tr><td>' + (index + 1) + '</td><td>' + record.Firstname + '</td><td>' + record.Surname + '</td><td>' + record.emailaddress + '</td></tr>';
                            });
                        }
                        table += '</table>';

                        // Displaying results in html
                        $("#search_name").css("border", "1px solid #efefef");
                        $('#search-results').html(table);
                    }
                });
            }
        });
    });
</script> 