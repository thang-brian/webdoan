<?php
  $id = $_SESSION['dangky'];
  $sql= "SELECT * FROM dangky WHERE tenkhachhang = '$id'";
  $query = mysqli_query($mysqli,$sql);
  while($row_chitiet = mysqli_fetch_array($query)){
        $id_khachhang = $row_chitiet['id_khachhang']; 
  }
  $sql_lietke_dh = "SELECT * FROM `cart` WHERE id_khachhang = '$id_khachhang' ORDER BY id_cart DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
  
?>
<h3>Lịch sử mua hàng</h3>
<table class="table table-hover" style="width: 80%">
<thead class="thead-light">
  <tr>
      <th class="text-center" style="width: 30%">Mã đơn hàng</th>
      <th  class="text-center"style="width: 30%">Tình trạng</th>
      <th class="text-center" style="width: 20%">Quản lý</th>
  </tr>
</thead>
<?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
  ?>
  <tr>
    <td class="text-center"><p><?php echo $row['code_cart'] ?></p></td>
    <td class="text-center">
      <?php if($row['cart_status']==1){
        echo '<p style="color:blue">Đơn đợi duyệt</p>';
      }elseif($row['cart_status']==0){
        echo '<p style="color:green">Đang xử lý</p>';
      }elseif($row['cart_status']==4){
        echo '<p class="text-danger">Đợi thanh toán</p>';
      }elseif($row['cart_status']==5){
        echo '<p style="color:red">Đơn hủy, chờ hoàn tiền</p>';
      }elseif($row['cart_status']==2){
        echo '<p style="color:green">Đang xử lý đơn đã thanh toán</p>';
      }else{
        echo '<p style="color:red">Đơn đã hủy</p>';
      }
      ?>
    </td>
    <td class="text-center"><a class="btn btn-info" href="index.php?quanly=chitietls&code=<?php echo $row['code_cart'] ?>">Xem đơn hàng</a></td>
<?php 
  }
?>
</table>
