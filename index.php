<?php
include('view/header.php');
include('script_calendar.php');

?>

<div class="container">

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-5"><img src="img/white.jpg"></div>
		<div class="col-md-2"></div>
	</div>


	<?php
	
	if($info=='okusun'){
		echo '<h4>Wylogowano użytkownika</h4>';
	}if ($info=='faultusun') {
		echo ' Nie byłeś zalogowany! ';}


		?>

		<script type="text/javascript">
			$('.printBtn').on('click', function (){
				window.print();
			});
		</script>

		<div class="row">
			<div class="col-md-2">
				<img src="img/white.jpg"><br/>
			
				
				<?php 



					include('models/db_info_connect.php');
					$result = $mysqli -> query("SELECT id, model, rejestracja FROM `cars`");
					if ($result -> num_rows > 0) {
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$model = $row['model'];
							$rejestracja = $row['rejestracja'];

							echo '<a href="models/ustaw_samochod?carid='.$id.'">';

							if(isset($_SESSION['carid']) && $_SESSION['carid']==$id) {
								echo '<button class="btn btn-primary btn-block" style="font-size:x-small" >'.$model." - ".$rejestracja.'</button></a><br/><br/>';
							}else{
								echo '<button class="btn btn-default btn-block" style="font-size:x-small">'.$model." - ".$rejestracja.'</button></a><br/><br/>';
							}

						}
					}
				?>
				
				


			</div>

			<div class="col-md-8" id='calendar'> </div>
			<div class="col-md-2"> 
					<?php if(isset($_SESSION['carid']) && isset($_SESSION['ip'])) 
						{
							if($_SESSION['ip']==2){
					?>
				<img src="img/white.jpg"><br/><img src="img/white.jpg"><br/>
				<h4>Dodaj rezerwację:</h4><br>
				<form class="form-horizontal" action="db_class/add_events.php" method="post">
					<input type="text" class="form-control" id="start" name="start" placeholder="Godzina rozpoczęcia" value="Godzina rozpoczęcia">
					<br>
					<input type="text" class="form-control" id="end" name="end" placeholder="Godzina zakończenia" value="Godzina zakończenia" 	>
					<br>
					<input type="text" class="form-control" id="title" name="title" placeholder="Cel" value="">
					<br>
					<input type="text" class="form-control" id="pracownik" name="pracownik" placeholder="Pracownik" value="">
					<br>
					<?php echo '<input type="hidden" id="id_cars" name="id_cars" value="'.$_SESSION['carid'].'">';
					?>
					
					<p><button type="submit" class="btn btn-default">Zarezerwuj</button></p>

				</form><?php }} ?>
			</div>

		</div>
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

