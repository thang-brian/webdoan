<?php
	if(isset($_POST['doimatkhau'])){
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
			echo "<script>alert('Mã xác minh không chính xác');</script>" ;
		}else{
			$matkhau_cu = md5($_POST['password_cu']);
			$matkhau_moi = md5($_POST['password_moi']);
			$matkhau_moia = md5($_POST['password_moia']);
			if($matkhau_moia === $matkhau_moi){
				$sql = "SELECT * FROM dangky WHERE matkhau='".$matkhau_cu."' LIMIT 1";
				$row = mysqli_query($mysqli,$sql);
				$count = mysqli_num_rows($row);
				if($count>0){
					$sql_update = mysqli_query($mysqli,"UPDATE dangky SET matkhau='".$matkhau_moi."'");
					echo "<script>alert('Mật khẩu đã được thay đổi');</script>" ;
				}else{
					echo '<p style="color:red">Tài khoản hoặc Mật khẩu cũ không đúng,vui lòng nhập lại."</p>';
				}
			}else
			{
				echo '<p style="color:red">Nhập lại mật khẩu chưa đúng</p>';
			} 
			
			
		}
	} 
?>
<form action="" autocomplete="off" method="POST">
		<table class="table-login" style="text-align: center;border-collapse: collapse;border:none">
			<tr>
				<td colspan="3"><h3>Đổi mật khẩu tài khoản </h3></td>
			</tr>
			<tr>
				<td>Mật khẩu cũ</td>
				<td><input type="password" size="50" name="password_cu"></td>
			</tr>
			<tr>
				<td>Mật khẩu mới</td>
				<td><input type="password" size="50" name="password_moi"></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu mới</td>
				<td><input type="password" size="50" name="password_moia"></td>
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
				
				<td colspan="3"><input type="submit" name="doimatkhau" value="Đổi mật khẩu" style="width:20%; background-color: yellow;"></td>
			</tr>
		<tr>
			
	</table>
	</form>