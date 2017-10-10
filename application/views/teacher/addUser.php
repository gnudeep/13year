<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/28/17
 * Time: 4:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> ADD USER </h2>
            </div>
            <!-- Basic Validation -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> USER DETAILS </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open('sadmin/addNewTeacher', 'role="form" id="addTeacherForm"'); ?>
                            <!--<label for="name" class="required">Teacher Name</label>-->
                            <div class="form-group form-float">
                                <label class="form-label required"> Role </label>
                                <select id="role" class="form-control show-tick" name="role" required>
                                    <option value="">-- Please select --</option>
                                    <option value="2"> Finance Administrator </option>
                                    <option value="3"> Class Teacher </option>
                                </select>
                            </div>
                            <div class="form-group form-float teacher hidden">
                                <label class="form-label required"> Class Teacher </label>
                                <select id="teacher" class="form-control show-tick" name="teacher">
                                    <option value="">-- Please select --</option>
                                <?php if($teachers){ ?>
                                    <?php foreach ($teachers as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['teacher_in_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                                </select>
                            </div>
                            <!--<div class="form-group form-float finance">
                                <label class="form-label required">Title</label>
                                <select id="title" class="form-control show-tick" name="title" required>
                                <option value="">-- Please select --</option>
                                <option value="Mr.">Mr. </option>
                                <option value="Mrs.">Mrs. </option>
                                <option value="Ms.">Ms. </option>
                            </select>
                            </div>-->
                            <label for="name" class="required finance">User Full Name With Initials</label>
                            <div class="form-group form-float finance">
                                <div class="form-line">
                                    <input type="text" id="in_name" class="form-control" name="in_name" required>
                                    <label class="form-label">User Full Name With Initials</label>
                                </div>
                            </div>
                            <label for="uname" class="required">User Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="u_name" class="form-control" name="u_name" required>
                                    <label class="form-label">User Name</label>
                                </div>
                            </div>
                            <label for="name" class="required">Passsword</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" id="password" class="form-control" id="password" name="passwd" required>
                                    <label class="form-label">Passsword</label>
                                </div>
                            </div>
                            <label for="name" class="required">Re Type Passsword</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="re_passwd" required>
                                    <label class="form-label">Re Type Passsword</label>
                                </div>
                            </div><br>
                            <button class="btn btn-danger waves-effect" type="reset">RESET</button>
                            <button class="btn btn-primary waves-effect" type="button" id="submit">SUBMIT</button>
                            <?php echo form_close()?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Form -->
        </div>
    </section>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js "?>"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js "?>"></script>

    <script>
        $(document).ready(function() {
            
            $(".required").append("<span class='col-red'> *</span>");

            $('#addTeacherForm').validate({
                rules: {
                    're_passwd': {
                        equalTo: "#password"
                    }
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
            
            $('#role').change(function(){
                var role = $(this).val();
                if (role == '2'){
                    $('.finance').removeClass("hidden");
                    $('.teacher').addClass("hidden");
                }else if(role == '3'){
                    $('.finance').addClass("hidden");
                    $('.teacher').removeClass("hidden");
                }
            });
            

            $('#submit').click(function(){
                var form_data = new FormData();
                var role = $('#role').val();
                var teacher_id = $('#teacher').val();
                var teacher_name = $('#teacher :selected').text();
                var in_name = $('#in_name').val();
                var u_name = $('#u_name').val();
                var password = $('#password').val();

                var post_url = "index.php/sadmin/createNewUser/2";
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('role', role);
                form_data.append('teacher_id', teacher_id);
                form_data.append('teacher_name', teacher_name);
                form_data.append('in_name', in_name);
                form_data.append('u_name', u_name);
                form_data.append('password', password);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        getMainBranch(work_place_id);
                    }
                });

            });
        });

    </script>
