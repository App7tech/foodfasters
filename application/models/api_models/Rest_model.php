<?php  
class Rest_model extends CI_Model{
	function restaurants($post){
		$v1 = doubleval($post['lat']);
		$v2 = doubleval($post['lon']);
		$q=$this->db->query("select * , (6371 * acos( cos( radians($v1)) * cos( radians( Latitude ) ) * cos( radians( longitude ) - radians($v2))  + sin( radians($v1) ) * sin( radians( Latitude ) ) ) ) AS distance FROM  restaurant_add HAVING distance < 25 ORDER BY distance LIMIT 0 , 20");
		$r=$q->result_array();
		$i = 0;
		foreach ($r as $row) {
			$data[$i]['id'] = $row['id'];
			$data[$i]['name'] = $row['name'];
			$data[$i]['mobile'] = $row['mobile'];
			$data[$i]['restaurant_name'] = $row['restaurant_name'];
			$data[$i]['restaurant_email'] = $row['restaurant_email'];
			$data[$i]['token'] = $row['token'];
			$data[$i]['restaurant_address'] = $row['restaurant_address'];
			$data[$i]['restaurant_city'] = $row['restaurant_city'];
			$data[$i]['latitude'] = $row['Latitude'];
			$data[$i]['longitude'] = $row['longitude'];
			$data[$i]['open_days'] = unserialize($row['open_days']);
		}
		return $data;
	}
}
?>