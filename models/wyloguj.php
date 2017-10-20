    <?php

    session_start();


    if(isset($_SESSION['nick']) && isset($_SESSION['ip'])) {
    	if(session_destroy()) {
    		echo 'Wylogowano';
    		header('Location: ../index?info=okusun');
    	}
    } else {
    	echo 'Nie jesteś zalogowany. Przejdź do <a id="database" href="login.php">Formularza logowania</a>.';
    	header('Location: ../index?info=faultusun');
    }
    ?>
