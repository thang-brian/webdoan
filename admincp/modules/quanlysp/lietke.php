<?php
	$sql_lietke_sp = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<a href="?action=quanlysp&query=themsp" class="btn btn-primary">
<i class="fas fa-plus"> Thêm sản phẩm</i>
</a>
<fieldset>
  <legend>Liệt kê danh mục sản phẩm</legend>
  <div class="table-responsive">
  <table style="width:100%" class="table table-bordered">
  <tr>
    <th>Id</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Giá sp</th>
    <th>Số lượng</th>
    <th>Danh mục</th>
    <th>Mã sp</th>
    <th>Tóm tắt</th>
    <th style="width:10%">Trạng thái</th>
    <th style="width:10%">Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_sp)){
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
    <td><?php echo $row['giasp'] ?></td>
    <td><?php echo $row['soluong'] ?></td>
    <td><?php echo $row['tendanhmuc'] ?></td>
    <td><?php echo $row['masp'] ?></td>
    <td><?php echo $row['tomtat'] ?></td>
    <td><?php if($row['tinhtrang']==1){
        echo 'Kích hoạt';
      }else{
        echo 'Ẩn';
      } 
      ?>
      
    </td>
    <td>
      <a class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm ?')" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a> | <a class="btn btn-primary" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a> 
    </td>
   
  </tr>
  <?php
  } 
  ?>
 
  </table>
  </div>

</fieldset>