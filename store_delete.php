<?php	
	include "condb.php";	
	if (!empty($_POST["storeName"])){	
		$storeName = $_POST["storeName"];

		$sqlExist = ("SELECT * FROM store where storeName= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($storeName));
		$result = $stmt->fetchAll();
		$find_storeName = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['storeName']==$storeName){
				$find_storeName = 1;
			}
		}

		if($find_storeName == 1){
			$sqlDelete = "DELETE FROM store WHERE storeName = ?";
	  		if($stmt = $db->prepare($sqlDelete)){
				try{	
					$success = $stmt->execute(array($storeName));
					header('Location:store.php');
				}catch(PDOException $e){
					echo "<script>alert('使用到相關資料，刪除失敗'); location.href = 'store.php';</script>";
				}
	  		}
		}else{
			echo "<script>alert('無此分店，刪除失敗'); location.href = 'store.php';</script>";
		}

	}else{
		header('Location:store.php');
	}

?>
