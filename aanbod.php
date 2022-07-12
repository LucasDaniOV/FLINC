<?php 
    require_once("./admin/classes/class.aanbodDB.php");

    $DB = new aanbodDB();
    $aanbod = $DB->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanbod | Fleet Investment Company</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/aanbod.css">
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
    <div class="sort">
        <button class="btn-filteren">Filteren</button>
    </div>
    <div class="big-sort">
        <div class="select-container">
            <label for="merk">Categorie</label>
            <select name="merk">
            </select>

            <label for="merk">Merk</label>
            <select name="merk">
            </select>

            <label for="merk">Prijs</label>
            <select name="merk">
            </select>

            <label for="merk">Staat</label>
            <select name="merk">
            </select>

            <label for="merk">Transmissie</label>
            <select name="merk">
            </select>

            <label for="merk">Tellerstand</label>
            <select name="merk">
            </select>

            <label for="merk">Brandstof</label>
            <select name="merk">
            </select>

            <label for="merk">Verbruik</label>
            <select name="merk">
            </select>

            <label for="merk">Bouwjaar</label>
            <select name="merk">
            </select>

            <label for="merk">Kleur</label>
            <select name="merk">
            </select>

            <input name='apply' type="submit" value="Filters toepassen">
        </div>
    </div>

    <div class='cars-container'>
        <?php
            foreach($aanbod as $a){
                echo "
                    <div class='car'>
                        <div class='car-container'>


                            <div class='car-img'>
                                <img src='./img/cms_uploads/$a->foto'>
                            </div>
                            <div class='car-info'>
                                <div class='info-heading'>
                                    <span class='id'>$a->id</span>
                                    <h1> $a->naam </h1>
                                    <h2> $a->tellerstand KM</h2>
                                    <h3> $a->verbruik | $a->brandstof | $a->bouwjaar </h3>
                                    <br>
                                    <h1 class='price'> &euro; "; echo number_format($a->prijs, 2); echo "</h1>

                                    <span class='material-icons info-arrow'>arrow_circle_right</span>
                                </div>
                            </div>
                        </div>    
                    </div>
                ";
            }
        ?>
    </div>

    <?php

    if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
        $car = $DB->getById($id);

        echo 
            "<style>
                @import url('https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Two+Tone|Material+Icons+Sharp');
                .big-sort, .cars-container, .sort {
                    display: none;
                }
                .solo-car {
                    min-height: 87.5vh;
                    width: 100vw;
                    margin-top: 12.5vh;
                }
                .back {
                    width: 100vw;
                    padding: 1rem;
                    display: flex;
                    justify-content: left;
                    align-items: center;
                }
                .back:hover {
                    cursor: pointer;
                }
                .back span {
                    font-size: 1rem;
                    cursor: pointer;
                    vertical-align: middle;
                }
                .back .material-icons {
                    margin-right: 1rem;
                }
                #car-name {
                    font-size: 2rem;
                    padding: 1rem;
                    color: #000;
                }
                #car-info {
                    font-size: 1rem;
                    padding:  1rem 2rem;
                    display: flex;
                    justify-content: space-between;
                }
                #car-main-img {
                    width: 100vw;
                    min-height: 30vh;
                    min-height: 250px;
                    padding: 1rem;
                    padding-bottom: 0.5rem;
                }
                #car-img {
                    width: 100%;
                    height: 100%;
                    max-height: 60vh;
                    object-fit: contain;
                    border: 1px solid #e6e6e6;
                }
                #car-img:hover {
                    cursor: pointer;
                }
                .car-img-slider-container {
                    height: 20vh;
                    width: 100vw;
                    margin-bottom: 0.5rem;
                    padding: 0 0.75rem;
                    position: relative;
                }
                .car-img-slider {
                    width: 100%;
                    height: 100%;
                    display: flex;
                    overflow: hidden;
                }
                .car-img-slide {
                    min-width: calc(50vw - 1.25rem);
                    height: 100%;
                    object-fit: contain;
                    border: 1px solid #b3b3b3;
                    margin: 0 0.25rem;
                    transition: all 0.5s;
                    opacity: 0.8;
                    min-height: 100px
                }
                .car-img-slide:hover {
                    cursor: pointer;
                    opacity: 1;
                }
                #proefrit, #proefrit span, #proefrit a, #offerte, #offerte span, #offerte a {
                    transition: all 0.5s;
                }
                #proefrit:hover, #offerte:hover {
                    background-color: var(--logo-blue);
                }
                #finance-container div .material-icons {
                    transition: all 0.5s;
                }
                #finance-container div .material-icons:hover {
                    color: var(--logo-blue);
                }                
                .acl, .acr {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    cursor: pointer;
                    font-size: 2.25rem;
                    color: #fff;
                    background-color: #000;
                    border-radius: 50%;
                    padding: 0.1rem;
                    transition: all 0.5s;
                }
                .acl:hover, .acr:hover {
                    background-color: var(--logo-blue);
                    color: #000;
                }
                .acl {
                    left: 1.5rem;
                }
                .acr {
                    right: 1.5rem;
                }                
                article {
                    width: 100vw;
                    padding: 1rem;
                    padding-top: 0;
                }
                #price-container {
                    padding : 1rem;
                    border: solid 1px #e6e6e6;
                }
                #price-container span {
                    font-size: 1rem;
                    color: #000;
                }
                #price-container h1 {
                    font-size: 2rem;
                    padding: 1rem 0;
                }
                #price-container a {
                    text-decoration: none;
                    color: #fff;
                    background-color: var(--logo-blue);
                    padding: 0.5rem 1rem;
                    border-radius: 5rem;
                }
                #options-btn-container {
                    padding: 1rem;
                    border: solid 1px #e6e6e6;
                    margin-top: 0.5rem;
                }
                #proefrit, #offerte {
                    display: flex;
                    align-items: center;
                    background-color: black;
                    padding: 0.5rem;
                    border-radius: 5rem;
                }
                #proefrit:hover, #offerte:hover {
                    cursor: pointer;
                }
                #proefrit {
                    margin-top: 1rem;
                }
                #proefrit span, #offerte span {
                    font-size: 2rem;
                    margin-right: 0.5rem;
                    color: #fff;
                }
                #proefrit a, #offerte a {
                    font-size: 1.5rem;
                    text-decoration: none;
                    color: #fff;
                }
                #finance-container {
                    padding: 1rem;
                    border: solid 1px #e6e6e6;
                    margin-top: -0.5rem;
                }
                #finance-container h1 {
                    font-size: 1.5rem;
                    padding: 0 0 1rem 0;
                    color: #000;
                }
                #finance-container h2 {
                    font-size: 1.25rem;
                    padding: 0 0 1rem 0;
                    color: #000;
                }
                #finance-container #vanaf {
                    font-size: 1.5rem;
                    color: var(--logo-grey);
                    padding: 0.5rem 0;
                }
                #finance-container div span {
                    font-size: 1.5rem;
                    vertical-align: middle;
                    color: #000;
                }
                #finance-container div .material-icons {
                    font-size: 3rem;
                    vertical-align: middle;
                    margin-right: 0.5rem;
                    color: #000;
                    text-transform: unset;
                }
                #finance-container div:hover {
                    cursor: pointer;
                }
                hr {
                    border: solid 1px #e6e6e6;
                    margin: 1rem 1rem;
                }
                .details-container h1 {
                    font-size: 1.5rem;
                    color: #000;
                    padding: 0 0 0.5rem 0;
                }
                .info-grid {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                }
                .detail {
                    color: #000;
                }
                #omschrijving {
                    padding: 0.5rem 1rem;
                }
                .details-container h2, .chevron-right {
                    font-size: 1.25rem;
                    color: #000;
                }
                .chevron-right {
                    font-size: 2rem;
                    cursor: pointer;
                    vertical-align: middle;
                }
                .oa-item {
                    vertical-align: middle;
                }
                .oa-item h2 {
                    vertical-align: middle;
                    display: flex;
                    align-items: center;
                }
                .oa-item h2:hover {
                    cursor: pointer;
                }
                .option-thing {
                    margin-left: 0.5rem;
                    color: var(--logo-grey);
                }
                .stuff-and-things {
                    margin-left: 1rem;
                    display: flex;
                    align-items: center;  
                    padding: 0.5rem 1rem;   
                }
                .hidden {
                    display: none;
                }
                .stuff-and-things .material-icons {
                    color: var(--logo-blue);
                }
                .chevron-left {
                    -moz-transform: scale(-1, 1);
                    -webkit-transform: scale(-1, 1);
                    -o-transform: scale(-1, 1);
                    -ms-transform: scale(-1, 1);
                    transform: scale(-1, 1);
                }
                .gallery-container {
                    display: none;
                    height: 87.5vh;
                    width: 100vw;
                    position: fixed;
                    top: 12.5vh;
                }
                .gallery-close {
                    font-size: 3rem;
                    padding: 1rem;
                }
                .gallery-close:hover {
                    cursor: pointer;
                }
                .gallery {
                    height: 100%;
                    width: 100%;
                    position: relative;    
                }
                .big-image {
                    position: absolute;
                    width: 100%;
                    height: 70%;
                    padding: 1rem;
                }
                .big-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                }
                .thumbnails {
                    position: absolute;
                    width: 100%;
                    height: 30%;
                    bottom: 0;
                    background-color: #000;
                }
                .smaller {
                    display: none;
                }

                @media only screen and (min-width: 768px){
                    .solo-car, .back, #car-main-img, .car-img-slider-container, article, .gallery-container {
                        width: 80vw;
                    }
                    .solo-car {
                        margin-left: 20vw;
                    }
                    .gallery-container {
                        left: 20vw;
                    }
                    .car-img-slide {
                        min-width: calc(40vw - 1.25rem);
                    }
                    #car-main-img {
                        height: 30vh;
                    }
                }
                @media only screen and (min-width: 1200px){
                    .solo-car {
                        margin: 5vh 0 0 10vw;
                    }
                    .gallery-container {
                        height: 95vh;
                        width: 90vw;
                        top: 5vh;
                        left: 10vw;
                    }
                    .solo-car, .back, article, .gallery-container {
                        width: 90vw;
                    }
                    .car-img-slide {
                        min-width: calc(20vw - 0.85rem);
                    }
                    #car-main-img, .car-img-slider-container {
                        width: 60vw;
                        padding-right: 0.5rem;
                    }
                    #car-main-img {
                        height: 60vh;
                        padding-top: 0;
                    }
                    #things {
                        width: 90vw;
                        display: flex;
                        flex-direction: row-reverse;
                    }
                    #big-img-container {
                        width: 60vw;
                    }
                    #small-details {
                        width: 30vw;
                    }
                    #car-name, #car-info {
                        padding: 0;
                    }
                    #car-info {
                        justify-content: left;
                    }
                    #car-info span {
                        margin-left: 0.5rem;
                    }
                    #tellerstand {
                        margin-left: 0 !important;
                    }
                    .smaller {
                        display: block;
                        width: 30vw;
                        padding: 0.5rem 1rem 0.5rem 0;
                    }
                    .bigger {
                        display: none;
                    }
                    #omschrijving {
                        padding-bottom: 0;
                    }
                }
            </style>
        ";
            
            $fotos = ['contact/woman_on_phone.jpg', 'onderhoud/onderhoud1.png', '/homepage/dit_is_flinc.png'];

        echo "
            <div class='solo-car'>
                <div class='back'>
                    <span class='material-icons no-highlight'>arrow_back</span>
                    <span>Terug naar aanbod</span>
                </div>

                <div id='things'>

                    <div id='small-details'>
                        <h1 id='car-name'>$car->naam</h1>
                        <p id='car-info'>
                            <span id='tellerstand'>$car->tellerstand KM</span>
                            <span>|</span>
                            <span>$car->bouwjaar</span>
                            <span>|</span>
                            <span>$car->brandstof</span>                
                        </p>
                        
                        <article class='smaller'>
                            <div id='price-container'>
                                <span>Koop voor</span>
                                <h1> &euro; $car->prijs </h1>
                            </div>
                            <div id='options-btn-container'>
                                <div id='offerte'>
                                    <span class='material-icons no-highlight'>local_offer</span>
                                    <a href='contact.php'>Offerte aanvragen</a>
                                </div>
                                <div id='proefrit'>
                                    <span class='material-icons no-highlight'>time_to_leave</span>
                                    <a href='contact.php'>Proefrit aanvragen</a>
                                </div>
                            </div>
                        </article>

                        <article class='smaller'>
                            <div id='finance-container'>
                                <h1>Financiering aanvragen?</h1>
                                <p style='color:#000'>Zakelijk vanaf</p>
                                <p id='vanaf'>&euro; 350 p/m</p>
                                <h2>Start mijn berekening</h2>
                                <div><span class='material-icons no-highlight arrow2'>arrow_circle_right</span><span>Particulier</span></div>
                                <div><span class='material-icons no-highlight arrow2'>arrow_circle_right</span><span>Zakelijk</span></div>
                            </div>
                        </article>
                    </div>

                    <div id='big-img-container'>
                        <div id='car-main-img'>
                            <img id='car-img' src='./img/cms_uploads/$car->foto' alt='$car->naam'>
                        </div>

                        <div class='car-img-slider-container'>
                            <div class='car-img-slider'>
        ";
                                for($i = 0; $i < count($fotos); $i++) {
                                    echo "<img class='car-img-slide' src='./img/$fotos[$i]'>";
                                }   

        echo "              </div>

                            <span class='material-icons acl no-highlight'>arrow_circle_left</span>
                            <span class='material-icons acr no-highlight'>arrow_circle_right</span>

                        </div>
                    
                    </div>
                </div>
                
                <article class='bigger'>
                    <div id='price-container'>
                        <span>Koop voor</span>
                        <h1> &euro; $car->prijs </h1>
                    </div>
                    <div id='options-btn-container'>
                        <div id='offerte'>
                            <span class='material-icons no-highlight'>local_offer</span>
                            <a href='contact.php'>Offerte aanvragen</a>
                        </div>
                        <div id='proefrit'>
                            <span class='material-icons no-highlight'>time_to_leave</span>
                            <a href='contact.php'>Proefrit aanvragen</a>
                        </div>
                    </div>
                </article>

                <article class='bigger'>
                    <div id='finance-container'>
                        <h1>Financiering aanvragen?</h1>
                        <p style='color:#000'>Zakelijk vanaf</p>
                        <p id='vanaf'>&euro; 350 p/m</p>
                        <h2>Start mijn berekening</h2>
                        <div><span class='material-icons no-highlight arrow2'>arrow_circle_right</span><span>Particulier</span></div>
                        <div><span class='material-icons no-highlight arrow2'>arrow_circle_right</span><span>Zakelijk</span></div>
                    </div>
                </article>

                <p id='omschrijving'>
                    $car->omschrijving
                </p>

                <hr>
                <article class='details-container'>
                    <h1>Details</h1>
                    <div class='info-grid'>
                        <span>Categorie</span><span class='detail'>$car->categorie</span>
                        <span>Merk</span><span class='detail'>$car->merk</span>
                        <span>Model</span><span class='detail'>$car->model</span>
                        <span>Prijs</span><span class='detail'>$car->prijs</span>
                        <span>Staat</span><span class='detail'>$car->staat</span>
                        <span>Transmissie</span><span class='detail'>$car->transmissie</span>
                        <span>Kilometerstand</span><span class='detail'>$car->tellerstand</span>
                        <span>Brandstof</span><span class='detail'>$car->brandstof</span>
                        <span>Verbruik</span><span class='detail'>$car->verbruik</span>
                        <span>Bouwjaar</span><span class='detail'>$car->bouwjaar</span>
                        <span>Kleur</span><span class='detail'>$car->kleur</span>
                    </div>
                </article>

                <hr style='margin-top:0'>
                <article class='details-container'>
                    <h1>Opties & accessoires</h1>

                    <div class='oa-item'>                        
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Comfort</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Boordcomputer</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Cruise control</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Regensensor</span></div>                 
                        </div>
                    </div>

                    <div class='oa-item'>                        
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Exterieur</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Buitenspiegels elektrisch verstelbaar</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Buitenspiegels verwarmbaar</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Centrale deurvergrendeling met afstandsbediening</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Automatische dimlichten</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Led dagrijverlichting</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Parkeersensor achter</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Trekhaak</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Zijschuifdeur rechts</span></div>                      
                        </div>
                    </div>

                    <div class='oa-item'>                        
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Interieur</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>2 zitplaatsen rechtsvoor</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Airco</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Armsteun voor</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Bijrijders bank</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Comfortstoel(len)</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Elektrische ramen</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Stuurbekrachtiging</span></div>
                        </div>

                    </div>
                    <div class='oa-item'>
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Infotainment</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Dab ontvanger</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Navigatiesysteem</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Radio</span></div>
                        </div>
                    </div>
                    <div class='oa-item'>
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Veiligheid</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Achteruitrijcamera</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Alarm klasse 1 (startblokkering)</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Hill hold functie</span></div>
                        </div>
                    </div>
                    <div class='oa-item'>
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Milieu</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Start/stop systeem</span></div>
                        </div>
                    </div>
                    <div class='oa-item'>
                        <h2><span class='material-icons no-highlight chevron-right'>chevron_right</span>Overige</h2>
                        <div class='options-stuff'>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Anti blokkeer systeem</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Anti doorslip regeling</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Bestuurdersairbag</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Bluetooth telefoonvoorbereiding</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Elektrische stabiliteits programma</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Elektrische remkrachtverdeling</span></div>
                            <div class='stuff-and-things hidden'><span class='material-icons no-highlight'>task_alt</span><span class='detail option-thing'>Zijwind assistent</span></div>
                        </div> 
                    </div>
                </article>       
            </div>

            <div class='gallery-container'>
                <span class='material-icons no-highlight gallery-close'>close</span>
                
                <div class='gallery'>
                    <div class='big-image'>
                        <img src='./img/cms_uploads/$car->foto'>
                    </div>

                    <div class='thumbnails'>
                    </div>
                </div>

            </div>
        ";
    }
    
    ?>

    <footer id="footer">
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
            <button><span id="nieuwsbrief-done" class="material-icons no-highlight">arrow_circle_right</span></button>
        </div>
    </div>
    <div class="footer-copyright"><span>Copyright 2022 &copy;</span><span class="fc-text">Fleet Investment Company</span></div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/aanbod.js"></script>
</body>
</html>