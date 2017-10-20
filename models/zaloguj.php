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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) {
        $login    = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) {
          return '<p>Wypełnij wszystkie dane.</p>';
        } else {
          
        
            include('db_info_connect.php');
    
            if ($mysqli -> connect_error) {
                return '<p>Problem z połączeniem się z bazą danych:' . $mysqli->connect_error . '[' . $mysqli->connect_errno . ']</p>';
            } else {
                $login     = trim(strip_tags($mysqli -> real_escape_string($login)));
                $password  = hash('sha256', trim(strip_tags($mysqli -> real_escape_string($password))));

                $result = $mysqli -> query("SELECT login, ip FROM `user` WHERE login = '$login' and password = '$password'");
                if ($result -> num_rows == 1) {
                    $row = $result -> fetch_row();
                    $_SESSION['ip']   = $row[1];
                    $_SESSION['nick'] = $row[0];
                    setcookie('islogged', 'islogged', time() + 3600); // 1h
                    header('Location: ../index');
                } else {
                    header('Location: ../index?info=badlogin');
                }
            }
        }
    }
  ?>
</body>
</html>
