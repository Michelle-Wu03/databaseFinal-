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
		$sqlUpdate = ("UPDATE IGNORE employee set ID = ?,name = ?,address = ?,employeePhone = ?,salary = ?,storeName = ?");
		
		//檢查店員ID名是否已存在
		$sqlExist = ("SELECT * FROM employee where ID= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($ID));
		$result = $stmt->fetchAll();
		$find_ID = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['ID']==$ID){//已存在則保留原始資料
				$find_ID = 1;
				$original_name = $result[$i]['name'];
				$original_eAddress = $result[$i]['address'];
				$original_phone = $result[$i]['employeePhone'];
                $original_salary = $result[$i]['salary'];
				$original_wAddress = $result[$i]['storeName'];
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
		if($find_ID == 1){
			if($find_name == 1 || $wAddress==''){//未輸入或輸入了正確的分店名情況
				if($stmt = $db->prepare($sqlUpdate)){	
					//使用者未輸入的非必要值則令其保持原狀
					if($name == '')$name = $original_name;
					if($eAddress == '')$eAddress = $original_eAddress;
					if($phone == '')$phone = $original_phone;
                    if($salary == '')$salary = $original_salary;
					if($wAddress == '')$wAddress = $original_wAddress;

					$success = $stmt->execute(array($ID,$name,$eAddress,$phone,$salary,$wAddress));
					header('Location:employee.php');
					}
			}
			else{
				echo "<script>alert('無此分店，修改失敗'); location.href = 'update.php';</script>";
			}
		}
		else{
			echo "<script>alert('無此員工，修改失敗'); location.href = 'update.php';</script>";
		}
	}
	else 
	{
	  echo "<script>alert('必須輸入員工ID'); location.href = 'update.php';</script>";
	}
?>
