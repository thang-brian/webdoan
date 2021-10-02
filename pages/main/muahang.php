<h3>Thanh toán</h3>
<!-- Địa chỉ nhận hàng -->
<p><i class="fas fa-map-marker-alt"></i> <?php echo $_SESSION['dangky'];?> </p>
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
    </div>
<!-- Sản phẩm thanh toán -->
    <p><i class="fas fa-cart-plus"></i> Sản phẩm</p>
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
      <p><i class="fas fa-money-bill-alt"></i> Thành tiền</p>
    <div style="display:flex">
        <p style="text-align: center;width: 30%;">Tạm tính:</p> 
        <p><?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
    </div>
    <div style="display:flex">
    <p style="text-align: center;width: 30%;">Phí vận chuyển (dự kiến):</p>
      <p>40.000vnđ </p>
    </div>
    
    <div style="display:flex">
    <p style="text-align: center;width: 30%;color:red">Tổng tiền: <?php echo number_format($tongtien+40000,0,',','.').'vnđ' ?></p>
    <?php
    if(isset($_SESSION['dangky'])){
          ?>
           <button type="button">
              <p>
                <a style="color: green;text-decoration: none" href="pages/main/thanhtoan.php?id=<?php echo $row_chitiet['id_khachhang'];?>">Thanh toán
                </a>
              </p>
            </button>
      <?php
        } ?>
    </div>
    <?php
    }}
  ?>
  