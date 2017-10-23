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
                <h2> ADD TEACHER </h2>
            </div>
            <!-- Basic Validation -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> TEACHER DETAILS </h2>
                        </div>
                        <div class="body">
                            <?php echo form_open('sadmin/addNewTeacher', 'role="form" id="addTeacherForm"'); ?>
                            <div class="col-md-6">
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
                                <label for="name" class="required">Teacher Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required>
                                        <label class="form-label">Teacher Name With Initials</label>
                                    </div>
                                </div>
                                <label for="nic" class="required">NIC</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nic" required>
                                        <label class="form-label">Teacher NIC No</label>
                                    </div>
                                </div>
                                <label for="dob" class="required">Birth Day</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="dob" required>
                                        <label class="form-label">Birth Day</label>
                                    </div>
                                </div>
                                <label for="telephone" class="required">Mobile No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control telephone" name="mobile" placeholder="Ex: 000-1234567">
                                    </div>
                                </div>
                                <label for="email">Email Address</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email">
                                        <label class="form-label">Email Address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <label class="form-label required">Subject 1</label>
                                    <select id="title" class="form-control show-tick" name="sub1" required>
                                        <option value="">-- Please select --</option>
                                        
                                        <?php if ($subjects) { ?>
                                        <?php foreach ($subjects as $row) { ?>
                                        <option value="<?php echo $row['id'];?>" > <?php echo $row['subject_name'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                    </select>
                                    <input type="checkbox" name="trained1" id="trained1" value="1" />
                                    <label for="trained1"> Teacher has Trained </label>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label ">Subject 2</label>
                                    <select id="title" class="form-control show-tick" name="sub2">
                                        <option value="">-- Please select --</option>

                                        <?php if ($subjects) { ?>
                                        <?php foreach ($subjects as $row) { ?>
                                        <option value="<?php echo $row['id'];?>" > <?php echo $row['subject_name'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                    </select>
                                    <input type="checkbox" name="trained2" id="trained2" value="1" />
                                    <label for="trained2"> Teacher has Trained </label>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label ">Subject 3</label>
                                    <select id="title" class="form-control show-tick" name="sub3">
                                        <option value="">-- Please select --</option>

                                        <?php if ($subjects) { ?>
                                        <?php foreach ($subjects as $row) { ?>
                                        <option value="<?php echo $row['id'];?>" > <?php echo $row['subject_name'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                    </select>
                                    <input type="checkbox" name="trained3" id="trained3" value="1" />
                                    <label for="trained3"> Teacher has Trained </label>
                                </div>
                                <label for="app_ser" class="required">Date Join the Service</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="app_ser" required>
                                        <label class="form-label">Date Join the Service</label>
                                    </div>
                                </div>
                                <label for="app_sch" class="required">Date Join the School</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="app_sch" required>
                                        <label class="form-label">Date Join the School</label>
                                    </div>
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

            $('#addTeacherForm').validate({
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
