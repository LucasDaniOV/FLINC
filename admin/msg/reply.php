<?php
require_once('../require.php');
require_once('../classes/class.messageDB.php');

if(isset($_GET['id'])) {
    $messageDB = new messageDB();
    $accountDB = new accountDB();
    $message = $messageDB->getById($_GET['id']);

    if($message->updated == null) {
        $t = time();
        $d = date("Y-m-d H:i:s", $t);
        $date = $d;
    } else {
        $date = $message->updated;
    }

} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply message</title>
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Two+Tone|Material+Icons+Sharp'>
    <link rel="stylesheet" type="text/css" href="../index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .editor {
            width: 80vw;
            height: 80vh;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .textarea {
            width: 80vw;
            height: 60vh;
        }
        nav {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <nav>
        <span>
            <a href="../index.php">Menu</a>>
            <a href="./index.php">Messages</a>
        </span>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>

    <?php
        if (isset($_POST['submit'])) {

            $message->reply = $_POST['reply-text'];        

            if($messageDB->update($message)){
                header('Location: mail.php?id=' . $message->id);
            }   
            else {
                echo "Error";
            }
        }
    ?>

    <form class='editor' method='post' action=''>
        <textarea class='textarea' name='reply-text'><?php echo "<hr><b>On " . $message->created . " " . $message->name . " from " . $message->company . " wrote:</b><hr>" . $message->text . "<br><hr><b> On " . $date . " " . $_SESSION['user']->voornaam . " " . $_SESSION['user']->familienaam . " from Fleet Investment Company wrote:</b><hr><br>" . $message->reply;?></textarea><br>
        <input onclick="return confirm('Send email?')" type='submit' name='submit' value='Send'>
    </form>

    <script src="../tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.textarea',
            theme: 'modern',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
        });
    </script>
</body>
</html>