<?php	
	include "condb.php";
	if (!empty($_POST["employeeID"]))
	{
        $ID = $_POST["employeeID"];
		$name = $_POST["employeeName"];
		$eAddress = $_POST["employeeAddress"];
		$phone = $_POST["employeePhone"];
        $salary = $_POST["salary"];
        $wAddress = $_POST["workAddress"];
		$sqlInsert = ("INSERT IGNORE INTO employee VALUES(?,?,?,?,?,?)");
		
		//檢查店員ID名是否已存在
		$sqlExist = ("SELECT * FROM employee where ID= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($ID));
		$result = $stmt->fetchAll();
		$find_ID = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['ID']==$ID){
				$find_ID = 1;
			}
		}

		//檢查外鍵分店名是否已存在
		$sqlExist = ("SELECT * FROM store where storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($wAddress));
		$result = $stmt->fetchAll();
		$find_name = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['storeName']==$wAddress){
				$find_name = 1;
			}
		}

		//執行修改
		if($find_ID == 0){//主鍵不存在才能新增
			if($find_name == 1 || $wAddress==''){//未輸入或輸入了正確的分店名情況
				if($stmt = $db->prepare($sqlInsert)){//使用者未輸入的非必要值則令其為NULL
                    if($name == '')$name = NULL;
					if($eAddress == '')$eAddress = NULL;
					if($phone == '')$phone = NULL;
                    if($salary == '')$salary = NULL;
					if($wAddress == '')$wAddress = NULL;

					$success = $stmt->execute(array($ID,$name,$eAddress,$phone,$salary,$wAddress));
					header('Location:employee.php');
					}
			}
			else{
				echo "<script>alert('無此分店，新增失敗'); location.href = 'add.php';</script>";
			}
		}
		else{
			echo "<script>alert('此員工已存在，新增失敗'); location.href = 'add.php';</script>";
		}
	}
	else 
	{
	  echo "<script>alert('必須輸入員工ID'); location.href = 'add.php';</script>";
	}
?>
