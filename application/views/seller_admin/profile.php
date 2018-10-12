<!DOCTYPE html>
<html lang="zxx">
<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<?php include 'includes/left_sidebar.php'; ?>
<!--Sidebar End-->
<?php include 'includes/top_bar.php'; ?>
<div class="page has-sidebar-left">
    <div>
       <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        <a href="<?=base_url()?>su_restaurants">All Restaurants</a> - <?= $rest_data[0]["restaurant_name"] ?>
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px;">
        <div class="row">
          	<?php 
                $im = '././images/restaurants/'.$rest_data[0]["image"];
                $im1 = base_url().'images/restaurants/'.$rest_data[0]["image"];
                if(!is_file($im)){
                    $im1 = base_url().'images/restaurants/placeholder.jpg';
                }
                $o_days = "";
                $do = unserialize($rest_data[0]['open_days']);
                if($do!=''){
                    foreach ($do as $days) {
                       $o_days .= $days.", ";
                    }
                }
      			echo '
      			<div class="col-md-6" style="padding-top: 5px;">
      				<div class="card">
		                <img class="card-img-top" src='.$im1.' alt="Card image cap" style="height:150px; object-fit:cover;">
		                <div class="card-body">
		                    <h5 class="card-title">
			                    <b>'.$rest_data[0]['restaurant_name'].' </b>
			                    <span class="badge badge-primary float-right">'.$rest_data[0]['status'].'</span>
			                </h5>
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>'.$rest_data[0]['name'].'</td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>'.$rest_data[0]['mobile'].'</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>'.$rest_data[0]['restaurant_email'].'</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>'.$rest_data[0]['restaurant_address'].', '.$rest_data[0]['restaurant_city'].', '.$rest_data[0]['restaurant_state'].'</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>'.$rest_data[0]['Latitude'].'</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>'.$rest_data[0]['longitude'].'</td>
                                </tr>
                                <tr>
                                    <td>Days Open</td>
                                    <td>'.$o_days.'</td>
                                </tr>
                                <tr>
                                    <td>Open Time</td>
                                    <td>'.$rest_data[0]['open_time'].'</td>
                                </tr>
                                <tr>
                                    <td>Close Time</td>
                                    <td>'.$rest_data[0]['close_time'].'</td>
                                </tr>
                                <tr>
                                    <td>Registration</td>
                                    <td>'.$rest_data[0]['datetime'].'</td>
                                </tr>
                            </table>
		                </div>
		            </div>
		        </div>
      			';
          	?>
      </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</body>

</html>