<header>
  <nav class="navbar navbar-expand-md navbar-light bg-light">
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
            <li class="nav-item">
              <a class="nav-link" href="./login_page.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./register_page.php">Anmelden</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</header>