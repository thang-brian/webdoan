<fieldset>
  <legend>Liệt kê đơn hàng</legend>
  <?php
  $sql_lietke_dh = "SELECT * FROM cart,dangky WHERE cart.id_khachhang=dangky.id_khachhang ORDER BY cart.id_cart DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>Mã đơn hàng</th>
    <th>Tên khách hàng</th>
    <th>Địa chỉ</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Tình trạng</th>
    <th colspan="2" style="text-align:center">Quản lý</th>
  
  </tr>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
  ?>
  <tr>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tenkhachhang'] ?></td>
    <td><?php echo $row['diachi'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['dienthoai'] ?></td>
    <td>
      <?php if($row['cart_status']==1){
        ?>
        <a onclick="return confirm('Bạn muốn duyệt đơn này?')" href="modules/quanlydonhang/xuly.php?code='.$row['code_cart'].'">Đơn hàng mới</a>
      <?php
      }elseif($row['cart_status']==0){
        echo '<p style="color:green">Đang xử lý</p>';
      }else{
        echo '<p style="color:red">Đơn đã hủy</p>';
      }
      ?>
    </td>
    <td>
      <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a> 
    </td>
    <?php 
    if($row['cart_status']==1){
    ?>
    <td>
      <a style="color:red" onclick="return confirm('Bạn có muốn hủy đơn hàng này?')" href="index.php?action=donhang&query=huydon&code=<?php echo $row['code_cart'] ?>">Hủy đơn</a>
    </td>
    <?php
    }
    ?>
    
  </tr>
  <?php
  } 
  ?>
 
</table>
</fieldset>