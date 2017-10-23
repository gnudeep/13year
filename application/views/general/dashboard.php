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
<html>
    <head>
        <meta charset="utf-8" />
        <title> 13 Years of Guaranteed Education Program </title>
        <!-- Favicon-->
        <link rel="icon" href="<?php echo base_url()."assets/favicon2.ico"?>" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="<?php echo base_url()."assets/css/gfonts.css"?>" rel="stylesheet" type="text/css">

        <!-- Material Icons -->
        <link href="<?php echo base_url()."assets/css/material-icons.css"?>" rel="stylesheet">

        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.css"?>" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="<?php echo base_url()."assets/plugins/node-waves/waves.css"?>" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="<?php echo base_url()."assets/plugins/animate-css/animate.css"?>" rel="stylesheet" />

        <!-- Sweet Alert Css -->
        <link href="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.css"?>" rel="stylesheet" />

        <!-- DataTables Css -->
        <link href="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/select/css/select.dataTables.min.css"?>" rel="stylesheet" />

        <!-- DataTables Editor Css -->
        <link href="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/editor/css/editor.dataTables.min.css"?>" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="<?php echo base_url()."assets/css/style.css"?>" rel="stylesheet">

        <!-- Admin Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="<?php echo base_url()."assets/css/themes/all-themes.css"?>" rel="stylesheet" />

        <!-- Bootstrap Select Css -->
        <link href="<?php echo base_url()."assets/plugins/bootstrap-select/css/bootstrap-select.css"?>" rel="stylesheet" />

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url()."assets/plugins/jquery/jquery.min.js"?>"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.js"?>"></script>
    </head>

    <body class="theme-teal">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <section class="content" style="margin-left:15px; margin-top:15px;">
            <div class="row clearfix">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SCHOOLS MAP
                            </h2>
                        </div>
                        <div class="body">
                            <div id="regions_div" style="width: 850px; height: 800px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <div class="card">
                        <div class="header">
                            <h2 id="school">
                                SELECTED SCHOOL
                            </h2><small id="schooldesc">School Info</small>
                        </div>
                        <div class="body">
                            <div class="info-box-3 bg-red hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="content">
                                    <div>Total Students</div>
                                    <div id="students" class="number count-to" data-from="0" data-speed="500" data-fresh-interval="20"></div>
                                </div>
                            </div>
                            <div class="info-box-3 bg-red hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="content">
                                    <div>Male</div>
                                    <div id="male" class="number count-to" data-from="0" data-to="" data-speed="500" data-fresh-interval="20"></div>
                                </div>
                            </div>
                            <div class="info-box-3 bg-red hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="content">
                                    <div>Female</div>
                                    <div id="female" class="number count-to" data-from="0" data-to="" data-speed="500" data-fresh-interval="20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SCHOOLS LIST
                            </h2>
                        </div>
                        <div class="body">
                            <div id="regions_div2" style="width: 900px; height: 500px;"></div>
                        </div>
                    </div>
                </div>-->
            </div>
        </section>

<script src="<?php echo base_url()."assets/plugins/jquery-countto/jquery.countTo.js"?>"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--<script type="text/javascript">
    google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyDMi68dvm91pJnVYOEL087Y_5wioxMLOmc'
    });
    google.charts.setOnLoadCallback(drawMarkersMap);

    function drawMarkersMap() {
        var data = google.visualization.arrayToDataTable([
            ['latitude', 'longitude', 'School', 'Students.'],
            [6.894843, 79.859356, 'Kotahena M. M. V.', 1285.31]
        ]);


        var options = {
            region: 'LK',
            displayMode: 'markers',
            colorAxis: {colors: ['green', 'blue']},
            magnifyingGlass: {enable: true, zoomFactor: 12}
        };

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div2'));

        chart.draw(data, options);
        google.visualization.events.addListener(chart, 'select', selectHandler);


        function selectHandler(){
            var selection = chart.getSelection();
            var message = data.getValue(selection[0].row, 2);

            for (var i = 0; i < selection.length; i++) {
                var item = selection[i];
                if (item.row != null && item.column != null) {
                    message += '{row:' + item.row + ',column:' + item.column + '}';
                } else if (item.row != null) {
                    message += '{row:' + data.getValue(item.row, 2) + '}';
                } else if (item.column != null) {
                    message += '{column:' + item.column + '}';
                }
            }
            if (message == '') {
                message = 'nothing';
            }
            alert('You selected ' + message);
        }
    }

</script>-->

<script>
    $(document).ready(function () {
        $schoolsArray = Array(<?php echo json_encode($schools); ?>);
        console.log(<?php echo json_encode($schools); ?>);
        google.charts.load('current', { 'packages': ['map', 'table'],
                                       'mapsApiKey': 'AIzaSyDMi68dvm91pJnVYOEL087Y_5wioxMLOmc'});
        google.charts.setOnLoadCallback(drawMap);

        function drawMap() {
            var data = google.visualization.arrayToDataTable([
                ['latitude', 'longitude', 'School'],
                <?php foreach($schools as $row) {?>
                <?php if($row['lat']) { ?>
                <?php echo '['. $row['lat'] . ', ' . $row['lot'] . ', "' . $row['schoolname'] . '"],'; ?>
                <?php } ?>
                <?php } ?>
            ]);

            var options = {
                center: {lat: 7.611513, lng: 80.699751},
                enableScrollWheel: true,
                showTooltip: true,
                showInfoWindow: true,
                mapType: 'normal',
                zoomLevel: 8
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
                
                $('#school').text(school);
                $('#schooldesc').text(zone + ' Zone, ' + province + ' Province');

                var post_url = "index.php/General/getSchoolData/2";
                var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',school_id: school_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        /*$('#main_division').empty();
                        $.each(res, function(ID,province_office){
                            $('#main_division').append('<option value='+res[ID].ID+'>'+res[ID].office_division+'</option>');
                        });*/
                        $('#students').text(res['total']);
                        $('#male').text(res['male']);
                        $('#female').text(res['female']);
                    }
                });

                //$('.count-to').countTo();
                /*var Placedata = google.visualization.arrayToDataTable([
                    ['', 'School', 'Male', 'Female'],

                ]);

                var table = new google.visualization.Table(document.getElementById('table_div'));
                table.draw(Placedata, {showRowNumber: false, width: '100%', sort: 'disable'});*/
            }
        };
    });
</script>

