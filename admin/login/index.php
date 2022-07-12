<!--
    /login/index.php
    administrator login page
-->

<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../login/");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Two+Tone|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="login-box">
        <?php 
            if(isset($_SESSION['info']) && $_SESSION['info'] == "loginUnsuccessful"){
                echo 
                '<div class="alert alert-danger" role="alert">
                    Incorrect email or password.
                </div>'
                ;
            }
            if(isset($_SESSION['info']) && $_SESSION['info'] == "wrongCaptcha"){
                echo 
                '<div class="alert alert-danger" role="alert">
                    Wrong captcha, please try again.
                </div>'
                ;
            }
        ?>
        <h2 class="no-highlight">Login</h2>
        <form method='post' action='check.php'>
            <div class="user-box">
                <input type="text" name="inputEmail" required="">
                <label class="no-highlight">Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="inputPassword" required="">
                <label class="no-highlight">Password</label>
            </div>
            <div class="user-box captcha-input">
                <input type="text" name="inputCaptcha" required="">
                <label class="no-highlight">Captcha</label>
            </div>
            <div class="captcha-box">
                <img class="no-highlight" src="../../captcha.php" alt="">
                <span class="material-icons no-highlight">refresh</span>
            </div>
            <button class="no-highlight" type='submit' name='submitLogin'>
                <span class="no-highlight"></span>
                <span class="no-highlight"></span>
                <span class="no-highlight"></span>
                <span class="no-highlight"></span>
                Submit
            </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".captcha-box span").click(function() {
                $(this).parent().children("img").attr("src", "../../captcha.php?rand=" + Math.random());
            });
        });
    </script>
</body>
</html>