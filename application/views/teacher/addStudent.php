<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 9:42 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> ADD STUDENT </h2>
            </div>
            <!-- Basic Validation -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> STUDENT DETAILS </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open('sadmin/addNewStudent', 'role="form" id="addStudentForm"'); ?>
                            <!--<label for="name" class="required">Student Name</label>-->
                            <label for="std_id" class="required">Index No</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="std_id" required>
                                    <label class="form-label">Student Index No</label>
                                </div>
                            </div>
                            <label for="full_name" class="required">Full Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="full_name" required>
                                    <label class="form-label">Student Full Name</label>
                                </div>
                            </div>
                            <label for="in_name" class="required">Name with Initials</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="in_name" required>
                                    <label class="form-label">Student Name with Initials</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label required">Gender</label>
                                <select id="title" class="form-control show-tick" name="gender" required>
                                <option value="">-- Please select --</option>
                                    <option value="Male"> Male </option>
                                    <option value="Female"> Female </option>
                            </select>
                            </div>
                            <label for="name" class="required">Address</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="1" class="form-control no-resize auto-growth" name="address"></textarea>
                                    <label class="form-label">Address</label>
                                </div>
                            </div>
                            <label for="telephone" class="required">Telephone No</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control telephone" name="telephone" required placeholder="Ex: 000-1234567">
                                </div>
                            </div>
                            <label for="email">Email Address</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="email">
                                    <label class="form-label">Email Address</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label required">Subject 1</label>
                                <select id="title" class="form-control show-tick" name="sub1" required>
                                <option value="">-- Please select --</option>
                            </select>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label ">Subject 2</label>
                                <select id="title" class="form-control show-tick" name="sub2">
                                <option value="">-- Please select --</option>
                            </select>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label ">Subject 3</label>
                                <select id="title" class="form-control show-tick" name="sub3">
                                <option value="">-- Please select --</option>
                            </select>
                            </div>
                            <label for="trained"> Student Training </label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="checkbox" name="trained" id="trained" value="1" />
                                    <label for="trained"> Student has Trained </label>
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
    <script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js "?>"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js "?>"></script>

    <script>
        $(document).ready(function() {
            $('.telephone').inputmask('999-9999999', {
                placeholder: '___-_______'
            });
            $(".required").append("<span class='col-red'> *</span>");

            $('#addStudentForm').validate({
                rules: {
                    'checkbox': {
                        required: true
                    },
                    'gender': {
                        required: true
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
        });

    </script>
