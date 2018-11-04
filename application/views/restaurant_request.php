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
                        <h4>Request To Place Restaurant</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <?php echo $this->session->flashdata('login_error'); ?>
                              <form action="<?=base_url();?>Home/addNewRestaurantReqest" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Restaurant Name* <?= form_error('restaurant_name');?></label>
                                       <input type="text" class="form-control" id="restaurant_name" placeholder="Enter Name" name="restaurant_name" value="<?php echo set_value('restaurant_name')?>"> 
                                    </div>
                                 </div>
								 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Contact Person Name* <?= form_error('contact_name');?></label>
                                       <input type="text" class="form-control" id="contact_name" placeholder="Enter Name" name="contact_name" value="<?php echo set_value('contact_name')?>"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Contact Email* <?= form_error('contact_email');?></label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="contact_email" value="<?php echo set_value('contact_email')?>"> 
                                       <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="mobile">Contact Mobile* <?= form_error('contact_mobile');?></label>
                                       <input type="text" class="form-control" id="contact_mobile" placeholder="Enter Mobile" name="contact_mobile" value="<?php echo set_value('contact_mobile')?>"> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputPassword1">Restaurant Address* <?= form_error('contact_address');?></label>
                                       <input type="text" class="form-control" id="contact_address" placeholder="Enter Address"name="contact_address" value="<?php echo set_value('contact_address')?>">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="">Message <?= form_error('message');?></label>
                                       <input type="text" class="form-control" id="message" placeholder="type message" name="message"value="<?php echo set_value('message')?>">
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
                        <h4>Filling Guide</h4>
                        <!-- <p>Once you"re registered, you can:</p> -->
                        <hr>
                        <img src="<?=base_url();?>main_assets/images/Local.png" alt="" class="img-fluid" style="width: 60%">
                        <h4 class="m-t-20">please fill all the mandetory(*) fields</h4>
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