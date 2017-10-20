<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="lib/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="lib/js/moment.js"></script>
        <script type="text/javascript" src="lib/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="lib/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="lib/js/pl.js"></script>

        <link href="lib/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    	<title>FENICE Poland Bielsko-Biała - Rezerwacja sal konferencyjnych</title>
    </head>

    <body>

        <div class="container">
          <div class="header clearfix">
            <nav>
              <ul class="nav nav-pills float-right">
                <li class="nav-item">
                  <a class="nav-link active" href="#"><b><font color="orange">Duża sala / large hall</font></b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Mała sala / small hall</a>
                </li>
              </ul>
            </nav>
            <h3 class="text-muted">Rezerwacja sal konferencyjnych</h3>
          </div>

          <div class="jumbotron">
            
                <form class="form-horizontal" action="add_events.php" method="post">


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Godz. rozpoczęcia:</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="start" name="start" placeholder="Godzina rozpoczęcia" value="Godzina rozpoczęcia">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Godz. zakończenia:</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="end" name="end" placeholder="Godzina zakończenia" value="Godzina zakończenia">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Cel rezerwacji:</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Cel" value="">
                      </div>
                    </div>

                    <p><br/></p>
                    <p><button type="submit" class="btn btn-default">Zarezerwuj</button></p>

                </form>
          </div>


          <div class="row marketing">
            <div class="col-lg-6">
              <h4>Informacje</h4>
              <p>ble ble ble</p>
            </div>

            <div class="col-lg-6">
              <h4>Konakt</h4>
              <p>Ble ble ble</p>
            </div>
          </div>


          <footer class="footer">
            <p>&copy; FENICE Poland 2017</p>
          </footer>

        </div>


        
        <script>
            $(function () {
                $('#start').datetimepicker({
                    locale: 'pl',
                    format: 'YYYY-MM-DD HH:mm'
                	});

                $('#end').datetimepicker({
                    locale: 'pl',
                    format: 'YYYY-MM-DD HH:mm'
                    });

            	});
        </script>
    </body>
</html>