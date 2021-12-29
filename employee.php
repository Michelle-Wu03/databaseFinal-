<!DOCTYPE html>
<?php
    include "condb.php";
?>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Employee</title>
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
            <h1 class = "text-center p-3 ">員工列表</h1>
            <div class="form-inline row">
                <div class="form-group col-sm-12">
                    <form class="form-group col-sm-4" action="employee_inform.php" method="post">
                        <input type="text" class="form-control" id="name" placeholder="搜尋員工名稱" name="name">
                        <button type="submit" class="btn btn-primary">搜尋</button>
                    </form>
                    <form class="form-group col-sm-4" action="employee_delete.php" method="post">
                        <input type="text" class="form-control" id="name" placeholder="輸入員工名稱" name="name">
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
            echo "<table class=\"table table-bordered\">
            <thead>
            <tr>
            <th>員工ID</th>
            <th>員工姓名</th>
            <th>員工住址</th>
            <th>員工電話</th>
            <th>薪水</th>
            <th>工作地點</th>
            </tr>
            </thead>";

            $query = ("select * from employee");
            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll();

            for($i=0; $i<count($result); $i++){
                echo "<tr>";
                echo "<td>".$result[$i]['ID']."</td>";
                echo "<td>".$result[$i]['name']."</td>";
                echo "<td>".$result[$i]['address']."</td>";
                echo "<td>".$result[$i]['employeePhone']."</td>";
                echo "<td>".$result[$i]['salary']."</td>";
                echo "<td>".$result[$i]['storeName']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </body>
</html>
