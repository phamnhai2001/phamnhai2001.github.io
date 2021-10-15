<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#div_content{
			width: 95%;
			height: auto;
			float: left;
			padding-bottom: 50px;

		}
		#new_items{
			height: auto;
			float: left;
			width: 100%;
			padding-left: 10px;
		}
		#container{
			display: flex;
			/*justify-content: space-between;*/
			flex-wrap: wrap;
			margin: 0;
			padding: 0;
			width: 100%;
			height: auto;
			float: left;
		}
		.detail_items{
			width: 100%;
			float: left;
			height: 400px;
			margin: 15px;	
			
		}
		.items{
			margin: 2px;
			text-align: center;
			font-size: 14px;
			width: 100%;
			
		}
		.img_items img{
			height: 328px;
			width: 230px;
		}
		.detail_items:hover{
			border: 1px solid #dbdad5;
		}
		.detail_items:hover .inf_items{
			display: block;
			background-color: silver;
		}
		.name_items{
			height:25px;
		}
		.inf_items{
			height: 20px;
			color: white;
			font-size: 11px;
			text-align: center;
			padding-top: 5px;
			font-family: initial;
		}
		.note_items{
		}
		#sell_items{
			height: auto;
			float: left;
			width: 100%;
		}
		.name_items span{
			width: 50%;
			float: left;
			text-align: center;
			color: black;
		}
	</style>
</head>
<body>
	<div id="div-tong">
		<?php include 'header.php' ?>
		<?php 
		include 'admin/common/connect.php';
		$tim_kiem = '';
			if (isset($_GET['tim_kiem'])) {
				$tim_kiem = trim($_GET['tim_kiem']);
			}
		
		$thu_muc_anh = 'image/';
		$sql_sp = "select * from san_pham where san_pham.ten_san_pham like '%$tim_kiem%'";
		$result_sp = mysqli_query($connect, $sql_sp);

		?>
		<div id="div_content">
			<div id="new_items">
				<p>
					<h3><span>KẾT QUẢ TÌM KIẾM</span></h3>
				</p>
				<?php if(mysqli_num_rows($result_sp)==0){
					echo "<script> alert('Không tìm thấy sản phẩm nào !'); window.history.back(-1); </script>";
				} ?>
				<div id="container">

					<?php foreach ($result_sp as $each): ?>
						<a href="san_pham_chi_tiet.php?ma=<?php echo $each['ma'] ?>" class="details">
							<div class="detail_items">
								<div class="items">
									<div class="img_items">
										<span>
											<img src="<?php echo $thu_muc_anh . $each['anh'] ?>">
										</span>
									</div>
									<div class="note_items">
										<div class="name_items">
											<span style="margin-top: 13px;">
												<?php echo $each['ten_san_pham'] ?>
											</span>
											<br>
											<span style="float:right;margin-top: -5px;">
												<?php echo number_format($each['gia']) ?>đ
											</span>
										</div>
										<br>
										<div class="inf_items">
											<?php echo $each['mo_ta'] ?>
										</div>
									</div>
								</div>
							</div>
						</a>
					<?php endforeach ?>
				</div>
			</div>

		</div>



		<?php include 'footer.php' ?>
	</div>