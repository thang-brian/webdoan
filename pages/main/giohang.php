<p><p style="font-weight: bold;">Giỏ hàng</p> <br> 
  <?php
  if(isset($_SESSION['dangky'])){
    echo 'Xin chào: '.'<span style="color:violet">'.$_SESSION['dangky'].'</span>';
   
  } 
  ?>
</p>
  <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
  		$tongtien+=$thanhtien;
  		$i++;
  ?>
  <table style="width:100%;text-align: center;border-collapse: collapse;" border="1">
  <tr>
    <th>Hình ảnh</th>
    <th>Tên sản phẩm</th>
    <th>Giá tiền</th>
    <th>Số lượng</th>
    <th>Quản lý</th>
  </tr>
  <tr>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="150px" height="150px"></td>
    <td><?php echo $cart_item['tensanpham']; ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
    <td>
    	<a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
    	<?php echo $cart_item['soluong']; ?>
    	<a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
    </td>
    <td><a style="text-decoration: none; color: red;" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm ?')">Xoá</a></td>
  </tr>
</table>
  <?php
  	}
  ?>
   <tr>
    <td colspan="8">
      <br>

    	<button style="" type="button">
       <p style="">
          <a style="color: red;text-decoration: none;" href="pages/main/themgiohang.php?xoatatca=1" onclick="return confirm('Bạn có muốn xóa tất cả sản phẩm ?')">Xoá tất cả
          </a>
      </p> 
      </button>
      <?php
        if(isset($_SESSION['dangky'])){
          ?>
           <button type="button">
              <p>
                <a style="color: green;text-decoration: none" href="index.php?quanly=muahang">Mua hàng
                </a>
              </p>
            </button>
      <?php
        }else{
      ?>
        <button>
          <p><a style="color: green;text-decoration: none" href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
        </button>
      <?php
        }
      ?>
    </td>
  </tr>
  <?php	
  }else{ 
  ?>
   <tr>
    <td colspan="8"><p>Hiện tại giỏ hàng trống</p></td>
   
  </tr>
  <?php
  } 
  ?>