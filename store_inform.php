<?php	
	include "condb.php";	

	echo "<table class=\"table table-bordered\">
        <thead>
        <tr>
       	<th>分店名稱</th>
        <th>店長ID</th>
        <th>分店地址</th>
        <th>分店電話</th>
        </tr>
        </thead>";	

	if(!empty($_POST["storeName"])){
		$storeName = $_POST["storeName"];
		$sql = ("select * from store where storeName = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($storeName));
		$result = $stmt->fetchAll();
	}else{
		$sql = ("select * from store");
        	$stmt = $db->prepare($sql);
        	$stmt->execute();
        	$result = $stmt->fetchAll();
	}

        for($i=0; $i<count($result); $i++){
          	echo "<tr>";
          	echo "<td>".$result[$i]['storeName']."</td>";
          	echo "<td>".$result[$i]['managerID']."</td>";
          	echo "<td>".$result[$i]['storeAddress']."</td>";
          	echo "<td>".$result[$i]['storePhone']."</td>";
          	echo "</tr>";
        }
        echo "</table>";
?>