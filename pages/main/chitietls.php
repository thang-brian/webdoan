<?php 
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM cart_details,sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='".$code."' ORDER BY cart_details.id_cart_details DESC";
$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
$sql_donhuy = "SELECT * FROM cart WHERE code_cart='".$code."'";
$query_donhuy = mysqli_query($mysqli,$sql_donhuy);
while($row = mysqli_fetch_array($query_donhuy)){
    $trangthai = $row['cart_status'];
}
?>
<h3>Chi tiết đơn hàng #<?php echo $code; ?> </h3>
<?php if($trangthai==1){
          echo '<div class="p-3 mb-2 bg-primary text-white text-center">Đơn đợi duyệt</div>';
        }elseif($trangthai==0){
          echo '<div class="p-3 mb-2 bg-success text-white text-center">Đang xử lý đơn hàng</div>';
        }elseif($trangthai==4){
          echo '<div class="p-3 mb-2 bg-warning text-dark text-center"><p>Đơn đợi thanh toán, hãy thực hiện chuyển khoản </p> <b>Ngân hàng B - STK: 123456 hoặc liên hệ tổng đài hỗ trợ (1.000đ/phút): 19009001</b> </div>';
        }elseif($trangthai==2){
          echo '<div class="p-3 mb-2 bg-success text-white text-center">Đơn của bạn đã thanh toán, đang xử lý đơn hàng</div>';
        }elseif($trangthai==5){
          echo '<div class="p-3 mb-2 bg-danger text-white text-center">Đơn bị shop hủy, vui lòng chờ hoàn tiền</div>';
        }else{
          echo '<div class="p-3 mb-2 bg-danger text-white text-center">Đơn đã hủy</div>';
        }?>
  </h4> 
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
   <?php 
   if($trangthai ==2){
    ?>
    <td class="p-3 mb-2 bg-light text-dark font-weight-bold"  style="text-align:center" colspan="6">
      <p>Đã thanh toán phí giao hàng: 40.000vnđ</p>
      <p>Tổng tiền : <?php echo number_format($tongtien+40000,0,',','.').'vnđ' ?></p>
    </td>

  <?php }else{
    ?>
    <td class="p-3 mb-2 bg-light text-dark font-weight-bold"  style="text-align:center" colspan="6">
      <p>Phí giao hàng: 40.000vnđ</p>
      <p>Tổng tiền : <?php echo number_format($tongtien+40000,0,',','.').'vnđ' ?></p>
    </td>
  <?php } ?>
  </tr>

</table>
  <a href="index.php?quanly=lichsu" class="btn btn-success">
	Quay lại
  </a>
  
</div>



