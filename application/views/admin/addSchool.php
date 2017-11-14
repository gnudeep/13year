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
            <h2> ADD SCHOOL </h2>
        </div>
        <!-- Basic Validation -->

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> SCHOOL DETAILS </h2>
                    </div>
                    <div class="body">
                        <?php echo form_open('admin/addNewSchool', 'role="form" id="addSchoolForm"'); ?>
                            <label for="census_id" class="required">Census ID</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="census_id" required>
                                    <label class="form-label">Census ID</label>
                                </div>
                            </div>
                            <label for="name" class="required">School Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" required>
                                    <label class="form-label">School Name</label>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <label class="form-label required">Province</label>
                                        <select id="province" class="form-control show-tick" name="province" required>
                                            <option value="">-- Please select --</option>
                                            <?php if ($province) { ?>
                                                <?php foreach ($province as $row) { ?>
                                                    <option value="<?php echo $row['id'];?>" > <?php echo $row['province'] ;?> </option>
                                                <?php    } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                    <label class="form-label required">District</label>
                                    <select id="district" class="form-control show-tick" name="district" required>
                                        <option value="">-- Please select --</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-float">
                                        <label class="form-label required">Zone</label>
                                        <select id="zone" class="form-control show-tick" name="zone" required>
                                            <option value="">-- Please select --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <label for="telephone" class="required">School Telephone No</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control telephone" name="telephone" required placeholder="Ex: 000-1234567">
                                </div>
                            </div>
                            <label for="fax">School Fax No</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control telephone" name="fax" placeholder="Ex: 000-1234567">
                                </div>
                            </div>
                            <label for="email">School Email Address</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email">
                                    <label class="form-label">School Email Address</label>
                                </div>
                            </div>
                            <label for="pname" class="required">Principal's Name</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="pname" required>
                                    <label class="form-label">Principal's Name</label>
                                </div>
                            </div>
                            <label for="pmobile" class="required">Principal's Mobile No</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control telephone" name="pmobile" placeholder="Ex: 000-1234567" required>
                                </div>
                            </div>
                            <label for="email">Principal's Email Address</label>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="pemail">
                                    <label class="form-label">Principal's Email Address</label>
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
<script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>

<script>
    $(document).ready(function () {
        $('.telephone').inputmask('999-9999999', { placeholder: '___-_______' });
        $(".required").append("<span class='col-red'> *</span>");

        $('#addSchoolForm').validate({
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

        $('#province').change(function(){
            var id = $(this).val();
            var post_url = "index.php/FormControl/getDistricts";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',province_id: id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#district').empty();
                    $('#district').append('<option value="">-- Please select --</option>');
                    $.each(res, function(ID){
                        console.log(res[ID].district);
                        $('#district').append('<option value='+res[ID].id+'>'+res[ID].district+'</option>');
                    });
                    $('#district').selectpicker('refresh');
                }
            });
        });

        $('#district').change(function(){
            var id = $(this).val();
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',district_id: id};
            var post_url = "index.php/FormControl/getZones";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    $('#zone').empty();
                    $('#zone').append('<option value="" hidden selected> ---------Please Select---------</option>');
                    $.each(res, function(ID){
                        $('#zone').append('<option value='+res[ID].id+'>'+res[ID].zone+'</option>');
                    });
                    $('#zone').selectpicker('refresh');
                }
            });
        });
    });
</script>
