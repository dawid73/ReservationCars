<?php
include('view/header.php');
?>

<body>

	<form action="models/zarejestruj" class="form-inline" method="post">
		<div class="form-group">
			<input type="text" class="form-control input-sm" id="login" name="login" placeholder="Login">
		</div><br>
		<div class="form-group">
			<input type="password" class="form-control input-sm" id="password" name="password" placeholder="Haslo">
		</div><br>
		<div class="form-group">
			<input type="text" class="form-control input-sm" id="email" name="email" placeholder="E-mail">
		</div><br>

		<div class="radio">
			<label>
				<input type="radio" name="ip" id="ip" value="1" checked>
				Zwykły użytkownik
			</label>
		</div><br>
		<div class="radio">
			<label>
				<input type="radio" name="ip" id="ip" value="2">
				Możliwość edycji / usuwania
			</label>
		</div><br><br><br>

		<button type="submit" class="btn btn-primary btn-sm">Rejestruj</button>
	</form>

</body>
</html>
