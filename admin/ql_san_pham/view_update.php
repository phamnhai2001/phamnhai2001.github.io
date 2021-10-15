<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../static/css/admin.css">
	<style type="text/css">
		.form {
			padding: 20px 50px 50px 50px;
		}

		.form-group {
			display: flex;
			min-width: 400px;
			margin-top: 10px;
		}
		.form-group label {
			padding-right: 10px;
			width: 20%;
			text-align: right;
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}
		.form-group .form-input {
			width: 70%;
		}

		.form-group .form-input input {
			font-size: .8rem;
		    border-radius: 3px;
		    border: 1px solid #dbdbdb;
		    height: 25px;
		    width: 181px;
		    padding: 3px;
		}
		.button-container button{
			margin-left: 160px;
			margin-top: 15px;
			background-color: #6699CC;
			border: 1px solid #5072A7;
			color: white;
			width: 50px;
			height: 30px;
		}
		.form-textarea textarea{
			width: 180px;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php include '../common/menu.php' ?>
		<?php if (isset($_GET['ma'])) { ?>
		<div class="main_content">
			<div class="header">
				
			</div>
			<div class="content">
				<?php $ma = $_GET['ma'];
				$thu_muc_anh = '../../image/';

				include '../common/connect.php';

				$sql = "select * from san_pham where ma = '$ma'";
				$result = mysqli_query($connect,$sql);
				$each = mysqli_fetch_array($result);
				$dem = mysqli_num_rows($result);

				$sql = "select * from loai_san_pham where ma_loai_san_pham_cha is null";
				$result = mysqli_query($connect,$sql);
			 ?>
			 <div class="error" style="text-align: center; color: red;">
			<?php if($dem == 0){
				echo "<script> alert('Không tìm thấy sản phẩm nào !'); window.history.back(-1); </script>";
			} ?>
			</div>
				<form class="form" action="process_update.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Tên: </label>
						<div class="form-input">
							<input type="text" name="ten_san_pham" value="<?php echo $each['ten_san_pham'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label>Giá: </label>
						<div class="form-input">
							<input type="number" name="gia" value="<?php echo $each['gia'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label>Mô tả: </label>
						<div class="form-textarea">
							<textarea name="mo_ta"><?php echo $each['mo_ta'] ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label>Ảnh cũ: </label>
						<div class="form-input">
							<input type="hidden" name="anh_cu" value="<?php echo $each['anh'] ?>">
							<img height="200" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label>Hoặc chọn ảnh mới: </label>
						<div class="form-input">
							<input type="file" name="anh_moi">
						</div>
					</div>
					<div class="form-group">
						<label>Loại sản phẩm: </label>
						<div class="form-input">
							<select name="ma_loai_san_pham">
								<?php foreach ($result as $each): ?>
									<optgroup label="<?php echo $each['ten_loai_san_pham'] ?>">
										<?php
										$sql = "select * from loai_san_pham
										where ma_loai_san_pham_cha = ".$each['ma_loai_san_pham'];
										$result_loai_sp_ct = mysqli_query($connect,$sql);
										if(mysqli_num_rows($result_loai_sp_ct)>0){
											?>
											<?php foreach ($result_loai_sp_ct as $loai_sp_ct): ?>
												<option value="<?php echo $loai_sp_ct['ma_loai_san_pham'] ?>">
													<?php echo $loai_sp_ct['ten_loai_san_pham'] ?>
												</option>
											<?php endforeach ?>
										<?php 
										}
										else{ 
										?>
											<option value="<?php echo $each['ma_loai_san_pham'] ?>">
												<?php echo $each['ten_loai_san_pham'] ?>
											</option>
										<?php } ?>
									</optgroup>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="button-container">
						<button>Sửa</button>
					</div>
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					
				</form>
				
			</div>
		</div>
	</div>
	
<?php mysqli_close($connect) ?>

<?php } else{
	echo "<script> alert('Không tìm thấy sản phẩm nào !'); window.history.back(-1); </script>";
} ?></body>
</html>