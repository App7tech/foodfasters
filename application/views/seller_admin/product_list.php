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
                        All Products
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px;">
        <?php //echo $this->session->flashdata('res_edit_err'); ?>
        <div class="row">
          	<?php 
          		foreach($productArray as $product){
                   // $imp = '././images/products/'.$product["product_image"];
					$im = base_url().'images/products/'.$product["product_image"];
					
					//echo $im; 
                    if(!is_file($imp)){
						//echo "not a file";
                        $im = base_url().'images/restaurants/placeholder.jpg';
                    }
          			?>
          			<div class="col-md-3" style="padding-top: 5px;">
          				<div class="card">
			                <img class="card-img-top" src="<?php echo $im?>" alt="Card image cap" style="height:150px; object-fit:cover;">
			                <div class="card-body">
			                    <h5 class="card-title">
				                    <?php echo $product['product_name'] ;?>
				                    <span class="badge badge-primary float-right"><?php echo ($product['product_name']=1)?"active":"inactive"; ?></span>
				                </h5>
			                    <p class="card-text"><?php echo $product['product_name'].', '.$product['price'].', '.$product['product_name'] ;?></p>
			                    <a href="<?php echo base_url();?>Seller_admin/viewProduct/<?php echo $product['product_id'] ?>" class="badge badge-primary">View</a>
			                    <a href="<?php echo base_url();?>Seller_admin/editProduct/<?php echo $product['product_id'] ?>" class="badge badge-primary">Edit</a>
			                    <a href="<?php echo base_url();?>Seller_admin/deleteProduct/<?php echo $product['product_id'] ?>" class="badge badge-primary">Delete</a>
			                </div>
			            </div>
			        </div>
      
          	<?php	}
          	?>
      </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</html>