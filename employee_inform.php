<?php	
	include "condb.php";	

	echo "<table class=\"table table-bordered\">
        <thead>
        <tr>
       	<th>員工ID</th>
        <th>員工姓名</th>
        <th>員工住址</th>
        <th>員工電話</th>
        <th>薪水</th>
        <th>工作地點</th>
        </tr>
        </thead>";	

	if(!empty($_POST["name"])){
		$name = $_POST["name"];
		$sql = ("select * from employee where name = ?");
		$stmt = $db->prepare($sql);
		$stmt->execute(array($name));
		$result = $stmt->fetchAll();
	}else{
		$sql = ("select * from employee");
        	$stmt = $db->prepare($sql);
        	$stmt->execute();
        	$result = $stmt->fetchAll();
	}

        for($i=0; $i<count($result); $i++){
                echo "<tr>";
                echo "<td>".$result[$i]['ID']."</td>";
                echo "<td>".$result[$i]['name']."</td>";
                echo "<td>".$result[$i]['address']."</td>";
                echo "<td>".$result[$i]['employeePhone']."</td>";
                echo "<td>".$result[$i]['salary']."</td>";
                echo "<td>".$result[$i]['storeName']."</td>";
                echo "</tr>";
            }
        echo "</table>";
?>