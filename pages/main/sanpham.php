<p> <b>Chi tiết sản phẩm</b> </p>
<?php
	$sql_chitiet = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc AND sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysqli,$sql_chitiet);
	while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
	<div class="hinhanh_sanpham">
		<img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
	</div>
	<form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" onclick="return confirm('Bạn có muốn thêm sản phẩm vào giỏ hàng');">
		<div class="chitiet_sanpham">
			<h2 style="margin:0"><?php echo $row_chitiet['tensanpham'] ?></h3>
			<p style="font-weight:bold;">Mã sp: <?php echo $row_chitiet['masp'] ?></p>
			<p style="color: #c2c200;"><?php echo number_format($row_chitiet['giasp'],0,',','.').'vnđ' ?></p>
			<p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
			<p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
		</div>
	</form>

</div>
<?php
} 
?>
