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
                    <a href="<?php echo base_url()."index.php/sadmin/index"?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/sadmin/addTeacher"?>">
                        <i class="material-icons">add</i>
                        <span>Add Teacher</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/sadmin/createUser"?>">
                        <i class="material-icons">person_add</i>
                        <span>Create User Account</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal"> 
            <div class="copyright m-b-10">
                <div class="align-center">
                    <a type="button" class="btn btn-block bg-teal waves-effect" href="http://dmb.moe.gov.lk" style="color:white !important;"> Back to Data Management Portal </a>
                </div>
            </div>
            <div class="copyright">
                &copy;2017 <a href="javascript:void(0);">Data Management Branch</a><br>
                <a href="javascript:void(0);">Ministry of Education, Sri Lanka</a>
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

