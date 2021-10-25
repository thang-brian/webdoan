<fieldset>
  <legend>Liệt kê đơn hàng</legend>
  <?php
  $sql_lietke_dh = "SELECT * FROM cart,dangky WHERE cart.id_khachhang=dangky.id_khachhang ORDER BY cart.id_cart DESC";
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
  <div class="table-responsive">
    <table style="width:100%" class="table table-bordered">
    <tr>
      <th>Mã đơn hàng</th>
      <th>Tên khách hàng</th>
      <th>Địa chỉ</th>
      <th>Email</th>
      <th>Số điện thoại</th>
      <th>Tình trạng (duyệt đơn)</th>
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
        <?php if($row['cart_status']==1 || $row['cart_status']==4){
          ?>
          <a onclick="return confirm('Bạn đã Xem Đơn Hàng trước khi duyệt và vẫn muốn duyệt đơn này?')" href="modules/quanlydonhang/xuly.php?code=<?php echo $row['code_cart']?>">Đơn hàng mới</a>
        <?php
        }elseif($row['cart_status']==0){
          echo '<p style="color:green">Đang xử lý</p>';
        }elseif($row['cart_status']==4){
          echo '<p style="color:dark">Đợi thanh toán</p>';
        }elseif($row['cart_status']==2){
          echo '<p style="color:green">Đơn đã thanh toán</p>';
        }elseif($row['cart_status']==5){
          echo '<p style="color:red">Đơn hủy, đã thanh toán</p>';
        }else{
          echo '<p style="color:red">Đơn đã hủy</p>';
        }
        ?>
      </td>
      <td>
        <a class="btn btn-info" href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>&cart_status=<?php echo $row['cart_status'] ?>">Xem đơn hàng</a> 
      </td>
      <?php 
      if($row['cart_status']==1 || $row['cart_status']==4 ){
      ?>
      <td>
        <a class="btn btn-danger" onclick="return confirm('Bạn có muốn hủy đơn hàng này?')" href="index.php?action=donhang&query=huydon&code=<?php echo $row['code_cart'] ?>">Hủy đơn</a>
      </td>
      <?php
      }
      ?>
      
    </tr>
    <?php
    } 
    ?>
  
  </table>
  </div>
</fieldset>