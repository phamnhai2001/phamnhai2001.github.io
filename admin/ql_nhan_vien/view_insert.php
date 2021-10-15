<?php include'../common/check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
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
	</style>
</head>
<body>
	<div class="container">
		 <?php include '../common/menu.php' ?>
		<div class="main_content">
			<div class="header">
				
			</div>
			<div class="content">
				<form class="form" action="process_insert.php" method="post" enctype="multipart/form-data">
					
						<div class="form-group">
								<label>Tên nhân viên: </label>
							<div class="form-input">
								<input type="text" name="ten">
							</div>
						</div>
						<div class="form-group">
								<label>Giới tính: </label>
							<div class="form-input">
								<input type="text" name="gioi_tinh">
							</div>
						</div>
						<div class="form-group">
								<label>Email: </label>
							<div class="form-input">
								<input type="email" name="email">
							</div>
						</div>
						<div class="form-group">
								<label>Địa chỉ: </label>
							<div class="form-input">
								<input type="text" name="dia_chi">
							</div>
						</div>
						<div class="form-group">
								<label>Ngày sinh: </label>
							<div class="form-input">
								<input type="date" name="ngay_sinh">
							</div>
						</div>
						<div class="form-group">
								<label>SĐT: </label>
							<div class="form-input">
								<input type="number" name="sdt">
							</div>
						</div>
						<div class="form-group">
								<label>Bắt đầu làm việc: </label>
							<div class="form-input">
								<input type="date" name="thoi_gian_lam_viec">
							</div>
						</div>
						<div class="button-container">
								<button>Thêm</button>
						</div>
					
				</form>
</body>
</html>