 <?php
session_start();
?>   
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
         
        $login    = $_POST['login'];
        $password = $_POST['password'];
        $email    = $_POST['email'];
        $ip       = $_POST['ip'];

        //ip
        // 1 - zwykly użytkownik, bez edycji, tylko dodawanie
        // 2 - możliwość edycji/usuwania
     
        if(empty($login) || empty($password) || empty($email)) {
            echo '<p>Wypełnij wszystkie dane.</p>';
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<p>Nie poprawny adres E-mail.</p>';
        }
        else {


            include('db_info_connect.php');

            if($mysqli -> connect_error) {
                return '<p>Problem z połączeniem się z bazą danych:' . $mysqli->connect_error . '[' . $mysqli->connect_errno . ']</p>';
            } else {
                $login     = trim(strip_tags($mysqli -> real_escape_string($login)));
                $password  = hash('sha256', trim(strip_tags($mysqli -> real_escape_string($password))));
                $email     = trim(strip_tags($mysqli -> real_escape_string($email)));
                //$ip        = $_SERVER['REMOTE_ADDR'];

                $stmt = $mysqli -> prepare("INSERT INTO `user`(`id_user`, `login`,`password`,`email`,`added`,`ip`) VALUES('', ? , ? , ? , now(), ?)");
                $stmt -> bind_param('ssss', $login, $password, $email, $ip);
                $stmt -> execute();

                if($stmt -> affected_rows == 1) {
                    echo '<p>Pomyślnie zarejestrowano użytkownika</p> </br> <a href="../index">wróc</a>';
                } else {
                    echo '<p>Błąd podczas rejestracji</p>';
                }
            }
        }
    }
    ?>
</body>
</html>
    