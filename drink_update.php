<?php	
	include "condb.php";
	if (!empty($_POST["drinkName"]))
	{
		$dName = $_POST["drinkName"];
		$sName = $_POST["storeName"];
		$price = $_POST["drinkPrice"];
		$sale = $_POST["drinkSales"];
		$sqlUpdate = ("UPDATE IGNORE drink set productName = ?,storeName = ?,price = ?,sale = ?");
		
		//檢查(產品名+分店名)的組合是否已存在
		$sqlExist = ("SELECT * FROM drink where productName= ? and storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($dName,$sName));
		$result = $stmt->fetchAll();
		$find_set = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['productName']==$dName && $result[$i]['storeName']==$sName){//已存在則保留原始資料
				$find_set = 1;
				$original_price = $result[$i]['price'];
				$original_sale = $result[$i]['sale'];
			}
		}

		//檢查外鍵分店名是否已存在
		$sqlExist = ("SELECT * FROM store where storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($sName));
		$result = $stmt->fetchAll();
		$find_store = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['storeName']==$sName){
				$find_store = 1;
			}
		}

		//執行修改
		if($find_set == 1){
			if($find_store == 1){//輸入了正確的分店名情況(因分店名同時也是主鍵所以必續輸入)
				if($stmt = $db->prepare($sqlUpdate)){	
					//使用者未輸入的非必要值則令其保持原狀
					if($price == '')$price = $original_price;
					if($sale == '')$sale = $original_sale;
					
					$success = $stmt->execute(array($dName,$sName,$price,$sale));
					header('Location:drink.php');
					}
			}
			else{
				echo "<script>alert('無此分店，修改失敗'); location.href = 'update.php';</script>";
			}
		}
		else{
			echo "<script>alert('無此組合，修改失敗'); location.href = 'update.php';</script>";
		}
	}
	else 
	{
	  echo "<script>alert('必須輸入產品與分店名稱'); location.href = 'update.php';</script>";
	}
?>
