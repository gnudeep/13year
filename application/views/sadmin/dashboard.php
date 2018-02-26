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
            <h2> <?php echo strtoupper($school['0']['schoolname']);?> </h2>
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
        <!-- Teacher List Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            TEACHERS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="teachers">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>NIC No</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Subject 01</th>
                                    <th>Subject 02</th>
                                    <th>Subject 03</th>
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

        <div class="row clearfix">
            <!-- Class List Table -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            CLASSES LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="classes">
                                <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Class</th>
                                        <th>Class Teacher</th>
                                        <th>Class Start Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Subjects List Table -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="float: right;">
                <div class="card">
                    <div class="header">
                        <h2>
                            SELECTED SUBJECTS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="subjects">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Subject Name</th>
                                        <th>Teacher</th>
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

        <div class="row clearfix">

            <!-- Users List Table -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="header ">
                        <h2>
                            USERS LIST
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="users">
                                <thead>
                                    <tr>
                                        <th> Name </th>
                                        <th> User Name </th>
                                        <th> Role </th>
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
                                        <th>NIC</th>
                                        <th>gender</th>
                                        <th>address</th>
                                        <th>Parent Telephone</th>
                                        <th>Medium</th>
                                        <th>Distance to school (km)</th>
                                        <th>Parent Income</th>
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
    </div>

    <!-- Classes Modal -->
    <div id="ClassesModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="ClassesModal-title">  </h4>
                </div>

                <?php echo form_open('sadmin/Classes', 'role="form" id="ClassesForm"') ?>
                <div class="modal-body">
                    <input type="text" class="hidden" name="subj_id" id="subj_id" >
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="name">Census ID</label>
                                    <input type="text" class="form-control" name="census_id" id="census_id_class" value="<?php echo $this->session->school_id; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="name">Grade</label>
                                <select id="grade_class" class="form-control show-tick" name="grade_class" required>
                                    <option value="">-- Please select --</option>
                                    <option value="Grade 12"> Grade 12 </option>
                                    <option value="Grade 13"> Grade 13 </option>
                                </select>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="name"> Class Name </label>
                                    <input type="text" class="form-control" name="name_class" id="name_class" required>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label for="name"> Class Teacher </label>
                                <select id="teacher_class" class="select2 form-control show-tick" name="teacher_class" required>
                                    <option value="">-- Please select --</option>
                                </select>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="name"> Class Start Date </label>
                                    <input type="text" class="datepicker form-control" name="stdate_class" id="stdate_class" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top:0;">
                    <button type="button" class="btn btn-success" id="ClassesModal_submit"> Submit </button>
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
<script src="<?php echo base_url()."assets/plugins/multi-select/js/jquery.multi-select.js"?>"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

<!-- Input Mask Plugin Js -->
<script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>


