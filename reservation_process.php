<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: login_page.php');
}
// Initialisierung von Fehlermeldungen und Eingabevariablen

$error1 = $error2 = $error3 = $error4 = $error5 = "";
$conf_msg = "Reservierung gemacht";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["arrival_date"])) {
      $error1 = "Bitte füllen Sie aus!";
    } else {
      $arrival_date = ($_POST["arrival_date"]);
    }
    if (empty($_POST["departure_date"])) {
      $error2 = "Bitte füllen Sie aus!";
    } else {
        $departure_date = ($_POST["departure_date"]);
    }
    if (!empty($arrival_date) && !empty($departure_date)) {
      if (($arrival_date) > ($departure_date)){
        $error2 = "Bitte füllen Sie aus!";
      }
    }
    if (empty($_POST["room_type"])) {
        $error3 = "Bitte füllen Sie aus!";
    } else {
        $room_type = ($_POST["room_type"]);
    }
    if (empty($_POST["breakfast_service"])) {
      $error4 = "Bitte füllen Sie aus!";
    } else {
        $breakfast_service = ($_POST["breakfast_service"]);
    }
    if (empty($_POST["parking_service"])) {
      $error5 = "Bitte füllen Sie aus!";
    } else {
        $parking_service = ($_POST["parking_service"]);
    }
    if (empty($_POST["pets_service"])) {
      $error6 = "Bitte füllen Sie aus!";
    } else {
        $pets_service = ($_POST["pets_service"]);
    }
    


    if (isset($_POST["arrival_date"]) && isset($_POST["departure_date"]) && isset($_POST["room_type"])) {

  // Include your database connection
  require_once "./includes/dbaccess.php";

  // Get user_id from the session
  $user_id = $_SESSION['uid'];
  $aktuellerTimestamp = time();
  $timestamp = date("Y-m-d H:i:s", $aktuellerTimestamp);

  // Insert reservation into the database
  $query = "INSERT INTO `reservations`(`arrival_date`, `departure_date`, `room_type`, `breakfast_service`, `parking_service`, `pets_service`, `uid_fk`, `erstellt_am`) VALUES (?,?,?,?,?,?,?,?)";
  $stmt = $db_obj->stmt_init();
  if (!$stmt->prepare($query)) {
    die("SQL error: " . $db_obj->error);
  }

    $stmt = $db_obj->prepare($query);
    $stmt->bind_param("ssssssis", $arrival_date, $departure_date, $room_type, $breakfast_service, $parking_service, $pets_service, $user_id, $timestamp);

  if ($stmt->execute()) {  
    $conf_msg = "Reservierung erfolgreich";
    // Close the statement and connection when done
    $stmt->close();
    $db_obj->close();
    $isOk = 0;
    header("Location: meine_reservations.php");
    die();
  }
  }
    else {
      // If trying to access the page without pressing the submit button, send back to the index page
      //header("Location: ../register_page.php");
    }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" href="./Images/Untitled-design.svg">
  <title>Reservierungen</title>
</head>

<body>
  <?php include "./includes/navbar.php"; ?>
  <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1508615070457-7baeba4003ab?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100vh;">

    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block mt-5 pt-3">
                <img src="./room_imgs/reg_process.jpg" alt="res" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="body p-4 p-lg-5 text-black">
                  <h1 class="h3 mb-3 font-weight-normal text-center">Reservierung</h1>
                  <form action="" method="post">
                    <div class="form-group ">
                      <label for="arrival_date">Anreisedatum</label>
                      <input type="date" name="arrival_date" class="form-control input-with-post-icon datepicker" min="<?php echo date('Y-m-d'); ?>" inline="true" placeholder="Anreisedatum">
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>

                    <div class="form-group mt-4">
                      <label for="departure_date">Abreisedatum</label>
                      <input type="date" name="departure_date" class="form-control input-with-post-icon datepicker" min="<?php echo date('Y-m-d'); ?>" inline="true" placeholder="Abreisedatum">
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>

                    <div class="form-group mt-4">
                    <label for="room_type">Zimmertyp</label>
                    <select class="form-select" aria-label="room" name="room_type">
                      <option selected disabled value="">Bitte wählen Sie den Zimmertyp...</option>
                      <option value="Single">Einzelzimmer - 90€/Nacht</option>
                      <option value="Double">Doppelzimmer - 120€/Nacht</option>
                      <option value="Familienzimmer">Familienzimmer - 150€/Nacht</option>
                      <option value="Pool">Pool-Suite - 180€/Nacht</option>
                    </select>
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>


                    <div class="form-group mt-4">
                    <label for="breakfast_service">Frühstück</label>
                    <select class="form-select" aria-label="breakfast" name="breakfast_service">
                      <option selected disabled value="">Möchten Sie Frühstück?</option>
                      <option value="Ja">Ja + 15€</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>

                    <div class="form-group mt-4">
                    <label for="parking_service">Parkplatz</label>
                    <select class="form-select" aria-label="park" name="parking_service">
                      <option selected disabled value="">Möchten Sie einen Parkplatz reservieren?</option>
                      <option value="Ja">Ja + 10€</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>

                    <div class="form-group mt-4">
                    <label for="pets_service">Haustiere</label>
                    <select class="form-select" aria-label="tiere" name="pets_service">
                      <option selected disabled value="">Bringen Sie Ihre Haustiere mit?</option>
                      <option value="Ja">Ja (kostenlos)</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>
                    <?php echo "<span class='error_msg'> $error1 </span>" ?>

                    <br>
                    <div class="btns">
                      <button type="submit" name="reservieren" value="reservieren" class="btn btn-dark">Reservieren</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include './includes/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>