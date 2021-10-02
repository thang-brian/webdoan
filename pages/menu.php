<?php

	$sql_danhmuc = "SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
	$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
	
	    		
?>
<?php
	if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
		unset($_SESSION['dangky']);
	} 
?>
<div class="menu">
			<ul class="list_menu">
				<li><a href="index.php">Trang chủ</a></li>
				<?php
				if(isset($_SESSION['dangky'])){ 

				?>
				<li><a href="index.php?dangxuat=1" style="color:red">Đăng xuất</a></li>
				<li><a href="index.php?quanly=thaydoimatkhau">Thay đổi mật khẩu</a></li>
				<li><a href="index.php?quanly=lichsu">Lịch sử mua hàng</a></li>
				<?php
				}else{ 
				?>
				<li><a href="index.php?quanly=dangnhap" style="color:red">Đăng nhập</a></li>
				<?php
				} 
				?>
				

				<li><a href="index.php?quanly=tintuc">Tin tức</a></li>
				<li><a href="index.php?quanly=lienhe">Liên hệ</a></li>
				<li style="float: right">
					<a href="index.php?quanly=giohang" class="cart">
						
				</a>
				</li>
					
				
			</ul>
			<p>
				<form class="example" action="index.php?quanly=timkiem" method="POST">
					<input type="text" placeholder="Tìm kiếm sản phẩm..." name="tukhoa">
					<button type="submit" name="timkiem" ><i class="fa fa-search"></i></button>
				</form>
			</p>
		</div>