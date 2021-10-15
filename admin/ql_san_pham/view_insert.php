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
		<?php
		include '../common/menu.php';
		include '../common/connect.php';
		$sql = "select * from loai_san_pham where ma_loai_san_pham_cha is null";
		$result = mysqli_query($connect,$sql);
		?>
		<div class="main_content">
			<div class="header">
				
			</div>
			<div class="content">
				<form class="form" action="process_insert.php" method="post" enctype="multipart/form-data"> 
					<div class="form-group">
							<label>Tên: </label>
						<div class="form-input">
							<input type="text" name="ten_san_pham">
						</div>
					</div>
					<div class="form-group">
							<label>Giá: </label>
						<div class="form-input">
							<input type="number" name="gia">
						</div>
					</div>
					<div class="form-group">
							<label>Mô tả: </label>
						<div class="form-textarea">
							<textarea name="mo_ta"></textarea>
						</div>
					</div>
					<div class="form-group">
							<label>Ảnh: </label>
						<div class="form-input">
							<input type="file" name="anh">
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
							<button>Đăng</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>