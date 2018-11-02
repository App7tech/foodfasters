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
                        <h4>Edit Profile</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <?php echo $this->session->flashdata('login_error'); ?>
                              <form action="<?=base_url();?>Home/update_user" method="post">
                                 <?php foreach($user as $user_data):?>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Name <?= form_error('name');?></label>
                                       <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $user_data['username'];?>"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Email <?= form_error('email');?></label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="<?php echo $user_data['email'];?>"> 
                                       
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="mobile">Mobile <?= form_error('mobile');?></label>
                                       <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" value="<?php echo $user_data['phone'];?>"> <input type="hidden" class="form-control" id="mobile" placeholder="Enter Mobile" name="db_email" value="<?php echo $user_data['email'];?>">
                                    </div>
                                 </div>
                                 <?php endforeach;?>
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
<?php include"includes/footer.php" ?>
         </div>
         <!-- end:page wrapper -->
      </div>
      <!--/end:Site wrapper -->
<?php include"includes/foot.php" ?>

</body>

</html>