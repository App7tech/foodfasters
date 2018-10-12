<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"includes/head.php" ?>
    <style>
       span{
         display: none;
       }
    </style>
</head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <?php
        include"includes/header.php";
      ?>
    
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-6">
                        <h4>Register</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <?php echo $this->session->flashdata('login_error'); ?>
                              <form action="<?=base_url();?>Home/register_submit" method="post">
                                       <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Name <?= form_error('name');?></label>
                                       <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo set_value('name')?>"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Email <?= form_error('email');?></label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="<?php echo set_value('email')?>"> 
                                       <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="mobile">Mobile <?= form_error('mobile');?></label>
                                       <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?php echo set_value('mobile')?>"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputPassword1">Password <?= form_error('password');?></label>
                                       <input type="password" class="form-control" id="pass" placeholder="Enter Password"name="password">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="">Retype Password <?= form_error('cpassword');?></label>
                                       <input type="password" class="form-control" id="cpass" placeholder="Retype Password" name="cpassword">
                                       <span style="color:red">Passwords deson't match</span>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <button type="submit" class="btn theme-btn">Register</button> </p>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     <!-- WHY? -->
                     <div class="col-md-6">
                        <h4>Already have an Account?</h4>
                        <!-- <p>Once you"re registered, you can:</p> -->
                        <hr>
                        <img src="<?=base_url();?>main_assets/images/Local.png" alt="" class="img-fluid" style="width: 60%">
                        <h4 class="m-t-20">Click <a href="<?=base_url();?>Home/login">Here</a> to Login</h4>
                     </div>
                     <!-- /WHY? -->
                  </div>
               </div>
            </section>
            <section class="app-section">
               <div class="app-wrap">
                  <div class="container">
                     <div class="row text-img-block text-xs-left">
                        <div class="container">
                           <div class="col-xs-12 col-sm-6  right-image text-center">
                              <figure> <img src="<?=base_url();?>main_assets/images/app.png" alt="Right Image"> </figure>
                           </div>
                           <div class="col-xs-12 col-sm-6 left-text">
                              <h3>The Best Food Delivery App</h3>
                              <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use Food Delivery &amp; Takeout App.</p>
                              <div class="social-btns">
                                 <a href="#" class="app-btn apple-button clearfix">
                                    <div class="pull-left"><i class="fa fa-apple"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">App Store</span> </div>
                                 </a>
                                 <a href="#" class="app-btn android-button clearfix">
                                    <div class="pull-left"><i class="fa fa-android"></i> </div>
                                    <div class="pull-right"> <span class="text">Available on the</span> <span class="text-2">Play store</span> </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
<?php include"includes/footer.php" ?>
         </div>
         <!-- end:page wrapper -->
      </div>
      <!--/end:Site wrapper -->
<?php include"includes/foot.php" ?>

</body>

</html>