
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
        
                                        <h4 class="card-title">Document Name</h4>
                                        <p class="card-title-desc"></p>
        
                                        <table id="documentNameTbl" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Company</th>
                                                <th>User</th>
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


                        <div id="documentNameEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">UPDATE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="card">
                                        <div class="card-body bg-white">
                                            <form id="document_name_update_frm">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="division_name" class="form-label">Document name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Document Name" name="edocument_name" id="edocument_name">
                                                            <input type="hidden" class="form-control" placeholder="Enter Devision Name" name="edocument_name_id" id="edocument_name_id">
                                                        </div>
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
        document_name_tbl=$('#documentNameTbl').DataTable({
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                'url': 'fetch_doc_name.php',
                'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1]
                },

                ]
                });
            });

            $(document).on('click', '#edit_document_name', function(){  
            var document_name_id = $(this).attr("data-id");
           $.ajax({  
                url:"edit_document_name.php",  
                method:"POST",  
                data:{document_name_id:document_name_id},  
                dataType:"json",  
                success:function(data){ 
                    //console.log(response); 
                    $('#edocument_name_id').val(document_name_id);
                    $('#edocument_name').val(data.edocument_name);
                    $('#documentNameEditModal').modal('show');
                }  
           });  
        });  


        $('#document_name_update_frm').on('submit', function(event){
            event.preventDefault();
                $.ajax({
                    url:"update_document_name.php",
                    method:"POST",
                    data:$('#document_name_update_frm').serialize(),
                    success:function(data)
                    {
                    $('#documentNameEditModal').modal('hide');
                    document_name_tbl.ajax.reload();
                    alert('Document Name Details updated');
                    }
                });
            }); 


            $(document).on('click', '#delete_document_name', function(event) {
            var table = $('#documentNameTbl').DataTable();
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Are you sure want to delete this document name ? ")) {
                $.ajax({
                url: "delete_document_name.php",
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
                    document_name_tbl.ajax.reload();
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
