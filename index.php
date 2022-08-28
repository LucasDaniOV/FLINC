<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Fleet Investment Company</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <section class="container">
        <nav>
            <div class="nav-item"><span id="hamburger" class="material-icons menu no-highlight">menu</span></div>
            <a href="./index.php" id="nav-logo" class="nav-item logo no-highlight"></a>
            <div class="nav-item search-container">
                <input class="search-bar" type="text" placeholder="Zoeken...">
                <span class="material-icons search no-highlight">search</span>
            </div>
        </nav>
        <div class="carousel">
            <div class="slider slider-container">
                <div class="slide">
                    <h2>Mercedes Sprinter</h2>
                    <h4>&euro;25,000</h4>
                    <img src="img/carousel/car1.png" alt="" />
                    <a href="./aanbod.php?id=1" class="btn">Meer info</a>
                </div>
                <div class="slide">
                    <h2>Mercedes Sprinter</h2>
                    <h4>&euro;25,000</h4>
                    <img src="img/carousel/car1.png" alt="" />
                    <a href="./aanbod.php?id=1" class="btn">Meer info</a>
                </div>
                <div class="slide">
                    <h2>Mercedes Sprinter</h2>
                    <h4>&euro;25,000</h4>
                    <img src="img/carousel/car1.png" alt="" />
                    <a href="./aanbod.php?id=1" class="btn">Meer info</a>
                </div>
                <div class="slide">
                    <h2>Mercedes Sprinter</h2>
                    <h4>&euro;25,000</h4>
                    <img src="img/carousel/car1.png" alt="" />
                    <a href="./aanbod.php?id=1" class="btn">Meer info</a>
                </div>
                <div class="slide">
                    <h2>Mercedes Sprinter</h2>
                    <h4>&euro;25,000</h4>
                    <img src="img/carousel/car1.png" alt="" />
                    <a href="./aanbod.php?id=1" class="btn">Meer info</a>
                </div>
            </div>
            <div class="controls">
                <span class="material-icons prev disabled no-highlight">keyboard_arrow_left</span>
                <span class="material-icons next no-highlight">keyboard_arrow_right</span>
                <ul class="dots">
                    <li class="selected"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="overlay">
            <a href="./index.php" id="overlay-logo" class="logo"></a>
            <a href="./aanbod.php" class="overlay-item">Aanbod</a>
            <a href="./wagenparkbeheer.php" class="overlay-item">Wagenparkbeheer</a>
            <a href="./onderhoud.php" class="overlay-item">Onderhoud</a>
            <a href="./contact.php" class="overlay-item">Contact</a>
            <a href="./overons.php" class="overlay-item">Over ons</a>
        </div>
    </section>
    <section class="second-container">
        <div class="img-container">
            <img src="./img/homepage/bestelwagens.png" alt="Multiple vans parked next to each other.">
            <a href="./aanbod.php?categorie=bestelwagens" class="img-btn">Bestelwagens</a>            
        </div>
        <div class="img-container img-container-fleet">
            <img src="./img/homepage/voertuigen.png" alt="Multiple cars parked next to each other.">
            <a href="./aanbod.php?categorie=personenwagens" class="img-btn">Personenwagens</a>
        </div>
    </section>
    <section class="second-container third-container">
        <div class="img-container img-cont2">
            <img src="./img/homepage/fleet.png" alt="Two red DAF trucks.">
            <a href="./aanbod.php?categorie=vrachtwagens" class="img-btn">Vrachtwagens</a>       
        </div>
    </section>
    <section class="second-container third-container">
        <div class="img-container img-cont2">
            <img src="./img/homepage/wagenparkbeheer.png" alt="Multiple trucks parked next to each other.">
            <a href="./wagenparkbeheer.php" class="img-btn">Wagenparkbeheer</a>       
        </div>
    </section>
    <div class="big-section-container">
        <div class="big-section-article-container">
            <div id="article1" class="big-section-article-container-item">
                <img src="./img/homepage/bestelwagens.png" alt="Multiple vans parked next to each other.">
                <a href="./aanbod.php?categorie=bestelwagens">Bestelwagens</a>
            </div>
            <div id="article2" class="big-section-article-container-item">
                <img src="./img/homepage/voertuigen.png" alt="Multiple cars parked next to each other.">
                <a href="./aanbod.php?categorie=personenwagens">Personenwagens</a>
            </div>
            <div id="article3" class="big-section-article-container-item">
                <img src="./img/homepage/fleet.png" alt="Two red DAF trucks.">
                <a href="./aanbod.php?categorie=vrachtwagens">Vrachtwagens</a>
            </div>
            <div id="article4" class="big-section-article-container-item">
                <img src="./img/homepage/wagenparkbeheer.png" alt="Multiple trucks parked next to each other.">
                <a href="./wagenparkbeheer.php">Wagenparkbeheer</a>
            </div>
        </div>        
    </div>
    <div class="dit-is-flinc">
        <section class="cont4">
            <div class="cont4-img"></div>
        </section>
        <section class="cont5">
            <h1><?php include('./admin/cms/data/home/header.php'); ?></h1>
            <p><?php include('./admin/cms/data/home/header_text.php'); ?></p>
            <div class="cont5-text">
                <h1 id="go-flinc"><?php include('./admin/cms/data/home/header.php'); ?></h1>
                <p><?php include('./admin/cms/data/home/header_text.php'); ?></p>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer-item">
            <span>Fleet Investment Company:</span>
            <a href="https://goo.gl/maps/4CaTW1eGsjQKGPcz7" target="_blank">Raalterweg 50, 8124 AE Wesepe</a>
            <a href="tel:+31653162320">+31 (0)6 531 623 20</a>
            <a target="_blank" class="linkedIn-logo" href="https://www.linkedin.com/company/fleet-investment-company-flinc"></a>

        </div>
        <div class="footer-item footer-menu">
            <span>Direct naar:</span>
            <a href="./aanbod.php">Aanbod</a>
            <a href="./wagenparkbeheer.php">Wagenparkbeheer</a>
            <a href="./onderhoud.php">Onderhoud</a>
            <a href="./contact.php">Contact</a>
            <a href="./overons.php">Over ons</a>
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