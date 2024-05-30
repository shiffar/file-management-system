
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
        
                                        <h4 class="card-title">Document Type</h4>
                                        <p class="card-title-desc"></p>
        
                                        <table id="fetch_doc-type_tbl" class="table table-bordered dt-responsive  nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Created by</th>
                                                <th>Company</th>
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


                        <div id="documentTypeEditModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">UPDATE</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="card">
                                        <div class="card-body bg-white">
                                            <form id="documenttyp_update_frm">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="division_name" class="form-label">Document type name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Document Type Name" name="edocumenttype_name" id="edocumenttype_name">
                                                            <input type="hidden" class="form-control" placeholder="Enter Devision Name" name="edoc_type_id" id="edoc_type_id">
                                                        </div>
                                                    </div>
                                                    
                                                </div> 
                                                <button type="submit" id="update_documenttyp" class="btn btn-success waves-effect waves-light">Update</button>      
                                                                        
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
        doc_typ_tbl=$('#fetch_doc-type_tbl').DataTable({
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                'url': 'fetch_doc-type.php',
                'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [1]
                },

                ]
                });
            });

            $(document).on('click', '#edit_doc_type', function(){  
            var doc_type_id = $(this).attr("data-id");
           $.ajax({  
                url:"edit_documenttyp.php",  
                method:"POST",  
                data:{doc_type_id:doc_type_id},  
                dataType:"json",  
                success:function(data){ 
                    //console.log(response); 
                    $('#edoc_type_id').val(doc_type_id);
                    $('#edocumenttype_name').val(data.edocumenttype_name);
                    $('#documentTypeEditModal').modal('show');
                }  
           });  
        });  


        $('#documenttyp_update_frm').on('submit', function(event){
            event.preventDefault();
                $.ajax({
                    url:"update_documenttyp.php",
                    method:"POST",
                    data:$('#documenttyp_update_frm').serialize(),
                    success:function(data)
                    {
                    $('#documentTypeEditModal').modal('hide');
                    doc_typ_tbl.ajax.reload();
                    alert('Documet Type Details updated');
                    }
                });
            }); 


            $(document).on('click', '#delete_doc_type', function(event) {
            var table = $('#fetch_doc-type_tbl').DataTable();
            event.preventDefault();
            var id = $(this).data('id');
            if (confirm("Are you sure want to delete this document type ? ")) {
                $.ajax({
                url: "delete_documenttyp.php",
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
                    doc_typ_tbl.ajax.reload();
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
