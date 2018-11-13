<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .navbar{
            background-color: unset !important;
        }
    </style>
	<?php include"includes/head.php" ?>	
</head>

<body class="home">
    <!-- form open -->
        <script type="text/javascript">
            
            function getLocation(){
                if(navigator.geolocation){
                    navigator.geolocation.getCurrentPosition(showPosition);

                }
            }
      

            function showPosition(position){
                document.getElementById("lat").value =+position.coords.latitude;
                document.getElementById("lon").value =+position.coords.longitude;
                var l1 = document.getElementById("lat").value;
                var l2 = document.getElementById("lon").value;
                if( l1 != '' && l2 !=''){
                    document.getElementById('jsform').submit();
                }else{
                    alert('Internet Problem.!');
                }
                

            }
        </script>
        <form action="<?=base_url();?>Home/display_res" method="post" id="jsform">
            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="lon" id="lon">

            <!-- <button class="button" type="submit" name="sbmt" id="sbmt" class="sbmt">Find Nearest Restaurants</button> -->
        </form>
            <!-- end:Top links -->
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <?php
                include"includes/header.php";
        ?>
        <!-- banner part starts -->
        <section class="hero bg-image" data-image-src="https://images.pexels.com/photos/1095550/pexels-photo-1095550.jpeg?auto=compress&cs=tinysrgb&h=650&w=940">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Order your Food Online</h1>
                    <h5 class="font-white space-xs">Enter your delivery location to get restaurants</h5>
                    <div >
                        <form class="form-inline inl" action="<?=base_url();?>Home/display_res" method="post">
                            <button onclick="getLocation()"  class="btn theme-btn btn-lg"><i class="fa fa-map-marker"></i></button>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Enter your Location</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputAmount" placeholder="Enter your Location" name="location_search"> </div>
                            </div>
                            <button  type="submit" class="btn theme-btn btn-lg"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                   
                </div>
            </div>
            <!--end:Hero inner -->
        </section>
        <!-- banner part ends -->

        <!-- How it works block starts -->
        <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                    <h2>Easy Steps to Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                            <div class="how-it-works-wrap">
                                <div class="step step-1">
                                    <div class="icon" data-step="1">
                                        <img src="https://image.flaticon.com/icons/svg/123/123403.svg">
                                    </div>
                                    <h3>Choose a restaurant</h3>
                                    <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2">
                                <div class="icon" data-step="2">
                                    <img src="https://image.flaticon.com/icons/svg/135/135763.svg">
                                </div>
                                <h3>Choose a tasty dish</h3>
                                <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3">
                                <div class="icon" data-step="3">
                                   <img src="https://image.flaticon.com/icons/svg/411/411814.svg">
                                </div>
                                <h3>Pick up or Delivery</h3>
                                <p>Get your food delivered! And enjoy your meal! Pay online on pickup or delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
        <!-- How it works block ends -->
        <!-- Featured restaurants starts -->
        <section class="featured-restaurants">
            <div class="container">
                <!-- add restaurant starts -->
                <section class="add-restaurants">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 add-title">
                                <h4>Are you a Restaurant ?</h4> </div>
                            <div class="col-xs-12 col-sm-5 join-text">
                                <p>Join the thousands of other restaurants who benefit from having their menus on <strong> Foodfasters </strong> </p>
                            </div>
                            <div class="col-xs-12 col-sm-4 join-btn text-xs-right"><a href="#" class="btn theme-btn btn-lg">Join Us</a> </div>
                        </div>
                    </div>
                </section>
                <!-- add restaurant ends -->
            </div>
        </section>
        <!-- Featured restaurants ends -->
        
        <!-- start: FOOTER -->
        <?php include"includes/footer.php" ?>	
        <!-- end:Footer -->
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var s = $("#header");
            var pos = s.position();                    
            $(window).scroll(function() {
                var windowpos = $(window).scrollTop();
                if (windowpos >= pos.top & windowpos <=10) {
                    s.removeClass("c-black");
                } else {
                    s.addClass("c-black"); 
                }
            });
        });
    </script>
	<?php include"includes/foot.php" ?>	
</body>

</html>