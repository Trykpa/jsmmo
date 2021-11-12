<?php 
    session_start();

    if(isset($_SESSION['IsLog'])  && $_SESSION['IsLog'] == 1){
        header('Location: ../index.php');
    }

    $link = mysqli_connect("localhost", "root", "", "intranetszpital");
    if($link === false){
        die(mysqli_connect_error());
    }

    echo $_POST['Password'];
    function Hashowanie($a, $b, $c){
        $pomocnicza = $a.$b.$c;
        for($i = 20; $i > 0; $i--){
            $pomocnicza = sha1($pomocnicza);
        }
        return $pomocnicza;
    }

    if(isset($_POST['SubmitRegister']) && $_POST['Password'] == $_POST['PasswordAgain'] && !empty($_POST['Name']) && !empty($_POST['Surname']) && !empty($_POST['Mail']) && !empty($_POST['Password']) ){
        $Mail = $_POST['Mail'];
        
        $EmailTest = "SELECT Email FROM users WHERE Email = '$Mail';";

        if($result = mysqli_query($link, $EmailTest)){
            if(mysqli_num_rows($result) < 1){
                                
                $Name = $_POST['Name'];
                $Surname = $_POST['Surname'];
                $Password = $_POST['Password'];
                $Salt = substr($Name, 3).substr($Surname, 3);
                $pepper = "Szpitalmaczternascieoddzialow";

                $hash = Hashowanie($Salt, $Password, $pepper);

                $sql = "INSERT INTO users (`Users_id`, `Name`, `Surname`, `Email`, `Password`, `Pepper`) VALUES (NULL, '$Name', '$Surname', '$Mail', '$hash', '$pepper')";

                if(mysqli_query($link, $sql)){
                    $_SESSION['RegLog'] = 1;
                    mysqli_close($link);
                    header('Location: login.php');
                } else{
                    $_SESSION['RegLog'] = 2;
                    mysqli_close($link);
                    header('Location: login.php');
                }
            }else{
                $_SESSION['RegLog'] = 3;
                mysqli_close($link);
                header('Location: login.php');
            }
        }

    } else{
        mysqli_close($link);
        header('Location: login.php');
    }
?>