<?php
    require_once('./admin/classes/class.messageDB.php');
    $messageDB = new MessageDB();

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['subject']) && !empty($_POST['msg'])){
        $tempMessage = new message();
        $tempMessage->email = $_POST['email'];
        $tempMessage->name = $_POST['name'];
        $tempMessage->phone = $_POST['phone'];
        $tempMessage->company = $_POST['company'];
        $tempMessage->subject = $_POST['subject'];
        $tempMessage->text = $_POST['msg'];
    
        try {
            $messageDB->insertAsObject($tempMessage);
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        //prevent form resubmission
        header('Location: contact.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Fleet Investment Company</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/contact.css">
</head>
<body>
    <nav>
        <div class="nav-item"><span id="hamburger" class="material-icons menu">menu</span></div>
        <a href="./index.php" id="nav-logo" class="nav-item logo"></a>
        <div class="nav-item search-container">
            <input class="search-bar" type="text" placeholder="Zoeken...">
            <span class="material-icons search">search</span>
        </div>
    </nav>
    <div class="overlay">
        <a href="./index.php" id="overlay-logo" class="logo"></a>
        <a href="aanbod.php" class="overlay-item">Aanbod</a>
        <a href="wagenparkbeheer.php" class="overlay-item">Wagenparkbeheer</a>
        <a href="onderhoud.php" class="overlay-item">Onderhoud</a>
        <a href="contact.php" class="overlay-item">Contact</a>
        <a href="overons.php" class="overlay-item">Over ons</a>
    </div>
    <header>
        <h1>
            <?php include('./admin/cms/data/contact/header.php');?>
        </h1>
    </header>
    <div class="contact-img">
        <img src="./img/contact/woman_on_phone.jpg" alt="Happy woman on the phone.">
        <div class="img-text">
            <h2>
                <?php include('./admin/cms/data/contact/img_header.php');?>
            </h2>
        </div>
    </div>
    <div class="form-header">
        <h3>Vul het contact formulier in en wij nemen zo spoedig mogelijk contact met u op.</h3>
    </div>
    <form action="" method="post">
        <input required type="text" name="email" placeholder="E-mail">
        <input required type="text" name="name" placeholder="Naam">
        <input required type="text" name="phone" placeholder="Telefoon">
        <input type="text" name="company" placeholder="Bedrijf">
        <input required type="text" name="subject" placeholder="Onderwerp">
        <textarea required name="msg" cols="20" rows="10" placeholder="Bericht"></textarea>
        <input name="submit" type="submit" value="Verstuur">
    </form>
    <footer>
        <div class="footer-item">
            <span>Fleet Investment Company:</span>
            <a href="https://goo.gl/maps/4CaTW1eGsjQKGPcz7" target="_blank">Raalterweg 50, 8124 AE Wesepe</a>
            <a href="tel:+31653162320">+31 (0)6 531 623 20</a>
            <a target="_blank" class="linkedIn-logo" href="https://www.linkedin.com/company/fleet-investment-company-flinc"></a>

        </div>
        <div class="footer-item footer-menu">
            <span>Direct naar:</span>
            <a href="aanbod.php">Aanbod</a>
            <a href="wagenparkbeheer.php">Wagenparkbeheer</a>
            <a href="onderhoud.php">Onderhoud</a>
            <a href="contact.php">Contact</a>
            <a href="overons.php">Over ons</a>
        </div>
        <div class="footer-item">
            <span>Servicepartners:</span>
            <div id="footer-bosch"></div>
            <div id="footer-toptruck"></div>
            <div id="footer-friesland"></div>
        </div>
        <div class="footer-item">
            <span>Legal:</span>
            <a target='_blank' href="./doc/lease-overeenkomsten.pdf">Lease overeenkomsten</a>
            <a target='_blank' href="./doc/service-overeenkomsten.pdf">Service overeenkomsten</a>
            <a target='_blank' href="./doc/privacy.pdf">Privacy & cookie policy</a>
        </div>
    </footer>
    <div class="nieuwsbrief">
        <span>Meld je aan voor de nieuwsbrief:</span>
        <div class="nieuwsbrief-bar">
            <input type="text" placeholder="E-mailadres">
            <button><span id="nieuwsbrief-done" class="material-icons">arrow_circle_right</span></button>
        </div>
    </div>
    <div class="footer-copyright"><span>Copyright 2022 &copy;</span><span class="fc-text">Fleet Investment Company</span></div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>