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

function scan_dir($dir) {
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
echo '<li><a target=”_blank” href="\Test_EH10\uploads\\dogs\\' .$files[$i].'">' . $files[$i] . '</a></li>';
}
if (count($files) == 0) {
//var_dump($files);
echo '<li class="list-group-item red"><i>No files uploaded yet.</i></li>';
}

      if(isset($_SESSION["user"])&& $_SESSION["user"] == "admin"){
?>
<hr>
<h3 class="display-5 text-center pt-4 pb-4" style="font-weight:bold; color:white;">Beiträge hochladen (admin)</h3>
<form action="" enctype="multipart/form-data" method="post">
                    <label for="header">Überschrift</label>
                    <input type="text" name="header" id="header">
                    <label for="text">Inhalt</label>
                    <input type="text" name="text" id="text">
                    <label for="image">Bild hochladen</label>
                    <input type="file" name="image" id="image" accept="image/jpeg">
                    <input type="submit" value="Upload">
                  </form>

<?php
           }
$uploadCheck = 1;
$output = "";
            if (isset($_FILES["image"])) {
                
                $destination = getcwd() . "\uploads\\" . uniqid() . "_" . $_FILES["image"]["name"];

                if ($_FILES["image"]["type"] != "image/jpeg") {
                    $output = "<span class='text-danger'>Sorry, only JPG-Images!</span>";
                    $uploadCheck = 0;
                }

                if ($uploadCheck == 1) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $destination);
            $output = "<span class='text-success'>The file " . $_FILES["image"]["name"] . " has been uploaded!</span>";
        }
            }

?>
        <div class="container">
    <div class="row">
        <div class="col">
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
