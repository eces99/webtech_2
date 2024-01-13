<?php session_start(); /* Starts the session */

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" href="./Images/Untitled-design.svg">
  <title>Frequently asked questions</title>
</head>

<body id='faqbody'>

  <!-- Add navbar -->
  <?php include './includes/navbar.php' ?>
  <div class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1490365728022-deae76380607?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); background-repeat: no-repeat; background-position:center; background-size: cover;">
    <div id="faq_page" class="container">
      <h1 class="display-3 text-center pt-4" style="font-weight:bold; color:white;">Informationen auf einem Blick</h1>
      <!-- Accordion Panel that stays open -->
      <div class="accordion" id="accordionPanel">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">Wie kann ich online ein Zimmer im Hotel reservieren?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Die Reservierung eines Zimmers ist einfach! Besuchen Sie unsere offizielle Website und wählen Sie das gewünschte Ankunfts- und Abreisedatum aus. Klicken Sie dann auf die Schaltfläche "Jetzt buchen". Sie erhalten umgehend eine Bestätigung Ihrer Reservierung per E-Mail.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              Kann ich besondere Anfragen während des Buchungsvorgangs angeben, z.B. für ein Zustellbett oder spezielle Ernährungsbedürfnisse?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Selbstverständlich! Während des Buchungsvorgangs haben Sie die Möglichkeit, besondere Anfragen anzugeben. Wir bemühen uns, alle Ihre Wünsche zu erfüllen und Ihren Aufenthalt so angenehm wie möglich zu gestalten.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              Wie kann ich Änderungen an meiner Reservierung vornehmen?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Falls sich Ihre Pläne ändern, können Sie Ihre Reservierung einfach online über unsere Website verwalten. Klicken Sie dazu auf den Link zur Reservierungsverwaltung in Ihrer Bestätigungs-E-Mail und folgen Sie den Anweisungen.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="false" aria-controls="panelsStayOpen-collapsefour">
              Gibt es einen Kundenservice für Hilfe bei der Online-Buchung?
            </button>
          </h2>
          <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Ja, unser Kundenservice-Team steht Ihnen rund um die Uhr zur Verfügung, um Ihnen bei Fragen zur Online-Buchung oder anderen Anliegen behilflich zu sein. Sie können uns per E-Mail oder telefonisch erreichen.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
              Gibt es eine Bestätigung meiner Reservierung per SMS?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p> Ja, neben der E-Mail-Bestätigung senden wir Ihnen gerne eine SMS-Benachrichtigung, wenn Sie dies während des Buchungsvorgangs angeben. So haben Sie alle wichtigen Informationen schnell zur Hand.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
              Wie kann ich sicherstellen, dass meine Online-Buchung erfolgreich war?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Nach erfolgreicher Buchung erhalten Sie eine detaillierte Bestätigungs-E-Mail mit allen relevanten Informationen zu Ihrer Reservierung. Wir empfehlen, diese E-Mail aufzubewahren und bei Bedarf vorzuzeigen.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
              Bietet das Hotel einen Flughafentransfer an?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Ja, wir bieten einen bequemen Flughafentransfer-Service für unsere Gäste an. Bitte informieren Sie uns im Voraus über Ihre Flugdaten, damit wir alles für Sie arrangieren können.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
              Gibt es einen Fitnessraum im Hotel?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Ja, für diejenigen, die auch während ihres Aufenthalts fit bleiben möchten, bieten wir einen gut ausgestatteten Fitnessraum mit modernen Geräten, damit Sie Ihr Training bequem fortsetzen können.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
              Gibt es Parkmöglichkeiten am Hotel?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Ja, wir bieten sichere Parkmöglichkeiten für unsere Gäste an. Unser Parkplatz ist videoüberwacht, um die Sicherheit Ihres Fahrzeugs zu gewährleisten.</p>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
              Welche Annehmlichkeiten bietet das Hotelzimmer?
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse">
            <div class="accordion-body">
              <p>Unsere Zimmer sind mit modernen Annehmlichkeiten ausgestattet, darunter kostenloser WLAN-Zugang, Flachbildfernseher, Minibar und Klimaanlage, um Ihren Aufenthalt so komfortabel wie möglich zu gestalten.</p>
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