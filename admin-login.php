<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Apr 2023 20:43:20 GMT -->
    <head>
        
        <?php include 'web-layouts/admin-layout/admin-head.php';?> 

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div style="background-color: #8a1739;;">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-white p-4">
                                            <h5 class="text-white">Welcome Back !</h5>
                                            <p>Sign in to continue.</p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    <a href="index.html" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/1.png" alt="" class="rounded-circle" height="80">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal"  onsubmit="return login()">
                                            
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="txt_uname" name="txt_uname" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" id="txt_pwd" name="txt_pwd" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check"></div>
                                        
                                        <div class="mt-3 d-grid">
                                            <button id="but_submit" class="btn btn-light waves-effect waves-light text-white" style="background-color: #8a1739;" type="submit">Log In</button>
                                        </div>
                                    </form>

                                </div>
            
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <?php include 'web-layouts/admin-layout/admin-script.php';?>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 30 Apr 2023 20:43:20 GMT -->
</html>

<script type="text/javascript">
            $(document).ready(function(){

                $("#but_submit").click(function(){
                    var username = $("#txt_uname").val().trim();
                    var password = $("#txt_pwd").val().trim();

                    if( username != "" && password != "" ){
                        $.ajax({
                            url:'checkUser.php',
                            type:'post',
                            data:{username:username,password:password},
                            success:function(response){
                                var msg = "";
                                if(response == 1){
                                    window.location = "admin/index.php";
                                }else{
                                    msg = "Invalid username and password!";
                                }
                                $("#message").html(msg);
                            }
                        });
                    }
                });

            });
        </script>
