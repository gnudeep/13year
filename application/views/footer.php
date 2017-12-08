<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 10/30/17
 * Time: 2:58 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>


    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header bg-teal">
                    <h3 class="modal-title" id="profileModalLabel">User Profile</h3>
                </div>
                <div class="modal-body">
                    
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#profile_details" data-toggle="tab">
                                <i class="material-icons">face</i> PROFILE
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#profile_edit" data-toggle="tab">
                                <i class="material-icons">edit</i> EDIT
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#passwd_change" data-toggle="tab">
                                <i class="material-icons">repeat</i> CHANGE PASSWORD
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="profile_details">
                            <div class="col-md-12">
                                <div class="row clearfix">
                                    <div class="col-md-3 form-control-label p-l-0">
                                        <label for="email_address_2">Name with Initials</label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $this->session->name; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-3 form-control-label p-l-0">
                                        <label for="email_address_2">Role</label>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $this->session->role_name; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile_edit">
                            <?php echo form_open('', 'role="form" id="profileEditForm"'); ?>
                            <input type="hidden" class="form-control" id="user_id" value="<?php echo $this->session->user_id; ?>">
                            <div class="row clearfix">
                                <div class="col-md-3 form-control-label p-l-0">
                                    <label >Name with Initials</label>
                                </div>
                                <div class="col-md-7 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="profile_in_name" value="<?php echo $this->session->name; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" id="submit_profileChange" >
                                        <i class="material-icons">subdirectory_arrow_left</i>
                                    </button>
                                </div>
                            </div>
                            <div class="row clearfix align-right">
                                
                            </div>
                            <?php echo form_close()?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="passwd_change">
                            <?php echo form_open('', 'role="form" id="passwdResetForm"'); ?>
                            <div class="row clearfix">
                                <div class="col-md-3 form-control-label p-l-0">
                                    <label> New Password </label>
                                </div>
                                <div class="col-md-7 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="profile_passwd" id="profile_passwd" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3 form-control-label p-l-0">
                                    <label> ReType Password </label>
                                </div>
                                <div class="col-md-7 ">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name ="profile_repasswd" id="profile_repasswd" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 ">
                                    <button type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float" id="submit_passwdReset" >
                                        <i class="material-icons">subdirectory_arrow_left</i>
                                    </button>
                                    <!-- <button type="button" class="btn btn-primary waves-effect">SUBMIT</button> -->
                                </div>
                            </div>
                            <?php echo form_close()?>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect bg-teal" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

<!--</div>
        <footer class="footerOutBox" style="background-color:#363636; color:#fff;">
            <div class="row push">
                <div class="col-md-12">
                        <center>
                            &copy; 2107-All Rights Reserved with Data Management Branch, Ministry of Education, Sri Lanka.<br>
                            T.P/Fax 011-2075854 | email: <a href="mailto:director.dmr@moe.gov.lk" >director.dmr@moe.gov.lk</a>

                        </center>
                </div>
            </div>
</footer>-->

    <script src="<?php echo base_url()."assets/js/script.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/momentjs/moment.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/node-waves/waves.js"?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-validation/jquery.validate.js"?>"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.min.js"?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/js/admin.js"?>"></script>


    <script>
        $(document).ready(function (){

            $.validator.addMethod("PASSWORD",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}$/i.test(value);
            },"Passwords are 8-25 characters with uppercase letters, lowercase letters and at least one number.");

            $('#passwdResetForm').validate({
                rules: {
                    profile_passwd : {required :true, PASSWORD: true},
                    profile_repasswd: { equalTo: "#profile_passwd" }
                },
                highlight: function(input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function(input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function(error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });
            
            $('#submit_profileChange').click(function(){
                var form_data = new FormData();
                
                var user_id = $('#user_id').val();
                var in_name = $('#profile_in_name').val();

                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('edit', 'name');
                form_data.append('user_id', user_id);
                form_data.append('in_name', in_name);

                if($('#profileEditForm').valid()){
                    var post_url = "admin/editProfile/2";
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            $('#header_username').text(in_name);
                            alert('Success');
                        },
                        error: function (response) {
                            alert("Error Updating! Please try again.");
                        }
                    });
                }
            });
            
            $('#submit_passwdReset').click(function(){
                var form_data = new FormData();
                
                var user_id = $('#user_id').val();
                var passwd = $('#profile_passwd').val();

                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('edit', 'passwd');
                form_data.append('user_id', user_id);
                form_data.append('passwd', passwd);

                if($('#passwdResetForm').valid()){
                    var post_url = "admin/editProfile/2";
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            alert('Success');
                        },
                        error: function (response) {
                            alert("Error Updating! Please try again.");
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>

