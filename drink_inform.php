<?php	
	include "condb.php";	

	echo "<table class=\"table table-bordered\">
        <thead>
        <tr>
       	<th>飲品名稱</th>
        <th>分店名稱</th>
        <th>飲品價格</th>
        <th>飲品銷量</th>
        </tr>
        </thead>";	


	if(!empty($_POST["productName"]) && !empty($_POST["storeName"])){
		$productName = $_POST["productName"];
		$storeName = $_POST["storeName"];
		$sql = ("select * from drink where productName = ? and storeName = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($productName,$storeName));
		$result = $stmt->fetchAll();
	}else if(!empty($_POST["productName"])){
		$productName = $_POST["productName"];
		$sql = ("select * from drink where productName = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($productName));
		$result = $stmt->fetchAll();
	}else if(!empty($_POST["storeName"])){
		$storeName = $_POST["storeName"];
		$sql = ("select * from drink where storeName = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($storeName));
		$result = $stmt->fetchAll();
	}else{
		$sql = ("select * from drink");
        	$stmt = $db->prepare($sql);
        	$stmt->execute();
        	$result = $stmt->fetchAll();
	}

        for($i=0; $i<count($result); $i++){
                echo "<tr>";
                echo "<td>".$result[$i]['productName']."</td>";
                echo "<td>".$result[$i]['storeName']."</td>";
                echo "<td>".$result[$i]['price']."</td>";
                echo "<td>".$result[$i]['sale']."</td>";
                echo "</tr>";
        }
        echo "</table>";
?>