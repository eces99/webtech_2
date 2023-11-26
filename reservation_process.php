<?php
session_start();

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


// Store reservation data in the session
if (!empty($_POST['anreise'] && $_POST['abreise'])) {
  if (!($anreise <= $abreise)) 
      {$isOk = 0 ; $error_msg= "Das Anreisedatum sollte vor dem Abreisedatum liegen!"; 
    }
  else{
    $reservation = [
        'anreise' => $anreise,
        'abreise' => $abreise,
        'room' => $room,
        'breakfast'=> $breakfast,
        'park'=> $park,
        'tiere'=> $tiere
    ];
    
  
    $string_data = serialize($reservation);
    file_put_contents("reservations.txt", $string_data, FILE_APPEND);

    $conf_msg = "Reservation erfolgreich! Sie können Ihre Reservierungen <a href='./meine_reservations.php'>hier</a> sehen.";
  }
}
  else { $isOk = 0; }

}
// Optionally, you can redirect the user to a confirmation page
// header("Location: confirmation.php");
// exit();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Reservierungen</title>
</head>
<body>
<?php include "./navbar.php"; ?>
<div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1503017964658-e2ff5a583c8e?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-position:center; background-size:cover; background-repeat:no-repeat; height:100%;">

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" >
      <div class="col col-xl-10">
        <div class="" style="border-radius: 1rem;">
          <div class="row g-0" >
            <div class="col-md-6 col-lg-5 d-none d-md-block" >
              <img src="./room_imgs/reg_process.jpg"
                alt="res" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="body p-4 p-lg-5 text-black">
                <h1 class="h3 mb-3 font-weight-normal text-center">Anmeldeformular</h1>
                <?php if($isOk == 0) {echo "<div class='error_msg display-8'> $error_msg </div>";} else { ?> 
                <?php } echo "<div class='display-8'> $conf_msg </div>" ?> 
                <form action="" method="post">
                    <div class="form-group mt-4">
                        <label for="anreise">Anreisedatum</label>
                        <input type="date" name ="anreise" class="form-control input-with-post-icon datepicker" inline="true" placeholder="Anreisedatum">
                    </div>
                    <div class="form-group mt-4">
                        <label for="abreise">Abreisedatum</label>
                        <input type="date" name ="abreise" class="form-control input-with-post-icon datepicker" inline="true" placeholder="Abreisedatum">
                    </div>
                    <select class="form-select mt-4" aria-label="room" name="room">
                        <option selected disabled value="">Bitte wählen Sie den Zimmertyp...</option>
                        <option value="Single">Single Zimmer</option>
                        <option value="Double">Double Zimmer</option>
                        <option value="Suite">Suite</option>
                    </select>
                    <select class="form-select mt-4" aria-label="breakfast" name="breakfast">
                        <option selected disabled value="">Möchten Sie Frühstück?</option>
                        <option value="Ja">Ja</option>
                        <option value="Nein">Nein</option>
                    </select>
                    <select class="form-select mt-4" aria-label="park" name="park">
                        <option selected disabled value="">Möchten Sie einen Parkplatz reservieren?</option>
                        <option value="Ja">Ja</option>
                        <option value="Nein">Nein</option>
                    </select>
                    <select class="form-select mt-4" aria-label="tiere" name="tiere">
                        <option selected disabled value="">Bringen Sie Ihre Haustiere mit?</option>
                        <option value="Ja">Ja</option>
                        <option value="Nein">Nein</option>
                    </select>
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

<?php include './footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>