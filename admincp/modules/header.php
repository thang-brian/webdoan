<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header('Location:login.php');
	}
?>
<p class="button"><a href="index.php?dangxuat=1" style="color: white">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
		echo $_SESSION['dangnhap'];

	} ?></a></p>