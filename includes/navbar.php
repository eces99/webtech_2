<!-- Für alle users sehbar -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="./index.php">
        <img src="./Images/Untitled-design.svg" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Startseite</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./news.php">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./rooms.php">Zimmer & Angebote</a>
          </li>
          <!-- nur logged in users können die reservierungs seite und stammdaetn bzw. logout button ansehen -->
          <?php
          if (isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="./reservation_process.php">Zimmer buchen</a>
            </li>
          <?php }
          if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") { ?>
            <li class="nav-item">
              <a class="nav-link" href="./reservationsverwaltung.php">Reservierungsverwaltung</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./userverwaltung.php">Userverwaltung</a>
            </li>
          <?php } ?>
        </ul>
        <ul class="navbar-nav ms-auto">
          <?php
          if (isset($_SESSION['user'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="./stammdaten.php">Meine Daten</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./meine_reservations.php">Meine Reservierungen</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="./logout.php">Logout</a></li>
          <?php } else { ?>

            <!-- nicht logged in users können die nur login und anmelden auf der rechte seite des navbars sehen ansehen -->
            <li class="nav-item">
              <a class="nav-link" href="./login_page.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./register_page.php">Registrieren</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>