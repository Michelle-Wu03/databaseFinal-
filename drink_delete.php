<?php	
	include "condb.php";
	
	$storeName = $_POST["storeName"];
	$productName = $_POST["productName"];

	//判斷storeName是否存在
	$sqlExist = ("SELECT * FROM drink where storeName= ?");
	$stmt = $db->prepare($sqlExist);
	$error= $stmt->execute(array($storeName));
	$result = $stmt->fetchAll();
	$find_storeName = 0;
	for($i=0; $i<count($result); $i++){
		if($result[$i]['storeName']==$storeName){
			$find_storeName = 1;
		}
	}

	//判斷productName是否存在
	$sqlExist = ("SELECT * FROM drink where productName= ?");
	$stmt = $db->prepare($sqlExist);
	$error= $stmt->execute(array($productName));
	$result = $stmt->fetchAll();
	$find_productName = 0;
	for($i=0; $i<count($result); $i++){
		if($result[$i]['productName']==$productName){
			$find_productName = 1;
		}
	}
	
	//刪除某分店某飲品
	if (!empty($_POST["productName"]) && !empty($_POST["storeName"])){

		if($find_storeName == 1 && $find_productName == 1){
			$sqlDelete = "DELETE FROM drink WHERE productName = ? and storeName = ?";
	  		if($stmt = $db->prepare($sqlDelete)){
				try{	
					$success = $stmt->execute(array($productName,$storeName));
					header('Location:drink.php');
				}catch(PDOException $e){
					echo "<script>alert('使用到相關資料，刪除失敗'); location.href = 'drink.php';</script>";
				}
	  		}
		}else{
			echo "<script>alert('無此資料，刪除失敗'); location.href = 'drink.php';</script>";
		}

	}

	//刪除某分店所有飲品
	else if(!empty($_POST["storeName"])){
	 
		if($find_storeName == 1){
			$sqlDelete = "DELETE FROM drink WHERE storeName = ?";
	  		if($stmt = $db->prepare($sqlDelete)){
				try{	
					$success = $stmt->execute(array($storeName));
					header('Location:drink.php');
				}catch(PDOException $e){
					echo "<script>alert('使用到相關資料，刪除失敗'); location.href = 'drink.php';</script>";
				}
	  		}
		}else{
			echo "<script>alert('無此資料，刪除失敗'); location.href = 'drink.php';</script>";
		}
	  
	}

	//刪除所有分店某飲品
	else if(!empty($_POST["productName"])){

		if($find_productName == 1){
			$sqlDelete = "DELETE FROM drink WHERE productName = ?";
	  		if($stmt = $db->prepare($sqlDelete)){
				try{	
					$success = $stmt->execute(array($productName));
					header('Location:drink.php');
				}catch(PDOException $e){
					echo "<script>alert('使用到相關資料，刪除失敗'); location.href = 'drink.php';</script>";
				}
	  		}
		}else{
			echo "<script>alert('無此資料，刪除失敗'); location.href = 'drink.php';</script>";
		}

	}
?>