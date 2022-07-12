<?php
require_once('../require.php');
require_once('../classes/class.messageDB.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

$mail = new PHPMailer(TRUE);

if(isset($_GET['id'])) {
    $messageDB = new messageDB();
    $message = $messageDB->getById($_GET['id']);
}

try {
    /* SMTP parameters. */

    /* Tells PHPMailer to use SMTP. */
    $mail->isSMTP();

    /* SMTP server address. */
    $mail->Host = '';

    /* Use SMTP authentication. */
    $mail->SMTPAuth = TRUE;

    /* Set the encryption system. */
    $mail->SMTPSecure = 'tls';

    /* SMTP authentication username. */
    $mail->Username = '';

    /* SMTP authentication password. */
    $mail->Password = '';

    /* Set the SMTP port. */
    $mail->Port = ;

    /* Disable some SSL checks. */
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //$mail->SMTPDebug = 4;
    
    /* Set the mail sender. */
    $mail->setFrom('lucas@oudevrielink.be', 'Lucas Oude Vrielink');
    
    /* Add a recipient. */
    $mail->addAddress($message->email, $message->name);
    
    /* Set the subject. */
    $mail->Subject = $message->subject;

    /* Set the mail message body. */
    $mail->isHTML(TRUE);
    $mail->Body = $message->reply;
    $mail->AltBody = $message->reply;

    /* Finally send the mail. */
    $mail->send();
    echo '
        <a href="./index.php">Terug</a><br>
        Message has been sent
    ';
}
catch (Exception $e) {
    /* PHPMailer exception. */
    echo $e->errorMessage();
}
catch (\Exception $e) {
    /* PHP exception (note the backslash to select the global namespace Exception class). */
    echo $e->getMessage();
}
?>