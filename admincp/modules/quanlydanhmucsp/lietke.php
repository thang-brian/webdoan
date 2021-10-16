<?php
	$sql_lietke_danhmucsp = "SELECT * FROM danhmuc ORDER BY thutu DESC";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<a href="?action=quanlydanhmucsanpham&query=themdm" class="btn btn-primary">
  <i class="fas fa-plus"> Thêm danh mục</i>
</a>
<fieldset>
  <legend>Liệt kê danh mục sản phẩm</legend>
  <table class="table table-bordered" style="width:100%" style="border-collapse: collapse;">
  <tr>
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td>
      <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa danh mục này ?')" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a> | <a class="btn btn-primary" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a> 
    </td>
   
  </tr>
  <?php
  } 
  ?>
 
</table>
</fieldset>