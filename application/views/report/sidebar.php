<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * Date: 9/26/17
 * Time: 1:54 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url()."index.php/report/index"?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" id="allschools" >
                        <i class="material-icons">done_all</i>
                        <span>List All Schools</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle" id="schoolMenu">
                        <i class="material-icons">school</i>
                        <span>Select School</span>
                    </a>
                    <ul class="ml-menu" id="schoolListMenu">
                    <input type="text" class="form-control" id="searchSchool" placeholder="Search school" title="Type in a name">

                    <?php if ($schools) { ?>
                    <?php foreach ($schools as $row) { ?>
                        <li>
                            <a href="javascript:void(0);" data-id="<?php echo $row['census_id'];?>" data-name = "<?php echo $row['census_id'] . ' - ' .  $row['schoolname'];?>" data-type="school" data-zone="<?php echo $row['zone'];?>" data-province="<?php echo $row['province'];?>" class="getSchool filter">
                                <span> <?php echo $row['census_id'] . ' - ' . $row['schoolname'] ;?> </span>
                            </a>
                        </li>
                    <?php    } ?>
                    <?php } ?>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle" id="subjectsMenu">
                        <i class="material-icons">book</i>
                        <span>Select Subject</span>
                    </a>
                    <ul class="ml-menu" id="subjectListMenu">
                    <input type="text" class="form-control" id="searchSubjects" placeholder="Search Subjects" title="Type in a name">

                    <?php if ($subjects) { ?>
                    <?php foreach ($subjects as $row) { ?>
                        <li>
                            <a href="javascript:void(0);" data-id="<?php echo $row['id'];?>" data-name = "<?php echo $row['subject_name'] ;?>" data-type="subject" class="getSubject filter">
                                <span> <?php echo $row['subject_name'] ;?> </span>
                            </a>
                        </li>
                    <?php    } ?>
                    <?php } ?>

                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/report/getmap"?>">
                        <i class="material-icons">map</i>
                        <span>View on map</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy;2017 <a href="javascript:void(0);">Data Management Branch</a><br>
                <a href="javascript:void(0);">Ministry of Education, Sri Lanka</a>
            </div>
            <div class="version">
                <b>Version: </b> 1.0.5
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
    </aside>
    <!-- #END# Right Sidebar -->
</section>

