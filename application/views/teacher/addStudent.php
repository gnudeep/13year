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
<link href="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"?>" rel="stylesheet" />

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
                            <?php echo form_open('teacher/addNewStudent', 'role="form" id="addStudentForm"'); ?>
                            <div class="col-md-6">
                                <!--<label for="name" class="required">Student Name</label>-->
                                <label for="std_id" class="required">Index No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="index_no" required>
                                        <label class="form-label">Student Index No</label>
                                    </div>
                                </div>
                                <label for="nic" class="required">NIC No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nic" required>
                                        <label class="form-label">Student NIC No</label>
                                    </div>
                                </div>
                                <label for="in_name" class="required">Name with Initials</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="in_name" required>
                                        <label class="form-label">Student Name with Initials</label>
                                    </div>
                                </div>
                                <label for="dob" class="required">Birth Day</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="dob" required>
                                        <label class="form-label">Birth Day</label>
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
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="required">Parent's Telephone No</label>
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
                                    <label class="form-label required">Medium</label>
                                    <select id="medium" class="form-control show-tick" name="medium" required>
                                        <option value="">-- Please select --</option>
                                        <option value="Sinhala">Sinhala</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="English">English</option>
                                </select>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label "> Distance to School in km </label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="dist_school" required>
                                        <label class="form-label">Distance to School in km</label>
                                    </div>
                                </div>
                                <label for="trained"> Parent's Income </label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="income" required>
                                        <label class="form-label"> Parent's Income </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label ">Travel Mode</label>
                                    <select id="title" class="form-control show-tick" name="travel_mode">
                                        <option value="">-- Please select --</option>
                                        <?php if ($travel_modes) { ?>
                                        <?php foreach ($travel_modes as $row) { ?>
                                        <option value="<?php echo $row['id'];?>" > <?php echo $row['travel_mode'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                </select>
                                </div>
                            </div>
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
