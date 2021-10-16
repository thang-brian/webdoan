<?php
	session_start();
	include('../../admincp/config/config.php');
	$id_khachhang = $_GET['id'];
	$tongtien = $_GET['tongtien'];

	//POST
	$tenkhachhang = $_POST['tenkhachhang'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$dienthoai = $_POST['dienthoai'];

	if(isset($_POST['guithongtin'])){
	$code_order = rand(0,9999);
	$counter = 0;
	unset($_SESSION['message']);
	foreach($_SESSION['cart'] as $cart_item){
		$counter++;  
		$item = $cart_item['tensanpham'];
		$select_soluong = "SELECT * FROM sanpham WHERE tensanpham = '".$item."'";
		$query_lietke_sl= mysqli_query($mysqli,$select_soluong);
		while($row = mysqli_fetch_array($query_lietke_sl)){
			$soluong_db = $row['soluong'];
			$id_sp = $row['id_sanpham'];
		}
		//Kiểm tra số lượng hàng còn lại

			//them gio hang chi tiet
			foreach($_SESSION['cart'] as $key => $value){
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];
			}
			$id_sanpham = $id_sp;
			if($soluong_db > $soluong && empty($_SESSION['message'])){
				$select_soluongold = "SELECT * FROM `sanpham` WHERE id_sanpham = ".$id_sanpham."";
				$query_lietke_slold= mysqli_query($mysqli,$select_soluongold);
				while($row = mysqli_fetch_array($query_lietke_slold)){
					$soluongold = $row['soluong'];
				}
				mysqli_query($mysqli,$insert_soluong);
				header ('Location:../../index.php?quanly=camon');
			}elseif($soluong_db < $soluong){
				$message .= 'Thông báo sản phẩm "'.$item.'" chỉ có số lượng: '.$soluong_db.',vui lòng chọn thấp hơn <br>';
				// echo $message;
				$_SESSION['message'] = $message;
				echo 'Có:'.$counter;
				echo $_SESSION['message'];
				header('Location:../../index.php?quanly=giohang');
			}elseif($soluong_db == $soluong){
				unset($_SESSION['message']);
				$message .= 'Rất tiếc sản phẩm "'.$item.'" không thể mua với số lượng: '.$soluong_db.'<br>';
				$_SESSION['message'] = $message;
				header('Location:../../index.php?quanly=giohang');
			}else{
				header('Location:../../index.php?quanly=giohang');
			}
	}
			if($soluong_db > $soluong && empty($_SESSION['message'])){
				$soluongnew = $soluongold - $soluong;
				$insert_soluong = "UPDATE sanpham SET soluong='".$soluongnew."' WHERE id_sanpham = ".$id_sanpham."";
				$insert_cart = "INSERT INTO cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',1)";
				$cart_query = mysqli_query($mysqli,$insert_cart);
				echo $insert_cart;
				$insert_order_details = "INSERT INTO cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
				echo $insert_order_details;
				mysqli_query($mysqli,$insert_order_details);
				unset($_SESSION['cart']);
			}else{
				header('Location:../../index.php?quanly=giohang');
			}		
			
	}elseif(isset($_POST['suatt'])){
	//sua
	$sql_update = "UPDATE dangky SET tenkhachhang='".$tenkhachhang."',diachi='".$diachi."',email='".$email."',dienthoai='".$dienthoai."' WHERE id_khachhang='$_GET[id]'";
	if(mysqli_query($mysqli,$sql_update)){
		header('Location:../../index.php?quanly=muahang');
	}else{
		echo 'Error: '.$sql_update;
	}
	// mysqli_query($mysqli,$sql_update);
	
}elseif(isset($_POST['vnpay'])){
	$code_order = rand(0,9999);
	unset($_SESSION['message']);
	foreach($_SESSION['cart'] as $cart_item){
		$item = $cart_item['tensanpham'];
		$select_soluong = "SELECT * FROM sanpham WHERE tensanpham = '".$item."'";
		$query_lietke_sl= mysqli_query($mysqli,$select_soluong);
		while($row = mysqli_fetch_array($query_lietke_sl)){
			$soluong_db = $row['soluong'];
			$id_sp = $row['id_sanpham'];
		}
		//Kiểm tra số lượng hàng còn lại

			//them gio hang chi tiet
			foreach($_SESSION['cart'] as $key => $value){
				$id_sanpham = $value['id'];
				$soluong = $value['soluong'];
			}
			$id_sanpham = $id_sp;
			if($soluong_db >= $soluong && empty($_SESSION['message'])){
				$select_soluongold = "SELECT * FROM `sanpham` WHERE id_sanpham = ".$id_sanpham."";
				$query_lietke_slold= mysqli_query($mysqli,$select_soluongold);
				while($row = mysqli_fetch_array($query_lietke_slold)){
					$soluongold = $row['soluong'];
				}
				$soluongnew = $soluongold - $soluong;
				$insert_soluong = "UPDATE sanpham SET soluong='".$soluongnew."' WHERE id_sanpham = ".$id_sanpham."";
				mysqli_query($mysqli,$insert_soluong);
				$insert_order_details = "INSERT INTO cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
				echo $insert_order_details;
				mysqli_query($mysqli,$insert_order_details);
				header('Location:../../vnpay/index.php?quanly=ttvnpay&tongtien='. $tongtien. '&id='.$_SESSION['dangky'].'&orderid='.$code_order);
			}elseif($soluong_db < $soluong){
				$message .= 'Thông báo sản phẩm "'.$item.'" chỉ có số lượng: '.$soluong_db.',vui lòng chọn thấp hơn <br>';
				// echo $message;
				$_SESSION['message'] = $message;
				echo 'Có:'.$counter;
				echo $_SESSION['message'];
				header('Location:../../index.php?quanly=giohang');
			}elseif($soluong_db == $soluong){
				unset($_SESSION['message']);
				$message .= 'Rất tiếc sản phẩm "'.$item.'" không thể mua với số lượng: '.$soluong_db.'<br>';
				$_SESSION['message'] = $message;
				header('Location:../../index.php?quanly=giohang');
			}else{
				header('Location:../../index.php?quanly=giohang');
			}
	}
			if($soluong_db >= $soluong && empty($_SESSION['message'])){
				$insert_cart = "INSERT INTO cart(id_khachhang,code_cart,cart_status) VALUE('".$id_khachhang."','".$code_order."',4)";
				$cart_query = mysqli_query($mysqli,$insert_cart);
				echo $insert_cart;
			}else{
				header('Location:../../index.php?quanly=giohang');
			}
	
}else{
	echo "<p style ='text-color:red'>Có lỗi trong quá trình xử lý. Vui lòng load lại trang (F5). Xin cảm ơn.</p>";
}
	

?>