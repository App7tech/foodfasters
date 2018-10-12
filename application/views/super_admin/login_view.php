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
<main>
    <div id="primary" class="blue4 p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto text-white">
                    <div class="text-center">
                        <img src="<?=base_url();?>/main_assets/images/food-picky-logo.png" alt="">
                        <h3 class="p-t-b-20">Welcome Super Admin</h3>
                    </div>
                    <?php echo $this->session->flashdata('login_error'); ?>
                    <form action="<?=base_url();?>super_admin_valid/" method="post">
                        <?php echo form_error('email'); ?>
                        <div class="form-group has-icon"><i class="icon-envelope-o" style="color: #86939e !important;"></i>
                            <input type="text" name="email" class="form-control form-control-lg"
                                   placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                        </div>
                        <?php echo form_error('password'); ?>
                        <div class="form-group has-icon"><i class="icon-user-secret" style="color: #86939e !important;"></i>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In">
                        <p class="forget-pass">Have you forgot your username or password ?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<!-- <div class="control-sidebar-bg shadow white fixed"></div>
</div> -->
<?php include 'includes/foot.php'; ?>
</body>

</html>