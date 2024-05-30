<?php $url="http://localhost/Q-Ma_finul/"; ?>
<?php 
	session_start(); 
	if (!$_SESSION['user_id']) {
		?>
			<script>
				location.href="<?php echo $url;?>index.php";
			</script>
		<?php
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Q Mandoob</title>
<link rel="shortcut icon" href="<?php echo $url;?>assets/images/title.png">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>user-assets/styles/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>user-assets/styles/framework.css">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>user-assets/fonts/css/fontawesome-all.min.css">  

<style>
    #circle-button {
        position: fixed;
        bottom: 100px;
        right: 20px;
        z-index: 9999;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #menu-signup{
            z-index: 10000;
        }
        #menu-empdtedit{
            z-index: 10001;
        }
        #menu-saldtedit1{
            z-index: 10000;
        }
        #menu-saldtedit2{
            z-index: 10001;
        }
        #menu-confirm{
            z-index: 10000;
        }
        #menu-signup{
            z-index: 10000;
        }
        #menu-empadd{
            z-index: 10001;
        }
    #circle-button i {
        color: #8a1739; /* Set the desired icon color */
        font-size: 24px;
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
    .profile-image-container {
        margin: 10px; /* Adjust the margin value to control the spacing */
    }
    .profile-image {
        width: 35px; /* Adjust the width as per your preference */
        height: 35px; /* Set height to auto to maintain aspect ratio */
        margin-right: 10px; /* Adjust the margin value to control the spacing */
    }
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-left,
    .header-right {
        display: flex;
        align-items: center;
    }

    .header-title {
  /* Add any other styles you need, like font-size, color, etc. */
  max-width: 200px; /* Adjust this value to control the maximum width of the header title */
  overflow: hidden;
}

.header-title-text {
  /* Add any styles you need for the company name text */
  white-space: nowrap;
  text-overflow: ellipsis;
  display: block;
}
</style>