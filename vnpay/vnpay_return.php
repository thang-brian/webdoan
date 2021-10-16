<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Thông tin thanh toán | WEB BÁN HÀNG</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <?php
        require_once("./config.php");
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }

        //$secureHash = md5($vnp_HashSecret . $hashData);
		$secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        ?>
        <!--Begin display -->
        <div class="container bg-light">
            <div class="header clearfix">
                <h3 class="text-muted text-center">Thông tin đơn hàng</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Mã đơn hàng:</label>
                    
                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group border">

                    <label class="col-sm-2 col-form-label border-right">Số tiền:</label>
                    <label><?=number_format($_GET['vnp_Amount']/100) ?> VNĐ</label>
                </div>  
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group border">
                    <label class="col-sm-2 col-form-label border-right">Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                $order_id = $_GET['vnp_TxnRef'];
                                $money = $_GET['vnp_Amount']/100;
                                $note = $_GET['vnp_OrderInfo'];
                                $vnp_response_code = $_GET['vnp_ResponseCode'];
                                $code_vnpay = $_GET['vnp_TransactionNo'];
                                $code_bank = $_GET['vnp_BankCode'];
                                $time = $_GET['vnp_PayDate'];
                                $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
                                include("../admincp/config/config.php");
                                $taikhoan = $_SESSION['dangky'];
                                $sql = "SELECT * FROM payments WHERE code_cart = '$order_id'";
                                $query = mysqli_query($mysqli, $sql);
                                $row = mysqli_num_rows($query);
                                
                                if ($row > 0) {
                                    $sql = "UPDATE payments SET code_cart = '$order_id', money = '$money', note = '$note', vnp_response_code = '$vnp_response_code', code_vnpay = '$code_vnpay', code_bank = '$code_bank' WHERE order_id = '$order_id'";
                                    mysqli_query($mysqli, $sql);
                                } else {
                                    $sql = "INSERT INTO payments(code_cart, thanh_vien, money, note, vnp_response_code, code_vnpay, code_bank, time) VALUES ('$order_id', '$taikhoan', '$money', '$note', '$vnp_response_code', '$code_vnpay', '$code_bank','$date_time')";
                                    mysqli_query($mysqli, $sql);
                                    $sql_code = "UPDATE cart SET cart_status = 2 WHERE code_cart = '$order_id'";
                                    mysqli_query($mysqli, $sql_code);
                                    unset($_SESSION['cart']);
                                }
                                
                                echo '<p class="text-success">Giao dịch thành công. Cảm ơn bạn đã mua hàng</p>';
                            } else {
                                $order_id = $_GET['vnp_TxnRef'];
                                include("../admincp/config/config.php");

                                //Thêm lại số lượng đã bị trừ-------------------
                                $sql = "SELECT * FROM cart_details WHERE code_cart = '$order_id'";
                                $query = mysqli_query($mysqli, $sql);
                                while($row = mysqli_fetch_array($query)){
                                    $soluongnew = $row['soluongmua'];
                                    $id_sanpham = $row['id_sanpham'];
                                    $sql_sp = "SELECT * FROM sanpham WHERE id_sanpham = '$id_sanpham'";
                                    $query_sp = mysqli_query($mysqli, $sql_sp);
                                    while($row_sp = mysqli_fetch_array($query_sp)){
                                        $soluongold = $row_sp['soluong'];
                                    }
                                    $soluong = $soluongold + $soluongnew;
                                    $insert_soluong = "UPDATE sanpham SET soluong='".$soluong."' WHERE id_sanpham = ".$id_sanpham."";
                                    mysqli_query($mysqli,$insert_soluong);
                                }
                                 

                                //Xóa dữ liệu
                                $sql_xoa1 = "DELETE FROM cart WHERE code_cart = '$order_id'";
                                $sql_xoa2 = "DELETE FROM cart_details WHERE code_cart = '$order_id'";
		                        if(mysqli_query($mysqli,$sql_xoa1) && mysqli_query($mysqli,$sql_xoa2)){

                                    echo '<p class="text-danger">Giao dịch thanh toán không thành công, vui lòng thực hiện đặt hàng lại</p>';
                                }else{
                                    echo 'Lỗi';
                                }
                            }
                        } else {
                            echo "Lỗi hệ thống"; //Chu ky khong hop le
                        }
                        ?>

                    </label>
                    <br>
                </div>
                <div class="col text-center">
                    <a href="../index.php?quanly=giohang">
                        <button class="btn btn-primary mb-2">Quay lại giỏ hàng</button>
                    </a>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer text-center">
                <b class="text-muted">&copy; NHÓM 5</b>
            </footer>
        </div>  
    </body>
</html>
