<?php 
$id = $_GET['id'];
$sql_lietke_dh = "SELECT * FROM cart_details,sanpham WHERE cart_details.id_sanpham=sanpham.id_sanpham AND cart_details.code_cart='".$id ."' ORDER BY cart_details.id_cart_details DESC";
$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
$sql_donhuy = "SELECT * FROM cart WHERE code_cart='".$id."'";
$query_donhuy = mysqli_query($mysqli,$sql_donhuy);
while($row = mysqli_fetch_array($query_donhuy)){
    $trangthai = $row['cart_status'];
}
?>
<h3>Chi tiết đơn hàng #<?php echo $id; ?> </h3>  
<div>
  <p>Trạng thái: 
  <?php if($trangthai==1){
          echo 'Đơn đợi duyệt';
        }elseif($trangthai==0){
          echo 'Đang xử lý đơn hàng';
        }elseif($trangthai==4){
          echo '<p class="text-danger">Đơn đợi thanh toán, hãy thực hiện chuyển khoản </p> </br> <b>Ngân hàng B - STK: 123456 hoặc liên hệ tổng đài hỗ trợ (1.000đ/phút): 19009001</b> </br>';
        }elseif($trangthai==2){
          echo 'Đơn của bạn đã thanh toán, đang xử lý đơn hàng';
        }elseif($trangthai==5){
          echo 'Đơn bị shop hủy, vui lòng chờ hoàn tiền';
        }else{
          echo 'Đơn đã hủy';
        }?>
  </p>
  <a href="index.php?quanly=lichsu" class="btn btn-success">
	Quay lại
  </a>
  
</div>

