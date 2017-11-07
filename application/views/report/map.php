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
            <div class="row clearfix">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SCHOOLS MAP
                            </h2>
                        </div>
                        <div class="body">
                            <div id="regions_div" style=" height: 800px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="position:fixed; right: 10px">
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
                                    <div>Total Classes</div>
                                    <div id="classes" class="number count-to" data-from="0" data-speed="500" data-fresh-interval="20"></div>
                                </div>
                            </div>
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
                        
                        $('#classes').text(res['total_classes']);
                        $('#students').text(res['total']);
                        $('#male').text(res['male']);
                        $('#female').text(res['female']);
                    }
                });

            }
        };
    });
</script>

