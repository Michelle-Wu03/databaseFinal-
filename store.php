<!DOCTYPE html>
<?php
  include "condb.php";
?>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Store</title>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src = "sales.js"></script>
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
          <form class="form-group col-sm-4" action="store_searchSales.php" method="post">
          <input type="text" class="form-control" id="searchStoreSales" placeholder="輸入分店名稱" name="searchStoreName">
          <button type="button" id ="searchSales" class="btn btn-primary">查詢總銷量</button>
        </form>
          
        </div>
      </div>
      <br>
      <div class="col-sm-4">
            <input type ="button" class="btn btn-primary" value="新增點我" onclick="location.href='add.php'"></input>
            <input type ="button" class="btn btn-primary " value="修改點我" onclick="location.href='update.php'"></input>
          </div>
      <br>
      <!--data-->
      <div id="datas">
      <?php
          include "store_inform.php";
        ?>
      </div>
        
    </div>
  </body>
</html>
