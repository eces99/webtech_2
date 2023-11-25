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
    <title>Login Page</title>

</head>

<body>

    <!--Navbar-->
    <header>
        <?php include_once './navbar.php' ?>
    </header>
    <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1563209750-fb9498c83efd?q=80&w=1489&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 100%; background-repeat: no-repeat; background-size: cover;">
        <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">News</h1>


        <?php

        // News Post PHP
        function scan_dir($dir)
        {
            $ignored = array('.', '..', '.svn', '.htaccess');

            $files = array();
            foreach (scandir($dir) as $file) {
                if (in_array($file, $ignored)) continue;
                $files[$file] = filemtime($dir . '/' . $file);
            }

            arsort($files);
            $files = array_keys($files);

            return $files;
        }

        $uploadDir = getcwd() . "\uploads\\";

        $files = scan_dir($uploadDir);

        for ($i = 0; $i < count($files); $i++) {
        ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center" id="box">
                        <h4 class="mt-3">Überschrift <?php echo $i + 1; ?></h4>
                        <img src="\webtech_2\uploads\\<?php echo $files[$i]; ?>" alt="newsImage" class="img-thumbnail mt-3 mb-3" style="width:50%;">
                        <p class="mb-3">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium reiciendis impedit at quis vitae eveniet vero sint molestiae ullam, sequi, aspernatur porro odit ex voluptates iste, ipsum suscipit eligendi aliquid!</p>
                    </div>
                </div>
            </div>
        <?php
        }


        if (count($files) == 0) {
        ?>
            <div class="container" id="login_form">
                <div class="row" id="box">
                    <div class="col text-center"><i>Noch keine Beiträge wurden veröffentlicht.</i></div>
                </div>
            </div>
        <?php
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
        if (isset($_FILES["image"])) {

            $destination = getcwd() . "\uploads\\" . $_FILES["image"]["name"];

            if ($_FILES["image"]["type"] != "image/jpeg") {
                $output = "<span class='text-danger'>Sorry, only JPG-Images!</span>";
                $uploadCheck = 0;
            }
            // required to upload an image
            if ($_FILES["image"]["size"] == 0) {
                $output = "<span class='text-danger'>Please select an image to upload as a thumbnail.</span>";
                $uploadCheck = 0;
            }

            if ($uploadCheck == 1) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
                $output = "<span class='text-success'>The file " . $_FILES["image"]["name"] . " has been uploaded!</span>";
            }
        }


        // Upload Form HTML
        if (isset($_SESSION["user"]) && $_SESSION["user"] == "admin") {
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
                                    <input type="file" name="image" id="image" class="form-control" accept="image/jpeg">
                                </div>
                                <div class="mb-3 text-center"><input type="submit" name="upload" value="Upload" class="btn btn-lg btn-primary"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col mb-3 text-center">
                    <?php
                    echo $output;
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>