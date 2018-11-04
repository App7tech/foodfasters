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
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-3 link-item active"><span>1</span><a href="#">Choose Your Location</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="#">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="#">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>
            <!-- end:Top links -->
            <section class="contact-page inner-page">
                <div class="container">
                    <div class="row">
                        <!-- REGISTER -->
                        <div class="col-md-8">
                            <h4>Contact Us</h4>
                            <div class="widget">
                                <div class="widget-body">
                                    <?php echo $this->session->flashdata('login_error'); ?>
                                    <!-- Contact form -->
                                    <form action="<?=base_url();?>Contact/contact_submit" method="post">
                                    <div class="form-horizontal contact-form" role="form">
                                        <fieldset>
                                            <div class="row form-group">
                                                <div class="col-xs-6"><?= form_error('fname');?>
                                                    <input class="form-control" name="fname" type="text" placeholder="First Name *" > </div>
                                                <div class="col-xs-6"><?= form_error('lname');?>
                                                    <input class="form-control" name="lname" type="text" placeholder="Last Name *"> </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-xs-6"><?= form_error('email');?>
                                                    <input class="form-control" name="email" type="email" placeholder="Email *"> </div>
                                                <div class="col-xs-6"><?= form_error('phone');?>
                                                    <input class="form-control" name="phone" type="tel" placeholder="Phone"> </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-xs-12"><?= form_error('subject');?>
                                                    <input class="form-control" name="subject" type="text" placeholder="Subject *"> </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-xs-12"><?= form_error('message');?>
                                                    <textarea class="form-control" name="message" rows="10" placeholder="Message *"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-lg theme-btn" type="submit">Send Message</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <!-- End Contact form -->
                                </form>
                                </div>
                            </div>
                            <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                        <!-- WHY? -->
                        <div class="col-md-4">
                            <h4>Address:</h4>
                            <p>Guntur</p>
                            <ul class="list-check list-unstyled">
                                <li>Email: Foodfaster9@gmail.com</li>
                                <li>Office: 040-33521211</li>
                                <li>Mobile: 9822695303</li>
                            </ul>
                            
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