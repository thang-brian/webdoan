<div id="main">
			<?php
			include("sidebar/sidebar.php"); 
			?>

			<div class="maincontent">
				<?php
				if(isset($_GET['quanly'])){
					$tam = $_GET['quanly'];
				}else{
					$tam = '';
				}
				if($tam=='danhmucsanpham'){
					include("main/danhmuc.php");
				}elseif($tam=='giohang'){
					include("main/giohang.php");
				}elseif($tam=='tintuc'){
					include("main/tintuc.php");
				}elseif($tam=='lienhe'){
					include("main/lienhe.php");
				}elseif($tam=='sanpham'){
					include("main/sanpham.php");	
				}elseif($tam=='dangky'){
					include("main/dangky.php");
				}elseif($tam=='thanhtoan'){
					include("main/thanhtoan.php");
				}elseif($tam=='muahang'){
					include("main/muahang.php");
				}elseif($tam=='dangnhap'){
					include("main/dangnhap.php");
				}elseif($tam=='timkiem'){
					include("main/timkiem.php");
				}elseif($tam=='camon'){
					include("main/camon.php");
				}elseif($tam=='thaydoimatkhau'){
					include("main/thaydoimatkhau.php");
				}elseif($tam=='lichsu'){
					include("main/lichsumuahang.php");
				}elseif($tam=='chitietls'){
					include("main/chitietls.php");
				}elseif($tam=='editttgh'){
					include("main/suattgiaohang.php");
				}elseif($tam=='ttvnpay'){
					include("vnpay/index.php");
				}else{
					include("main/index.php");
				}
				?>
			</div>

		</div>