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
               include"includes/login_header.php";
           
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
            <!-- start: Inner page hero -->
            <section class="bg-image space-md" data-image-src="<?=base_url();?>main_assets/images/image01.jpg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4  col-lg-4 profile-img">
                                <h1 class="font-white">Contact us </h1> </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end:Inner page hero -->
            <!-- <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="#" class="active">Home</a></li>
                        <li><a href="#">Search results</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div> -->
            <section class="contact-page inner-page">
                <div class="container">
                    <div class="row">
                        <!-- REGISTER -->
                        <div class="col-md-8">
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
                            <h4>Registration is fast, easy, and free.</h4>
                            <p>Once you"re registered, you can:</p>
                            <ul class="list-check list-unstyled">
                                <li>Buy, sell, and interact with other members.</li>
                                <li>Save your favorite searches and get notified.</li>
                                <li>Watch the status of up to 200 items.</li>
                                <li>View yourinformation from any computer in the world.</li>
                                <li>Connect with the Atropos community.</li>
                            </ul>
                            <hr>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle collapsed" href="#faq1" aria-expanded="false"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4> </div>
                                <div class="panel-collapse collapse" id="faq1" aria-expanded="false" role="article" style="height: 0px;">
                                    <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                                </div>
                            </div>
                            <!-- end:panel -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" class="panel-toggle" href="#faq2" aria-expanded="true"><i class="ti-info-alt" aria-hidden="true"></i>Can I viverra sit amet quam eget lacinia?</a></h4> </div>
                                <div class="panel-collapse collapse" id="faq2" aria-expanded="true" role="article">
                                    <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam rutrum ut erat a ultricies. Phasellus non auctor nisi, id aliquet lectus. Vestibulum libero eros, aliquet at tempus ut, scelerisque sit amet nunc. Vivamus id porta neque, in pulvinar ipsum. Vestibulum sit amet quam sem. Pellentesque accumsan consequat venenatis. Pellentesque sit amet justo dictum, interdum odio non, dictum nisi. Fusce sit amet turpis eget nibh elementum sagittis. Nunc consequat lacinia purus, in consequat neque consequat id. </div>
                                </div>
                            </div>
                            <!-- end:Panel -->
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
                                <div class="col-xs-12 col-sm-6  right-image text-center hidden-xs-down">
                                    <figure> <img src="<?=base_url();?>main_assets/images//app.png" alt="Right Image"> </figure>
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


<!-- Mirrored from codenpixel.com/demo/foodpicky/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Sep 2018 06:53:37 GMT -->
</html>