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
                    <a href="<?php echo base_url()."index.php/teacher/index"?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/teacher/addStudent"?>">
                        <i class="material-icons">add</i>
                        <span> Add Student </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/teacher/attendanceForm"?>">
                        <i class="material-icons">face</i>
                        <span> Mark Attendance </span>
                    </a>
                </li>
                <!--<li>
                    <a href="<?php //echo base_url()."index.php/sadmin/addTeacher"?>">
                        <i class="material-icons">add</i>
                        <span>Add Teacher</span>
                    </a>
                </li>
                <li>
                    <a href="<?php //echo base_url()."index.php/sadmin/createUser"?>">
                        <i class="material-icons">person_add</i>
                        <span>Create User Account</span>
                    </a>
                </li>-->
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <?php $this->load->view('footerNote'); ?>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
    </aside>
    <!-- #END# Right Sidebar -->
</section>

