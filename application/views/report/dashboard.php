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
    .info-box-3-high:hover {
    cursor: pointer;
    }
    .info-box-3:hover {
    cursor: pointer;
    }
</style>
<link href="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"?>" rel="stylesheet" />

<section class="content">
    <div class="container-fluid">

        <!-- Exportable Table For School List -->
        <div class="row clearfix">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <div class="card">
                    <div class="body">
                        <div id="regions_div" style=" height: 800px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="position:absolute; right: 10px; z-index:999">
                <div class="card">
                    <div class="header">
                        <h2  id="summary-header">
                            SUMMARY 
                        </h2><small id="summary-title"> </small>
                    </div>
                    <div class="body">
                        <div class="info-box-3-high bg-teal hover-expand-effect DTtrigger" id="schools_count_div" data-id="schools">
                            <div class="icon">
                                <i class="material-icons">business</i>
                            </div>
                            <div class="content">
                                <div class="text">SCHOOLS</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="schools_count" ></div>
                                <div class="text updated hidden">Updated : <span id="update-school"></span> </div>
                            </div>
                        </div>
                        <div class="info-box-3-high bg-teal hover-expand-effect DTtrigger" data-id="teachers">
                            <div class="icon">
                                <i class="material-icons">people</i>
                            </div>
                            <div class="content">
                                <div class="text">TEACHERS</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="teachers_count" ></div>
                                <div class="text updated hidden">Updated : <span id="update-teachers"></span> </div>
                            </div>
                        </div>
                        <div class="info-box-3-high bg-indigo hover-expand-effect DTtrigger" data-id="classes">
                            <div class="icon">
                                <i class="material-icons">domain</i>
                            </div>
                            <div class="content">
                                <div class="text">CLASSES</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="classes_count" ></div>
                                <div class="text updated hidden">Updated : <span id="update-classes"></span> </div>
                            </div>
                        </div>
                        <div class="info-box-3-high bg-red hover-expand-effect DTtrigger" data-id="students">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Students</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="students_count" ></div>
                                <div class="text updated hidden">Updated : <span id="update-students"></span> </div>
                            </div>
                        </div>
                        <div class="info-box-3 bg-red hover-expand-effect DTtrigger" data-id="male students">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Male</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="students_count_male" ></div>
                            </div>
                        </div>
                        <div class="info-box-3 bg-red hover-expand-effect DTtrigger" data-id="female students">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Female</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="students_count_female" ></div>
                            </div>
                        </div>
                        <div class="info-box-3-high bg-deep-purple hover-expand-effect DTtrigger" id="funds_count_div" data-id="funds">
                            <div class="icon">
                                <i class="material-icons">face</i>
                            </div>
                            <div class="content">
                                <div class="text">Funds</div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20" id="funds_count" ></div>
                                <div class="text updated hidden">Updated : <span id="update-funds"></span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Schools Bar Chart -->
        <div class="row clearfix">
        <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="body">
                        <div id="allschools_bar" style=" height: 1300px;" ></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- List Selected info Modal -->
        <div class="modal fade" id="schoolsListModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg2" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <h4 class="modal-title" id="infoModalLabel"> School Information </h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-exportable" id="schoolsList" style="width:100%" >
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
                                    <th>Province</th>
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
                                            <td> <?php echo $row['province'];?> </td>
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
        <div class="modal fade" id="proDetailsModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-teal">
                        <h4 class="modal-title" id="proDetailsModalLabel">All SCHOOLS</h4>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover data-table" id="allSchools">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Census ID</th>
                                        <th>School Name</th>
                                        <th>Teachers</th>
                                        <th>Classes</th>
                                        <th>Students Male</th>
                                        <th>Students Female</th>
                                        <th>Students Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($schoolCounts) { ?>
                                    <?php $id = 1; $male = 0; $female = 0; ?>
                                    <?php foreach ($schoolCounts as $row) { ?>
                                    <?php if ($row['school_id']) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $id;?> </td>
                                        <td>
                                            <?php echo $row['school_id'];?> </td>
                                        <td>
                                            <?php echo $row['school'];?> </td>
                                        <td>
                                            <?php echo $row['teachers'];?> </td>
                                        <td>
                                            <?php echo $row['classes'];?> </td>
                                        <td>
                                            <?php echo $row['male']; $male += $row['male'];?> </td>
                                        <td>
                                            <?php echo $row['female']; $female += $row['female'];?> </td>
                                        <td>
                                            <?php echo $row['students'];?> </td>
                                    </tr>
                                    <?php $id++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                                <tfooter>
                                <?php if ($schoolCounts) { ?>
                                    <tr class="align-center">
                                        <td colspan="2"> Total  </td>
                                        <td> <?php echo $id - 1;?> </td>
                                        <td>
                                            <?php echo $schoolCounts['teachers'];?> </td>
                                        <td>
                                            <?php echo $schoolCounts['classes'];?> </td>
                                        <td>
                                            <?php echo $male;?> </td>
                                        <td>
                                            <?php echo $female;?> </td>
                                        <td>
                                            <?php echo $schoolCounts['students'];?> </td>
                                    </tr>
                                    <?php } ?>
                                </tfooter>
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
<script src="<?php echo base_url()."assets/plugins/jquery-countto/jquery.countTo.js"?>"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script>
    $(document).ready(function () {
        getTotalDetails();
        loadMap();

        var allschools = Array(<?php echo json_encode($schools); ?>);

        var dataArray = new Array();
        dataArray[0] = ['Results', 'First', 'Second'];
        <?php foreach($schools as $row) {?>
        <?php if($row['lat']) { ?>
        dataArray.push(<?php echo '['. $row['lat'] . ', ' . $row['lot'] . ', "' . $row['schoolname'] . '"],'; ?>);
        <?php } ?>
        <?php } ?>

        loadMap(allschools, dataArray);
        loadChart();

        $(".required").append("<span class='col-red'> *</span>");

        $('#schoolsinfo').click(function(){
            $('#schoolsListModal').modal('show');
        });

        $('#allschools').click(function(){
            $('#proDetailsModal').modal('show');
        });

        var schoolsinfotable = $('#schoolsList').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            "order": [[ 8, 'asc' ]],
            "displayLength": 10,
            "drawCallback": function ( settings ) {
                var api = this.api();
                var rows = api.rows( {page:'current'} ).nodes();
                var last=null;
    
                api.column(8, {page:'current'} ).data().each( function ( group, i ) {
                    if ( last !== group ) {
                        $(rows).eq( i ).before(
                            '<tr class="group bg-blue-grey"><td colspan="9">'+group+'</td></tr>'
                        );
    
                        last = group;
                    }
                } );
            },
            buttons: [
                'csv', 'excel',
                { 
                    extend: 'pdf',
                    footer: true,
                    title: 'List of All Schools - 13 Years of Guaranteed Education Program'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    autoPrint: true,
                    footer: true,
                    title: 'List of All Schools - 13 Years of Guaranteed Education Program'
                }
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false
                }
            ]
        } );

        var alltable = $('#allSchools').DataTable({
            dom: 'Bfrtip',
            Sort: true,
            responsive: true,
            buttons: [
                'csv', 'excel',
                { 
                    extend: 'pdf',
                    footer: true,
                    title: 'Program Details - 13 Years of Guaranteed Education Program'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    autoPrint: true,
                    footer: true,
                    title: 'Program Details - 13 Years of Guaranteed Education Program'
                }
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false
                }
            ]
        });
        alltable.on( 'order.dt search.dt', function () {
            alltable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).columns.adjust().draw();

        $('.DTtrigger').click(function(){
            var search_type = $('.ml-menu').find('.active').find('.filter').data('type');
            var search_id = $('.ml-menu').find('.active').find('.filter').data('id');

            if (search_id) {


                var school_name = $('.ml-menu').find('.active').find('.filter').data('name');
                var zone = $('.ml-menu').find('.active').find('.filter').data('zone');
                var province = $('.ml-menu').find('.active').find('.filter').data('province');
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
                                columnDefs: [
                                    {
                                        targets: 0,
                                        header: 'id'
                                    }
                                ],
                                order: [[ 1, 'asc' ]],
                                buttons: [
                                    {
                                        extend: 'csv',
                                        text: 'csv',
                                        exportOptions: {
                                            columns: ':visible'
                                        },
                                        title: school_name.toUpperCase() + ' - ' + id.toUpperCase() + ' LIST' + '\n' +  zone + ' Zone, ' + province + ' Province',
                                        messageTop:  zone + ' Zone, ' + province + ' Province'
                                    },
                                    {
                                        extend: 'excel',
                                        text: 'excel',
                                        exportOptions: {
                                            columns: ':visible'
                                        },
                                        title: school_name.toUpperCase() + ' - ' + id.toUpperCase() + ' LIST',
                                        messageTop:  zone + ' Zone, ' + province + ' Province'
                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        text: 'pdf',
                                        exportOptions: {
                                            columns: ':visible'
                                        },
                                        title: school_name.toUpperCase() + ' - ' + id.toUpperCase() + ' LIST',
                                        messageTop:  zone + ' Zone, ' + province + ' Province'
                                    },
                                    {
                                        extend: 'print',
                                        text: 'Print',
                                        exportOptions: {
                                            columns: ':visible'
                                        },
                                        autoPrint: true,
                                        title: school_name.toUpperCase() + ' - ' + id.toUpperCase() + ' LIST',
                                        messageTop:  zone + ' Zone, ' + province + ' Province'
                                    }
                                ]
                            });

                            table.columns.adjust().draw();
                            table.on( 'order.dt search.dt', function () {
                                table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                    cell.innerHTML = i+1;
                                } );
                                table.column(0).header().innerHTML = '';
                            } ).columns.adjust().draw();
                        }
                    },
                    error: function (response) {
                        
                    }
                });

                if (search_type == 'school') {
                    $('#infoModalLabel').text(id.toUpperCase() + ' - ' + school_name + ' - ' + zone + ' Zone, ' + province + ' Province' );
                } else {
                    $('#infoModalLabel').text(id.toUpperCase());
                }
                
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
            
            var school_id = $(this).data('id');
            var school_name = $(this).data('name');
            var zone = $(this).data('zone');
            var province = $(this).data('province');

            setSchoolData(school_id, school_name, zone, province);
        });
        
        $('.getSubject').click(function(){
            $('.updated').removeClass('hidden');
            $('#funds_count_div').addClass('hidden');

            $('li').removeClass('active');
            $(this).parent().addClass('active');
            $('#subjectsMenu').parent().addClass('active');
            
            var name = $(this).data('name');
            $('#schools_count_div').addClass('hidden');
            $('#summary-header').text(name);
            $('#summary-title').text('');

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
                    $('#teachers_count').text(response['teachers']['count']);
                    $('#update-teachers').text(response['teachers']['last_update']);

                    $('#classes_count').text(response['classes']['count']);
                    $('#update-classes').text(response['classes']['last_update']);

                    $('#students_count').text(response['students']['count']);
                    $('#students_count_male').text(response['students']['male']);
                    $('#students_count_female').text(response['students']['female']);
                    $('#update-students').text(response['students']['last_update']);
                },
                error: function (response) {
                    alert("Error! Please try again.");
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

        function setSchoolData(school_id, school_name, zone, province){
            $('.updated').removeClass('hidden');
            $('#funds_count_div').removeClass('hidden');
            $('#schools_count_div').addClass('hidden');
            $('#schoolMenu').parent().addClass('active');

            $('#summary-header').text(school_name);
            $('#summary-title').text(zone + ' Zone, ' + province + ' Province');

            var post_url = "index.php/report/getschoolData/2";

            var form_data = new FormData();

            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
            form_data.append('school_id', school_id);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: form_data,
                contentType: false,
                processData: false,
                success: function(response){
                    $('#teachers_count').text(response['teachers']['count']);
                    $('#update-teachers').text(response['teachers']['last_update']);

                    $('#classes_count').text(response['classes']['count']);
                    $('#update-classes').text(response['classes']['last_update']);

                    $('#students_count').text(response['students']['count']);
                    $('#students_count_male').text(response['students']['male']);
                    $('#students_count_female').text(response['students']['female']);
                    $('#update-students').text(response['students']['last_update']);

                    $('#funds_count').text((response['funds']['total']).toLocaleString());
                },
                error: function (response) {
                    alert("Error Updating! Please try again.");
                }
            });
        }

        function loadMap(schools, dataArray){
            $schoolsArray = schools;
            
            google.charts.load('current', { 'packages': ['map', 'table'],
                                        'mapsApiKey': 'AIzaSyDMi68dvm91pJnVYOEL087Y_5wioxMLOmc'});
            google.charts.setOnLoadCallback(drawMap);

            function drawMap() {
                var datax = google.visualization.arrayToDataTable([
                    ['latitude', 'longitude', 'School'],
                    <?php foreach($schools as $row) {?>
                    <?php if($row['lat']) { ?>
                    <?php echo '['. $row['lat'] . ', ' . $row['lot'] . ', "' . $row['schoolname'] . '"],'; ?>
                    <?php } ?>
                    <?php } ?>
                ]);

                var data = google.visualization.arrayToDataTable(dataArray, false);

                var options = {
                    center: {lat: 7.611513, lng: 80.699751},
                    enableScrollWheel: true,
                    showTooltip: true,
                    showInfoWindow: true,
                    mapType: 'normal',
                    zoomLevel: 8,
                    vAxis: {
                        minorGridlines: {count:4}
                    }
                };

                var map = new google.visualization.Map(document.getElementById('regions_div'));

                map.draw(data, options);
                google.visualization.events.addListener(map, 'select', selectHandler);

                function selectHandler(){
                    var selection = map.getSelection();
                    var school = data.getValue(selection[0].row, 2);
                    var school_id = $schoolsArray['0'][selection[0].row]['census_id'];
                    var province = $schoolsArray['0'][selection[0].row]['province'];
                    var zone = $schoolsArray['0'][selection[0].row]['zone'];
                    var school_name = school_id + ' - ' + school;
                    
                    $('li').removeClass('active');
                    $('a[data-id=' + school_id + ']').parent().addClass('active');
                    setSchoolData(school_id, school_name, zone, province);
                }
            };
        }

        function loadChart(){
            
            google.charts.load('current', { 'packages': ['bar'],
                                        'mapsApiKey': 'AIzaSyDMi68dvm91pJnVYOEL087Y_5wioxMLOmc'});
            google.charts.setOnLoadCallback(drawMap);

            function drawMap() {
                var data = google.visualization.arrayToDataTable([
                    ['School Name', 'Teachers', 'Classes', 'Students'],
                    <?php foreach($schoolCounts as $row) {?>
                    <?php if($row['school_id']) { ?>
                    <?php echo '["'. $row['school_id'] . ' - ' . $row['school'] . '", ' . $row['teachers'] . ', ' . $row['classes'] . ', ' . $row['students'] . '],'; ?>
                    <?php } ?>
                    <?php } ?>
                ]);

                var options = {
                    legend:{position:'in', alignment: 'start'},
                    chart: {
                      title: 'School Details',
                      subtitle: 'Teachers, Classes and Students Count',
                    },
                    bars: 'horizontal' // Required for Material Bar Charts.
                };
          

                var chart = new google.charts.Bar(document.getElementById('allschools_bar'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        }
    });
</script>