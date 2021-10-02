<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admincp</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:login.php');
 } 
?>
<body>
	<h3 class="title_admin">AdminCP</h3>
	<div class="wrapper">
	<?php 
			include("config/config.php");
			include("modules/header.php");
	?>
			<div class="m">
				<?php 
			include("modules/menu.php");
			include("modules/main.php");
			?>
			</div>
	<?php
			include("modules/footer.php");
	?>
	</div>

</body>
</html>