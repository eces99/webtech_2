<?php
session_start();

if (!isset($_SESSION['user'])) {
  header('Location: login_page.php');
}


// Process form data
$conf_msg = $anreise = $abreise = $room = $park = $tiere = $breakfast = "";
$error_msg = "Bitte füllen Sie sowohl das Anreisedatum als auch das Abreisedatum aus!";
$isOk = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["anreise"])) {
    $anreise = $_POST['anreise'];
  }
  if (isset($_POST['abreise'])) {
    $abreise = $_POST['abreise'];
  }
  if (isset($_POST['room'])) {
    $room = $_POST['room'];
  }
  if (isset($_POST['breakfast'])) {
    $breakfast = $_POST['breakfast'];
  }
  if (isset($_POST['park'])) {
    $park = $_POST['park'];
  }
  if (isset($_POST['tiere'])) {
    $tiere = $_POST['tiere'];
  }


  // Überprüfen, ob Anreise- und Abreisedatum im Buchungsformular ausgefüllt sind.
  if (!empty($_POST['anreise'] && $_POST['abreise'])) {
    
     // Überprüfen, ob das Anreisedatum vor dem Abreisedatum liegt.
     // Wenn nicht, wird ein Fehler gemeldet, andernfalls werden die Buchungsinformationen gespeichert.
    if (!($anreise <= $abreise)) {
      $isOk = 0;
      $error_msg = "Das Anreisedatum sollte vor dem Abreisedatum liegen!";
    } else {
      // Buchungsinformationen in ein Array speichern
      $reservation = [
        'anreise' => $anreise,
        'abreise' => $abreise,
        'room' => $room,
        'breakfast' => $breakfast,
        'park' => $park,
        'tiere' => $tiere
      ];

      // Buchungsinformationen serialisieren und in einer Datei speichern (an bestehende Daten anhängen)
      $string_data = serialize($reservation);
      file_put_contents("reservations.txt", $string_data, FILE_APPEND);

      // Erfolgsmeldung für erfolgreiche Buchung
      $conf_msg = "Reservation erfolgreich! Sie können Ihre Reservierungen <a href='./meine_reservations.php'>hier</a> sehen.";
    }
  } else {
    $isOk = 0;
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
  <?php include "./inc/navbar.php"; ?>
  <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1503017964658-e2ff5a583c8e?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100%;">

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
                  <?php if ($isOk == 0) {
                    echo "<div class='error_msg display-8'> $error_msg </div>";
                  } else { ?>
                  <?php }
                  echo "<div class='display-8'> $conf_msg </div>" ?>
                  <form action="" method="post">
                    <div class="form-group ">
                      <label for="anreise">Anreisedatum</label>
                      <input type="date" name="anreise" class="form-control input-with-post-icon datepicker" min="<?php echo date('Y-m-d'); ?>" inline="true" placeholder="Anreisedatum">
                    </div>
                    <div class="form-group mt-4">
                      <label for="abreise">Abreisedatum</label>
                      <input type="date" name="abreise" class="form-control input-with-post-icon datepicker" min="<?php echo date('Y-m-d'); ?>" inline="true" placeholder="Abreisedatum">
                    </div>

                    <div class="form-group mt-4">
                    <label for="zimmertyp">Zimmertyp</label>
                    <select class="form-select" aria-label="room" name="room">
                      <option selected disabled value="">Bitte wählen Sie den Zimmertyp...</option>
                      <option value="Single">Single Zimmer</option>
                      <option value="Double">Double Zimmer</option>
                      <option value="Suite">Suite</option>
                    </select>
                    </div>

                    <div class="form-group mt-4">
                    <label for="breakfast">Frühstück</label>
                    <select class="form-select" aria-label="breakfast" name="breakfast">
                      <option selected disabled value="">Möchten Sie Frühstück?</option>
                      <option value="Ja">Ja</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>

                    <div class="form-group mt-4">
                    <label for="park">Parkplatz</label>
                    <select class="form-select" aria-label="park" name="park">
                      <option selected disabled value="">Möchten Sie einen Parkplatz reservieren?</option>
                      <option value="Ja">Ja</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>

                    <div class="form-group mt-4">
                    <label for="tiere">Haustiere</label>
                    <select class="form-select" aria-label="tiere" name="tiere">
                      <option selected disabled value="">Bringen Sie Ihre Haustiere mit?</option>
                      <option value="Ja">Ja</option>
                      <option value="Nein">Nein</option>
                    </select>
                    </div>

                    <br>
                    <div class="btns">
                      <button type="submit" name="reservieren" value="reserieren" class="btn btn-dark">Reservieren</button>
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

  <?php include './inc/footer.php' ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>