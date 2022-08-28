<!--
    /login/check.php
    this file checks if the email and password are correct
-->

<?php
session_start();

if(isset($_POST)){
    if(isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) && isset($_POST['inputPassword']) && !empty($_POST['inputPassword']) && isset($_POST['inputCaptcha']) && !empty($_POST['inputCaptcha'])){
        // user has provided an email and password
        
        if($_POST['inputCaptcha'] === $_SESSION['captcha']){
            // user has provided the correct captcha
            require_once("../classes/class.accountDB.php");

            $accountDB = new accountDB();
            $email = $_POST['inputEmail'];
            $password = $_POST['inputPassword'];
            $currentAccount = $accountDB->findLogin($email, $password);
    
            if($currentAccount){
                $_SESSION['info'] = "loginSuccessful";
                $_SESSION['user'] = $currentAccount;
                header("Location: ../");
                die();
            } else {
                $_SESSION['info'] = "loginUnsuccessful";
                header("Location: ./");
                die();
            }
        } else {
            // user has provided the wrong captcha
            $_SESSION['info'] = "wrongCaptcha";
            header("Location: ./");
            die();
        }
        
    } else {
        header("Location: ./");
        die();
    }
}