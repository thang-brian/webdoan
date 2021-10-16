<?php 
    include('../../config/config.php');
    if(isset($_GET['code'])){
        $code_cart = $_GET['code'];
        $sql_update ="UPDATE cart SET cart_status=3 WHERE code_cart='".$code_cart."'";
        $query = mysqli_query($mysqli,$sql_update);
        //Thêm lại số lượng đã bị trừ-------------------
        $sql = "SELECT * FROM cart_details WHERE code_cart = '$code_cart'";
        $query = mysqli_query($mysqli, $sql);
        while($row = mysqli_fetch_array($query)){
            $soluongnew = $row['soluongmua'];
            $id_sanpham = $row['id_sanpham'];
        }
        $sql_sp = "SELECT * FROM sanpham WHERE id_sanpham = '$id_sanpham'";
        $query_sp = mysqli_query($mysqli, $sql_sp);
        while($row_sp = mysqli_fetch_array($query_sp)){
            $soluongold = $row_sp['soluong'];
        }
        $soluong = $soluongold + $soluongnew;
        $insert_soluong = "UPDATE sanpham SET soluong='".$soluong."' WHERE id_sanpham = ".$id_sanpham."";
        mysqli_query($mysqli,$insert_soluong);

        //Đổi trạng thái đối với đơn đã thanh toán
        $cart_status = $_GET['cart_status'];
        if($cart_status == 2){
            $sql_update_vnpay ="UPDATE cart SET cart_status=5 WHERE code_cart='".$code_cart."'";
            $query_vnpay = mysqli_query($mysqli,$sql_update_vnpay);
        }

        header('Location:./index.php?action=quanlydonhang&query=lietke');
    } 
?>