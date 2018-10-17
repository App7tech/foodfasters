<?php
include "db.php";
$v1 = doubleval($_GET['lat']);
$v2 = doubleval($_GET['lon']);
// echo $v1;
// echo $v2;exit();
//Here's the SQL statement that will find the closest 20 locations that are within a radius of 25 miles to the 37, -122 coordinate. It calculates the distance based on the latitude/longitude of that row and the target latitude/longitude, and then asks for only rows where the distance value is less than 25, orders the whole query by distance, and limits it to 20 results. To search by kilometers instead of miles, replace 3959 with 6371.

$sql = "select id,name,address,lat,lng,(6371 * acos( cos( radians($v1)) * cos( radians( lat ) ) * cos( radians( lng ) - radians($v2))  + sin( radians($v1) ) * sin( radians( lat ) ) ) ) AS distance FROM markers HAVING distance < 10 ORDER BY distance LIMIT 0 , 20";
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