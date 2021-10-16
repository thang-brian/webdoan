<?php
	
	if(isset($_POST['dangnhap'])){
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
			echo "<script>alert('Mã xác minh không chính xác');</script>" ;
		} 
		else{
			$email = $_POST['email'];
			$matkhau = md5($_POST['password']);
			$sql = "SELECT * FROM dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
			$row = mysqli_query($mysqli,$sql);
			$count = mysqli_num_rows($row);

			if($count>0){
				$row_data = mysqli_fetch_array($row);
				$_SESSION['dangky'] = $row_data['tenkhachhang'];
				$_SESSION['id_khachhang'] = $row_data['id_dangky'];
				header("Location:index.php?quanly=giohang");
			}else{
				echo '<p style="color:red">Mật khẩu hoặc Email sai ,vui lòng nhập lại.</p>';
				
			}
		}
		
		
	} 
?>
<form action="" autocomplete="off" method="POST">
		<table class="table-login" style="text-align: center;border-collapse: collapse;margin-top: 20px; border:none">
			<tr>
				<td colspan="3"><h3>Đăng nhập khách hàng</h3></td>
			</tr>
			<div class="form-group">
				<td>Tài khoản</td>
				<td colspan="2"><input type="text" size="50" name="email" placeholder="Email..."><small id="emailHelp" class="form-text text-muted">Tài khoản là email lúc đăng ký</small></td>
				
			</div>
			<tr>
				<td>Mật khẩu</td>
				<td colspan="2"><input id="pass" type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
				<td><i class="fas fa-eye" onclick="password()"></i></td>
			</tr>
			</tr>
			<tr>
				<td>Mã xác minh</td>
				<td>
					<input type="text" name="vercode" class="form-control" placeholder="Nhập mã xác minh" required="required">
				</td>
				<td>
              		<img src="../DA/pages/main/captcha.php" >
				</td>
			</tr>
			<tr>
				<td>
				<a href="index.php?quanly=dangky">
					<button style="background: yellow; color: black;" type="button">Đăng ký nếu chưa có tài khoản</button> </a>
				</td>
				<td colspan="3"><input style="background: #23962e; color: white;width:30%;" type="submit" name="dangnhap" value="Đăng nhập"></td>
				
			
			
	</table>
	</form>
	<script type="text/javascript">
	var x = true;
	function password(){
		if(x){
			document.getElementById('pass').type="text";
			x = false;
		}else{
			document.getElementById('pass').type="password";
			x = true;
		}
	}
	</script>