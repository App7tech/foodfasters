<!DOCTYPE html>
<html lang="en">

<head>
   <?php include"includes/head.php" ?>
   
</head>

<body>
   
            <!-- end:Top links -->
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <?php
                include"includes/header.php";
        ?>
        <div class="page-wrapper">
            <!-- top Links -->
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                        <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index-2.html">Choose Your Location</a></li>
                        <li class="col-xs-12 col-sm-3 link-item active"><span>2</span><a href="restaurants.html">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>3</span><a href="profile.html">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay online</a></li>
                    </ul>
                </div>
            </div>

            <div class="result-show">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <p><span class="primary-color"><strong><?php if(isset($rest['num'])){echo $rest['num'];}else{ echo '0';}?></strong></span> Results so far </p>
                        </div>
                        <div class="col-sm-6">
                            <form action="<?=base_url();?>results" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control search-field" placeholder="Search your Restaurant / Favourite Food" name="name"> 
                                <span class="input-group-btn"> 
                                    <button class="btn btn-secondary search-btn" type="submit"><i class="fa fa-search" style="font-size: 17px !important;margin: 0px !important;"></i></button> 
                                </span> 
                            </div>
                        </form>
                        </div>
                        <div class="col-sm-3">
                            <select class="custom-select pull-right" id="froption">
                                <option  value="restaurant">Restaurants</option>
                                <option  value="food">Food</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <!--<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                            <div class="sidebar clearfix m-b-20">
                                <div class="main-block">
                                    <div class="sidebar-title white-txt">
                                        <h6>Choose Cusine</h6> <i class="fa fa-cutlery pull-right"></i> </div>
                                    <form>
                                        <ul>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Barbecuing and Grilling</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Appetizers</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Soup and salads</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Seafood</span> </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Beverages</span> </label>
                                            </li>
                                        </ul>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end:Sidebar nav -->
                               <!-- <div class="widget-delivery">
                                    <form>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" name="radio" type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Delivery</span> </label>
                                        </div>
                                        <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" name="radio" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Takeout</span> </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget clearfix">
                                <!-- /widget heading -->
                               <!-- <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Price range
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <div class="range-slider m-b-10"> <span id="ex2CurrentSliderValLabel"> Filter by price:<span id="ex2SliderVal"><strong>35</strong></span>€</span>
                                        <br>
                                        <input id="ex2" type="text" data-slider-min="1" data-slider-max="100" data-slider-step="1" data-slider-value="35" /> </div>
                                </div>
                            </div>
                            <!-- end:Pricing widget -->
                           <!-- <div class="widget clearfix">
                                <!-- /widget heading -->
                               <!-- <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                 Popular tags
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="widget-body">
                                    <ul class="tags">
                                        <li> <a href="#" class="tag">
                                    Pizza
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    Sendwich
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    Sendwich
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    Fish 
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    Desert
                                    </a> </li>
                                        <li> <a href="#" class="tag">
                                    Salad
                                    </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end:Widget -->
                       <!-- </div>-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="restaurantDiv">
                           
                            <div class="bg-gray restaurant-entry">
                                <?php
                                if(!empty($rest['restaurant'])){
                                    foreach ($rest['restaurant'] as $key){
                                        $im = '././images/restaurants/'.$key["image"];
                                        $ima = base_url().'/images/restaurants/'.$key["image"];
                                        if(!is_file($im)){
                                            $ima = base_url().'images/restaurants/placeholder.jpg';
                                        }
                                        echo'
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                <div class="entry-logo">
                                                    <a class="img-fluid" href="#"><img src="'.$ima.'" alt="Food logo"></a>
                                                </div>
                                                <!-- end:Logo -->
                                                <div class="entry-dscr">
                                                    <h5><a href="#">'.$key['restaurant_name'].'</a></h5> <span>'.$key['restaurant_address'].','.$key['restaurant_city'].'<a href="#">...</a></span>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><i class="fa fa-check"></i> Min $ 10,00</li>
                                                        <li class="list-inline-item"><i class="fa fa-clock-o"></i> 30 min</li>
                                                        <li class="list-inline-item"><i class="fa fa-motorcycle"></i> '.ceil($key['distance']).'KM</li>
                                                    </ul>
                                                </div>
                                                <!-- end:Entry description -->
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                                <div class="right-content bg-white">
                                                    <div class="right-review">
                                                        <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                        <p> 245 Reviews</p> <a href="'.base_url().'home/check_menu/'.$key['restaurant_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
                                                </div>
                                                <!-- end:right info -->
                                            </div>
                                        </div>
                                        <!--end:row -->';
                                    } //for close
                                } //if close
                                else{
                                    echo'<div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                <div class="entry-dscr">
                                                    <h3>Sorry! No Restaurants found near to your Location</h3>
                                                    <a href="'.base_url().'home">Try with another Location</a>
                                                </div>
                                                <!-- end:Entry description -->
                                            </div>
                                        </div>';
                                }
                                ?>
                               
                            </div>
                            <!-- end:Restaurant entry -->
                        </div>
                        <!-- for food list start-->
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="foodDiv">
                           
                            <div class="bg-gray restaurant-entry">
                                <?php
                                if(!empty($rest['products'])){
                                    foreach ($rest['products'] as $key){
                                        $im = '././images/products/'.$key["product_image"];
                                        $ima = base_url().'images/products/'.$key["product_image"];
                                        if(!is_file($im)){
                                            
                                            $ima = base_url().'images/restaurants/placeholder.jpg';
                                        }
                                        echo'
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                <div class="entry-logo">
                                                    <a class="img-fluid" href="#"><img src="'.$ima.'" alt="Food logo"></a>
                                                </div>
                                                <!-- end:Logo -->
                                                <div class="entry-dscr">
                                                    <h5><a href="#">'.$key['product_name'].'</a></h5> <span>'.$key['restaurant_address'].','.$key['restaurant_address'].'<a href="#">...</a></span>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><i class="fa fa-check"></i> $'.$key['selling_price'].'</li>
                                                        <li class="list-inline-item"><i class="fa fa-clock-o"></i> 30 min</li>
                                                        <li class="list-inline-item"><i class="fa fa-motorcycle"></i> '.ceil($key['distance']).'KM</li>
                                                    </ul>
                                                </div>
                                                <!-- end:Entry description -->
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                                <div class="right-content bg-white">
                                                    <div class="right-review">
                                                        <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                        <p> 245 Reviews</p> <a href="'.base_url().'home/check_menu/'.$key['restaurant_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
                                                </div>
                                                <!-- end:right info -->
                                            </div>
                                        </div>
                                        <!--end:row -->';
                                    } //for close
                                } //if close
                                else{
                                    echo'<div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                                <div class="entry-dscr">
                                                    <h3>Please serach food...</a>
                                                </div>
                                                <!-- end:Entry description -->
                                            </div>
                                        </div>';
                                }
                                ?>
                               
                            </div>
                            <!-- end:Restaurant entry -->
                        </div>
                        <!-- close food list here-->
                    </div>
                </div>
            </section>
            <!-- start: FOOTER -->
		<?php include"includes/footer.php" ?>	
            <!-- end:Footer -->
        </div>
    </div>
    <!--/end:Site wrapper -->
<?php include"includes/foot.php" ?>	
<!-- <script type="text/javascript">
    $( window ).load(function() {
        $lat = $('#lat').val();
        $long = $('#lon').val();
        if($lat !='' && $long !=''){
            alert('lat long found');
            $('#jsform').submit();
        }else{
            alert('no lat long found.');

             $('#jsform').submit();
            // var s = ('#sbmtid').val();
            // alert(s);
        }
    });
</script> -->
<script>
    $(document).ready(function(){
        //alert('ok');
        $('#foodDiv').hide();
        $('#froption').change(function(){
            var v = this.value;
            if(v == 'restaurant'){
                $('#restaurantDiv').show();
                $('#foodDiv').hide();
            }
           if(v == 'food'){
                $('#restaurantDiv').hide();
                $('#foodDiv').show();
            }
        });
    });
</script>
</body>


</html>