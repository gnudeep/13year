<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 10/30/17
 * Time: 2:58 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .info-box-3:hover {
    cursor: pointer;
    }
</style>
<link href="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"?>" rel="stylesheet" />

<section class="content">
    <div class="container-fluid">
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
                    <?php echo form_open(); ?>
                        <div class="form-group form-float">
                            <label class="form-label"> School </label>
                            <select id="school_id" class="form-control show-tick" name="school_id" autofocus data-live-search="true">
                                <option value="">-- Please select --</option>
                                <?php if ($schools) { ?>
                                <?php foreach ($schools as $row) { ?>
                                <option value="<?php echo $row['census_id'];?>" > <?php echo $row['census_id'] . ' - ' . $row['schoolname'] ;?> </option>
                                <?php    } ?>
                                <?php } ?>
                            </select>
                        </div>
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- School Details Widget -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SCHOOL DETAILS
                        </h2>
                    </div>
                    <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-teal hover-expand-effect" data-id="teachers">
                                <div class="icon">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="content">
                                    <div class="text">TEACHERS</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="teachers_count" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-teal hover-expand-effect" data-id="classes">
                                <div class="icon">
                                    <i class="material-icons">domain</i>
                                </div>
                                <div class="content">
                                    <div class="text">CLASSES</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="classes_count" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-teal hover-expand-effect" data-id="students">
                                <div class="icon">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="content">
                                    <div class="text">Students</div>
                                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="students_count" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-teal">
                                        <h4 class="modal-title" id="infoModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover js-exportable" id="infoTable">
                                                <thead>
                                                    <tr>
                                                        <th>sample</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link waves-effect bg-teal" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            bSort: false,
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('.info-box-3').click(function(){
            var school_id = $('#school_id').val();
            if (school_id) {
                var form_data = new FormData();
                var id = $(this).data("id");
                
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('select', id);
                form_data.append('school_id', school_id);
                
                var post_url = "index.php/report/getSelectedInfo/2";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        $("#infoTable thead tr th").remove();
                        $("#infoTable tbody tr").remove();
                        $.each(res, function(rowIndex, r) {
                            var row = "<tr>";
                            $.each(r, function(colIndex, c) { 
                                if (rowIndex == 0) {
                                    var head = "<th>"+ colIndex +"</th>";
                                    $("#infoTable thead tr").append(head);
                                    
                                    row += "<td>"+c+"</td>";
                                } else {
                                    row += "<td>"+c+"</td>";
                                }
                                //row += "<td>"+c+"</td>";
                            });
                            row += "</tr>";
                            $("#infoTable tbody").append(row);
                            console.log(row);
                            
                        });

                        
                    },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });

                $('#infoModalLabel').text(id.toUpperCase())
                $('#infoModal').modal('show');
            }
            
        });
        
        $('#school_id').change(function(){
            var form_data = new FormData();
            var school_id = $(this).val();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('school_id', school_id);

            var post_url = "index.php/report/getschoolData/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#teachers_count').text(response['teachers']);
                    $('#classes_count').text(response['classes']);
                    $('#students_count').text(response['students']);
                },
                error: function (response) {
                    alert("Error Updating! Please try again.");
                }
            });
        });
            
        
    });
</script>