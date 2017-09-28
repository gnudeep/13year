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
                            <label class="form-label required">Title</label>
                            <select id="title" class="form-control show-tick" name="title" required>
                                <option value="">-- Please select --</option>
                                <option value="Mr.">Mr. </option>
                                <option value="Mrs.">Mrs. </option>
                                <option value="Ms.">Ms. </option>
                            </select>
                        </div>
                        <label for="name" class="required">User Full Name With Initials</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="in_name" required>
                                <label class="form-label">User Full Name With Initials</label>
                            </div>
                        </div>
                        <label for="name" class="required">User Name</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="u_name" required>
                                <label class="form-label">User Name</label>
                            </div>
                        </div>
                        <label for="name" class="required">Passsword</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="password" class="form-control" name="passwd" required>
                                <label class="form-label">Passsword</label>
                            </div>
                        </div><br>
                        <button class="btn btn-danger waves-effect" type="reset">RESET</button>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div>

        <!-- #END# Basic Validation -->
    </div>
</section>

<!-- Select Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>

<script>
    $(document).ready(function () {
        $('.telephone').inputmask('999-9999999', { placeholder: '___-_______' });
        $(".required").append("<span class='col-red'> *</span>");

        $('#addTeacherForm').validate({
            rules: {
                'checkbox': {
                    required: true
                },
                'gender': {
                    required: true
                }
            },
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            }
        });

</script>
