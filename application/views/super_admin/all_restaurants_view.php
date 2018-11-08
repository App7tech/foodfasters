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
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        All Restaurants
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px;">
        <?php echo $this->session->flashdata('res_edit_err'); ?>
        <div class="row">
          	<?php 
          		foreach($rest_data as $rest){
                    $im = '././images/restaurants/'.$rest["image"];
                    if(!is_file($im)){
                        $im = base_url().'images/restaurants/placeholder.jpg';
                    }
          			echo '
          			<div class="col-md-3" style="padding-top: 5px;">
          				<div class="card">
			                <img class="card-img-top" src='.$im.' alt="Card image cap" style="height:150px; object-fit:cover;">
			                <div class="card-body">
			                    <h5 class="card-title">
				                    '.$rest['restaurant_name'].' 
				                    <span class="badge badge-primary float-right">'.$rest['status'].'</span>
				                </h5>
			                    <p class="card-text">'.$rest['restaurant_address'].', '.$rest['restaurant_city'].', '.$rest['restaurant_state'].'</p>
			                    <a href="su_srestaurant/'.$rest['restaurant_id'].'" class="badge badge-primary">View</a>
			                    <a href="su_erestaurant/'.$rest['restaurant_id'].'" class="badge badge-primary">Edit</a>
			                    <a href="su_drestaurant/'.$rest['restaurant_id'].'" class="badge badge-primary">Delete</a>
			                </div>
			            </div>
			        </div>
          			';
          		}
          	?>
      </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</html>