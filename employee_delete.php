<?php	
	include "condb.php";
	if (!empty($_POST["name"])){
		$name = $_POST["name"];

		$sqlExist = ("SELECT * FROM employee where name= ?");
		$stmt = $db->prepare($sqlExist);
		$error= $stmt->execute(array($name));
		$result = $stmt->fetchAll();
		$find_name = 0;
		for($i=0; $i<count($result); $i++){
			if($result[$i]['name']==$name){
				$find_name = 1;
			}
		}
		
		if($find_name == 1){
			$sqlDelete = "DELETE FROM employee WHERE name = ?";
	 		if($stmt = $db->prepare($sqlDelete)){
				try{	
					$success = $stmt->execute(array($name));
					header('Location:employee.php');
				}catch(PDOException $e){
					echo "<script>alert('使用到相關資料，刪除失敗'); location.href = 'employee.php';</script>";
				}
			}
		}else{
	  		echo "<script>alert('無此員工，刪除失敗'); location.href = 'employee.php';</script>";
		}

	}
	
?>