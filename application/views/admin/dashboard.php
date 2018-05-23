<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/27/17
 * Time: 2:58 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"?>" rel="stylesheet" />
<link href="<?php echo base_url()."assets/plugins/multi-select/css/multi-select.css"?>" rel="stylesheet">

<section class="content">
    <div class="container-fluid">
        <div class="row">

        <?php if ($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } else if ($this->session->flashdata('not-success')){ ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('not-success'); ?>
            </div>
        <?php } ?>
        </div>
        <!-- Exportable Table For School List -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SCHOOLS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover " id="schoolTable" >
                                <thead>
                                <tr>
                                    <th>Census ID</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Principal's Name</th>
                                    <th>Principal's Mobile</th>
                                    <th>Principal's Email</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php if ($schools) { ?>
                                    <?php foreach ($schools as $row) { ?>
                                        <tr>
                                            <td> <?php echo $row['census_id'];?> </td>
                                            <td> <?php echo $row['schoolname'];?> </td>
                                            <td> <?php echo $row['telephone'];?> </td>
                                            <td> <?php echo $row['fax'];?> </td>
                                            <td> <?php echo $row['email'];?> </td>
                                            <td> <?php echo $row['principal_name'];?> </td>
                                            <td> <?php echo $row['principal_mobile'];?> </td>
                                            <td> <?php echo $row['principal_email'];?> </td>
                                            <td> <?php echo $row['province_id'];?> </td>
                                            <td> <?php echo $row['district_id'];?> </td>
                                            <td> <?php echo $row['zone_id'];?> </td>
                                            <td> <?php echo $row['lat'];?> </td>
                                            <td> <?php echo $row['lot'];?> </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Exportable Table For Subjects List -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SUBJECTS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="subjects">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Exportable Table For Coordinators List -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            COORDINATORS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="coordinatorTable">
                                <thead>
                                    <tr>
                                        <th>Census ID</th>
                                        <th>School Name</th>
                                        <th>NIC</th>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Date Join the School</th>
                                        <th>Date Join the Service</th>
                                        <th>User Name</th>
                                        <th class="hidden">cID</th>
                                        <th class="hidden">uID</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if ($coordinators) { ?>
                                    <?php foreach ($coordinators as $row) { ?>
                                    <tr>
                                        <td> <?php echo $row['census_id'];?> </td>
                                        <td> <?php echo $row['schoolname'];?> </td>
                                        <td> <?php echo $row['coordinator_nic'];?> </td>
                                        <td> <?php echo $row['coordinator_name'];?> </td>
                                        <td> <?php echo $row['coordinator_dob'];?> </td>
                                        <td> <?php echo $row['coordinator_mobile'];?> </td>
                                        <td> <?php echo $row['coordinator_email'];?> </td>
                                        <td> <?php echo $row['coordinator_sch_app'];?> </td>
                                        <td> <?php echo $row['coordinator_ser_app'];?> </td>
                                        <td> <?php echo $row['uname'];?> </td>
                                        <td class="hidden"> <?php echo $row['cID'];?> </td>
                                        <td class="hidden"> <?php echo $row['uID'];?> </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subjects Modal -->
        <div id="subjectsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="subjectsModal-title">  </h4>
                    </div>

                    <?php echo form_open('admin/Subjects', 'role="form" id="SubjectsForm"') ?>
                    <div class="modal-body">
                        <input type="text" class="hidden" name="subj_id" id="subj_id" >
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <!--<label for="name">Coordinator Name</label>-->
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="subj" id="subj" autofocus>
                                        <label class="form-label"> Subject Name </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" id="subjectsModal_submit"> Submit </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

        <!-- Modal to verify letter from barcode-->
        <div id="coordinatorModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="coordinatorModal-title">  </h4>
                    </div>

                    <?php echo form_open('admin/Coordinator', 'role="form" id="CoordinatorForm"') ?>
                    <div class="modal-body">
                        <input type="text" class="form-control hidden" name="cID" id="cID">
                        <input type="text" class="form-control hidden" name="uID" id="uID">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <label class="form-label required">School ID</label>
                                    <select id="school_id" class="form-control show-tick" name="school_id" id="school_id" required>
                                        <option value="">-- Please select --</option>
                                        <?php if ($schools) { ?>
                                        <?php foreach ($schools as $row) { ?>
                                        <option value="<?php echo $row['census_id'];?>" > <?php echo $row['census_id'] . ' - ' . $row['schoolname'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <!--<label for="name">Coordinator Name</label>-->
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cname" id="cname">
                                        <label class="form-label">Coordinator Name With Initials</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cmobile">Coordinator Mobile</label>-->
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cnic" id="cnic" >
                                        <label class="form-label">Coordinator NIC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cmobile">Coordinator Mobile</label>-->
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="cdob" id="cdob">
                                        <label class="form-label">Coordinator Date of Birth</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cmobile">Coordinator Mobile</label>-->
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cmobile" id="cmobile">
                                        <label class="form-label">Coordinator Mobile</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cemail">Coordinator Email</label>-->
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="cemail" id="cemail">
                                        <label class="form-label">Coordinator Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="appsch">Coordinator Email</label>-->
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="appsch" id="appsch">
                                        <label class="form-label">Date Joined to School</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="appser">Coordinator Email</label>-->
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" name="appser" id="appser">
                                        <label class="form-label">Date First Joined to Teacher Service</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <!--<label for="cuname">Coordinator User Name</label>-->
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="cuname" id="cuname">
                                        <input type="text" class="form-control hidden" name="cur_cuname" id="cur_cuname">
                                        <label class="form-label">Coordinator User Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cpw">Coordinator Password</label>-->
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="cpw" id="cpw">
                                        <label class="form-label">Coordinator Password</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <!--<label for="cpw">Retype Password</label>-->
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="re_passwd" id="re_passwd">
                                        <label class="form-label">Retype Password</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" id="coordinatorModal_submit"> Submit </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

        <!-- Modal to verify letter from barcode-->
        <div id="schoolsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="schoolsModal-title">  </h4>
                    </div>

                    <?php echo form_open('admin/Schools', 'role="form" id="addSchoolForm"') ?>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <input type="text" class="hidden" name="std_id" id="std_id" >
                            <div class="col-md-6">
                                <label for="census_id" class="required">Census ID</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="census_id" id="census_id" required>
                                        <label class="form-label">Census ID</label>
                                    </div>
                                </div>
                                <label for="name" class="required">School Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <label class="form-label">School Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label required">Province</label>
                                    <select id="province" class="form-control show-tick" name="province"  required>
                                        <option value="">-- Please select --</option>
                                        <?php if ($province) { ?>
                                            <?php foreach ($province as $row) { ?>
                                                <option value="<?php echo $row['id'];?>" > <?php echo $row['province'] ;?> </option>
                                            <?php    } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label required">District</label>
                                    <select id="district" class="form-control show-tick" name="district"  required>
                                        <option value="">-- Please select --</option>
                                    </select>
                                </div>
                                    <div class="form-group form-float">
                                        <label class="form-label required">Zone</label>
                                        <select id="zone" class="form-control show-tick" name="zone"  required>
                                            <option value="">-- Please select --</option>
                                        </select>
                                </div>
                                <label for="telephone" class="required">School Telephone No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control telephone" name="telephone" id="telephone" required placeholder="Ex: 000-1234567">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="fax">School Fax No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control telephone" name="fax" id="fax" placeholder="Ex: 000-1234567">
                                    </div>
                                </div>
                                <label for="email">School Email Address</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" id="email" >
                                        <label class="form-label">School Email Address</label>
                                    </div>
                                </div>
                                <label for="pname" class="required">Principal's Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="pname" id="pname" required>
                                        <label class="form-label">Principal's Name</label>
                                    </div>
                                </div>
                                <label for="pmobile" class="required">Principal's Mobile No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control telephone" name="pmobile" id="pmobile" placeholder="Ex: 000-1234567" required>
                                    </div>
                                </div>
                                <label for="email">Principal's Email Address</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="pemail" id="pemail" >
                                        <label class="form-label">Principal's Email Address</label>
                                    </div>
                                </div>
                                <label for="lat" class="required">School Lattitude Coordination</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control " name="lat" id="lat" required>
                                    </div>
                                </div>
                                <label for="lot" class="required">School Longtitude Coordination</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control " name="lot" id="lot" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" id="schoolsModal_submit"> Submit </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

        <!-- Modal to send Emails-->
        <div id="emailsModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="emailsModal-title"> Send Email Mesage </h4>

                    </div>

                    <?php echo form_open('admin/sendEmail', 'role="form" id="SubjectsForm"') ?>
                    <div class="modal-body">

                        <div class="row clearfix">
                            <div class="col-md-12">

                                <div class="body">
                                    <select id="optgroup" class="ms" multiple="multiple" data-live-search="true">
                                        <?php if ($schools) { ?>
                                        <?php foreach ($schools as $row) { ?>
                                        <?php if ($row['principal_email']) { ?>
                                            <option value="<?php echo $row['principal_email'];?>"><?php echo $row['schoolname'];?></option>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                                <a href='#' id='select-all'>select all</a> /
                                <a href='#' id='deselect-all'>deselect all</a> <br>

                                <label for="name" class="required">Subject</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="subject" id="subject" required>
                                        <label class="form-label">Subject</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <!--<label for="name">Coordinator Name</label>-->
                                    <div class="form-line">
                                        <label for="name" class="required"> Message </label>
                                        <textarea class="form-control no-resize" id="message" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top:0;">
                        <button type="button" class="btn btn-success" id="emailsModal_submit"> Send </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/jquery.dataTables.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/jszip.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/select/js/dataTables.select.min.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/multi-select/js/jquery.multi-select.js"?>"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>

<script>
    $(document).ready(function () {

        $('.telephone').inputmask('999-9999999', { placeholder: '___-_______' });
        $(".required").append("<span class='col-red'> *</span>");

        $('#optgroup').multiSelect({ selectableOptgroup: true });
        $('#select-all').click(function(){

            $('#optgroup').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function(){
            $('#optgroup').multiSelect('deselect_all');
            return false;
        });

        $('#sendMailMenu').click(function(){
            $('#emailsModal').modal('show');
        });

        $('.dataTable').DataTable({
            responsive: true,
            iDisplayLength: 5,
            page: {length: '5'}
        });

        $.validator.addMethod('nic', function (value, element) {
            return value.match(/^([0-9]{9}[x|X|v|V])|([0-9]{12})$/);
        },
          'Please enter valid NIC'
         );

        $.validator.addMethod("PASSWORD",function(value,element){
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,25}$/i.test(value);
        },"Passwords are 8-25 characters with uppercase letters, lowercase letters and at least one number.");

        $('#cmobile').inputmask('999-9999999', {
            placeholder: '___-_______'
        });

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        var subjectTable = $('#subjects').DataTable( {
            dom: "Bfrtip",
            ajax: {
                url: "<?php echo base_url().'index.php/Admin/Subjects' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "subject_name" }
            ],
            select: {
                style: 'single'
            },
            buttons: [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        $('#subjectsModal-title').text('Add Subject');
                        $('#subjectsModal_submit').data('action', 'add')
                        $('#subjectsModal').modal('toggle');
                        $('#subjectsForm').validate({
                            rules: {
                                subj : 'required',
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
                    }
                },
                {
                    text: 'Edit',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(subjectTable.rows({selected: true}).data()['0']){
                            $('#subjectsModal-title').text('Edit Subject');
                            $('#subjectsModal').data('action', 'edit')
                            $('#subjectsModal').modal('toggle');

                            var data = subjectTable.rows({selected: true}).data();
                            $('#subj').val( data[0]['subject_name'] );
                            $('#subj_id').val( data[0]['DT_RowId'].split("_")[1] );
                            $('.form-line').addClass('focused')
                        }

                    }
                }
            ]
        } );

        var coordTable = $('#coordinatorTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            page: {length: '5'},
            select: {
                style: 'single'
            },
            buttons: [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        $('#coordinatorModal-title').text('Add Coordinator');
                        $('#coordinatorModal_submit').data('action', 'add')
                        $('#coordinatorModal').modal('toggle');
                        $('#CoordinatorForm').validate({
                            rules: {
                                school : 'required',
                                cname : 'required',
                                cnic : {required :true, nic: true},
                                cmobile : 'required',
                                cdob : 'required',
                                cemail : 'required',
                                cuname : 'required',
                                cpw : {required :true, PASSWORD: true},
                                re_passwd: { equalTo: "#cpw" }
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
                    }
                },
                {
                    text: 'Edit',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(coordTable.rows({selected: true}).data()['0']){
                            $('#coordinatorModal-title').text('Edit Coordinator');
                            $('#coordinatorModal_submit').data('action', 'edit');
                            $('#coordinatorModal').modal('toggle');
                            $('#CoordinatorForm').validate({
                                rules: {
                                    school : 'required',
                                    cname : 'required',
                                    cnic : {required :true, nic: true},
                                    cmobile : 'required',
                                    cdob : 'required',
                                    cemail : 'required',
                                    cuname: {required: false},
                                cpw : {required :false, PASSWORD: true},
                                re_passwd: { equalTo: "#cpw" }

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
                            var data = coordTable.rows({selected: true}).data();

                            $('#school_id').val(data['0']['0']).trigger('change');
                            $('#cname').val(data['0']['3']);
                            $('#cnic').val(data['0']['2']);
                            $('#cdob').val(data['0']['4']);
                            $('#cmobile').val(data['0']['5']);
                            $('#cemail').val(data['0']['6']);
                            $('#appsch').val(data['0']['7']);
                            $('#appser').val(data['0']['8']);
                            $('#cuname').val(data['0']['9']);
                            $('#cur_cuname').val(data['0']['9']);
                            $('#cID').val(data['0']['10']);
                            $('#uID').val(data['0']['11']);
                            $('.form-line').addClass('focused')
                        }

                    }
                }
            ]
        });

        $('#coordinatorModal_submit').click(function(){
            if( $('#CoordinatorForm').valid() ){
                var formAction = $('#coordinatorModal_submit').data('action');
                var form_data = new FormData();
                var school_id = $('#school_id').val();
                var cname = $('#cname').val();
                var cnic = $('#cnic').val();
                var cdob = $('#cdob').val();
                var cmobile = $('#cmobile').val();
                var cemail = $('#cemail').val();
                var appsch = $('#appsch').val();
                var appser = $('#appser').val();
                var cuname = $('#cuname').val();
                var cpw = $('#cpw').val();
                var cID = $('#cID').val();
                var uID = $('#uID').val();

                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('formAction', formAction);
                form_data.append('school_id', school_id);
                form_data.append('cname', cname);
                form_data.append('cnic', cnic);
                form_data.append('cdob', cdob);
                form_data.append('cmobile', cmobile);
                form_data.append('cemail', cemail);
                form_data.append('appsch', appsch);
                form_data.append('appser', appser);
                form_data.append('cuname', cuname);
                form_data.append('cpw', cpw);
                form_data.append('cID', cID);
                form_data.append('uID', uID);

                var post_url = "index.php/Admin/changeCoordinator/2";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        location.reload();
                    },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
        });

        var schoolTable = $('#schoolTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            select: true,
            columnDefs: [
                {
                    targets: [8, 9, 10, 11, 12],
                    visible: false
                }
            ],
            buttons:
            [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {

                        $('#schoolsModal-title').text('Add School');
                        $('#schoolsModal_submit').data('action', 'add')
                        $('#schoolsModal').modal('toggle');
                    }
                },
                {
                    text: 'Edit',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(schoolTable.rows({selected: true}).data()['0']){
                            $('#schoolsModal-title').text('Edit School');
                            $('#schoolsModal_submit').data('action', 'edit')
                            $('#schoolsModal').modal('toggle');

                            var data = schoolTable.rows({selected: true}).data();

                            $('#census_id').val(data['0']['0']);
                            $('#name').val(data['0']['1']);
                            $('#telephone').val(data['0']['2']);
                            $('#fax').val(data['0']['3']);
                            $('#email').val(data['0']['4']);
                            $('#pname').val(data['0']['5']);
                            $('#pmobile').val(data['0']['6']);
                            $('#pemail').val(data['0']['7']);

                            $('#province').val(data['0']['8']).trigger('change');
                            //getDistricts(data['0']['8']);
                            $('#district').val(data['0']['9']).trigger('change');
                            getZones(data['0']['9']);
                            $('#zone').val(data['0']['10']).trigger('change');

                            $('#lat').val(data['0']['11']);
                            $('#lot').val(data['0']['12']);
                            $('.form-line').addClass('focused')
                        }

                    }
                }
            ]
        });

        $('#province').change(function(){
            var id = $(this).val();
            getDistricts(id);
        });

        $('#district').change(function(){
            var id = $(this).val();
            getZones(id);
        });

        $('#schoolsModal_submit').click(function() {
            var formAction = $(this).data('action');
            var form_data = new FormData();

            var census_id = $('#census_id').val();
            var name = $('#name').val();
            var province = $('#province').val();
            var district = $('#district').val();
            var zone = $('#zone').val();
            var telephone = $('#telephone').val();
            var fax = $('#fax').val();
            var email = $('#email').val();
            var pname = $('#pname').val();
            var pmobile = $('#pmobile').val();
            var pemail = $('#pemail').val();
            var lat = $('#lat').val();
            var lot = $('#lot').val();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('formAction', formAction);
            form_data.append('census_id', census_id);
            form_data.append('name', name);
            form_data.append('province', province);
            form_data.append('district', district);
            form_data.append('zone', zone);
            form_data.append('telephone', telephone);
            form_data.append('fax', fax);
            form_data.append('email', email);
            form_data.append('pname', pname);
            form_data.append('pmobile', pmobile);
            form_data.append('pemail', pemail);
            form_data.append('lat', lat);
            form_data.append('lot', lot);

            if($('#addSchoolForm').valid()){
                var post_url = "index.php/admin/schools/2";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        location.reload();
                    },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }

        });

        $('#emailsModal_submit').click(function(){

            //console.log($('#optgroup').val());

            var form_data = new FormData();
            var sel_list = $('#optgroup').val();
            var message = $('#message').val();
            var subject = $('#subject').val();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('sel_list', sel_list);
            form_data.append('message', message);
            form_data.append('subject', subject);

            var post_url = "index.php/admin/sendEmail/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'text',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    //location.reload();
                    $('#emailsModal').modal('hide');
                    alert("Successfully Sent Message.");
                },
                error: function (response) {
                    alert("Error Updating! Please try again.");
                }
            });
        });

        function getDistricts(province_id){
            var post_url = "index.php/FormControl/getDistricts";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',province_id: province_id};
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                async: false,
                success: function(res){
                    $('#district').empty();
                    $('#district').append('<option value="">-- Please select --</option>');
                    $.each(res, function(ID){
                        $('#district').append('<option value='+res[ID].id+'>'+res[ID].district+'</option>');
                    });
                    $('#district').selectpicker('refresh');
                }
            });
        }

        function getZones(district_id){
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',district_id: district_id};
            var post_url = "index.php/FormControl/getZones";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                async: false,
                success: function(res){
                    $('#zone').empty();
                    $('#zone').append('<option value="" hidden selected> ---------Please Select---------</option>');
                    $.each(res, function(ID){
                        $('#zone').append('<option value='+res[ID].id+'>'+res[ID].zone+'</option>');
                    });
                    $('#zone').selectpicker('refresh');
                }
            });
        }
    });
</script>
