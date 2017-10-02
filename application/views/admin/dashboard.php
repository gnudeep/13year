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
        $('.dataTable').DataTable({
            responsive: true
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
            select: true,
            buttons: [
                { extend: "create", editor: subjectEditor },
                { extend: "edit",   editor: subjectEditor },
                { extend: "remove", editor: subjectEditor }
            ]
        } );
        
    });
</script>