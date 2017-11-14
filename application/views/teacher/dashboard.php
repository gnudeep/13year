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
            <div class="block-header">
                <h2>
                    <?php echo strtoupper($school['0']['schoolname']).' | Class - '. strtoupper($class['0']['class_name']);?> </h2>
            </div>
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
            <!-- Students List Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STUDENTS LIST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="students">
                                    <thead>
                                        <tr>
                                            <th> </th>
                                            <th>Index No</th>
                                            <th>Name with Initials</th>
                                            <th>NIC</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Parent Telephone</th>
                                            <th>Medium</th>
                                            <th>Distance to school (km)</th>
                                            <th>Parent's Income</th>
                                            <th>Travel Mode</th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($students) { ?>
                                        <?php foreach ($students as $row) { ?>
                                        <tr>
                                            <td></td>
                                            <td> <?php echo $row['index_no'];?> </td>
                                            <td> <?php echo $row['in_name'];?> </td>
                                            <td> <?php echo $row['nic'];?> </td>
                                            <td> <?php echo $row['gender'];?> </td>
                                            <td> <?php echo $row['address'];?> </td>
                                            <td> <?php echo $row['telephone'];?> </td>
                                            <td> <?php echo $row['medium'];?> </td>
                                            <td> <?php echo $row['dist_school'];?> </td>
                                            <td> <?php echo $row['income'];?> </td>
                                            <td> <?php echo $row['travel_mode'];?> </td>
                                            <td> <?php echo $row['std_id'];?> </td>
                                            
                                            <td> <?php echo $row['full_name'];?> </td>
                                            <td> <?php echo $row['dob'];?> </td>
                                            <td> <?php echo $row['travel_mode_id'];?> </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Subjects List Table -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SUBJECTS IN CLASS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="subjects">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($subjects) { ?>
                                        <?php foreach ($subjects as $row) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['subject_name'];?> </td>
                                            <td>
                                                <?php echo $row['teacher_in_name'];?> </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Attendance List Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Attendance History
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="subjects">
                                    <thead>
                                        <tr>
                                            <!--<th>Month</th>
                                            <th>Index no.</th>
                                            <th>Student</th>
                                            <th>Attended Days</th>-->
                                            <?php if ($attendance) { ?>
                                            <?php foreach ($attendance['0'] as $key => $id) { ?>
                                            <th>
                                                <?php echo $key;?> </th>
                                        <?php } ?>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($attendance) { ?>
                                        <?php foreach ($attendance as $key => $id) { ?>
                                        <tr>
                                            <?php foreach ($id as $head => $val) { ?>
                                                <td>
                                                    <?php echo $val;?> </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                        <?php } else { ?>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal to verify letter from barcode-->
            <div id="studentsModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 id="studentsModal-title">  </h4>
                        </div>

                        <?php echo form_open('teacher/students', 'role="form" id="studentsModalForm"') ?> 
                        <div class="modal-body">
                            <input type="text" class="hidden" name="std_id" id="std_id" >
                            <div class="col-md-6">
                                <!--<label for="name" class="required">Student Name</label>-->
                                <label for="std_id" class="required">Index No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="index_no" name="index_no" required>
                                        <label class="form-label">Student Index No</label>
                                    </div>
                                </div>
                                <label for="nic" class="required">NIC No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="nic" name="nic">
                                        <label class="form-label">Student NIC No</label>
                                    </div>
                                </div>
                                <label for="in_name" class="required">Name with Initials</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="in_name" name="in_name" required>
                                        <label class="form-label">Student Name with Initials</label>
                                    </div>
                                </div>
                                <label for="in_name" class="required">Full Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                        <label class="form-label">Student Full Name </label>
                                    </div>
                                </div>
                                <label for="dob" class="required">Birth Day</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="datepicker form-control" id="dob" name="dob" required>
                                        <label class="form-label">Birth Day</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label required">Gender</label>
                                    <select id="gender" class="form-control show-tick" name="gender" required>
                                    <option value="">-- Please select --</option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="required">Address</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea rows="1" class="form-control no-resize auto-growth" id="address" name="address"></textarea>
                                        <label class="form-label">Address</label>
                                    </div>
                                </div>
                                <label for="telephone" class="required">Parent's Telephone No</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control telephone" id="telephone" name="telephone" required placeholder="Ex: 000-1234567">
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
                                        <input type="text" class="form-control" id="dist_school" name="dist_school">
                                        <label class="form-label">Distance to School in km</label>
                                    </div>
                                </div>
                                <label for="trained"> Parent's Income </label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="income" name="income">
                                        <label class="form-label"> Parent's Income </label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label ">Travel Mode</label>
                                    <select id="travel_mode" class="form-control show-tick" name="travel_mode">
                                        <option value="">-- Please select --</option>
                                        <?php if ($travel_modes) { ?>
                                        <?php foreach ($travel_modes as $row) { ?>
                                        <option value="<?php echo $row['id'];?>" > <?php echo $row['travel_mode'] ;?> </option>
                                        <?php    } ?>
                                        <?php } ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-top:0;">
                            <button type="button" class="btn btn-success" id="studentsModal_submit"> Submit </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
                        </div>
                        <?php echo form_close() ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/jquery.dataTables.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/jszip.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/editor/js/dataTables.editor.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/select/js/dataTables.select.min.js "?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.min.js"?>"></script>

    <script>
        $(document).ready(function() {
            
        
            $.validator.addMethod('nic', function (value, element) {
                return value.match(/^([0-9]{9}[x|X|v|V])|([0-9]{12})$/);
            },
            'Please enter valid NIC'
            );

            $('.js-basic-example').DataTable({
                responsive: true
            });

            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });

            var studentsTable = $('#students').DataTable({
                dom: "Bfrtip",
                responsive: true,
                select: true,
                columnDefs: [
                    {
                        targets: [11, 12, 13, 14],
                        visible: false
                    }
                ],
                order: [[ 1, 'asc' ]],
                buttons: [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        
                        $('#studentsModal-title').text('Add Student');
                        $('#studentsModal_submit').data('action', 'add')
                        $('#studentsModal').modal('toggle');
                        $('#studentsModalForm').validate({
                            rules: {
                                index_no : 'required',
                                in_name : 'required',
                                nic : {required :true, nic: true},
                                gender : 'required',
                                address : 'required',
                                medium : 'required',
                                dob : 'required'
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
                        if(studentsTable.rows({selected: true}).data()['0']){
                            $('#studentsModal-title').text('Edit Student');
                            $('#studentsModal_submit').data('action', 'edit')
                            $('#studentsModal').modal('toggle');
                            $('#studentsModalForm').validate({
                                rules: {
                                    index_no : 'required',
                                    in_name : 'required',
                                    nic : {required :true, nic: true},
                                    gender : 'required',
                                    address : 'required',
                                    medium : 'required',
                                    dob : 'required'
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
                            var data = studentsTable.rows({selected: true}).data();

                            $('#std_id').val(data['0']['11']);
                            $('#index_no').val(data['0']['1']);
                            $('#in_name').val(data['0']['2']);
                            $('#nic').val(data['0']['3']);
                            $('#gender').val(data['0']['4']).trigger('change');
                            $('#address').val(data['0']['5']);
                            $('#telephone').val(data['0']['6']);
                            $('#medium').val(data['0']['7']).trigger('change');
                            $('#dist_school').val(data['0']['8']);
                            $('#income').val(data['0']['9']);
                            $('#travel_mode').val(data['0']['14']).trigger('change');

                            $('#full_name').val(data['0']['12']);
                            $('#dob').val(data['0']['13']);
                            $('.form-line').addClass('focused')
                        }
                        
                    }
                },
                {
                    text: "remove",
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(studentsTable.rows({selected: true}).data()['0']){
                            var data = studentsTable.rows({selected: true}).data();

                            var std_id = data['0']['11'];
                            var std_name = data['0']['2'];
                            swal({
                                title: "Are you sure?",
                                text: "This will delete " + std_name + "from the system!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, delete it!",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            }, function () {
                                
                                var form_data = new FormData();

                                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                                form_data.append('formAction', 'delete');
                                form_data.append('std_id', std_id);

                                var post_url = "index.php/teacher/students/2";
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url(); ?>" + post_url,
                                    dataType :'text',
                                    data: form_data,
                                    contentType: false,
                                    processData: false,
                                    success: function(response){
                                    }
                                });

                                setTimeout(function () {
                                    swal( std_name + " Deleted!");
                                }, 2000);
                                
                                        //location.reload();
                            });
                        }
                    }
                }
                ]
            });

            studentsTable.on( 'order.dt search.dt', function () {
                studentsTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).columns.adjust().draw();

            $('#studentsModal_submit').click(function(){
                var formAction = $(this).data('action');
                var form_data = new FormData();
                
                var std_id = $('#std_id').val();
                var index_no = $('#index_no').val();
                var in_name = $('#in_name').val();
                var nic = $('#nic').val();
                var gender = $('#gender').val();
                var address = $('#address').val();
                var telephone = $('#telephone').val();
                var medium = $('#medium').val();
                var dist_school = $('#dist_school').val();
                var income = $('#income').val();
                var travel_mode = $('#travel_mode').val();
                var full_name = $('#full_name').val();
                var dob = $('#dob').val();

                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('formAction', formAction);
                form_data.append('std_id', std_id);
                form_data.append('index_no', index_no);
                form_data.append('in_name', in_name);
                form_data.append('nic', nic);
                form_data.append('gender', gender);
                form_data.append('address', address);
                form_data.append('telephone', telephone);
                form_data.append('medium', medium);
                form_data.append('dist_school', dist_school);
                form_data.append('income', income);
                form_data.append('travel_mode', travel_mode);
                form_data.append('full_name', full_name);
                form_data.append('dob', dob);

                if($('#studentsModalForm').valid()){
                    var post_url = "index.php/teacher/students/2";
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

<?php
/*Array ( [0] => Array ( [NIC] => 222222222v [Name] => A. ABC DEF [2017-10] => 20 [2017-09] => 22 ) 
       [1] => Array ( [NIC] => 883323173v [Name] => G. Kosala [2017-10] => 14 [2017-09] => 25 ) )
Array ( [0] => Array ( [NIC] => 222222222v [Name] => A. ABC DEF [2017-10] => 20 [2017-09] => 22 ) 
       [1] => Array ( [NIC] => 883323173v [Name] => G. Kosala [2017-10] => 14 [2017-09] => 25 ) ) */