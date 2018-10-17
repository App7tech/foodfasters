<?php
include "db.php";
$v1 = doubleval($_GET['lat']);
$v2 = doubleval($_GET['lon']);
// echo $v1;
// echo $v2;exit();
$sql = "select id,name,address,lat,lng,(6371 * acos( cos( radians($v1)) * cos( radians( lat ) ) * cos( radians( lng ) - radians($v2))  + sin( radians($v1) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 20 ORDER BY distance LIMIT 0 , 20";
echo '<table><tr>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Distance</th>

		</tr>';
$query = mysqli_query($conn,$sql);
echo mysqli_error($conn);
if(mysqli_num_rows($query)>0){
	
	while($row = mysqli_fetch_array($query)){
		echo '<tr>
			<td>'.$row['id'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['address'].'</td>
			<td>'.$row['lat'].'</td>
			<td>'.$row['lng'].'</td>
			<td>'.$row['distance'].'</td>


		</tr>';
	}
	echo "</table>";
}else{
	echo "no rows found...!";
}
?>