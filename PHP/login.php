<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet | Strona wewnętrzna szpitala</title>
    <link rel="stylesheet" href="loginStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="script.js"></script>
</head>
    <style>
        * {
            box-sizing: border-box
        }
        
        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }
        
        .mySlides {
            display: none
        }
        
        img {
            vertical-align: middle;
        }
        
        .slideshow-container {
            max-width: 1009px;
            position: relative;
        }
        
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
            animation-direction: alternate;
        }
        
        @-webkit-keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }
        
        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        #Logo {
    width: 10%;
    height: 500%;
    background-color: white;
    background-image: url(../Obrazy/ikona.jpeg);
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 55%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
    </style>
<body>
    <?php 
        session_start();
        if(isset($_SESSION['IsLog'])  && $_SESSION['IsLog'] == 1){
            header('Location: ../index.php');
        }
        if(isset($_SESSION['RegLog']) && $_SESSION['RegLog'] > 0){
            if($_SESSION['RegLog'] == 1){
                echo "<script>alert('Udało się zarejestrować');</script>";
                $_SESSION['RegLog'] = 0;
            }
            if($_SESSION['RegLog'] == 2){
                echo "<script>alert('Nie udało się zarejestrować');</script>";
                $_SESSION['RegLog'] = 0;
            }
            if($_SESSION['RegLog'] == 3){
                echo "<script>alert('Nie można zarejestrować się dwa razy na ten sam E-mail');</script>";
                $_SESSION['RegLog'] = 0;
            }
        }
    ?>
    <div id="Container">
        <div id="Topbar" style="height: 20%; margin-bottom: -20%; background-color: #bafae6;">
                <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="../photo1.JPG" style="width:188.6%; z-index=1">
        </div>

        <div class="mySlides fade">
            <img src="../photo2.JPG" style="width:188.6%">
        </div>

        <div class="mySlides fade">
            <img src="../photo3.JPG" style="width:188.6%">
        </div>
        <br>
            <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    </div>
          
            <div id="Logo" style="z-index: 2; margin-left: 35%;"></div>
        </div>
        <div id="Menusticky">
            <div class="Wybor" style="border-left: none;"><a href="../index.php">Aktualności</a></div>
            <div class="Wybor"><a href="../telefony/telefony.php">Telefony</a></div>
            <div class="Wybor"><a href="../dokumenty/dokumenty.php">Dokumenty</a></div>
            <?php 
                if(isset($_SESSION['IsLog']) && $_SESSION['IsLog'] == 1){
                   echo "<div class='Wybor'><a href='../Wyloguj.php'>Wyloguj</a></div>";
                   echo "<div class='Wybor'><a href='../Dodawanie/DodawanieIndex.php'>Dodawanie i Usuwanie</a></div>";
                } else{}
            ?>
        </div>
        <div id="Kontent">
            <div id="Logowanie">
                <Span>LOGOWANIE</Span>
                <form action="Logowanie.php" method="post" id="FormLog">
                    <input type="email" placeholder="ADRES EMAIL" name="Email" id="Email">
                    <input type="password" name="LogPassword" id="LogPassword" placeholder="HASŁO">
                    <input type="submit" value="Z A L O G U J T A" name="SubmitLogin" id="SubmitLogin">
                </form>
            </div>
            <div id="Rejestrowanie">
                <Span>REJESTROWANIE</Span>
                <form action="Rejestrowanie.php" method="post" id="FormRejest">
                    <input type="text" placeholder="Imie" name="Name" id="Name">
                    <input type="text" placeholder="Nazwisko" name="Surname" id="Surname">
                    <input type="email" placeholder="ADRES EMAIL" name="Mail" id="Mail">
                    <input type="password" placeholder="Hasło" name="Password" id="Password">
                    <input type="password" placeholder="Powtórz Hasło" name="PasswordAgain" id="PasswordAgain">
                    <input type="submit" value="R e j e s t r u j t a" name="SubmitRegister" id="SubmitRegister">
                </form>
            </div>
        </div>
        <div id="Stoopka" style="background-color: #5da890; height: 100%; text-align: right; margin-bottom: -20%"><p style="font-size: 20px; margin-top: 2%; margin-right: 2%">Strone wykonali: Kamil Buk, Patryk Ruciński<p></div>

        </div>


    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }




        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }




        var i = 1;

        function sliderloop() {
            setTimeout(function() {
                plusSlides(1);
                i = 1;
                if (i < 10) {
                    sliderloop();
                }
            }, 5000)
        }

        sliderloop();
    </script>

</body>

</html>