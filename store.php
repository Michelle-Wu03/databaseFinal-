<!DOCTYPE html>
<?php
  include "condb.php";
?>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!--navBar 頁首-->
    <?php
        include("nav.php")
    ?>
    <!--content-->
    <div class="container p-3 my-3 border border-warning rounded bg">          
      <h1 class = "text-center p-3 ">分店列表</h1>
      <div class="form-inline row">
        <div class="form-group col-sm-12">
          <form class="form-group col-sm-4" method="post">
            <input type="text" class="form-control" id="storeName" placeholder="搜尋分店名稱" name="storeName">
            <button type="submit" class="btn btn-primary">搜尋</button>
          </form>
          <form class="form-group col-sm-4" action="store_delete.php" method="post">
            <input type="text" class="form-control" id="storeName" placeholder="輸入分店名稱" name="storeName">
            <button type="submit" class="btn btn-primary">刪除</button>
        </form>
        <div class="col-sm-4 float-right">
          <input type ="button" class="btn btn-primary" value="新增點我" onclick="location.href='add.php'"></input>
          <input type ="button" class="btn btn-primary float-right" value="修改點我" onclick="location.href='update.php'"></input>
        </div>
      </div>
    </div>
      <br>
      <!--data-->
	<?php
		include "store_inform.php";
	?>
      
    </div>
  </body>
</html>