        <?php $url="http://localhost/Q-Ma_finul/"; ?>
        <?php 
        session_start(); 
        if (!$_SESSION['uname']) {
            ?>
                <script>
                    location.href="<?php echo $url ?>admin-login.php";
                </script>
            <?php
        }
    ?>
        

        
    <title>Q Mandoob</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="cdott.com Project" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo $url;?>assets/images/title.png">

        <link href="<?php echo $url;?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url;?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $url;?>assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $url;?>assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $url;?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo $url;?>assets/libs/%40chenfengyuan/datepicker/datepicker.min.css">
        <!-- Bootstrap Css -->
        <link href="<?php echo $url;?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo $url;?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo $url;?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?php echo $url;?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url;?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo $url;?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $url;?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />  

        
        <style>
            body {
                background-image: url('<?php echo $url;?>assets/images/bg5.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
            .banner-img {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .banner-img img {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
            .circle-image2 {
    width: 200px; /* Adjust the width and height according to your needs */
    height: 200px;
    border-radius: 50%; /* This makes the container round */
    overflow: hidden; /* This hides any parts of the image outside the container */
    }

    .circle-image2 img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* This ensures the image fills the container without stretching */
    }
    .profile-image {
        width: 35px; /* Adjust the width as per your preference */
        height: 35px; /* Set height to auto to maintain aspect ratio */
        margin-right: 10px; /* Adjust the margin value to control the spacing */
    }
        </style>
        