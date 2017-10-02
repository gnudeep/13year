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
        <!-- Exportable Table -->
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
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Trained Teacher</th>
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


<script>
    $(document).ready(function () {
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

        var teacherEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Sadmin/Teachers' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#teachers",
            "fields": [ 
                {
                    "label": "Title:",
                    "name": "teachers.title",
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
                    "name": "teachers.teacher_trained",
                    "type": "select",
                },
                {
                    "label": "Subject 01:",
                    "name": "teachers.teacher_sub_1",
                    "type": "select",
                },
                {
                    "label": "Subject 02:",
                    "name": "teachers.teacher_sub_2",
                    "type": "select",
                },
                {
                    "label": "Subject 03:",
                    "name": "teachers.teacher_sub_3",
                    "type": "select",
                }
            ]
        } );

        teacherEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );


        $('#teachers').DataTable( {
            dom: "Bfrtip",
            responsive: true,
            ajax: {
                url: "<?php echo base_url().'index.php/Sadmin/Teachers' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "teachers.title" },
                { data: "teachers.teacher_in_name" },
                { data: "teachers.teacher_mobile" },
                { data: "teachers.teacher_email" },
                { data: "teachers.teacher_trained" },
                { data: "subject1.subject_name" },
                { data: "subject2.subject_name" },
                { data: "subject3.subject_name" }
            ],
            "columnDefs": [
                {
                    "render": function (data, type, row) {
                        return (data == '1') ? 'Yes' : 'No';
                    },
                    "targets": 4
                }
            ],
            select: true,
            buttons: [
                { extend: "create", editor: teacherEditor },
                { extend: "edit",   editor: teacherEditor },
                { extend: "remove", editor: teacherEditor }
            ]
        } );
    });
</script>