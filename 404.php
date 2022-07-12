<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Fleet Investment Company</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Material+Icons');
        @import url("https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined");

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: var(--logo-grey);
        }
        :root {
            --logo-blue: rgb(0, 167, 211);
            --logo-grey: rgb(89, 82, 78);
        }

        *::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        * {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        .no-highlight, a, btn, .dots {
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .no-highlight:focus, a:focus, btn:focus, .dots:focus {
            outline: none !important;
        }

        /*nav*/
        nav {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            padding: 1rem;
            position: fixed;
            top: 0;
            width: 100vw;
            height: 12.5vh;
            min-width: 250px;
            min-height: 95px;
            background-color: black;
            z-index: 100000000;
        }
        .nav-item {
            display: flex;
            align-items: center;
        }
        .menu, .search, .close {
            font-size: 3rem;
            cursor: pointer;
            color: var(--logo-grey);
        }
        .menu:hover, .search:hover, .close:hover {
            color: white;
        }
        .logo {
            background-image: url("../img/Logo_Flinc.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
        .search-container {
            justify-content: right;
        }
        .search-bar, #nav-contact {
            display: none;
        }
        /*nav*/

        footer {
            height: 65vh;
            width: 100vw;
            background-color: black;
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
        }
        .footer-item {
            display: grid;
            grid-template-rows: repeat(4, 1fr);
            width: 100%;
            height: 100%;
            padding: 1rem;
        }
        .footer-menu {
            grid-template-rows: repeat(9, 1fr);
        }
        .footer-item span {
            color: white;
        }
        .footer-item a {
            text-decoration: none;
        }
        .footer-item a:hover {
            color: var(--logo-blue);
        }
        .linkedIn-logo, #footer-bosch, #footer-toptruck, #footer-friesland {
            background-image: url("../img/homepage/bosch.jpg");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: left;
            height: 100%;
            width: 100%;
        }
        .linkedIn-logo {
            background-image: url("../img/homepage/LinkedIn.jpg");
        }
        #footer-toptruck {
            background-image: url("../img/homepage/toptruck.jpg");
        }
        #footer-friesland {
            background-image: url("../img/homepage/friesland.jpg");
        }
        .footer-copyright {
            height: 8vh;
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: black;
            color: white;
        }
        .footer-copyright span {
            color: white;
        }
        .nieuwsbrief {
            height: 15vh;
            padding: 1rem;
            background-color: black;
        }
        .nieuwsbrief-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }
        .nieuwsbrief-bar input {
            height: 2.5rem;
            border-radius: 2.5rem;
            border: solid 2px var(--logo-grey);
            padding: 0.5rem;
            font-size: 1rem;
            background-color: var(--logo-grey);
            color: white;
        }
        .nieuwsbrief span {
            color: white;
        }
        .nieuwsbrief-bar button {
            background-color: black;
            border: none;
        }
        #nieuwsbrief-done {
            font-size: 3rem;
            margin-top: 0.2rem;
            cursor: pointer;

        }
        /*section & footer*/

        /*overlay*/
        .overlay {
            display: none;
            grid-template-rows: repeat(8), 1fr;
            position: fixed;
            top: 12.5vh;
            z-index: 1;
            width: 100vw;
            height: 87.5vh;    
            background-color: black;
        }
        .overlay-item {
            display: flex;
            justify-content: left;
            align-items: center;
            text-decoration: none;
            padding-left: 1.5rem;
        }
        #overlay-logo {
            display: none;
        }
        .overlay-item:hover {
            color: var(--logo-blue);
        }
        /*overlay*/

        /*min-height*/
        footer {
            min-height: 494px;
        }
        .nieuwsbrief {
            min-height: 114px;
        }
        .footer-copyright {
            min-height: 57px;
        }
        /*min-height*/

        .error {
            height: 87.5vh;
            width: 100vw;
            margin-top: 12.5vh;
            position: relative;
        }
        .error-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #big {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 0 10px #000;
        }
        #small {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 0 10px #000;
        }
        .container {
            background-color: unset !important;
        }

        /*medium devices, 768px and up*/
        @media only screen and (min-width: 768px){
            #hamburger{
                display: none;
            }
            nav {
                left: 20vw;
                width: 80vw;
            }
            .overlay {
                all: unset;
                display: grid;
                grid-template-rows: repeat(8), 1fr;
                position: fixed;
                top: 0;
                height: 100vh;
                background-color: black;
            }
            .overlay-item {
                width: 20vw;
                font-size: 1.8vw;
                justify-content: left;
                padding-left: 1rem;
            }
            footer, .footer-copyright, .nieuwsbrief {
                width: 80vw;
                margin-left: 20vw;
            }
            .error {
                width: 80vw;
                margin-left: 20vw;
            }
            #big {
                font-size: 4rem;
            }
            #small {
                font-size: 2rem;
            }
        }
        /*medium devices, 768px and up*/

        /*large devices, 1200px and up*/
        @media only screen and (min-width: 1200px){
            nav {
                left: 10vw;
                width: 90vw;
                min-height: 40px;
                height: 5vh;
                padding: 0;
            }
            .search-container {
                justify-content: center;
            }
            .search-bar {
                display: block;
                width: 50%;
            }
            .search {
                font-size: 30px;
            }
            .nav-contact-container {
                justify-content: center;
            }
            #nav-contact {
                display: block;
                margin-right: 5vw;
                text-decoration: none;
                background-color: var(--logo-blue);
                padding: 0.5rem;
            }
            #overlay-contact {
                display: none;
            }
            .overlay {
                grid-template-rows: repeat(20, 1fr);
                min-height: 500px;
            }
            .overlay-item {
                justify-content: left;
                width: 10vw;
                font-size: 0.85vw;
                padding-left: 1rem;
            }
            #overlay-logo {
                display: block;
                grid-row: span 3;
                margin: 1rem;
            }
            #nav-logo {
                display: none;
            }
            footer, .footer-copyright, .nieuwsbrief {
                width: 90vw;
                margin-left: 10vw;
            }
            footer {
                height: 72.5vh;
            }
            .footer-item span, .nieuwsbrief span {
                font-size: 1.5rem;
            }
            .error {
                width: 90vw;
                height: 95vh;
                margin-left: 10vw;
                margin-top: 5vh;
            }
            .error-text #big {
                font-size: 5rem;
            }
            .error-text #small {
                font-size: 2.5rem;
            }
        }
        /*large devices, 1200px and up*/
    </style>
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
        
        <div class="error">
            <div id="canvas">
                <div class="error-text">
                    <h1 id='big'>Pagina niet gevonden</h1>
                    <p id='small'>De pagina die u probeert te bekijken bestaat niet of is verplaatst.</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/addons/p5.sound.min.js"></script>
    
    <script>

        let balls = [];
        let w;
        let h;

        function setup() {
            w = $('.error').width();
            h = $('.error').height();
            let canvas = createCanvas(w, h);
            canvas.position(0, 0);
            canvas.parent('canvas');
            canvas.style('z-index', '-1');
            background('rgb(0, 167, 211)');
        }
        function windowResized() {
            w = $('.error').width();
            h = $('.error').height();
            resizeCanvas(w, h);
            background('rgb(0, 167, 211)');
        }

        function draw() {
            for (var i = 0; i < balls.length; i++) { 
                balls[i].move();
                balls[i].display(); 
            }
        }

        function mouseMoved() { 
            insertBallToArray();
        }
        function touchMoved() { 
            insertBallToArray();
        }

        function insertBallToArray() {
            var ball = new Ball(mouseX, mouseY);
            if(balls.length < 50) {
                balls.push(ball);
            }
        }

        function Ball(x, y) {
            this.x = x;
            this.y = y;
            this.diameter = random(10, 100); 
            this.speed = random(1, 5); 
            this.xspeed = random(-this.speed, this.speed);
            this.yspeed = random(-this.speed, this.speed);
            this.color = color(random(0, 255), random(0, 255), random(100, 255));

            this.move = function() {
                this.x += this.xspeed;
                this.y += this.yspeed;

                if (this.x < 0 || this.x > w) {
                    this.xspeed *= -1;
                }
                if (this.y < 0 || this.y > h) {
                    this.yspeed *= -1;
                }
            }

            this.display = function() {
                noStroke();
                fill(this.color);
                ellipse(this.x, this.y, this.diameter, this.diameter);
            }      
        }

    </script>

</body>
</html>