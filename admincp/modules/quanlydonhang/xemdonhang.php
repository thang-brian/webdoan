<?php
  $code = $_GET['code'];
  $sql_lietke_dh = "SELECT * FROM cart_details,sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='".$code."' ORDER BY cart_details.id_cart_details DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  $sql_donhuy = "SELECT * FROM cart WHERE code_cart='".$code."'";
  $query_donhuy = mysqli_query($mysqli,$sql_donhuy);

?>
<fieldset>
<?php 
  while($row = mysqli_fetch_array($query_donhuy)){
    $trangthai = $row['cart_status'];
  }
?>
  <legend>Xem đơn hàng
  </legend>
  <h4>
  <?php 
    if($trangthai ==3){
      echo '<p style="color:red">Đơn hàng đã hủy</p>';
    }elseif($trangthai ==5){
      echo '<p style="color:red">Đơn hàng bị shop hủy, đã được thanh toán</p>';
    }elseif($trangthai ==2){
      echo '<p style="color:green">Đơn hàng đã thanh toán, đang được xử lý</p>';
    }elseif($trangthai==4){
      echo '<p style="color:dark">Đơn đợi thanh toán, hãy liên lạc lại khách hàng trước khi giao </p>';
    }else{
      echo '<p style="color:green">Đơn hàng đang được xử lý</p>';
    }
  ?>
  </h4>
  <a href="?action=quanlydonhang&query=lietke" class="btn btn-success">
	Quay lại
  </a> 
<table style="width:100%" class="table table-bordered">
  <tr>
    <th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>
  
  
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $thanhtien = $row['giasp']*$row['soluongmua'];
    $tongtien += $thanhtien ;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    
  </tr>
  <?php
  } 
  ?>
  <tr>
    <td style="text-align:center" colspan="6">
      <p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
    </td>
   
  </tr>

</table>
</fieldset>
