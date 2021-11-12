<?php 
    session_start();

    if(isset($_SESSION['IsLog'])  && $_SESSION['IsLog'] == 1){
        header('Location: ../index.php');
    }

     function Hashowanie($a, $b, $c){
        $pomocnicza = $a.$b.$c;
        for($i = 20; $i > 0; $i--){
            $pomocnicza = sha1($pomocnicza);
        }
        return $pomocnicza;
    }

    $link = mysqli_connect("localhost", "root", "", "intranetszpital");
    if($link === false){
        die(mysqli_connect_error());
    }

    if(isset($_POST['SubmitLogin'])){
        $Password = $_POST['LogPassword'];
        $email = $_POST['Email'];
        $search = "SELECT Name, Surname FROM users WHERE Email = '$email';";

        if($result = mysqli_query($link, $search)){
            $row = mysqli_fetch_array($result);
            $Name = $row['Name'];
            $Surname = $row['Surname'];
        }


        $Salt = substr($Name, 3).substr($Surname, 3);
        $pepper = "Szpitalmaczternascieoddzialow";

        $hash = Hashowanie($Salt, $Password, $pepper);

        $sql = "SELECT Users_id FROM users WHERE Email = '$email' AND Password = '$hash';";

        if($pomoc = mysqli_query($link, $sql)){
            if(mysqli_num_rows($pomoc) == 1){
                $_SESSION['IsLog'] = 1;
                $_SESSION['LogLog'] = 1;
                $_SESSION['LogName'] = $Name;
                $_SESSION['LogSurname'] = $Surname;
                mysqli_close($link);
                header('Location: ../index.php');
            } else {
                $_SESSION['LogLog'] = 2;
                mysqli_close($link);
                header('Location: login.php');
            }
        }
    } else{
        mysqli_close($link);
        header('Location: login.php');
    }

    echo "k";
?>