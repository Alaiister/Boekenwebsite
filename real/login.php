<?php

include 'app/templates/header.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM accounts WHERE email = '$email' AND wachtwoord ='$password'";
    $result = mysqli_query($dbc, $query) or die ('BoekenShop -> Kan niet inloggen.');
    if(mysqli_num_rows($result) > 0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['naam'];
            $email = $row['email'];

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
          
            header('Location: index.php');
        }
    }
    else {
        echo '<script><alert("Uw inloggegevens zijn niet correct.");</script>';
    }
    if(isset($_GET['fout'])) {
        echo '<script> alert("Oeps, probeer het opnieuw.") </script>';
    }

}

?>


<div class="container">
<div class="col-md-8 offset-md-2">
<form class="register-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <h1>Log in</h1>
    <input id="email" type="email" placeholder="Email" name="email" required/>
    
    <input id="password" type="password" placeholder="Wachtwoord" name="password" required/>

    <input id="submit" type="submit" name="submit" value="Inloggen">
</form>
</div>
</div>
