<?php

require_once('../require.php');
require_once('../classes/class.messageDB.php');

if(isset($_GET['id'])) {
    $messageDB = new messageDB();
    $messageDB->delete($_GET['id']);

    header('Location: index.php');
}
