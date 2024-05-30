
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
        
                                        <h4 class="card-title">Users</h4>
                                        <p class="card-title-desc"></p>
        
                                        <table id="fetch_user_tbl" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>User name</th>
                                                <th>Password</th>
                                                <th>Status</th>
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


                        <div id="userEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">UPDATE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="card">
                                        <div class="card-body bg-white">
                                            <form id="user_update_frm">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="division_name" class="form-label">User name</label>
                                                            <input type="text" class="form-control" placeholder="Enter User Name" name="euser_name" id="euser_name">
                                                            <input type="hidden" class="form-control" placeholder="Enter Devision Name" name="euser_id" id="euser_id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="division_name" class="form-label">Password</label>
                                                            <input type="text" class="form-control" placeholder="Enter Password Name" name="euser_password" id="euser_password">
                                                        </div>
                                                    </div>
                                                    
                                                </div> 
                                                <button type="submit" id="update_user" class="btn btn-success waves-effect waves-light">Update</button>      
                                                                        
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
        user_tbl=$('#fetch_user_tbl').DataTable({
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                'url': 'fetch_user.php',
                'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1]
                },

                ]
                });
            });

            $(document).on('click', '#edit_users', function(){  
            var user_id = $(this).attr("data-id");
           $.ajax({  
                url:"edit_user.php",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data){ 
                    //console.log(response); 
                    $('#euser_id').val(user_id);
                    $('#euser_name').val(data.user_name);
                    $('#euser_password').val(data.user_password);
                    $('#userEditModal').modal('show');
                }  
           });  
        });  


        $('#user_update_frm').on('submit', function(event){
            event.preventDefault();
                $.ajax({
                    url:"update_user.php",
                    method:"POST",
                    data:$('#user_update_frm').serialize(),
                    success:function(data)
                    {
                    $('#userEditModal').modal('hide');
                    user_tbl.ajax.reload();
                    alert('User Details updated');
                    }
                });
            }); 


            $(document).on('click', '#delete_users', function(event) {
            var table = $('#fetch_user_tbl').DataTable();
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Are you sure want to delete this user ? ")) {
                $.ajax({
                url: "delete_user.php",
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
                    user_tbl.ajax.reload();
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

            function updateUserStatus(userId, checkbox) {
                var status = checkbox.checked ? 'active' : 'in-active';
                var confirmation = confirm('Are you sure you want to change the user status to ' + status + '?');
                if (confirmation) {
                    // Perform an AJAX request to update the user status
                    $.ajax({
                        url: 'update_user_status.php',
                        type: 'POST',
                        data: {
                            userId: userId,
                            status: status
                        },
                        success: function(response) {
                            // Handle the response
                            // You can show a success message or perform any other necessary actions
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle the error
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    // Reset the checkbox if the user cancels the update
                    checkbox.checked = !checkbox.checked;
                }
            }

            $(document).on('click', '.circle-image2', function() {
    var user_id = $(this).data("user-id");
    var imageName = $(this).data("image-name");

    Swal.fire({
        title: 'Update Profile Image',
        text: 'Are you sure you want to update the profile image for user: ' + user_id + ' with image name: ' + imageName + '?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, proceed with the image update

            // Open a file selection dialog
            var input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.addEventListener('change', function(e) {
                var file = e.target.files[0];

                // Create a FormData object to send the image file
                var formData = new FormData();
                formData.append('user_id', user_id);
                formData.append('image_name', imageName);
                formData.append('profile_image', file);

                // Send an AJAX request to update the image
                $.ajax({
                    url: 'update_image.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Show success message using SweetAlert
                        Swal.fire({
                            title: 'Image Updated',
                            text: 'The profile image has been updated successfully.',
                            icon: 'success'
                        });
                        user_tbl.ajax.reload();
                    },
                    error: function() {
                        // Show error message using SweetAlert
                        Swal.fire({
                            title: 'Error',
                            text: 'An error occurred while updating the profile image.',
                            icon: 'error'
                        });
                    }
                });
            });

            input.click();
        }
    });
});



    </script>

    
