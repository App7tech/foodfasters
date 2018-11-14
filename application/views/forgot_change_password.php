<!DOCTYPE html>
<html lang="en">
<head>
    <?php include"includes/head.php" ?>
</head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out"> 
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
              <?php echo $this->session->flashdata('login_error'); ?>
                  <div class="row">
                  	<div class="col-md-3">
                  	</div>
                     <div class="col-md-6">
                     	<h1 style="text-align:center"><b>FoodFaster</b></h1><br>
                        <h5 style="text-align:center"><b>Welcome <?=ucfirst($result[0]['username'])?>!</b></h5>
                        <h4 style="text-align:center">Change Password</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <form action="<?=base_url();?>contact/forgot_link/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>" method="post">
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
                                 </div>
                              </form>
                           </div>
                        	<p style="text-align:center;font-weight:600;color:green">Note: Please Dont share this link</p>
                           <!-- end: Widget -->
                        </div>
                        <div class="col-md-3">
                  	</div>
                        <!-- /REGISTER -->
                     </div>
                  </div>
               </div>
            </section>
         </div>
         <!-- end:page wrapper -->
      </div>
      <!--/end:Site wrapper -->
<?php include"includes/foot.php" ?>
</body>

</html>