<?php	
	include "condb.php";
	if (!empty($_POST["storeName"]))
	{
		$name = $_POST["storeName"];
		$mID = $_POST["managerName"];
		$address = $_POST["storeAddress"];
		$phone = $_POST["storePhone"];
		$sqlUpdate = ("UPDATE IGNORE store set storeName = ?,managerID = ?,storeAddress = ?,storePhone = ?");
		
		//檢查分店名是否已存在
		$sqlExist = ("SELECT * FROM store where storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($name));
		$result = $stmt->fetchAll();
		$find_name = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['storeName']==$name){//已存在則保留原始資料
				$find_name = 1;
				$original_mID = $result[$i]['managerID'];
				$original_address = $result[$i]['storeAddress'];
				$original_phone = $result[$i]['storePhone'];
			}
		}

		//檢查外鍵店長ID是否已存在
		$sqlExist = ("SELECT * FROM employee where ID= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($mID));
		$result = $stmt->fetchAll();
		$find_ID = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['ID']==$mID){
				$find_ID = 1;
			}
		}

		//執行修改
		if($find_name == 1){
			if($find_ID == 1 || $mID ==''){//未輸入或輸入了正確的店長ID情況
				if($stmt = $db->prepare($sqlUpdate)){	
					//使用者未輸入的非必要值則令其保持原狀
					if($mID =='')$mID = $original_mID;
					if($address == '')$address = $original_address;
					if($phone == '')$phone = $original_phone;
					
					$success = $stmt->execute(array($name,$mID,$address,$phone));
					header('Location:store.php');
					}
			}
			else{
				echo "<script>alert('無此店員，修改失敗'); location.href = 'update.php';</script>";
			}
		}
		else{
			echo "<script>alert('無此分店，修改失敗'); location.href = 'update.php';</script>";
		}
	}
	else 
	{
	  echo "<script>alert('必須輸入分店名稱'); location.href = 'update.php';</script>";
	}
?>
