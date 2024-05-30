<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php include '../user-layouts/head.php';?>
</head>
    
<body class="theme-light" data-background="none" data-highlight="red2">
        
    <div id="page">
        <div id="page-preloader">
            <div class="loader-main"><div class="preload-spinner border-highlight"></div></div>
        </div>

        <?php include '../user-layouts/header.php';?>
        <?php include '../user-layouts/footer.php';?>

        <div class="page-content header-clear">   
            <div data-height="5vh" class="caption"></div>  
            <div class="content-boxed">

                <?php
                    include "in-connection.php";

                    $id = $_GET['id'];

                    $query = "SELECT * FROM company_registrations WHERE id ='$id'";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        // Access the row data
                        $registrationName = $row['registration_name'];
                        $expireDate = $row['expire_date'];
                        $fileName = $row['file_name'];
                        $customFields = $row['custom_fields'];

                        // Output the row data
                        echo '<div class="content center-text bottom-20">';
                        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Display image file with download attribute
                            echo '<img src="' . $url . 'function/company-registration/file-management/' . $fileName . '" class="responsive-image round-small shadow-huge bottom-20">';
                            echo '<a href="' . $url . 'function/company-registration/file-management/' . $fileName . '" class="download-button" id="download-button" download style="font-size: 20px;">View</a>';
                        } else {
                            // Display the SVG icon for all other file formats
                            echo '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="50" height="50" x="0" y="0" viewBox="0 0 404.48 404.48" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <path d="M376.325 87.04c0-16.896-13.824-30.72-30.72-30.72h-230.41c-16.896 0-30.72 13.824-30.72 30.72v286.72c0 16.896 13.824 30.72 30.72 30.72H289.26l87.04-81.92.025-235.52z" style="" fill="#dadee0" data-original="#dadee0" class=""></path>
                                    <path d="M84.475 87.04c0-16.896 13.824-30.72 30.72-30.72h204.81v-25.6c0-16.896-13.824-30.72-30.72-30.72H58.875c-16.896 0-30.72 13.824-30.72 30.72v286.72c0 16.896 13.824 30.72 30.72 30.72h25.6V87.04z" style="" fill="#1bb7ea" data-original="#1bb7ea"></path>
                                    <path d="M319.985 322.56h56.32l-87.04 81.92v-51.2c0-16.896 13.824-30.72 30.72-30.72z" style="" fill="#f2f2f2" data-original="#f2f2f2"></path>
                                    <path d="M161.275 192h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 140.8h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 243.2h138.24a7.68 7.68 0 0 0 7.68-7.68 7.677 7.677 0 0 0-7.68-7.68h-138.24a7.677 7.677 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68M161.275 294.4h76.8a7.68 7.68 0 0 0 7.68-7.68 7.676 7.676 0 0 0-7.68-7.68h-76.8a7.676 7.676 0 0 0-7.68 7.68 7.68 7.68 0 0 0 7.68 7.68" style="" fill="#1f4254" data-original="#1f4254"></path>
                                </g>
                            </svg>';

                            // Add the file name and download button
                            echo '<div class="file-info">';
                            echo '<span class="file-name">' . $fileName . '</span>';
                            echo '<a href="' . $url . 'function/company-registration/file-management/' . $fileName . '" class="download-button" id="download-button" style="font-size: 20px;">View</a>';
                            echo '</div>';
                        }

                        echo '</div>';

                        echo '<div class="content center-text bottom-20">';
                        echo '<h4 class="bolder">Company Registration: ' . $registrationName . '</h4>';
                        echo '<h4 class="bolder">Company Reg No: ' . $fileName . '</h4>';
                        echo '<h4 class="bolder">Expiry Date: ' . $expireDate . '</h4>';

                        $customFieldsArray = json_decode($customFields, true);
                        if (is_array($customFieldsArray)) {
                            echo '<h4 class="bolder">Extra Input:</h4>';
                            foreach ($customFieldsArray as $value) {
                                echo '<h4 class="bolder">' . $value . '</h4>';
                            }
                        }

                        echo '</div>';
                    } else {
                        echo "No rows found.";
                    }

                    mysqli_free_result($result);
                    mysqli_close($con);
                ?>
            </div>
        </div>

        <!-- Menu Settings and other menus -->

        <?php include '../user-layouts/script.php';?>

    </div>
</body>
</html>
