<!DOCTYPE html>
<html lang="en">

<head>
	 <?php include"includes/head.php" ?>
</head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
	 <?php
	
		include"includes/header.php";
	
	?>
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
               <?php echo $this->session->flashdata('login_error'); ?>
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-6">
                        <h4>Profile</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <table>
                              <?php foreach($user as $user_data):?>
                              	<tr>
                              		<td>Name  </td>
                              		<td><?php echo $user_data['username']?></td>
                              	</tr>
                              	<tr>
                              		<td>Emil  </td>
                              		<td><?php echo $user_data['email']?></td>
                              	</tr>
                              	<tr>
                              		<td>Mobile  </td>
                              		<td><?php echo $user_data['phone']?></td>
                              	</tr>
                              	<tr>
                              		<td>Referral Code  </td>
                              		<td><?php echo $user_data['referal_code']?></td>
                              	</tr>
                              	<tr>
                              		<td>Status  </td>
                              		<td><?php echo $user_data['status']?></td>
                              	</tr>
                                 <tr>
                                    <td>Created On  </td>
                                    <td><?php echo $user_data['datetime']?></td>
                                 </tr>
                              	<tr>
                              		<td><a href="<?=base_url();?>Home/change_pass" class="btn theme-btn">Change Password</a></td>
                              		<td><a href="<?=base_url();?>Home/edit_profile" class="btn theme-btn">Edit Profile</a></td>
                              	</tr>
                              	<?php endforeach;?>
                              </table>
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