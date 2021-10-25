<?php
	if(isset($_GET['trang'])){
		$page = $_GET['trang'];
	}else{
		$page = 1;
	}
	if($page == '' || $page == 1){
		$begin = 0;
	}else{
		$begin = ($page*3)-3;
	}
	$sql_pro = "SELECT * FROM sanpham,danhmuc WHERE sanpham.id_danhmuc=danhmuc.id_danhmuc ORDER BY sanpham.id_sanpham DESC LIMIT $begin,3";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
				<style type="text/css">
					ul.list_trang {
					    padding: 0;
					    margin: 0;
					    list-style: none;
					    float: right;
					}
					ul.list_trang li {
					    float: left;
					    padding: 5px 13px;
					    margin: 5px;
					    background: burlywood;
					    display: block;
					}
					ul.list_trang li a {
					    color: #000;
					    text-align: center;
					    text-decoration: none;
					 
					}
					/* [1] The container */
					.img-hover-zoom {
					height: 200px; /* [1.1] Set it as per your need */
					overflow: hidden; /* [1.2] Hide the overflowing of child elements */
					}

					.img-hover-zoom img {
					transition: transform .5s, filter 1.5s ease-in-out;
					}

					/* The Transformation */
					.img-hover-zoom:hover img {
					filter: grayscale(0);
					transform: scale(1.1);
					}
				</style>
<h3>Sản phẩm mới nhất</h3>
				<ul class="product_list">
					<?php
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
					<li>
						<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
							<div class="img-hover-zoom">
								<img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
							</div>
							<p class="title_product"><?php echo $row['tensanpham'] ?></p>
							<p class="price_product">Giá : <?php echo number_format($row['giasp'],0,',','.').'vnđ' ?></p>
							<p style="text-align: center;color:#d1d1d1"><?php echo $row['tendanhmuc'] ?></p>
						</a>
					</li>
					<?php
					} 
					?>
				</ul>
				<?php
				$sql_trang = mysqli_query($mysqli,"SELECT * FROM sanpham");
				$row_count = mysqli_num_rows($sql_trang);  
				$trang = ceil($row_count/3);
				?>
				
				
				<ul class="list_trang">
					<p>Trang hiện tại : <?php echo $page ?>/<?php echo $trang ?> </p>
					<?php
					
					for($i=1;$i<=$trang;$i++){ 
					?>
						<li <?php if($i==$page){echo 'style="background: brown;"';}else{ echo ''; }  ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php
					} 
					?>
					
				</ul>