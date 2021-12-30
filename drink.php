   
<!DOCTYPE html>
<?php
    include "condb.php";
?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Drink</title>
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
            <h1 class = "text-center p-3 ">飲品列表</h1>
            <div class="form-inline row">
                <div class="form-group col-sm-6">
                    <form method="post">
                        <input type="text" class="form-control" id="productName" placeholder="搜尋飲品名稱" name="productName">
                        <input type="text" class="form-control" id="storeName" placeholder="輸入分店名稱" name="storeName">
                        <button type="submit" class="btn btn-primary">搜尋</button>
                    </form>
                </div>
                <div class="form-group col-sm-6">
                    <form action="drink_delete.php" method="post">
                        <input type="text" class="form-control" id="productName" placeholder="輸入飲品名稱" name="productName">
                        <input type="text" class="form-control" id="storeName" placeholder="輸入分店名稱" name="storeName">
                        <button type="submit" class="btn btn-primary">刪除</button>
                    </form>
                </div>
            </div>
            <br>
            <div >
                <input type ="button" class="btn btn-primary" value="新增點我" onclick="location.href='add.php'"></input>
                <input type ="button" class="btn btn-primary" value="修改點我" onclick="location.href='update.php'"></input>
            </div>
            <br>
            <!--data-->
            <?php
            	include "drink_inform.php";
            ?>
        </div>
    </body>
</html>
