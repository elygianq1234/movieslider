<?php

include './config.php';

$result = $mysqli->query("SELECT * FROM `movies` ORDER BY title ASC ");


$movies =   $result->fetch_all(MYSQLI_ASSOC);

// var_dump($movies);


?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootsrap.css">
</head>

<body class="bg-warning-subtle">
	<div class="container-fluid">
		<h1 class="text-center">Movie rental</h1>
		<div class="row text-center">
			<?php foreach ($movies as $movie) { ?>
				<div class="col-lg-3 col-md-6 col-sm-12 text-center">
					<img src="images/<?= $movie["imdbID"] ?>.jpg" class="object-fit-scale rounded mw-100 img" width="300" height="300" data-bs-toggle="modal" data-bs-target="#modalId" alt="">
					<div class="my-2">
						<p class="my-2"><strong>Title: </strong><?= $movie["Title"] ?></p>
						<p class="my-2"><strong>Genre: </strong><?= $movie["Genre"] ?></p>
						<p class="my-2"><strong>Actor/s: </strong><?= $movie["Actors"] ?></p>
						<p class="my-2"><strong>Availability: </strong><?= $movie["Available"] ?></p>
						<button class="btn btn-success img1" data-img1="images/<?= $movie["imdbID"] ?>.jpg" data-reserve="<?= $movie["imdbID"] ?>" data-bs-toggle="modal" data-bs-target="#Reservation" <?= $movie["Available"] == "0" ? 'disabled' : "" ?>>Reserve Now</button>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<!-- Modal trigger button -->
	<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
		Launch
	</button>

	<!-- Image Viewer -->
	<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
	<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="images/tt0080365.jpg" alt="" width="500" height="500" id="img" class="object-fit-contain border rounded mw-100">
				</div>
			</div>
		</div>
	</div>

	<!-- Modal trigger button -->


	<!-- Reservation -->
	<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
	<div class="modal fade" id="Reservation" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning-subtle">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body bg-primary-subtle">
					<div class="row">
						<div class="col-6 my-2">
							<img src="images/tt0079285.jpg" class="object-fit-contain border rounded mw-100" id="img1" width="400" height="400" alt="">
						</div>
						<div class="col-6">
							<form action="reserve.php" method="GET">
								<div class="mb-3">
									<input type="hidden" id="reserve" name="reserve">
									<label for="Fullname" class="form-label">FullName</label>
									<input type="text" class="form-control" name="Fullname" id="Fullname" aria-describedby="helpId" placeholder="">

									<br>

									<label for="MobileNumber" class="form-label">Mobile Number</label>
									<input type="text" class="form-control" name="MobileNumber" id="MobileNumber" aria-describedby="helpId" placeholder="">

									<br>

									<input type="submit" class="btn btn-primary w-100">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	<script src="images/bootstrap.js"></script>
	<script src="jquery.js"></script>
	<script>
		$(document).ready(function() {
			// alert('home');

			//image interface
			$('.img').click(function() {
				$('#img').attr('src', $(this).attr('src'));

			});

			//reservation interface
			$('.img1').click(function() {
				alert($(this).attr('data-reserve'));


				$('#img1').attr('src', $(this).attr('data-img1'));


				$('#reserve').attr('value', $(this).attr('data-reserve'));
			});

		});
	</script>

</body>

</html>