<script>
    $(document).ready(function () {
        getTeachers();

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
        var teacherEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Teachers' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#teachers",
            "display": 'lightbox',
            "fields": [
                {
                    "label": "NIC:",
                    "name": "teachers.nic",
                },
                {
                    "label": "Title:",
                    "name": "teachers.title",
                    "type": "select",
                    "options": [
                        "Mr.",
                        "Ms.",
                        "Mrs.",
                        "Ven."
                    ]
                },
                {
                    "label": "Name:",
                    "name": "teachers.teacher_in_name",
                },
                {
                    "label": "Mobile:",
                    "name": "teachers.teacher_mobile",
                },
                {
                    "label": "Email:",
                    "name": "teachers.teacher_email",
                },
                {
                    "label": "Trained Teacher:",
                    "name": "teachers.teacher_trained_1",
                    "type": "select",
                },
                {
                    "label": "Date of Appointment to Teacher Service:",
                    "name": "teachers.appoint_service",
                },
                {
                    "label": "Date of Appointment to School:",
                    "name": "teachers.appoint_school",
                },
                {
                    "label": "Subject 01:",
                    "name": "teachers.teacher_sub_1",
                    "type": "select",
                    "placeholder": "<-- Please Select -->",
                    "placeholderDisabled": false,
                },
                {
                    "label": "Subject 02:",
                    "name": "teachers.teacher_sub_2",
                    "type": "select",
                    "placeholder": "<-- Please Select -->",
                    "placeholderDisabled": false,
                },
                {
                    "label": "Subject 03:",
                    "name": "teachers.teacher_sub_3",
                    "type": "select",
                    "placeholder": "<-- Please Select -->",
                    "placeholderDisabled": false,
                }
            ]
        } );

        teacherEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );

        teacherEditor.field('teachers.title').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.nic').input().addClass( 'form-control' );
        teacherEditor.field('teachers.teacher_in_name').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_mobile').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_email').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_trained_1').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_sub_1').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_sub_2').input().addClass( 'form-control show-tick' );
        teacherEditor.field('teachers.teacher_sub_3').input().addClass( 'form-control show-tick' );

        $('#teachers').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Dtable/Teachers' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "teachers.title" },
                { data: "teachers.teacher_in_name" },
                { data: "teachers.nic" },
                { data: "teachers.teacher_mobile" },
                { data: "teachers.teacher_email" },
                { data: "subject1.subject_name" },
                { data: "subject2.subject_name" },
                { data: "subject3.subject_name" }
            ],
            select: true,
            buttons: [
                { extend: "edit",   editor: teacherEditor },
                { extend: "remove", editor: teacherEditor }
            ]
        } );


        //Handle Classes DataTable
        var classEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Classes' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#classes",
            "display": 'lightbox',
            "fields": [
                {
                    "label": "School Census ID:",
                    "name": "classes.school_id",
                    "def": "<?php echo $this->session->school_id; ?>",
                    attr:  {
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
                    "label": "Class Start Date:",
                    "name": "classes.commenced_date",
                    "type": "date",
                }
            ]
        } );

        classEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );

        classEditor.field('classes.school_id').input().addClass( 'form-control show-tick' );
        classEditor.field('classes.grade').input().addClass( 'form-control show-tick' );
        classEditor.field('classes.class_name').input().addClass( 'form-control show-tick' );
        classEditor.field('classes.class_teacher').input().addClass( 'form-control show-tick' );
        classEditor.field('classes.commenced_date').input().addClass( 'form-control show-tick' );

        var clasTable = $('#classes').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Dtable/Classes' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "classes.grade" },
                { data: "classes.class_name" },
                { data: "teachers.teacher_in_name" },
                { data: "classes.commenced_date" }
            ],
            select: true,
            bFilter: false,
            buttons: [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        $('#ClassesModal-title').text('Add Class');
                        $('#ClassesModal_submit').data('action', 'add')
                        $('#ClassesModal').modal('toggle');
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
                        if(clasTable.rows({selected: true}).data()['0']){
                            $('#ClassesModal-title').text('Edit Subject');
                            $('#ClassesModal').data('action', 'edit')
                            $('#ClassesModal').modal('toggle');

                            var data = clasTable.rows({selected: true}).data();
                            $('#subj').val( data[0]['subject_name'] );
                            $('#subj_id').val( data[0]['DT_RowId'].split("_")[1] );
                            $('.form-line').addClass('focused')
                        }

                    }
                },
                { extend: "create", editor: classEditor }
            ]
            // buttons: [
            //     { extend: "create", editor: classEditor },
            //     { extend: "edit",   editor: classEditor },
            //     { extend: "remove", editor: classEditor }
            // ]
        } );


        //Handle Subjects DataTable
        var subjectEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/ClassSubjects' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#subjects",
            "display": 'lightbox',
            "fields": [
                {
                    "label": "School Census ID:",
                    "name": "class_subjects.school_id",
                    "def": "<?php echo $this->session->school_id; ?>",
                    attr:  {
                        "readonly": "readonly"
                    }
                },
                {
                    "label": "Class:",
                    "name": "class_subjects.class_id",
                    "type": "select",
                    "className": "form-control",
                },
                {
                    "label": "Subject:",
                    "name": "class_subjects.subject_id",
                    "type": "select",
                },
                {
                    "label": "Teacher:",
                    "name": "class_subjects.teacher_id",
                    "type": "select",
                }
            ]
        } );

        subjectEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );

        subjectEditor.dependent( 'class_subjects.subject_id', function ( val, data) {
            var sub = data.values.subject_id;
            var teacherList = new Array({"label" : "<-- Please Select -->", "value" : ""});
            $.ajax ( {
                url         : "<?php echo base_url().'index.php/FormControl/getTeachers'; ?>",
                data        : {
                    "<?php echo $this->security->get_csrf_token_name(); ?>" : "<?php echo $this->security->get_csrf_hash(); ?>",
                    "subj" : val
                },
                type        : 'post',
                dataType    : 'json',
                success     : function ( res ) {
                    $.each(res, function(ID){
                        obj= { "label" : res[ID]['teacher_in_name'], "value" : res[ID]['id']};
                        teacherList.push(obj);
                    });
                    subjectEditor.field('class_subjects.teacher_id').update( teacherList );
                }
            });
        } );

        subjectEditor.field('class_subjects.school_id').input().addClass( 'form-control' );
        subjectEditor.field('class_subjects.class_id').input().addClass( 'form-control show-tick' );
        subjectEditor.field('class_subjects.subject_id').input().addClass( 'form-control show-tick' );
        subjectEditor.field('class_subjects.teacher_id').input().addClass( 'form-control show-tick' );

        $('#subjects').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Dtable/ClassSubjects' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "classes.class_name" },
                { data: "subject.subject_name" },
                { data: "teachers.teacher_in_name" }
            ],
            select: true,
            bFilter: false,
            buttons: [
                { extend: "create", editor: subjectEditor },
                { extend: "edit",   editor: subjectEditor },
                { extend: "remove", editor: subjectEditor }
            ]
        } );

        //Handle Users DataTable
        var usersEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#users",
            "display": 'lightbox',
            "fields": [
                {
                    "label": "School Census ID:",
                    "name": "school_id",
                    "def": "<?php echo $this->session->school_id; ?>",
                    attr:  {
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
                    options: [
                        { label: "School Administrator", value: 1 },
                        { label: "Finance Administrator", value: 2 },
                        { label: "Class Teacher",    value: 3 }
                    ]
                }
            ]
        } );

        usersEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );

        usersEditor.field('name').input().addClass( 'form-control' );
        usersEditor.field('uname').input().addClass( 'form-control' );
        usersEditor.field('passwd').input().addClass( 'form-control' );
        usersEditor.field('role').input().addClass( 'form-control show-tick' );

        $('#users').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "name" },
                { data: "uname" },
                { data: "role" }
            ],
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        var role;
                        if(data == '1'){
                            role = "School Coordinator";
                        }else
                        if(data == '2'){
                            role = "Finance Administrator";
                        }else if(data == '3'){
                            role = "Class Teacher"
                        }
                        return role;
                    },
                    "targets": 2
                }
            ],
            select: true,
            buttons: [
                { extend: "edit",   editor: usersEditor }
            ]
        } );

        $('#students').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Dtable/Students' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "students_info.index_no" },
                { data: "students_info.in_name" },
                { data: "students_info.nic" },
                { data: "students_info.gender" },
                { data: "students_info.address" },
                { data: "students_info.telephone" },
                { data: "students_info.medium" },
                { data: "students_info.dist_school" },
                { data: "students_info.income" },
                { data: "travel_mode.travel_mode" }
            ],
            select: true,
            buttons: [
                'copy', 'csv', 'pdf', 'print'
            ]
        } );

        $('#ClassesModal_submit').click(function() {
            var formAction = $(this).data('action');
            var form_data = new FormData();

            var census_id = $('#census_id_class').val();
            var grade = $('#grade_class').val();
            var name = $('#name_class').val();
            var teacher = $('#teacher_class').val();
            var stdate = $('#stdate_class').val();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('formAction', formAction);
            form_data.append('census_id', census_id);
            form_data.append('grade', grade);
            form_data.append('name', name);
            form_data.append('teacher', teacher);
            form_data.append('stdate', stdate);

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

        function getTeachers() {
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'};
            var post_url = "index.php/FormControl/getTeachers_School";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                async: false,
                success: function(res){
                    $('#teacher_class').empty();
                    $('#teacher_class').append('<option value="" hidden selected> ---------Please Select---------</option>');
                    $.each(res, function(ID){
                        $('#teacher_class').append('<option value='+res[ID].id+'>'+res[ID].teacher_in_name+'</option>');
                    });
                    $('#teacher_class').selectpicker('refresh');
                }
            });
        }
    });
</script>
