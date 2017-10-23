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

    <section class="content" style="margin-left:265px;">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    <?php echo strtoupper($school['0']['schoolname']) ;?> </h2>
            </div>
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
            <!-- Students List Table -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FUNDS LIST
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="funds">
                                    <thead>
                                        <tr>
                                            <th> Received Date </th>
                                            <th> Source </th>
                                            <th> Fund purpose </th>
                                            <th> Amount (Rs.) </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Available Balance (Rs.)
                            </h2>
                        </div>
                        <div class="body">
                            <div class="info-box-3 bg-red hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">swap_calls</i>
                                </div>
                                <div class="content">
                                    <div class="number count-to" data-from="0" data-to="<?php echo $balance; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $balance; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                <!-- Students List Table -->
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Expenses
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="expenses">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Category</th>
                                            <th>Type of grant</th>
                                            <th>Pupose of Expenditure</th>
                                            <th>Amount (Rs.)</th>
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

        </div>
    </section>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/jquery.dataTables.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/jszip.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/editor/js/dataTables.editor.js "?>"></script>
    <script src="<?php echo base_url()."assets/plugins/jquery-datatable/extensions/select/js/dataTables.select.min.js "?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-countto/jquery.countTo.js"?>"></script>


    <script>
        $(document).ready(function() {
            
            $('.count-to').countTo();
            $('.js-basic-example').DataTable({
                responsive: true
            });

            //Exportable table
            $('.js-exportable').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });

            //Handle Teachers DataTable
            var fundsEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Finance/Dtable/Funds' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#funds",
                "display": 'lightbox',
                "fields": [{
                        "label": "School Census ID:",
                        "name": "funds.school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Received Date:",
                        "name": "funds.received_date",
                        "type": "date"
                    },
                    {
                        "label": "Fund purpose:",
                        "name": "funds.fund_purpose"
                    },
                    {
                        "label": "Fund Source:",
                        "name": "funds.fund_id",
                        "type": "select",
                        "placeholder": "<-- Please Select -->",
                        "placeholderDisabled": false,
                    },
                    {
                        "label": "Amount:",
                        "name": "funds.amount",
                        "placeholder": "Rs. - "
                    }
                ]
            });

            fundsEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            fundsEditor.field('funds.school_id').input().addClass('form-control show-tick');
            fundsEditor.field('funds.received_date').input().addClass('form-control show-tick');
            fundsEditor.field('funds.fund_id').input().addClass('form-control show-tick');
            fundsEditor.field('funds.fund_purpose').input().addClass('form-control');
            fundsEditor.field('funds.amount').input().addClass('form-control show-tick');

            $('#funds').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Finance/Dtable/Funds' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "funds.received_date"
                    },
                    {
                        data: "funds_list.fund_name"
                    },
                    {
                        data: "funds.fund_purpose"
                    },
                    {
                        data: "funds.amount"
                    }
                ],
                select: true,
                buttons: [{
                        extend: "create",
                        editor: fundsEditor
                    },
                    {
                        extend: "edit",
                        editor: fundsEditor
                    },
                    {
                        extend: "remove",
                        editor: fundsEditor
                    }
                ]
            });


            //Handle Classes DataTable
            var expensesEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Finance/Dtable/Expenses' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#expenses",
                "display": 'lightbox',
                "fields": [{
                        "label": "School Census ID:",
                        "name": "expenses.school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Date:",
                        "name": "expenses.date",
                        "type": "date"
                    },
                    {
                        "label": "Type:",
                        "name": "expenses.type",
                    },
                    {
                        "label": "Fund Source:",
                        "name": "expenses.funds_id",
                        "type": "select",
                    },
                    {
                        "label": "Purpose:",
                        "name": "expenses.purpose"
                    },
                    {
                        "label": "Amount:",
                        "name": "expenses.amount"
                    }
                ]
            });

            expensesEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            expensesEditor.field('expenses.date').input().addClass('form-control show-tick');
            expensesEditor.field('expenses.type').input().addClass('form-control show-tick');
            expensesEditor.field('expenses.funds_id').input().addClass('form-control show-tick');
            expensesEditor.field('expenses.purpose').input().addClass('form-control show-tick');
            expensesEditor.field('expenses.amount').input().addClass('form-control show-tick');
            expensesEditor.field('expenses.school_id').input().addClass('form-control show-tick');

            $('#expenses').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Finance/Dtable/Expenses' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "expenses.date"
                    },
                    {
                        data: "expenses.type"
                    },
                    {
                        data: "funds.fund_purpose"
                    },
                    {
                        data: "expenses.purpose"
                    },
                    {
                        data: "expenses.amount"
                    }
                ],
                select: true,
                buttons: [{
                        extend: "create",
                        editor: expensesEditor
                    },
                    {
                        extend: "edit",
                        editor: expensesEditor
                    },
                    {
                        extend: "remove",
                        editor: expensesEditor
                    }
                ]
            });


            //Handle Users DataTable
            var usersEditor = new $.fn.dataTable.Editor({
                "ajax": "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
                "data": function(d) {
                    d.
                    <?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
                },
                "table": "#users",
                "display": 'lightbox',
                "fields": [{
                        "label": "School Census ID:",
                        "name": "school_id",
                        "def": "<?php echo $this->session->school_id; ?>",
                        attr: {
                            "readonly": "readonly"
                        }
                    },
                    {
                        "label": "Name:",
                        "name": "name",
                    },
                    {
                        "label": "User Name:",
                        "name": "uname",
                    },
                    {
                        "label": "Password:",
                        "name": "passwd",
                        "type": "password",
                    },
                    {
                        "label": "Role:",
                        "name": "role",
                        "type": "select",
                        "className": "form-control",
                        options: [{
                                label: "School Administrator",
                                value: 1
                            },
                            {
                                label: "Finance Administrator",
                                value: 2
                            },
                            {
                                label: "Class Teacher",
                                value: 3
                            }
                        ]
                    }
                ]
            });

            usersEditor.on('preSubmit', function(e, o, action) {
                o.
                <?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
            });

            usersEditor.field('name').input().addClass('form-control');
            usersEditor.field('uname').input().addClass('form-control');
            usersEditor.field('passwd').input().addClass('form-control');
            usersEditor.field('role').input().addClass('form-control show-tick');

            $('#users').DataTable({
                dom: "Bfrtip",
                responsive: true,
                ajax: {
                    url: "<?php echo base_url().'index.php/Sadmin/Dtable/Users' ?>",
                    data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    type: "POST"
                },
                serverSide: true,
                columns: [{
                        data: "name"
                    },
                    {
                        data: "uname"
                    },
                    {
                        data: "role"
                    }
                ],
                "columnDefs": [{
                    "render": function(data, type, row) {
                        var role;
                        if (data == '1') {
                            role = "School Administrator";
                        } else
                        if (data == '2') {
                            role = "Finance Administrator";
                        } else if (data == '3') {
                            role = "Class Teacher"
                        }
                        return role;
                    },
                    "targets": 2
                }],
                select: true,
                buttons: [{
                        extend: "edit",
                        editor: usersEditor
                    },
                    {
                        extend: "remove",
                        editor: usersEditor
                    }
                ]
            });
        });

    </script>
