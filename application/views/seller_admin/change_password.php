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
    <main>
    <div id="primary" class="blue4 p-t-b-100 height-full ">
        <div class="container">
        
            <div class="row">
                <div class="col-lg-4 mx-md-auto text-white">
                    <div class="text-center">
                        <img src="<?=base_url();?>/main_assets/images/food-picky-logo.png" alt="">
                        <h3 class="p-t-b-20">Change Password</h3>
                        <?php echo $this->session->flashdata('login_error'); ?>
                    </div>
                    <form action="<?=base_url();?>Seller_admin/update_password" method="post">
                    <div class="form-group has-icon"><i class="icon-user-secret" style="color: #86939e !important;"></i><?= form_error('old_password');?>
                            <input type="password" class="form-control form-control-lg" placeholder="Old Password" name="old_password">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret" style="color: #86939e !important;"></i><?= form_error('password');?>
                            <input type="password" class="form-control form-control-lg" placeholder="Password" name="password">
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret" style="color: #86939e !important;"></i><?= form_error('cpassword');?>
                            <input type="password" class="form-control form-control-lg" placeholder="Cofirm Password" name="cpassword">
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Update">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

   
</div>
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</html>