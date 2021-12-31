<?php	
	include "condb.php";
	if (!empty($_POST["storeName"]))
	{
		$name = $_POST["storeName"];
		$mID = $_POST["managerName"];
		$address = $_POST["storeAddress"];
		$phone = $_POST["storePhone"];
		$sqlInsert = ("INSERT IGNORE INTO store VALUES(?,?,?,?)");
		
		//檢查分店名是否已存在
		$sqlExist = ("SELECT * FROM store where storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($name));
		$result = $stmt->fetchAll();
		$find_name = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['storeName']==$name){
				$find_name = 1;
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
		if($find_name == 0){//主鍵不存在才能新增
			if($find_ID == 1 || $mID ==''){//未輸入或輸入了正確的店長ID情況
				if($stmt = $db->prepare($sqlInsert)){//使用者未輸入的非必要值則令其為NULL
                    			if($mID =='')$mID = NULL;
					if($address == '')$address = NULL;
					if($phone == '')$phone = NULL;

					$success = $stmt->execute(array($name,$mID,$address,$phone));
					header('Location:store.php');
					}
			}
			else{
				echo "<script>alert('無此店員，新增失敗'); location.href = 'add.php';</script>";
			}
		}
		else{
			echo "<script>alert('此分店已存在，新增失敗'); location.href = 'add.php';</script>";
		}
	}
	else 
	{
	  echo "<script>alert('必須輸入分店名稱'); location.href = 'add.php';</script>";
	}
?>
