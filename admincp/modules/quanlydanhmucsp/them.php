<fieldset>
	<legend>Thêm danh mục sản phẩm</legend>
	<table border="1" width="50%" style="border-collapse: collapse;">
 <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
	  <tr>
	  	<td>Tên danh mục</td>
	  	<td><input type="text" name="tendanhmuc"></td>
	  </tr>
	  <tr>
	    <td>Thứ tự</td>
	    <td><input type="text" name="thutu"></td>
	  </tr>
	   <tr>
	    <td colspan="2"><input type="submit" name="themdanhmuc" value="Thêm danh mục sản phẩm"></td>
	  </tr>
 </form>
</table>
</fieldset>
<a href="?action=quanlydanhmucsanpham&query=them" class="btn btn-primary">
	Thoát
</a>