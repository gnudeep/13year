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
                        <div class="form-group form-float">
                            <label class="form-label"> School </label>
                            <select id="school_id" class="form-control show-tick" name="school_id" id="school_id" required>
                                <option value="">-- Please select --</option>
                                <?php if ($schools) { ?>
                                <?php foreach ($schools as $row) { ?>
                                <option value="<?php echo $row['census_id'];?>" > <?php echo $row['census_id'] . ' - ' . $row['schoolname'] ;?> </option>
                                <?php    } ?>
                                <?php } ?>
                            </select>
                        </div>
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
        
        $.validator.addMethod('nic', function (value, element) {
            return value.match(/^([0-9]{9}[x|X|v|V])|([0-9]{12})$/);
        },
          'Please enter valid NIC'
         );
        
        $('#cmobile').inputmask('999-9999999', {
            placeholder: '___-_______'
        });

        //Exportable table
        $('.js-exportable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        var subjectEditor = new $.fn.dataTable.Editor( {
            "ajax": "<?php echo base_url().'index.php/Admin/Subjects' ?>",
            "data":function ( d ) {
                d.<?php echo $this->security->get_csrf_token_name(); ?> = '<?php echo $this->security->get_csrf_hash(); ?>';
            },
            "table": "#subjects",
            "fields": [ 
                {
                "label": "Subject:",
                "name": "subject_name",
                }
            ]
        } );

        subjectEditor.on( 'preSubmit', function ( e, o, action ) {
            o.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>";
        } );
        
        $('#subjects').DataTable( {
            dom: "Bfrtip",
            ajax: {
                url: "<?php echo base_url().'index.php/Admin/Subjects' ?>",
                data:{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' },
                type: "POST"
            },
            serverSide: true,
            columns: [
                { data: "subject_name" }
            ],
            select: {
                style: 'single'
            },
            buttons: [
                { extend: "create", editor: subjectEditor },
                { extend: "edit",   editor: subjectEditor },
                { extend: "remove", editor: subjectEditor }
            ]
        } );
        
        var coordTable = $('#coordinatorTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            page: {length: '5'},
            select: {
                style: 'single'
            },
            buttons: [
                {
                    text: 'New',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        $('#coordinatorModal-title').text('Add Coordinator');
                        $('#coordinatorModal_submit').data('action', 'add')
                        $('#coordinatorModal').modal('toggle');
                        $('#CoordinatorForm').validate({
                            rules: {
                                school : 'required',
                                cname : 'required',
                                cnic : {required :true, nic: true},
                                cmobile : 'required',
                                cdob : 'required',
                                cemail : 'required',
                                cuname : 'required',
                                cpw : 'required',
                                're_passwd': {
                                    equalTo: "#cpw"
                                }
                            },
                            highlight: function(input) {
                                $(input).parents('.form-line').addClass('error');
                            },
                            unhighlight: function(input) {
                                $(input).parents('.form-line').removeClass('error');
                            },
                            errorPlacement: function(error, element) {
                                $(element).parents('.form-group').append(error);
                            }
                        });
                    }
                },
                {
                    text: 'Edit',
                    className: 'btn btn-primary waves-effect',
                    action: function ( e, dt, node, config ) {
                        if(coordTable.rows({selected: true}).data()['0']){
                            $('#coordinatorModal-title').text('Edit Coordinator');
                            $('#coordinatorModal_submit').data('action', 'edit')
                            $('#coordinatorModal').modal('toggle');
                            $('#CoordinatorForm').validate({
                                rules: {
                                    school : 'required',
                                    cname : 'required',
                                    cnic : {required :true, nic: true},
                                    cmobile : 'required',
                                    cdob : 'required',
                                    cemail : 'required',
                                    're_passwd': {
                                        equalTo: "#cpw"
                                    }
                                },
                                highlight: function(input) {
                                    $(input).parents('.form-line').addClass('error');
                                },
                                unhighlight: function(input) {
                                    $(input).parents('.form-line').removeClass('error');
                                },
                                errorPlacement: function(error, element) {
                                    $(element).parents('.form-group').append(error);
                                }
                            });
                            var data = coordTable.rows({selected: true}).data();

                            $('#school_id').val(data['0']['0']).trigger('change');
                            $('#cname').val(data['0']['3']);
                            $('#cnic').val(data['0']['2']);
                            $('#cdob').val(data['0']['4']);
                            $('#cmobile').val(data['0']['5']);
                            $('#cemail').val(data['0']['6']);
                            $('#appsch').val(data['0']['7']);
                            $('#appser').val(data['0']['8']);
                            $('#cuname').val(data['0']['9']);
                            $('.form-line').addClass('focused')
                        }
                        
                    }
                }
            ]
        });
        
        $('#coordinatorModal_submit').click(function(){
            if( $('#CoordinatorForm').valid() ){
                var formAction = $('#coordinatorModal_submit').data('action');
                var form_data = new FormData();
                var school_id = $('#school_id').val();
                var cname = $('#cname').val();
                var cnic = $('#cnic').val();
                var cdob = $('#cdob').val();
                var cmobile = $('#cmobile').val();
                var cemail = $('#cemail').val();
                var appsch = $('#appsch').val();
                var appser = $('#appser').val();
                var cuname = $('#cuname').val();
                var cpw = $('#cpw').val();

                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('formAction', formAction);
                form_data.append('school_id', school_id);
                form_data.append('cname', cname);
                form_data.append('cnic', cnic);
                form_data.append('cdob', cdob);
                form_data.append('cmobile', cmobile);
                form_data.append('cemail', cemail);
                form_data.append('appsch', appsch);
                form_data.append('appser', appser);
                form_data.append('cuname', cuname);
                form_data.append('cpw', cpw);

                var post_url = "index.php/Admin/changeCoordinator/2";
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        location.reload();
                    },
                    error: function (response) {
                        alert("Error Updating! Please try again.");
                    }
                });
            }
        });
            
        
    });
</script>