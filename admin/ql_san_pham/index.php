<?php include'../common/check_admin.php' ?>
<?php include '../base/config.php';
	check_login();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.content .content_table{
			width: 100%;
			height: 100%;
			background-color: #F0F8FF;
		}
		.content .content_table a{
			text-decoration: none;
			color: black;
		}
		.content .content_table .name{
			border: 1px solid #8baee8;
			width: 150px;
			text-align: center;
			background-color: #a1bff0;
		}
		table {
			text-align: center;
		}
		.phan_trang a{
			text-decoration: none;
			color: black;
			border: 1px solid;
			float: left;
    		margin-left: 10px;
    		width: 18px;
    		text-align: center;
    		margin-top: 5px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php include '../common/menu.php';
		$tim_kiem = '' ?>
		<div class="main_content">
			<div class="header">
				<form class="search">
			    	<input type="search" name="tim_kiem" placeholder="Tìm kiếm sản phẩm..." value="<?php echo $tim_kiem ?>"/>
			  	</form>
			</div>
			<div class="content">
				<div class="content_table">
				<a href="<?php echo base_admin_url() . 'ql_san_pham/view_insert.php'; ?>">
					<div class="name">Đăng sản phẩm</div>
				</a>
					<?php 
						$thu_muc_anh = '../../image/';
						include '../common/connect.php';
						if(isset($_GET['tim_kiem'])){
							$tim_kiem = $_GET['tim_kiem'];
						}
						
						//lấy tất cả sản phẩm
						$sql =  "select *from san_pham where san_pham.ten_san_pham like '%$tim_kiem%' order by ma DESC";
						$result = mysqli_query($connect,$sql);
						//tổng số sản phẩm đang có
						$tong_san_pham = mysqli_num_rows($result);
						$san_pham_1_trang = 6;
						//tính số trang cần phải hiển thị
						$tong_so_trang = ceil($tong_san_pham / $san_pham_1_trang);

						$trang_hien_tai = 1;
						if(isset($_GET['trang'])){
							$trang_hien_tai = $_GET['trang'];
						}
						
						$san_pham_bo_qua = ($trang_hien_tai - 1) * $san_pham_1_trang;
						//hiển thị sản phẩm
						$sql =  "$sql limit $san_pham_1_trang offset $san_pham_bo_qua";
						$result = mysqli_query($connect,$sql);
					?>
					<?php if(mysqli_num_rows($result)==0){
					echo "<script> alert('Không tìm thấy sản phẩm nào !'); window.history.back(-1); </script>";
				} ?>
						<h1>
							<?php echo $tong_san_pham ?> sản phẩm
						</h1>
						<table border="1" width="100%">
							<tr>
								<th>Tên</th>
								<th>Giá</th>
								<th>Mô tả</th>
								<th>Ảnh</th>
								<th>Sửa</th>
								<th>Xóa</th>
							</tr>
							<?php foreach ($result as $each): ?>
								<?php $imageUrl = $thu_muc_anh . $each['anh'] ?>
								<tr>
									<td>
										<?php echo $each['ten_san_pham'] ?>
									</td>
									<td>
										<?php echo number_format($each['gia']) ?> VNĐ
									</td>
									<td>
										<?php echo $each['mo_ta'] ?>
									</td>
									<td>
										<img height="50px" src="<?php echo $imageUrl ?>">
									</td>
									<td>
										<a href="<?php echo base_admin_url() . 'ql_san_pham/view_update.php'; ?>?ma=<?php echo $each['ma']; ?>">
										<!-- <a href="view_update.php?ma=<?php echo $each['ma']; ?>"> -->
											<button>Sửa</button>
										</a>
									</td>
									<td>
										<a href="<?php echo base_admin_url() . 'ql_san_pham/delete.php'; ?>?ma=<?php echo $each['ma']; ?>">
										<!-- <a href="delete.php?ma=<?php echo $each['ma'] ?>"> -->
											<button>Xóa</button>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
							
						</table>
						<div class="phan_trang">
							<?php if($trang_hien_tai > ($tong_so_trang + 1)) echo "<script> alert('Trang này không tồn tại !'); window.history.back(-1); </script>";?>
							<span>
								<?php for($i = 1; $i <= $tong_so_trang; $i++){?>
									<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem?>">
										<?php echo $i ?>
									</a>
								<?php } ?>
							</span>
						</div>
				</div>
			</div>
		</div>
	</div>
<?php mysqli_close($connect) ?>
</body>
</html>
