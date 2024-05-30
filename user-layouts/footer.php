<?php

include "in-connection.php";
// Fetch user ID from session (replace 'user_id' with the session variable key)
$userID = $_SESSION['user_id'];
$profile_image = $_SESSION['profile_image'];

// Determine if the current page is home.php
$isHome = (basename($_SERVER['PHP_SELF']) == 'home.php');

// Query to check if there are any notifications
$notificationQuery = "
SELECT 
    cr.expire_date
FROM 
    company_registrations cr
WHERE 
    cr.user_id = $userID
    AND (
        cr.expire_date <= DATE_ADD(CURRENT_DATE(), INTERVAL 5 DAY)
        OR cr.expire_date = CURRENT_DATE()
        OR cr.expire_date < CURRENT_DATE()
    )
LIMIT 1;
";

// Execute the query
$notificationResult = mysqli_query($con, $notificationQuery);

// Check if there are any notifications
$hasNotification = (mysqli_num_rows($notificationResult) > 0);
?>


<div id="footer-menu" class="footer-menu-4-icons footer-menu-style-2">
    <a href="<?php echo $url;?>user-pages/home.php" id="home-button"><i class="fa fa-home"></i><span class="font-13">HOME</span></a>
    <a href="<?php echo $url;?>user-pages/contact-us.php" id="contact-button"><i class="fas fa-address-book"></i><span class="font-13">CONTACT US</span></a>
    <a href="<?php echo $url;?>user-pages/about.php" id="about-button"><i class="fas fa-user"></i><span class="font-13">ABOUT</span></a>
    <?php if ($hasNotification) { ?>
        <a href="<?php echo $url;?>user-pages/notification.php" id="notification-button" style="color: #FF0000;"><i class="fas fa-bell"></i><span class="font-13">Notification</span></a>
    <?php } else { ?>
        <a href="<?php echo $url;?>user-pages/notification.php" id="notification-button"><i class="fas fa-bell"></i><span class="font-13">Notification</span></a>
    <?php } ?>
    <div class="clear"></div>
</div>

<script>
    // Get the current page URL
    var currentPageUrl = window.location.href;

    // Get the footer menu buttons
    var footerButtons = document.querySelectorAll("#footer-menu a");

    // Loop through the footer buttons
    for (var i = 0; i < footerButtons.length; i++) {
        var button = footerButtons[i];
        var buttonUrl = button.getAttribute("href");

        // Check if the button URL matches the current page URL
        if (currentPageUrl.indexOf(buttonUrl) !== -1) {
            // Add the active class to the button
            button.classList.add("active-nav");
        }
    }
</script>
