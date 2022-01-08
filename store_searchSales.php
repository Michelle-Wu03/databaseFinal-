<?php	
header('Content-Type: application/json; charset=UTF-8');
	include "condb.php";	
	if(!empty($_POST["searchStoreSales"])){
		$storeName = $_POST["searchStoreSales"];
		$sql = ("select storeName, managerID, sum(sale) as sales from store natural inner join drink where storeName = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($storeName));
		$result = $stmt->fetchAll();
	}else{
        echo "<script>alert('請輸入分店');</script>";
	}

        error_log(print_r($result, true));
        echo json_encode($result);
?>
