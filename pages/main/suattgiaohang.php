<?php 
    $id = $_GET['id'];
    $sql= "SELECT * FROM dangky WHERE tenkhachhang = '$id'";
    $query = mysqli_query($mysqli,$sql);
?>
<h3>Chỉnh sửa thông tin giao hàng</h3>
<a href="index.php?quanly=muahang" class="btn btn-success" >
	Trở về
</a>
<table border="1" width="100%" style="border-collapse: collapse;">
<?php
while($row_chitiet = mysqli_fetch_array($query)){
?>
 <form method="POST" action="pages/main/thanhtoan.php?id=<?php echo $row_chitiet['id_khachhang'] ?>" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tên khách hàng</label>
                <input type="text" class="form-control"  name="tenkhachhang" value="<?php echo $row_chitiet['tenkhachhang'] ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Địa chỉ giao hàng</label>
                <input type="text" class="form-control" name="diachi" value="<?php echo $row_chitiet['diachi'];  ?>">
            </div>
        </div>
        <div div class="form-row">
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo $row_chitiet['email'] ?>" >
            </div>
            <div class="form-group col-md-6">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name="dienthoai" value="<?php echo  $row_chitiet['dienthoai'] ?>" >
            </div>
        </div>

        <input class="btn btn-primary" type="submit" name="suatt" value="Sửa thông tin">
 </form>
 <?php
 } 
 ?>

</table>