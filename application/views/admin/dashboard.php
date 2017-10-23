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
                            <table class="table table-bordered table-striped table-hover js-exportable">
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
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                        <td>  </td>
                                    </tr>
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
        <!-- Exportable Table For School List -->
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
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/editor/js/dataTables.editor.js"?>"></script>
<script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/select/js/dataTables.select.min.js"?>"></script>
<!-- Select Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>


<script>
    $(document).ready(function () {
        
        $(".required").append("<span class='col-red'> *</span>");
        
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

        var subjectEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Admin/Subjects' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#subjects",
            "fields": [ 
                {
                "label": "Subject:",
                "name": "subject_name",
                }
            ]
        } );

        subjectEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );
        
        $('#subjects').DataTable( {
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
                { extend: "create", editor: subjectEditor },
                { extend: "edit",   editor: subjectEditor },
                { extend: "remove", editor: subjectEditor }
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
                                cpw : 'required',
                                're_passwd': {
                                    equalTo: "#cpw"
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
                    }
                },
                {
                    text: 'Edit',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(coordTable.rows({selected: true}).data()['0']){
                            $('#coordinatorModal-title').text('Edit Coordinator');
                            $('#coordinatorModal_submit').data('action', 'edit')
                            $('#coordinatorModal').modal('toggle');
                            $('#CoordinatorForm').validate({
                                rules: {
                                    school : 'required',
                                    cname : 'required',
                                    cnic : {required :true, nic: true},
                                    cmobile : 'required',
                                    cdob : 'required',
                                    cemail : 'required',
                                    're_passwd': {
                                        equalTo: "#cpw"
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
            
        
    });
</script>