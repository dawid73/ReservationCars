<?php
session_start();

@$info=$_GET['info'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="./lib/css/bootstrap.min.css" rel="stylesheet">
  <link href="./lib/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="./lib/css/style.css" rel="stylesheet">

  <link href='./lib/fullcalendar.min.css' rel='stylesheet'/>
  <link href='./lib/fullcalendar.print.css' rel='stylesheet' media='print'/>



<!--   <script type="text/javascript" src='./lib/jquery.min.js'></script>
  <script type="text/javascript" src='./lib/jquery-ui.custom.min.js'></script> -->
  <script type="text/javascript" src="./lib/js/jquery-1.8.3.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src='./lib/moment.min.js'></script>
  <script type="text/javascript" src='./lib/fullcalendar.min.js'></script>
  <script type="text/javascript" src='./lib/locale/pl.js'></script>
  <script type="text/javascript" src="./lib/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./lib/js/bootstrap-datetimepicker.min.js"></script>



</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index">Rezerwacja samochodów</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
  <?php
if (isset($_SESSION['nick']) && isset($_SESSION['ip'])) {

  ?>
        <div class="navbar-form navbar-right">
         <!--  <a href="models/dodaj"><button class="btn btn-default">Dodaj</button></a> -->
         <font color=white>Witaj <?php echo $_SESSION['nick'] ?></font>
          &nbsp;&nbsp;&nbsp;<a href="models/wyloguj"><button class="btn btn-default">Wyloguj</button></a>
        </div>
  
  <?php
} else {

  
  ?>
        <form class="navbar-form navbar-right" action="models/zaloguj" method="post">
          <div class="form-group">
            <?php if($info=='badlogin') {
    echo ' <font color=red size=3>Zły login lub hasło! </font> ';} ?>
            <input type="text" placeholder="Login" class="form-control" id="login" name="login">
          </div>
          <div class="form-group">
            <input type="password" placeholder="Hasło" class="form-control" id="password" name="password" >
          </div>
          <button type="submit" class="btn btn-success">Zaloguj</button>
        </form>
            <?php
  }
  ?>
      </div>
    </div>
  </nav>

