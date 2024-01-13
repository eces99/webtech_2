<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="./Images/Untitled-design.svg">
    <title>News</title>

</head>

<body>

    <!--Navbar-->
    <header>
        <?php include_once './includes/navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover;">
        <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">News</h1>


        <?php

        include_once "./includes/dbaccess.php";

        // News Post PHP
        $query_select = "SELECT `news_title`, `news_text`, `news_filepath`, `news_date` FROM `news` ORDER BY `news_id` DESC";
        $stmt = $db_obj->prepare($query_select);
        $stmt->execute();
        $stmt->bind_result($db_newsTitle, $db_newsText, $db_newsFilepath, $db_newsDate);

        if (!($stmt->fetch())) { // check if no posts have been made
        ?>
            <div class="container" id="login_form">
                <div class="row" id="box">
                    <div class="col text-center"><i>Noch keine Beiträge wurden veröffentlicht.</i></div>
                </div>
            </div>
            <?php
        } else {
            do {
            ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-9 text-center" id="box">
                            <h4 class="mt-3"><?php echo $db_newsTitle; ?></h4>
                            <?php if ($db_newsFilepath) {
                                echo '<img src="' . $db_newsFilepath . '" alt="newsImage" class="img-thumbnail mt-3 mb-3" style="width:50%;">';
                            } ?>
                            <p class="mb-3 text-justify"><?php echo $db_newsText; ?></p>
                            <h6 class="mb-3 text-left">Veröffentlicht am <?php echo $db_newsDate; ?></h6>
                        </div>
                    </div>
                </div>
            <?php
            } while ($stmt->fetch());
        }

        // Function to resize image
        function resizeImage($sourcePath, $destPath, $newWidth, $newHeight)
        {
            $imageInfo = getimagesize($sourcePath);
            $mime = $imageInfo['mime'];

            switch ($mime) {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($sourcePath);
                    break;
                case 'image/png':
                    $image = imagecreatefrompng($sourcePath);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($sourcePath);
                    break;
                default:
                    return false; // Unsupported image type
            }

            list($originalWidth, $originalHeight) = getimagesize($sourcePath);
            $ratio = $originalWidth / $originalHeight;

            if ($newWidth === null) {
                $newWidth = $newHeight * $ratio;
            } elseif ($newHeight === null) {
                $newHeight = $newWidth / $ratio;
            }

            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

            switch ($mime) {
                case 'image/jpeg':
                    imagejpeg($resizedImage, $destPath);
                    break;
                case 'image/png':
                    imagepng($resizedImage, $destPath);
                    break;
                case 'image/gif':
                    imagegif($resizedImage, $destPath);
                    break;
            }

            imagedestroy($image);
            imagedestroy($resizedImage);

            return true;
        }

        // Upload Form PHP
        $newsText = $newsHeader = "";

        if (isset($_POST["text"])) {
            $newsText = $_POST["text"];
        }
        if (isset($_POST["header"])) {
            $newsHeader = $_POST["header"];
        }

        $uploadCheck = 1;
        $output = "";
        if (isset($_POST["upload"])) {
            // news post with image
            if (isset($_FILES["image"]) && $_FILES["image"]["size"] > 0) {

                $target_dir = "uploads/";
                $file = @$_FILES["image"];
                $picname = explode(".", @$_FILES["image"]["name"]);
                $filepath = $target_dir . uniqid() . "_" . $picname[0] . "." . end($picname); // filepath of old, not resized image

                $uploadExt = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                $acceptedtype = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($uploadExt, $acceptedtype)) { // only certain image formats can be uploaded
                    $output = "<span class='text-danger'>Bitte nur folgende Bildformate hochladen: .jpg, .jpeg, .png, .gif</span>";
                    $uploadCheck = 0;
                }

                if ($_FILES["image"]["size"] > 15 * 1024 * 1024) { // check if the image is below 15 MB
                    $output = "<span class='text-danger'>Bitte nur Bilder unter 15 MB hochladen!</span>";
                    $uploadCheck = 0;
                }

                if ($uploadCheck == 1) { // if the uploaded file is an image and below 15 MB
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)) { // store image into a folder which will get resized

                        $resizedDir = "resized/";
                        $resizedFile = $resizedDir . uniqid() . "_" .  basename($_FILES["image"]["name"]); // filepath of resized image

                        $newWidth = 300;
                        $newHeight = 200;

                        resizeImage($filepath, $resizedFile, $newWidth, $newHeight);

                        $query_upload = "INSERT INTO `news` (`news_title`,`news_text`, `news_filepath`) VALUES (?, ?, ?)";
                        $stmt = $db_obj->prepare($query_upload);
                        $stmt->bind_param("sss", $newsHeader, $newsText, $resizedFile);
                        $stmt->execute();

                        $output = "<span class='text-success'>Newsbeitrag mit dem Bild " . $_FILES["image"]["name"] . " wurde veröffentlicht! Klicken Sie <a href='news.php'>hier</a>, um die Seite neu zu laden und den neuen Beitrag zu sehen!</span>";
                    } else {
                        $output = "<span class='text-danger'>Etwas ist beim Hochladen fehlgeschlagen!</span>";
                    }
                }
            } else {
                // news post without image
                $query_upload = "INSERT INTO `news` (`news_title`,`news_text`) VALUES (?, ?)";
                $stmt = $db_obj->prepare($query_upload);
                $stmt->bind_param("ss", $newsHeader, $newsText);
                $stmt->execute();

                $output = "<span class='text-success'>Newsbeitrag wurde veröffentlicht! Klicken Sie <a href='news.php'>hier</a>, um die Seite neu zu laden und den neuen Beitrag zu sehen!</span>";
            }

            $stmt->close();
            $db_obj->close();
        }

        // Upload Form HTML for admins
        if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {

            ?>
            <hr>
            <h3 class="display-5 text-center pt-4 pb-4" style="font-weight:bold; color:white;">Beiträge hochladen (Admin)</h3>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="p-3" id="box">
                            <form action="" enctype="multipart/form-data" method="post">
                                <div class="mb-3">
                                    <label for="header" class="form-label">Überschrift</label>
                                    <input type="text" name="header" id="header" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Inhalt</label>
                                    <textarea name="text" id="text" class="form-control"></textarea>
                                </div>
                                <div class="mb-3"><label for="image" class="form-label">Bild hochladen</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/jpeg, image/png, image/tiff, image/gif">
                                </div>
                                <div class="mb-3 text-center"><input type="submit" name="upload" value="Upload" class="btn btn-lg btn-primary"></div>
                                <div class="mb-3 text-center">
                                    <?php
                                    echo $output;
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>
    </div>
    <?php include './includes/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>