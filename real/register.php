<?php

include_once 'app/templates/header.php';

if (isset($_SESSION['username'])) {
    Header('Location: index');
}

if (isset($_POST['submit'])) {
     $name = mysqli_real_escape_string($dbc, htmlentities($_POST['name']));
     $email = mysqli_real_escape_string($dbc, htmlentities($_POST['email']));
     $password = mysqli_real_escape_string($dbc, htmlentities($_POST['password']));
     $password_rp = mysqli_real_escape_string($dbc, htmlentities($_POST['password_rp']));
     $hashed = hash('sha512', $password_rp);
   
    $check_email = "SELECT * FROM accounts WHERE email = '$email'";
    $result_email = mysqli_query($dbc, $check_email) or die ('Boekenshop -> email check is mislukt.');

    if(mysqli_num_rows($result_email) > 0) {
        echo '<script>alert("Let op! Deze e-mail bestaat al.");</script>';
    }

    elseif($password != $password_rp) {
        echo '<script>alert("Let op! De wachtwoorden komen niet met elkaar overeen.");</script>';
    }

    else {

        $register = "INSERT INTO accounts (id, naam, email, wachtwoord) VALUES (0, $name, $email, $hashed)";
        $result_register = mysqli_query($dbc, $register) or die('BoekenShop -> Database query niet uitgevoerd.');
    //    header('Location: index');
    }
}


?>

<div class="container">
<div class="col-md-8 offset-md-2">
<form class="register-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Registreren</h1>

    <input id="name" type="text" placeholder="Naam" name="name" required/>

    <input id="email" type="email" placeholder="Email" name="email" required/>

    <input id="password" type="password" placeholder="Wachtwoord" name="password" required/>

    <input id="password_rp" type="password" placeholder="Wachtwoord herhalen" name="password_rp" required/>

    <input id="submit" type="submit" name="submit" value="Registreren">
</form>
</div>
</div>
