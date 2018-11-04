<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"includes/head.php" ?>
</head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out"> 
      <?php
           
               include"includes/header.php";
               $e = $this->session->userdata('email');
               $d = $e[0]['email'];
      ?>
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
              <?php echo $this->session->flashdata('login_error'); ?>
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-6">
                        <h4>Change Password</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <form action="<?=base_url();?>Home/password_update" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Old Password <?= form_error('old_pass');?></label>
                                       <input type="password" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Old Password" name="old_pass"> 
                                       <input type="hidden" class="form-control" id="" aria-describedby="emailHelp" placeholder="" name="db_email" value="<?php echo $d;?>"">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">New Password <?= form_error('password');?></label>
                                       <input type="password" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter New Password" name="password"> 
                                        
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputPassword1">Confirm Password <?= form_error('cpassword');?></label>
                                       <input type="password" class="form-control" id="" placeholder="Enter Confirm Password" name="cpassword"> 
                                        
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <button type="submit" class="btn theme-btn">Update</button> </p>
                                    </div>
                                    <div class="col-sm-4">
                                       <p> <a href="<?=base_url();?>Home/profile" class="btn theme-btn">Back</a> </p>
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
                        <h4>Registration is fast, easy, and free.</h4>
                        <!-- <p>Once you"re registered, you can:</p> -->
                        <hr>
                        <img src="<?=base_url();?>main_assets/images/Local.png" alt="" class="img-fluid" style="width: 60%">
                        <h4 class="m-t-20">Click <a href="<?=base_url();?>Home/register">Here</a> to Register</h4>
                     </div>
                     <!-- /WHY? -->
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