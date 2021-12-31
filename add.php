<!DOCTYPE html>
<?php
  include "condb.php";
?>
<html>
  <head>
    <meta charset = "utf-8">
    <title>Add Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
   <!--navBar 頁首-->
   <?php
   include("nav.php")
    ?>
    <div class="bg container p-3 my-3 border border-warning  rounded">   
    <h2 class = "text-center p-3 ">新增資料</h2>          
    <!--add store-->
      <table  class="table table-bordered">
        <thead>
          <tr>
            <th>分店名稱</th>
            <th>店長ID</th>
            <th>分店地址</th>
            <th>分店電話</th>
          </tr>
        </thead>
        <form class="form-group col-sm-4" action="store_insert.php" method="post">
            <tbody>
            <tr>
                <td><input type="text" class="container-fluid" id="storeName" placeholder="輸入分店名稱" name="storeName"></td>
                <td><input type="text" class="container-fluid" id="managerName" placeholder="輸入店長名稱" name="managerName"></td>
                <td><input type="text" class="container-fluid" id="storeAddress" placeholder="輸入分店地址" name="storeAddress"></td>
                <td><input type="text" class="container-fluid" id="storePhone" placeholder="輸入分店電話" name="storePhone"></td>
            </tr>
            </tbody>
            <tfoot>
                <td colspan="4">
                    <input type ="submit" class="btn btn-primary float-right" value="新增"></input>
                </td>
            </tfoot>
        </form>
      </table>

            <!--add employee-->
            <table class="table table-bordered">
        <thead>
          <tr>
            <th>員工ID</th>
            <th>員工姓名</th>
            <th>員工住址</th>
            <th>員工電話</th>
            <th>薪水</th>
            <th>工作地點</th>
          </tr>
        </thead>
        <form class="form-group col-sm-4" action="employee_insert.php" method="post">
          <tbody>
            <tr>
              <td><input type="text" class="container-fluid" id="employeeID" placeholder="輸入員工ID" name="employeeID"></td>
              <td><input type="text" class="container-fluid" id="employeeName" placeholder="輸入員工姓名" name="employeeName"></td>
              <td><input type="text" class="container-fluid" id="employeeAddress" placeholder="輸入員工住址" name="employeeAddress"></td>
              <td><input type="text" class="container-fluid" id="employeePhone" placeholder="輸入員工電話" name="employeePhone"></td>
              <td><input type="text" class="container-fluid" id="salary" placeholder="輸入薪水" name="salary"></td>
              <td><input type="text" class="container-fluid" id="workAddress" placeholder="輸入工作地點" name="workAddress"></td>
            </tr>
          </tbody>
          <tfoot>
            <td colspan="6">
              <input type ="submit" class="btn btn-primary float-right" value="新增"></input>
            </td>
          </tfoot>
        </form>
      </table>
        <!--add drink-->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>飲品名稱</th>
            <th>分店名稱</th>
            <th>飲品價格</th> 
            <th>飲品銷量</th>
          </tr>
        </thead>
        <form class="form-group col-sm-4" action="drink_insert.php" method="post">
          <tbody>
            <tr>
              <td><input type="text" class="container-fluid" id="drinkName" placeholder="輸入飲品名稱" name="drinkName"></td>
              <td><input type="text" class="container-fluid" id="storeName" placeholder="輸入分店名稱" name="storeName"></td>
              <td><input type="text" class="container-fluid" id="drinkPrice" placeholder="輸入飲品價格" name="drinkPrice"></td>
              <td><input type="text" class="container-fluid" id="drinkSales" placeholder="輸入飲品銷量" name="drinkSales"></td> 
            </tr>
          </tbody>
          <tfoot>
            <td colspan="4">
              <input type ="submit" class="btn btn-primary float-right" value="新增"></input>
            </td>
          </tfoot>
        </form>
      </table>
    </div>
   </body>
</html>
