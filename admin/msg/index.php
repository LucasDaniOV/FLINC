<?php
    require_once('../require.php');
    require_once('../classes/class.messageDB.php');

    $messageDB = new messageDB();
    $allMessages = $messageDB->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Two+Tone|Material+Icons+Sharp'>
    <link rel="stylesheet" type="text/css" href="./users.css">
    <link rel="stylesheet" type="text/css" href="../index.css">
    <link rel="stylesheet" type="text/css" href="msg.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        main {
        margin-top: 4rem;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 1rem;
        grid-auto-rows: minmax(100px, auto);
        padding: 2rem 1rem 1rem 1rem;
        }
        article {
        padding: 1rem;
        background-color: #fff;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        color: black;
        position: relative;
        }
        .msg-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: black;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 5rem;
        }
        .msg-header a {
        color: white;
        text-decoration: none;
        }
        .msg-header a .material-icons:hover {
        cursor: pointer;
        color: #f21f0c;
        }
        article p {
        margin: 0;
        }
        .expand {
        position: absolute;
        bottom: 0;
        right: 0;
        padding: 0.5rem;
        }
        .expand:hover {
        cursor: pointer;
        color: #f21f0c;
        }
    </style>
</head>
<body>
    <nav>
        <a href="../index.php">Menu</a>
        <a href="../login/index.php?logout=true">Logout</a>
    </nav>
    <main>
        <?php
            foreach ($allMessages as $message) {
                echo "
                    <article>

                        <div class='msg-header'>
                            <a onclick=\"return confirm('Delete this message forever?')\" class='delete' href='delete.php?id=$message->id'><span class='material-icons'>delete</span></a>
                            <p>$message->created</p>
                            <a class='reply' href='reply.php?id=$message->id'><span class='material-icons'>reply</span></a>
                        </div>

                        <h1>$message->subject</h1>
                        <p><b>Name:</b> $message->name</p>
                        <p><b>Company:</b> $message->company</p>
                        <p><b>Phone:</b> $message->phone</p>
                        <p><b>Email:</b> $message->email</p>
                        <hr>                        
                        <p> ";
                        if(strlen($message->text) > 100) {
                            echo substr($message->text, 0, 150) . '...';
                        } else {
                            echo $message->text;
                        }
                        echo "</p><br>
                        <a href='index.php?id=$message->id'><span class='material-icons expand'>open_in_full</span></a>
                    </article>
                ";
            }
        ?>
    </main>
</body>
</html>