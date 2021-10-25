<?php
	$sql_pro = "SELECT * FROM sanpham WHERE sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
	$query_pro = mysqli_query($mysqli,$sql_pro);
	//get ten danh muc
	$sql_cate = "SELECT * FROM danhmuc WHERE danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
				<style>
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
<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?></h3>
				<ul class="product_list">
					<?php
					while($row_pro = mysqli_fetch_array($query_pro)){ 
					?>
					<li>
						<a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
							<div class="img-hover-zoom">
								<img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
							</div>
							<p class="title_product"><?php echo $row_pro['tensanpham'] ?></p>
							<p class="price_product">Giá : <?php echo number_format($row_pro['giasp'],0,',','.').'vnđ' ?></p>
						</a>
					</li>
					<?php
					} 
					?>
					
				</ul>