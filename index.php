<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
        header('Location: bejelentkezes.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="img/images.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <title>Quiz</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid fofejlec">
            <a class="navbar-brand cim">
            <img src="img/quiz.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">    
            QUIZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link aktiv szoveg" href="index.php">Keződolap</a>
                </li>
                <li class="nav-item">
                <a class="nav-link szoveg" href="jatek.php">Játék</a>
                </li>
                <li class="nav-item">
                <a class="nav-link szoveg" href="tarsasverseny.php">Társasverseny</a>
                </li>
                <li class="nav-item">
                <a class="nav-link szoveg" href="ranglista.php">Ranglista</a>
                </li>
                <li class="nav-item">
                <a class="nav-link szoveg" href="informaciok.php">Információ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link szoveg" href="kapcsolat.php">Kapcsolat</a>
                </li>
            </ul>
            <?php
                if (!isset($_SESSION['loggedin'])) {
                    echo
                        '<a class="nav-link proba aktiv szoveg" href="bejelentkezes.php">Bejelentkezés</a>
                        <form class="d-flex" role="search">
                            <a class="btn btn-outline-success" href="regisztracio.php" role="button">
                                Regisztráció
                            </a>
                        </form>
                        ';
                        echo $_SESSION['loggedin'];
                    exit;
                }else{
                    echo
                        '<form class="d-flex" role="search">
                            <a class="btn btn-outline-success" href="kijelentkezes.php" role="button">
                                Kijelentkezés
                            </a>
                        </form>';
                }
                
            ?>
            </div>
        </div>
</nav>
</body>
</html>