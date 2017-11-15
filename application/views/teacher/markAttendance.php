<?php
/**
 * Created by Kosala.
 * email: kosala4@gmail.com
 * User: edu
 * Date: 9/28/17
 * Time: 4:11 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?php echo base_url()."assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"?>" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2> MARK ATTENDANCE </h2>
            </div>
            <!-- Basic Validation -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <?php echo form_open('teacher/markAttendance', 'role="form" id="markAttendanceForm"'); ?>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-float">
                                        <label for="attmonth">Select Month to Mark Attendance</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="attmonth" id="attmonth" placeholder="YYYY-MM" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="subjects">
                                    <thead>
                                        <tr>
                                            <th>Index No</th>
                                            <th>Student Name</th>
                                            <th>No of Days Attended</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($students) { ?>
                                        <?php foreach ($students as $row) { ?>
                                        <tr>
                                            <td><?php echo $row['index_no'];?></td>
                                            <td><?php echo $row['in_name'];?></td>
                                            <td class="col-md-4">
                                                <div class="form-group form-float" style="margin-bottom:0;">
                                                    <div class="form-line">
                                                        <input type="text" class="attdays form-control" name="attdays[]" data-student_id="<?php echo $row['std_id'];?>" required>
                                                        <label class="form-label">No of Days Attended</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php    } ?>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-danger waves-effect" type="reset" id="reset">RESET</button>
                            <button class="btn btn-primary waves-effect" type="button" id="attSubmit">SUBMIT</button>
                            <?php echo form_close()?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Form -->
        </div>
    </section>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/bootstrap-select/js/bootstrap-select.js"?>"></script>

    <!-- Input Mask Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"?>"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?php echo base_url()."assets/plugins/sweetalert/sweetalert.min.js"?>"></script>

    <script>
        $(document).ready(function() {
            
            $('#attmonth').bootstrapMaterialDatePicker({
                format: 'YYYY-MM',
                year: true,
                monthPicker: true,
                clearButton: true,
                weekStart: 0,
                time: false,
            });
            
            $('.dtp-picker').addClass('hidden');
            
            $('.attdays').inputmask('d', { placeholder: '__' });
            
            var validator = $('#markAttendanceForm').validate({
                rules: {
                    'attdays[]': 'required'
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
            
            $(".attdays").each(function() {
                $(this).rules('remove');
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: "this field is required."
                    }
                });
            });
            
            $('#attmonth').change(function(){
                var form_data = new FormData();
                var post_url = "index.php/teacher/getMonthAttendance/2";

                var attmonth = $(this).val();
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('attmonth', attmonth);

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        if(res){
                            $.each(res, function(ID){
                                var student_id = res[ID]['student_id'];
                                var days = res[ID]['attended_days']
                                console.log(days);
                                $("input[data-student_id='" + student_id + "']").val(days);
                                $("input[data-student_id='" + student_id + "']").parent().addClass('focused');
                                //$('#main_branch').append('<option value='+res[ID].ID+'>'+res[ID].office_branch+'</option>');
                            });
                        } else {
                            $('#reset').trigger('click');
                            $('#attmonth').val(attmonth);   
                            $('.form-line').removeClass('focused');
                        }
                        
                    },error: function(){
                        $('#reset').trigger('click');
                        $('#attmonth').val(attmonth);
                    }
                });
            });
            
            $('#attSubmit').click(function(){
                $('#markAttendanceForm').valid();
                var form_data = new FormData();
                var post_url = "index.php/Teacher/markAttendance/2";
                
                var attmonth = $('#attmonth').val();
                form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                form_data.append('attmonth', attmonth);
                
                var students = new Array();
                $('input[name^="attdays"]').each(function() {
                    var student_id = $(this).data('student_id');
                    var days = $(this).val();
                    
                    students.push({student_id: student_id, days: days});
                });

                form_data.append('students', JSON.stringify(students));
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'text',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        swal("Successfull!", "Finished Marking Attendance!", "success");
                        $('#reset').trigger('click');
                    }
                });
            });
        });

    </script>
