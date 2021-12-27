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
            <form class="form-inline row">
                <div class="form-group col-sm-4">
                    <input type="text" class="form-control" id="drinkName" placeholder="搜尋飲品名稱" name="drinkName">
                    <input type ="button" class="btn btn-primary" value="搜尋" onclick="location.href='drink_inform.php'"></input>
                </div>
                <div class="form-group col-sm-4" >
                    <input type="text" class="form-control" id="drinkName" placeholder="輸入飲品名稱" name="drinkName">
                    <input type ="button" class="btn btn-primary" value="刪除" onclick="location.href='drink_delete.php'"></input>
                </div>
                <div class="col-sm-4 float-right ">
                    <input type ="button" class="btn btn-primary" value="新增點我" onclick="location.href='add.php'"></input>
                    <input type ="button" class="btn btn-primary float-right" value="修改點我" onclick="location.href='update.php'"></input>
                </div>
            </form>
            <br>
            <!--data-->
            <?php
            echo "<table class=\"table table-bordered\">
            <thead>
            <tr>
            <th>飲品名稱</th>
            <th>分店名稱</th>
            <th>飲品價格</th>
            <th>飲品銷量</th>
            </tr>
            </thead>";

            $query = ("select * from drink");
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();

            for($i=0; $i<count($result); $i++){
                echo "<tr>";
                echo "<td>".$result[$i]['productName']."</td>";
                echo "<td>".$result[$i]['storeName']."</td>";
                echo "<td>".$result[$i]['price']."</td>";
                echo "<td>".$result[$i]['sale']."</td>";
                echo "</tr>.";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>