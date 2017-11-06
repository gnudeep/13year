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
                            INFO COUNTERS
                        </h2>
                    </div>
                    <div class="body">
                        
                    <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box-3 bg-teal hover-expand-effect DTtrigger" data-id="teachers">
                                    <div class="icon">
                                        <i class="material-icons">business</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">SCHOOLS</div>
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="schools_count" ></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="info-box-3 bg-teal hover-expand-effect DTtrigger" data-id="teachers">
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
                                <div class="info-box-3 bg-teal hover-expand-effect DTtrigger" data-id="classes">
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
                                <div class="info-box-3 bg-teal hover-expand-effect DTtrigger" data-id="students">
                                    <div class="icon">
                                        <i class="material-icons">face</i>
                                    </div>
                                    <div class="content">
                                        <div class="text">Students</div>
                                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="students_count" ></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- List Selected info Modal -->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <h4 class="modal-title" id="infoModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-exportable" id="infoTable" style="width:100%" >
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect bg-teal" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- List All Schools Modal -->
        <div class="modal fade" id="allschholsModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <h4 class="modal-title" id="allschholsModalLabel">All SCHOOLS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover data-table" id="allSchools">
                                <thead>
                                    <tr>
                                        <th>Census ID</th>
                                        <th>School Name</th>
                                        <th>Teachers</th>
                                        <th>Classes</th>
                                        <th>Students</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($schoolCounts) { ?>
                                    <?php foreach ($schoolCounts as $row) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['school_id'];?> </td>
                                        <td>
                                            <?php echo $row['school'];?> </td>
                                        <td>
                                            <?php echo $row['teachers'];?> </td>
                                        <td>
                                            <?php echo $row['classes'];?> </td>
                                        <td>
                                            <?php echo $row['students'];?> </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
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
        getTotalDetails();

        $(".required").append("<span class='col-red'> *</span>");

        $('#allschools').click(function(){
            $('#allschholsModal').modal('show');
        });

        $('#allSchools').DataTable({
            dom: 'Bfrtip',
            bSort: false,
            responsive: true,
            buttons: [
                'csv', 'excel', 'pdf',
                {
                    extend: 'print',
                    text: 'Print',
                    autoPrint: true,
                    title: 'List of All Schools - 13 Years of Guaranteed Education Program'
                }
            ]
        });

        $('.DTtrigger').click(function(){
            var search_type = $('.ml-menu').find('.active').find('.filter').data('type');
            var search_id = $('.ml-menu').find('.active').find('.filter').data('id');

            if (search_id) {
                var school_name = $('#school_id').find(":selected").text();
                var form_data = new FormData();
                var id = $(this).data("id");
                
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('search_type', search_type);
                form_data.append('select', id);
                form_data.append('search_id', search_id);
                
                var columns = [];
                var data = [];
                var row = [];

                var post_url = "index.php/report/getSelectedInfo/2";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        if (res.data) {
                            var table = $('#infoTable').DataTable({
                                dom: 'Bfrtip',
                                destroy: true,
                                bSort: false,
                                responsive: true,
                                data: res.data,
                                columns: res.columns,
                                buttons: [
                                    'csv', 'excel', 'pdf',
                                    {
                                        extend: 'print',
                                        text: 'Print',
                                        autoPrint: true,
                                        title: school_name + ' - ' + id + ' list'
                                    }
                                ]
                            });

                            table.columns.adjust().draw();
                        }
                        
                        
                    },
                    error: function (response) {
                        
                    }
                });

                $('#infoModalLabel').text(id.toUpperCase())
                $('#infoModal').modal('show');
            }
            
        });

        $('#infoModal').on('hidden.bs.modal', function () {
            if ( $.fn.dataTable.isDataTable('#infoTable')){
                $('#infoTable').DataTable().destroy();
                $('#infoTable').empty();
            }
                
        })
        
        $('.getSchool').click(function(){
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            $('#schoolMenu').parent().addClass('active');

            var form_data = new FormData();
            var school_id = $(this).data('id');

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
                    $('#schools_count').text('');
                    $('#teachers_count').text(response['teachers']);
                    $('#classes_count').text(response['classes']);
                    $('#students_count').text(response['students']);
                },
                error: function (response) {
                    alert("Error Updating! Please try again.");
                }
            });
        });
        
        $('.getSubject').click(function(){
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            $('#subjectsMenu').parent().addClass('active');

            var form_data = new FormData();
            var subject_id = $(this).data('id');

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('subject_id', subject_id);

            var post_url = "index.php/report/getSubjectData/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#schools_count').text('');
                    $('#teachers_count').text(response['teachers']);
                    $('#classes_count').text(response['classes']);
                    $('#students_count').text(response['students']);
                },
                error: function (response) {
                    alert("Error Updating! Please try again.");
                }
            });
        });
            
        $('#searchSchool').keyup(function(){
            var filter, ul, li, a, i;
            filter = $(this).val().toUpperCase();
            ul = document.getElementById("schoolListMenu");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        });
            
        $('#searchSubjects').keyup(function(){
            var filter, ul, li, a, i;
            filter = $(this).val().toUpperCase();
            ul = document.getElementById("subjectsMenu");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        });
        
        function getTotalDetails(){

            var form_data = new FormData();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');

            var post_url = "index.php/report/getTotalDetails/2";
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#schools_count').text(response['schools']);
                    $('#teachers_count').text(response['teachers']);
                    $('#classes_count').text(response['classes']);
                    $('#students_count').text(response['students']);
                },
                error: function (response) {
                    alert("Error! Please try again.");
                }
            });
        }
    });
</script>