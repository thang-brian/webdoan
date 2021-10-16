<?php
    include("../admincp/config/config.php");
    $id = $_GET['id'];
    $tongtien = $_GET['tongtien'];
    $orderid = $_GET['orderid'];
    $sql= "SELECT * FROM dangky WHERE tenkhachhang = '$id'";
    $query = mysqli_query($mysqli,$sql);
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
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
    
        <div class="container bg-light">
            <h3 class="text-center">Xác thực thanh toán online</h3>
            <div class="table-responsive">
            <?php
            while($row_chitiet = mysqli_fetch_array($query)){
            ?>
                <form action="/PHP/Do-an/vnpay/vnpay_create_payment.php" id="create_form" method="post">  
                <input type="hidden" name="order_type" value="billpayment" >
                <input type="hidden" name="id_khachhang" value="<?php echo $row_chitiet['id_khachhang'] ?>" >
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên khách hàng</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" readonly value="<?php echo $row_chitiet['tenkhachhang'] ?>">
                </div>
                    <div class="form-group">
                        <label for="order_id">Mã đơn hàng</label>
                        <input class="form-control" id="order_id" name="order_id" type="text" readonly value="<?php echo $orderid?>"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số tiền cần thanh toán</label>
                        <input type="text" name="amount" class="form-control" id="exampleInputPassword1" readonly value="<?php echo $tongtien ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">thanh toan don hang <?php echo $orderid?></textarea>
                        <small id="emailHelp" class="form-text text-muted">Mặc định hoặc nhập nội dung không dấu</small>
                    </div>
                    <div class="form-group">
                        <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
                    </div>

                    <!-- <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán ngay</button> -->
                    <div class="text-center">
                        <button type="submit" name="redirect" id="redirect" class="btn btn-primary">Thanh toán ngay</button>
                    </div>
            <?php }?>
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer text-center">
                <b class="text-muted">&copy; NHÓM 5</b>
            </footer>
        </div>  
        <link href="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.css" rel="stylesheet"/>
        <script src="https://sandbox.vnpayment.vn/paymentv2/lib/vnpay/vnpay.js"></script>
        <script type="text/javascript">
            $("#btnPopup").click(function () {
                var postData = $("#create_form").serialize();
                var submitUrl = $("#create_form").attr("action");
                $.ajax({
                    type: "POST",
                    url: submitUrl,
                    data: postData,
                    dataType: 'JSON',
                    success: function (x) {
                        if (x.code === '00') {
                            if (window.vnpay) {
                                vnpay.open({width: 768, height: 600, url: x.data});
                            } else {
                                location.href = x.data;
                            }
                            return false;
                        } else {
                            alert(x.Message);
                        }
                    }
                });
                return false;
            });
        </script>


    </body>
</html>
