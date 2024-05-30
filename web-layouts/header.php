<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo $url;?>admin/index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo $url;?>assets/images/title.png" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo $url;?>assets/images/title.png" alt="" height="50">
                    </span>
                </a>

                <a href="<?php echo $url;?>admin/index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo $url;?>assets/images/title.png" alt="" height="50">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo $url;?>assets/images/title.png" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <div class="header-text">
            <h2 class="text-center text-uppercase">Q Mandoob</h2>
        </div>
        <div class="d-flex">
            
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item text-danger" href="<?php echo $url;?>admin-logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                </div>
            </div>
            
        </div>
    </div> 
</header>