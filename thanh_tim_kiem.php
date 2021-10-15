<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/** {box-sizing: border-box;}*/

body {
  margin: 0;
  /*font-family: Arial, Helvetica, sans-serif;*/
}

.topnav input[type=text] {
  float: left;
  width: 500px;
  padding: 8px;
  margin-top: 8px;
  /*margin-left: 50px;*/
  border: none;
  font-size: 17px;
}
.search-items input{
  font-size: 13px;
  border-radius: 20px;
  border: 1px solid #dbdbdb;
  height: 30px;
  width: 270px;
  padding: 15px;
  margin-top: 5px;
}
</style>
</head>
<body>

<div class="topnav">
  <?php 
    $thu_muc_anh = '../image/';
    include 'admin/common/connect.php';
    $tim_kiem = '';
    if(isset($_GET['tim_kiem'])){
      $tim_kiem = $_GET['tim_kiem'];
    }

    $sql =  "select *from san_pham where san_pham.ten_san_pham like '%$tim_kiem%'";
    $result = mysqli_query($connect,$sql);

    $result = mysqli_query($connect,$sql);
   ?>
  <!-- <input type="text" placeholder="Tìm kiếm sản phẩm..."/> -->
  <form class="search-items" action="tim_kiem.php">
    <input type="search" name="tim_kiem" placeholder="Tìm kiếm sản phẩm..."/>
    
  </form>
</div>
</body>
</html>