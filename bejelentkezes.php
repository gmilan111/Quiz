<!--glpat-M4qp25FwJxCxVt1ziQMu-->

<?php
    require 'connection.php';
    session_start();
    $is_invalid=false;
    if(isset($_POST['felhasznalonev'])){
        $felhasznalonev = $_POST['felhasznalonev'];
        $jelszo = $_POST['jelszo'];
        
        if($_POST['felhasznalonev'] == "admin" && $_POST['jelszo'] == "admin"){
            header("location: jatek.php");
        }
        $s = oci_parse($conn, "SELECT felhasznalonev,jelszo FROM felhasznalo WHERE felhasznalonev='$felhasznalonev' AND jelszo='$jelszo'");       
        oci_execute($s);
        $row = oci_fetch_all($s, $res);
        if($row){
            session_regenerate_id();
            $_SESSION['felhasznalonev']=$felhasznalonev;
            $_SESSION['time_start_login'] = time();
            $_SESSION['loggedin'] = true;
            header("location: index.php");
        }else{

            $is_invalid = true;
        }
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
                <a class="nav-link szoveg" href="index.php">Keződolap</a>
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
            <a class="nav-link proba szoveg" href="bejelentkezes.php">Bejelentkezés</a>
            <form class="d-flex" role="search">
                <a class="btn btn-outline-success" href="regisztracio.php" role="button">
                    Regisztráció
                </a>
            </form>
            </div>
        </div>
</nav>  
<?php
    
    if($is_invalid):
        $errormsg = "Helytelen jelszó vagy email!";
    endif;
?>            
<form method="POST">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-4 m-auto rounded-top wrapper hatter">
                    <h2 class="text-center pt-3 felirat narancs-szoveg">Bejelentkezés</h2>

                    <?php
                        if(!empty($errormsg)){
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errormsg</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                    ?>
                    
                    <form action="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text kitoltes"><i class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control kitoltes" placeholder="Felhasználónév" name="felhasznalonev" value="<?=htmlspecialchars($_POST["felhasznalonev"]??"") ?>">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text kitoltes"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control kitoltes" placeholder="Jelszó" name="jelszo">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Bejelentkezés</button>
                            <p class="text-center narancs-szoveg">
                                Nincs fiókod? <a href="regisztracio.php">Hozz létre itt!</a> 
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>
</html>