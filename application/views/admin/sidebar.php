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
                    <a href="<?php echo base_url()."index.php/admin/index"?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()."index.php/admin/addSchool"?>">
                        <i class="material-icons">add</i>
                        <span>Add School</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="sendMailMenu" class="hidden">
                        <i class="material-icons">send</i>
                        <span>Send Email to Principals</span>
                    </a>
                </li>
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

