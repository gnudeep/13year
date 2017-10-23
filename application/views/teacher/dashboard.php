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
                                            <th>Index No</th>
                                            <th>Name with Initials</th>
                                            <th>Gender</th>
                                            <th>Address</th>
                                            <th>Parent Telephone</th>
                                            <th>Medium</th>
                                            <th>Distance to school (km)</th>
                                            <th>Parent's Income</th>
                                            <th>Travel Mode</th>
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


    <script>
        $(document).ready(function() {
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

            //Handle Teachers DataTable
            var studentEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Teacher/Dtable/Students' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#students",
                "display": 'lightbox',
                "fields": [{
                        "label": "Index No:",
                        "name": "students_info.std_id"
                    },
                    {
                        "label": "School Census ID:",
                        "name": "students_info.school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Full Name:",
                        "name": "students_info.full_name",
                    },
                    {
                        "label": "Name with Initials:",
                        "name": "students_info.in_name",
                    },
                    {
                        "label": "Gender:",
                        "name": "students_info.gender",
                        "type": "select",
                        "options": [
                            "Male",
                            "Female"
                        ]
                    },
                    {
                        "label": "Address:",
                        "name": "students_info.address",
                        "type": "textarea"
                    },
                    {
                        "label": "Parent Telephone:",
                        "name": "students_info.telephone"
                    },
                    {
                        "label": "Medium:",
                        "name": "students_info.medium",
                        "type": "select",
                        "options": [
                            "Sinhala",
                            "English"
                        ]
                    },
                    {
                        "label": "Distance to School (km):",
                        "name": "students_info.dist_school"
                    },
                    {
                        "label": "Parent's Income:",
                        "name": "students_info.income"
                    },
                    {
                        "label": "Travel Mode:",
                        "name": "students_info.travel_mode_id",
                        "type": "select",
                        "placeholder": "<-- Please Select -->",
                        "placeholderDisabled": false,
                       },
                       {
                       "label": "Status:",
                       "name": "students_info.status",
                       "type": "hidden",
                       "default":"Phase 1"
                       }
                ]
            });

            studentEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            studentEditor.field('students_info.std_id').input().addClass('form-control show-tick');
            studentEditor.field('students_info.school_id').input().addClass('form-control show-tick');
            studentEditor.field('students_info.full_name').input().addClass('form-control show-tick');
            studentEditor.field('students_info.in_name').input().addClass('form-control show-tick');
            studentEditor.field('students_info.gender').input().addClass('form-control show-tick');
            studentEditor.field('students_info.address').input().addClass('form-control show-tick');
            studentEditor.field('students_info.telephone').input().addClass('form-control show-tick');
            studentEditor.field('students_info.medium').input().addClass('form-control show-tick');
            studentEditor.field('students_info.dist_school').input().addClass('form-control show-tick');
            studentEditor.field('students_info.income').input().addClass('form-control show-tick');
            studentEditor.field('students_info.travel_mode_id').input().addClass('form-control show-tick');

            $('#students').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Teacher/Dtable/Students' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "students_info.index_no"
                    },
                    {
                        data: "students_info.in_name"
                    },
                    {
                        data: "students_info.gender"
                    },
                    {
                        data: "students_info.address"
                    },
                    {
                        data: "students_info.telephone"
                    },
                    {
                        data: "students_info.medium"
                    },
                    {
                        data: "students_info.dist_school"
                    },
                    {
                        data: "students_info.income"
                    },
                    {
                        data: "travel_mode.travel_mode"
                    }
                ],
                select: true,
                buttons: [{
                        extend: "edit",
                        editor: studentEditor
                    },
                    {
                        extend: "remove",
                        editor: studentEditor
                    }
                ]
            });


            //Handle Classes DataTable
            var classEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Classes' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#classes",
                "display": 'lightbox',
                "fields": [{
                        "label": "School Census ID:",
                        "name": "classes.school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Grade:",
                        "name": "classes.grade",
                        "type": "select",
                        "options": [
                            "Grade 12",
                            "Grade 13"
                        ]
                    },
                    {
                        "label": "Class:",
                        "name": "classes.class_name",
                    },
                    {
                        "label": "Class Teacher:",
                        "name": "classes.class_teacher",
                        "type": "select",
                    },
                    {
                        "label": "Commenced Date:",
                        "name": "classes.commenced_date",
                        "type": "date",
                    }
                ]
            });

            classEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            classEditor.field('classes.school_id').input().addClass('form-control show-tick');
            classEditor.field('classes.grade').input().addClass('form-control show-tick');
            classEditor.field('classes.class_name').input().addClass('form-control show-tick');
            classEditor.field('classes.class_teacher').input().addClass('form-control show-tick');
            classEditor.field('classes.commenced_date').input().addClass('form-control show-tick');

            $('#classes').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Sadmin/Dtable/Classes' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "classes.grade"
                    },
                    {
                        data: "classes.class_name"
                    },
                    {
                        data: "teachers.teacher_in_name"
                    },
                    {
                        data: "classes.commenced_date"
                    }
                ],
                select: true,
                buttons: [{
                        extend: "create",
                        editor: classEditor
                    },
                    {
                        extend: "edit",
                        editor: classEditor
                    },
                    {
                        extend: "remove",
                        editor: classEditor
                    }
                ]
            });


            //Handle Users DataTable
            var usersEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#users",
                "display": 'lightbox',
                "fields": [{
                        "label": "School Census ID:",
                        "name": "school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Name:",
                        "name": "name",
                    },
                    {
                        "label": "User Name:",
                        "name": "uname",
                    },
                    {
                        "label": "Password:",
                        "name": "passwd",
                        "type": "password",
                    },
                    {
                        "label": "Role:",
                        "name": "role",
                        "type": "select",
                        "className": "form-control",
                        options: [{
                                label: "School Administrator",
                                value: 1
                            },
                            {
                                label: "Finance Administrator",
                                value: 2
                            },
                            {
                                label: "Class Teacher",
                                value: 3
                            }
                        ]
                    }
                ]
            });

            usersEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            usersEditor.field('name').input().addClass('form-control');
            usersEditor.field('uname').input().addClass('form-control');
            usersEditor.field('passwd').input().addClass('form-control');
            usersEditor.field('role').input().addClass('form-control show-tick');

            $('#users').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "name"
                    },
                    {
                        data: "uname"
                    },
                    {
                        data: "role"
                    }
                ],
                "columnDefs": [{
                    "render": function(data, type, row) {
                        var role;
                        if (data == '1') {
                            role = "School Administrator";
                        } else
                        if (data == '2') {
                            role = "Finance Administrator";
                        } else if (data == '3') {
                            role = "Class Teacher"
                        }
                        return role;
                    },
                    "targets": 2
                }],
                select: true,
                buttons: [{
                        extend: "edit",
                        editor: usersEditor
                    },
                    {
                        extend: "remove",
                        editor: usersEditor
                    }
                ]
            });
        });

    </script>

<?php
/*Array ( [0] => Array ( [NIC] => 222222222v [Name] => A. ABC DEF [2017-10] => 20 [2017-09] => 22 ) 
       [1] => Array ( [NIC] => 883323173v [Name] => G. Kosala [2017-10] => 14 [2017-09] => 25 ) )
Array ( [0] => Array ( [NIC] => 222222222v [Name] => A. ABC DEF [2017-10] => 20 [2017-09] => 22 ) 
       [1] => Array ( [NIC] => 883323173v [Name] => G. Kosala [2017-10] => 14 [2017-09] => 25 ) ) */