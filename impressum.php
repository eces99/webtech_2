<?php session_start(); /* Starts the session */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Impressum</title>
</head>

<body>
    <?php include_once "./navbar.php" ?>
    <div class="container">
        <div class="row justify-content-center">

            <div class="header-img" style="background-image: url('https://images.unsplash.com/photo-1517200578024-62d131797ec8?q=80&w=1414&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); height: 20vh; background-size: cover; background-position: center;">

                <h1 class="display-2" style="color: white; text-align: center; padding: auto; font-weight:500;">Impressum</h1>
            </div>

            <div class="col-md-4 text-center">
                Informationspflicht laut §5 E-Commerce Gesetz, §14 Unternehmensgesetzbuch, §63 Gewerbeordnung und Offenlegungspflicht laut §25 Mediengesetz</br>
                Hotel Moonlight GmbH</br>
                Hotellerie</br>
                UID-Nr: ATU12345678</br>
                FN: 123456a</br>
                Sitz: 1210 Wien</br>
                Höchstädtpl. 6, 1210 Wien, Österreich</br>
                Tel: +43 664 250 2995<br>
                E-mail: <a href="mailto:if23b062@technikum-wien.at">if23b062@technikum-wien.at</a></br>
                FB-Gericht: Wien</br>
                Mitglied der WKÖ, WKNÖ, Landesinnung
                Hotellerie, Bundesinnung Hotellerie<br>
                Magistrat der Stadt Wien</br>
                Berufsrecht:
                Gewerbeordnung: <a href="http://www.ris.bka.gv.at">www.ris.bka.gv.at</a></br>
                Bezirkshauptmannschaft Wien</br>
                Meisterbetrieb</br>
                Meisterprüfung abgelegt in Österreich
                Verbraucher haben die Möglichkeit, Beschwerden an die OnlineStreitbeilegungsplattform
                der EU zu richten: <a href="http://ec.europa.eu/odr">ec.europa.eu/odr</a>. </br>
                Sie können allfällige Beschwerde auch an die oben angegebene E-Mail-Adresse richten.</br>
                Geschäftsführer: Ece Sen </br>
                Stellvertretender Geschäftsführer: Kenn-Michael Sanga </br>
                Gesellschaftsanteile: Ece Sen (50%), Kenn-Michael Sanga (50%) </br>
                </br>

                <img src="./Images/AboutUsEce.png" class="image-fluid" alt="Ece Sen" style="max-width:70%;"> </br>
                Ece Sen </br>
                Mobil: +43 6780 780 38 88</br>
                E-mail: <a href="mailto:if23b062@technikum-wien.at">if23b062@technikum-wien.at</a></br>
                <p style="margin-bottom: 5%;"></p>
                <img src="./Images/AboutUsKenn.png" class="image-fluid" alt="Kenn-Michael Sanga" style="max-width:70%;"> </br>
                Kenn-Michael Sanga </br>
                Mobil: +43 670 5085212</br>
                E-mail: <a href="mailto:if23b128@technikum-wien.at">if23b128@technikum-wien.at</a></br>
                <p style="margin-bottom: 5%;"></p>
            </div>
        </div>
    </div>
    <?php include_once './footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>