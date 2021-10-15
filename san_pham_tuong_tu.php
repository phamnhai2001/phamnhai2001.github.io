<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#container{
			margin: 0;
			padding: 0;
			width: 100%;
			height: auto;
			float: left;
		}
		.detail_items{
			width: 22%;
			float: left;
			height: 368px;
			margin: 15px;	
			
		}
		.items{
			margin: 2px;
			text-align: center;
			font-size: 14px;
		}
		.img_items img{
			height: 315px;
			width: 100%;
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
		.name_items span{
			width: 50%;
			float: left;
			text-align: center;
			color: black;
		}
	</style>
</head>
<body>
<?php 
include 'admin/common/connect.php';
$sql = "select * from san_pham order by rand() limit 4";
$result = mysqli_query($connect, $sql);
$thu_muc_anh = 'image/';

?>
	<div id="container">
		<?php foreach ($result as $each): ?> 
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
								<span>
									<?php echo $each['ten_san_pham'] ?>
								</span>
								<span>
									<?php echo number_format($each['gia']) ?> VNĐ
								</span>
							</div>
							<div class="inf_items">
								<?php echo $each['mo_ta'] ?>
							</div>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach ?>
	</div>
	<?php mysqli_close($connect) ?>
</body>
</html>