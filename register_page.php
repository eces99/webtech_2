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
    
        <div id="register_page" class="container">
            <div class="row justify-content-center">
                <div class="col-xxs-6 col-md-8 col-lg-6" id="box">
                    <div class="p-3 mb-2 bg-transparent text-dark">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Anmeldeformular</h1>
                            <form action="./result_register.php" method="post">
                                <select class="form-select" aria-label="anrede" name="anrede" required>
                                    <option selected disabled value="">Bitte wählen Sie den Anrede</option>
                                    <option value="1">Herr</option>
                                    <option value="2">Frau</option>
                                    <option value="3">Transgender</option>
                                    <option value="4">Non-binary/non-conforming</option>
                                    <option value="5">Keine Antwort</option>
                                </select><br>
                                <div class="form-group">
                                    <label for="vorname">Vorname</label>
                                    <input type="text" class="form-control" name="vorname" id="vorname" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="lastname">Nachname</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="email">E-mail Adresse</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="username">Benutzername</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Gewünschter Benutzername" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="password">Passwort</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div><br>
                                <div class="form-group">
                                    <label for="password_2">Passwort wiederholen</label>
                                    <input type="password" class="form-control" name="password_2" id="password_2" required>
                                </div><br>
                                <div class="col-12">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Ich stimme den Allgemeinen Geschäftsbedingungen zu.
                                    </label>
                                    <div class="invalid-feedback">
                                        Sie müssen zustimmen, bevor Sie absenden können.
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark" type="submit" name="register">Formular abschicken</button>
                                </div>
                            </form>
                    </div>
                </div>    
            </div>
        </div>    
    </div>
<?php include './footer.php' ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
