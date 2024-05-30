
<!doctype html>
<html lang="en">

    
    <head>
        
        <?php include '../../web-layouts/head.php';?>
        
    </head>

    <body data-sidebar="light" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
        <?php include '../../web-layouts/header.php';?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <?php include '../../web-layouts/side-bar.php';?>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Registration Details</h4>
                                        <p class="card-title-desc"></p>
        
                                        <table id="registrationtbl" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Registration No</th>
                                                <th>User</th>
                                                <th>Company</th>
                                                <th>Document Type</th>
                                                <th>Document Name</th>
                                                <th>Document</th>
                                                <th>Expire date</th>
                                                <th>Extra Inputs</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            
                                            </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> 
                        

                    </div> 
                    
                    <!-- container-fluid -->
                </div><!-- End Page-content -->


                <div id="registrationEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">UPDATE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="card">
                <div class="card-body bg-white">
                    <form id="registration_update_frm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="division_name" class="form-label">Registration name</label>
                                    <input type="text" class="form-control" placeholder="Enter Company Name" name="eregistration_name" id="eregistration_name">
                                    <input type="hidden" class="form-control" placeholder="Enter Devision Name" name="eregistration_id" id="eregistration_id">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="division_name" class="form-label">Registration no</label>
                                    <input type="text" class="form-control" placeholder="Enter Registration no" name="eregistration_no" id="eregistration_no">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="division_name" class="form-label">Expire date</label>
                                    <input type="date" class="form-control" placeholder="Enter Expire Date" name="eexpire_date" id="eexpire_date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="division_name" class="form-label">Extra inputs</label>
                                <div id="ecustom_fields_container"></div>
                            </div>
                        </div>
                        <button type="submit" id="update_company" class="btn btn-success waves-effect waves-light">Update</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>




            









                <!-- End Page-content -->

                <?php include '../../web-layouts/footer.php';?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <?php include '../../web-layouts/script.php';?>
    </body>

</html>




<script>
        $(document).ready(function() {
            registration_tbl=$('#registrationtbl').DataTable({
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                'url': 'fetch_registration.php',
                'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1]
                },

                ]
                });
            });

            $(document).ready(function() {
                // File Name click event handler
                $(document).on('click', '.file-link', function(e) {
                    e.preventDefault();
                    
                    var fileId = $(this).data('id');
                    var fileName = $(this).data('file');
                    
                    Swal.fire({
                        title: 'Update File',
                        text: 'Do you want to update the file?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                        input: 'file',
                        inputAttributes: {
                            accept: 'image/*, .pdf, .doc, .docx' // Specify the accepted file types
                        },
                        inputValidator: (value) => {
                            // Validate the file input field
                            if (!value) {
                                return 'You need to select a file.';
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Get the selected file from the Swal response
                            const file = result.value;
                            
                            // Create a FormData object and append the file to it
                            const formData = new FormData();
                            formData.append('newFile', file);
                            formData.append('fileId', fileId);
                            
                            // Example AJAX request to update file location and database
                            $.ajax({
                                url: 'update_file.php', // Replace with your file update PHP script
                                method: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Handle the response from the server
                                    // You can show a success message or perform any other actions
                                    Swal.fire('Success', 'File updated successfully!', 'success');
                                },
                                error: function() {
                                    // Handle any errors that occur during the AJAX request
                                    Swal.fire('Error', 'An error occurred while updating the file.', 'error');
                                }
                            });
                        }
                    });
                });
            });


            $(document).on('click', '#edit_registration', function() {
    var registration_id = $(this).attr("data-id");
    $.ajax({
        url: "edit_registration.php",
        method: "POST",
        data: { registration_id: registration_id },
        dataType: "json",
        success: function(data) {
            $('#eregistration_id').val(registration_id);
            $('#eregistration_name').val(data.registration_name);
            $('#eregistration_no').val(data.registration_no);
            $('#eexpire_date').val(data.expire_date);

            // Parse the custom_fields JSON and generate input fields
            var customFields = JSON.parse(data.custom_fields);
            var customFieldsContainer = $('#ecustom_fields_container');
            customFieldsContainer.empty(); // Clear previous custom fields

            for (var i = 0; i < customFields.length; i++) {
                var field = customFields[i];
                var inputField = '';

                if (isValidDate(field)) {
                    inputField = '<input type="date" class="form-control" name="ecustom_field_' + i + '" value="' + field + '">';
                } else {
                    inputField = '<input type="text" class="form-control" name="ecustom_field_' + i + '" value="' + field + '">';
                }

                var inputGroup = $('<div>').addClass('mb-3').append(inputField);
                customFieldsContainer.append(inputGroup);
            }

            $('#registrationEditModal').modal('show');
        }
    });
});

// Function to check if a string is a valid date
function isValidDate(dateString) {
    var date = new Date(dateString);
    return date instanceof Date && !isNaN(date);
}

$(document).on('click', '#update_company', function(event) {
    event.preventDefault();

    // Serialize the form data
    var formData = $('#registration_update_frm').serializeArray();

    // Add the custom fields data to the serialized form data
    var customFieldsData = $('#ecustom_fields_container input').serializeArray();
    formData = formData.concat(customFieldsData);

    $.ajax({
        url: "update_registration.php",
        method: "POST",
        data: formData,
        dataType: "json",
        success: function(data) {
            $('#registrationEditModal').modal('hide');
            registration_tbl.ajax.reload();
            alert('Registration Details updated');
        }
    });
});




            $(document).on('click', '#delete_registration', function(event) {
            var table = $('#registrationtbl').DataTable();
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Are you sure want to delete this registration ? ")) {
                $.ajax({
                url: "delete_registration.php",
                data: {
                    id: id
                },
                type: "post",
                success: function(data) {
                    var json = JSON.parse(data);
                    status = json.status;
                    if (status == 'success') {
                    //table.fnDeleteRow( table.$('#' + id)[0] );
                    //$("#example tbody").find(id).remove();
                    //table.row($(this).closest("tr")) .remove();
                    $("#" + id).closest('tr').remove();
                    registration_tbl.ajax.reload();
                    } else {
                    alert('Failed');
                    return;
                    }
                }
                });
                } else {
                    return null;
                }



            });
    </script>
