<div class="main">

	<?php

				if(isset($_GET['action']) && $_GET['query']){
					$tam = $_GET['action'];
					$query = $_GET['query'];
				}else{
					$tam = '';
					$query = '';
				}
				if($tam=='quanlydanhmucsanpham' && $query=='them'){
					include("modules/quanlydanhmucsp/lietke.php");
				}else if($tam=='quanlydanhmucsanpham' && $query=='themdm'){
					include("modules/quanlydanhmucsp/them.php");
				}elseif ($tam=='quanlydanhmucsanpham' && $query=='sua') {
					include("modules/quanlydanhmucsp/sua.php");
				}elseif ($tam=='quanlysp' && $query=='them') {
					include("modules/quanlysp/lietke.php");
				}elseif($tam=='quanlysp' && $query=='themsp'){
					include("modules/quanlysp/them.php");
				}elseif($tam=='quanlysp' && $query=='sua'){
					include("modules/quanlysp/sua.php");
				}elseif($tam=='quanlydonhang' && $query=='lietke'){
					include("modules/quanlydonhang/lietke.php");
				}elseif($tam=='donhang' && $query=='xemdonhang'){
					include("modules/quanlydonhang/xemdonhang.php");
				}elseif($tam=='donhang' && $query=='huydon'){
					include("modules/quanlydonhang/xulyhuydon.php");
				}
				else{
					include("modules/dashboard.php");
				}
	?> 
	
</div>