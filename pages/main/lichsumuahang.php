<?php
  $id = $_SESSION['dangky'];
  $sql= "SELECT * FROM dangky WHERE tenkhachhang = '$id'";
  $query = mysqli_query($mysqli,$sql);
  while($row_chitiet = mysqli_fetch_array($query)){
        $id_khachhang = $row_chitiet['id_khachhang']; 
  }
  $sql_lietke_dh = "SELECT * 
  FROM
      cart_details
      RIGHT JOIN cart ON cart.code_cart = cart_details.code_cart
      RIGHT JOIN sanpham ON cart_details.id_sanpham = sanpham.id_sanpham
  WHERE cart.id_khachhang = '$id_khachhang' ORDER BY cart_details.id_cart_details DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  
?>
<h3>Lịch sử mua hàng</h3>
<table style="width:100%" border="1" style="border-collapse: collapse;">
<tr>
    <th>Tên hàng</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
    <th>Tình trạng</th>
  
</tr>
<?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $thanhtien = $row['giasp']*$row['soluongmua'];
  ?>
  <tr>
    <td style="display:flex" ><?php echo $row['tensanpham'] ?> <p style="color:coral;padding-left:2px">- Mã đơn hàng: <a href="index.php?quanly=chitietls&id=<?php echo $row['code_cart'] ?>"><?php echo $row['code_cart'] ?></a></p></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    <td>
      <?php if($row['cart_status']==1){
        echo '<p style="color:blue">Đơn đợi duyệt</p>';
      }elseif($row['cart_status']==0){
        echo '<p style="color:green">Đang xử lý</p>';
      }else{
        echo '<p style="color:red">Đơn đã hủy</p>';
      }
      ?>
    </td>
<?php 
  }
?>
</table>
