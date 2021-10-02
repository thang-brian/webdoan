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
<h3>Chi tiết đơn hàng #<?php echo $id; ?> - 
<?php if($trangthai==1){
        echo 'Đơn đợi duyệt';
      }elseif($trangthai==0){
        echo 'Đang xử lý';
      }else{
        echo 'Đơn đã hủy';
      }?>
</h3>