
<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include '../user-layouts/head.php';?>
    <style>
    .circle-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>
</head>
    
<body class="theme-light" data-background="none" data-highlight="red2">
        
<div id="page">
        
    <div id="page-preloader">
        <div class="loader-main"><div class="preload-spinner border-highlight"></div></div>
    </div>
    
	<?php include '../user-layouts/header.php';?>
    <?php include '../user-layouts/footer.php';?>
        
    <div class="page-content header-clear-medium">   

        <div data-height="350" class="caption caption-margins top-10 round-medium " style="background-color: #8a1739;">
            <div class="caption-center">
            <img class="circle-image preload-image horizontal-center scale-box" width="120" src="<?php echo $url;?>function/user/uploads/<?php echo $profile_image; ?>" alt="img" onerror="this.onerror=null; this.src='<?php echo $url;?>user-assets/images/no-pi.png';">
                <h1 class="center-text color-white bolder font-34 top-30"><?php echo $un; ?></h1>
            </div>
           
            <div class="caption-bg bg-18"></div>
        </div>       

        <div class="divider divider-margins"></div>
        
        <a href="../logout.php" class="content-boxed" style="background-color: #8a1739;">
            <div class="content bottom-0">
                <h1 class="bolder bottom-0 text-center" style="color:white;">Logout</h1>
                <p class="under-heading color-highlight font-12 bottom-10"></p>
                <p> </p>
            </div>
        </a>

        
        
    </div>
    
    
    <!-- Page Content Class Ends Here-->

    <div id="menu-settings" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="310" data-menu-effect="menu-over">
        <div class="content bottom-0">
            <div class="menu-title"><h1>Settings</h1><p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
            <div class="divider bottom-20"></div>
            <div class="toggle-with-icon">
                <i class="toggle-icon round-tiny fa fa-moon bg-red2-dark color-white"></i>
                <a href="#" class="toggle-switch toggle-ios toggle-off" 
                   data-toggle-theme
                   data-toggle-height="27"
                   data-toggle-width="50"
                   data-toggle-content="toggle-content-1"
                   data-toggle-checkbox="toggle-checkbox-1"
                   data-bg-on="bg-green1-dark" 
                   data-bg-off="">
                    <span class="color-theme regularbold font-13">Dark Mode</span>
                    <strong></strong>
                    <u></u>
                </a>    
            </div>     
            <div class="divider top-25 bottom-0"></div>
            <div class="link-list link-list-2 link-list-long-border">
                <a href="#" data-menu="menu-highlights">
                    <i class="fa fa-tint bg-green1-dark color-white round-tiny"></i>
                    <span>Page Highlight</span>
                    <strong>16 Color Highlights Included</strong>
                    <em class="bg-highlight">HOT</em>
                </a>    
                <a href="#" data-menu="menu-backgrounds" class="no-border">
                    <i class="fa fa-brush bg-blue2-dark color-white round-tiny"></i>
                    <span>Page Background</span>
                    <strong>10 Page Gradients Included</strong>
                    <em class="bg-highlight">NEW</em>
                </a>      
            </div>
        </div> 
        
    </div>    
    <!--Menu Settings Highlights-->
    <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="380" data-menu-effect="menu-over">
    
        <?php include '../user-layouts/manu_setting_high.php';?>
    
    </div>    
    <!-- Menu Settings Backgrounds-->
    
    <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached round-large" data-menu-height="310" data-menu-effect="menu-over">
         
        <?php include '../user-layouts/manu_back.php';?>
    
    </div>
    <!-- Menu Share-->
    
    <div class="menu-hider"></div>
</div>



<?php include '../user-layouts/script.php';?>
</body>
