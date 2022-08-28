<?php
    require_once("../classes/class.accountDB.php");
    session_start();
    if(!isset($_SESSION['info']) || $_SESSION['info'] == "loginUnsuccessful"){
        header("Location: ../login/");
        die();
    }
