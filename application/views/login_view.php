<!DOCTYPE html>
<html lang="en">

<head>
    <?php include"includes/head.php" ?>
</head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <?php include"includes/header.php" ?>
         <div class="page-wrapper">
            <section class="contact-page inner-page">
               <div class="container">
               <?php echo $this->session->flashdata('login_error'); ?>
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-6">
                        <h4>Login</h4>
                        <hr>
                        <div class="widget">
                           <div class="widget-body">
                              <form action="<?=base_url();?>Home/login_submit" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1">Email <?= form_error('email');?></label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value="<?php echo set_value('email')?>"> 
                                       <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group col-sm-12">
                                       <label for="exampleInputPassword1">Password <?= form_error('password');?></label>
                                       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password"> 
                                       <small id="emailHelp" class="form-text text-muted">
                                       	<a href="<?=base_url();?>Contact/forgot" id="emailHelp" class="form-text text-muted">Forgot Password ?</a> 
                                       </small> 
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <button type="submit" class="btn theme-btn">Login</button> </p>
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