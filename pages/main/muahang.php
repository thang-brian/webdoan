<h3>Thông tin đơn hàng</h3>
<!-- Địa chỉ nhận hàng -->
<?php 
  if(empty($_SESSION['dangky'])){
    echo '<p class="text-danger">Hãy thực hiện đăng nhập / đăng ký</p>';
  }else{
?>
<p><i class="far fa-user-circle"></i> 
  <?php echo $_SESSION['dangky'];?> 
</p>
<?php 
    $id = $_SESSION['dangky'];
?>
    <div>
    <?php 
    $sql= "SELECT * FROM dangky WHERE tenkhachhang = '$id'";
    $query = mysqli_query($mysqli,$sql);
    while($row_chitiet = mysqli_fetch_array($query)){
?>
    <p style="padding-left:20px">
      <i class="fas fa-map-marker-alt"></i>
        <?php 
        echo $row_chitiet['diachi']; 
        ?>
    </p>
    </div>
    <div>
    <p><i class="fas fa-phone-alt"></i>  <?php echo $row_chitiet['dienthoai'];?></p>
    </div>
    <div>
    <p><i class="fas fa-envelope"></i> <?php echo $row_chitiet['email'];?> </p> 
    <a class="btn btn-primary" href="index.php?quanly=editttgh&id=<?php echo $id ?>">Sửa thông tin giao hàng</a>    
    </div>
<!-- Sản phẩm thanh toán -->
    <h3><i class="fas fa-cart-plus"></i> Sản phẩm</h3>
    <?php
    if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
  		$tongtien+=$thanhtien;
  		$i++;
        $dongia = $cart_item['giasp'];
  ?>
    <div style="display:flex">
        <img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px">
        <div style="padding-left: 10px;">
            <?php echo $cart_item['tensanpham']; ?>
            <div>
                <p>Đơn giá: <?php echo number_format($dongia,0,',','.').'vnđ'?></p>
                <p>Số lượng: <?php echo $cart_item['soluong']; ?></p>
                <p>Tổng tiền: <?php echo number_format($thanhtien,0,',','.').'vnđ' ?></p>
            </div>
        </div>
        
    </div>
  <?php
  	}
      ?>
      <h3><i class="fas fa-money-bill-alt"></i> Thành tiền</h3>
    <div style="display:flex">
        <p style="text-align: center;width: 30%;">Tạm tính:</p> 
        <p><?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
    </div>
    <div style="display:flex">
    <p style="text-align: center;width: 30%;">Phí vận chuyển:</p>
      <p>40.000vnđ </p>
    </div>
    <?php $thanhtien = $tongtien + 40000 ?>
    <div style="display:flex">
    <p style="text-align: center;width: 30%;color:red">Tổng tiền: <?php echo number_format($tongtien+40000,0,',','.').'vnđ' ?></p>
    <?php
    if(isset($_SESSION['dangky'])){
          ?>
           <div style="display:grid">
            <form action="pages/main/thanhtoan.php?id=<?php echo $row_chitiet['id_khachhang'];?>&tongtien=<?php echo $thanhtien?>" method="POST">
              <button class="btn btn-info text-white" onclick="return confirm('Bạn muốn đặt hàng ?')" type="submit" name="guithongtin">Đặt hàng
                </button>
                <button class="btn btn-info text-white" onclick="return confirm('Bạn muốn thanh toán online ?')" type="submit" name="vnpay">Thanh toán online VNPAY
                </button>
            </form>
              <!-- <a class="btn bg-success text-white" href="index.php?quanly=ttvnpay&tongtien=<?php echo $thanhtien?>&id=<?php echo $id ?>">Thanh toán online VNPAY
                </a> -->
           </div>
      <?php
        } ?>
    </div>
    <a href="index.php?quanly=giohang" class="btn btn-success">
    Quay lại giỏ hàng
    </a>
    <?php
    }}}
  ?>
  