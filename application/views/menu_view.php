<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "includes/head.php" ?>
</head>
<body>
<div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <!--header starts-->
    <?php include "includes/header.php" ?>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-3 link-item"><span>1</span><a href="index-2.html">Choose Your
                            Location</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>2</span><a href="restaurants.html">Choose
                            Restaurant</a></li>
                    <li class="col-xs-12 col-sm-3 link-item active"><span>3</span><a href="profile.html">Pick Your
                            favorite food</a></li>
                    <li class="col-xs-12 col-sm-3 link-item"><span>4</span><a href="checkout.html">Order and Pay
                            online</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <section class="inner-page-hero bg-image"
                 data-image-src="<?= base_url(); ?>main_assets/images/profile-banner.jpg">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($rest['restaurant'] as $restaurant) {
                            // print_r($result);exit();
                            $im = '././images/restaurants/' . $restaurant["image"];
                            $ima = base_url() . '/images/restaurants/' . $restaurant["image"];
                            if (!is_file($im)) {
                                $ima = base_url() . 'images/restaurants/placeholder.jpg';
                            }
                            echo '
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                           <div class="image-wrap">
                              <figure><img src="' . $ima . '" alt="Profile Image"></figure>
                           </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                           <div class="pull-left right-text white-txt">
                              <h6><a href="#">' . $restaurant['restaurant_name'] . '</a></h6>
                              <a class="btn btn-small btn-green">Open</a>
                              <p>' . $restaurant['restaurant_address'] . ',' . $restaurant['restaurant_city'] . ',' . $restaurant['restaurant_state'] . '</p>
                              <ul class="nav nav-inline">
                                 <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ 10,00</a> </li>
                                 <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                                 <li class="nav-item ratings">
                                    <a class="nav-link" href="#"> <span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    </span> </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     
                     </div>';
                        }
                        ?>
                    </div>
                </div>
        </section>
        <!-- end:Inner page hero -->
        
        <div class="result-show">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <!-- for lefet side search results -->
                    </div>
                    <div class="col-sm-6">
                        <form action="<?= base_url(); ?>Home/productSearchResults" method="post">
                            <div class="input-group">
                                <input type="hidden" name="restaurant_id" value="<?= $restaurantId ?>">
                                <input type="text" class="form-control search-field"
                                       placeholder="Search your Favourite Food" name="product_search_key">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary search-btn" type="submit"><i class="fa fa-search" style="font-size: 17px !important;margin: 0px !important;"></i></button>
                                </span>
                                <?php echo $this->session->flashdata('search_error'); ?>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <!--for right side menu-->
                    </div>
                </div>
            </div>
        </div>
        <!-- //results show -->
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="sidebar clearfix m-b-20">
                        <div class="main-block">
                            <div class="sidebar-title white-txt">
                                <h6>Choose Category</h6>
                                <i class="fa fa-cutlery pull-right"></i>
                            </div>
                            <?php
                            if (sizeof($rest['categories']) != 0) {
                                echo "<ul>";
                                foreach ($rest['categories'] as $category) {
                                    echo '<li><a href="#category-' . $category["category_id"] . '" class="scroll active">' . ucfirst($category["category_name"]) . '</a></li>';
                                }
                                echo "</ul>";
                            } else {
                                echo "<ul><li>No Categories Found!</li></ul>";
                            }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <!-- end:Sidebar nav -->
                    </div>
                    <!-- end:Left Sidebar -->
                    <!-- <div class="widget clearfix">
                       <div class="widget-heading">
                          <h3 class="widget-title text-dark">
                             Popular tags
                          </h3>
                          <div class="clearfix"></div>
                       </div>
                       <div class="widget-body">
                          <ul class="tags">
                             <li> <a href="#" class="tag">
                                Coupons
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Discounts
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Deals
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Amazon
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Ebay
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Fashion
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Shoes
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Kids
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Travel
                                </a>
                             </li>
                             <li> <a href="#" class="tag">
                                Hosting
                                </a>
                             </li>
                          </ul>
                       </div>
                    </div> -->
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-5">

                	<?php
                	$id = 1;
                	foreach ($rest['food'] as $category) {
                		
                	?>
                    <div class="menu-widget m-b-30" style="text-transform: capitalize;">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                 <a class="btn btn-link" data-toggle="collapse" href="#category-<?=$category['category_id'];?>" aria-expanded="true"><?= $category['category_name'];?></a>
															<a class="btn btn-link pull-right" data-toggle="collapse" href="#category-<?=$category['category_id'];?>" aria-expanded="true"> 
																<i class="fa fa-angle-right pull-right"></i>
                                <i class="fa fa-angle-down pull-right"></i>
                              </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse <?php if($id == 1){ echo 'in';}?>" id="category-<?= $category['category_id'];?>">
	
                            <?php
                            $user_details = $this->session->userdata('email');
                            $customer_id = '';
                            if($user_details[0]['id'] ==''){
                              $customer_id = 0;
                            }else{
                              $customer_id = $user_details[0]['id'];
                            }
                            $update = 0;
                            $quant = 1;
                            foreach ($category['food'] as $food) {
                                $im = '././images/products/' . $food["product_image"];
                                $ima = base_url() . 'images/products/' . $food["product_image"];
                                if (!is_file($im)) {

                                    $ima = base_url() . 'images/restaurants/placeholder.jpg';
                                }
                                $cart_call = 'add_to_cart('.$food['product_id'].','.$rest['restaurant'][0]['restaurant_id'].','.$quant.','.$customer_id.','.$update.')';
                                echo '<div class="food-item white">
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" href="#"><img src="' . $ima . '" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                       <h6><a href="#">' . $food['product_name'] . '</a></h6>
                                       <p>' . $food['product_description'] . '</p>
                                    </div>
                                    <!-- end:Description -->
                                 </div>
                                 <!-- end:col -->
                                 <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$' . $food['selling_price'] . '</span> <a class="btn btn-small btn btn-secondary pull-right" onclick="'.$cart_call.'" >&#43;</a> </div>
                              </div>
                              <!-- end:row -->
                           </div>
                           <!-- end:Food item -->';
                            }
                            ?>


                        </div>
                        <!-- end:Collapse -->
                    </div>
                    <?php
                    $id++;
                  }
                    ?>
                    
                </div>
                <!-- end:Bar -->
                <div class="col-xs-12 col-md-12 col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="widget widget-cart">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Your Shopping Cart
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="order-row bg-white">
                                <div class="widget-body">
                                    
                                    <div class="form-group row no-gutter cartData">
                                      
                                    </div>
                                </div>
                            </div>
                            
                                    </div>
                                </div>
                            </div>
                            
                            <!-- end:Order row -->
                            <!-- <div class="widget-body">
                                <div class="price-wrap text-xs-center">
                                    <p>TOTAL</p>
                                    <h3 class="value"><strong>$ 25,49</strong></h3>
                                    <p>Free Shipping</p>
                                    <button onclick="location.href='checkout.html'" type="button"
                                            class="btn theme-btn btn-lg">Checkout
                                    </button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- end:Right Sidebar -->
            </div>
            <!-- end:row -->
        </div>
        <!-- end:Container -->

        
        <?php include "includes/footer.php" ?>

    </div>
    <!-- end:page wrapper -->
</div>
<!--/end:Site wrapper -->
<!-- Modal -->
<div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <div class="modal-body cart-addon">
                <div class="food-item white">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img
                                            src="<?= base_url(); ?>main_assets/images/pepsi.png" alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                            </div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 2.99</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect2">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img
                                            src="<?= base_url(); ?>main_assets/images/cola.jpg" alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                            </div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 2.49</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect3">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img
                                src="<?= base_url(); ?>main_assets/images/fanta.jpg" alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                            </div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 1.99</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect5">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
                <div class="food-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="item-img pull-left">
                                <a class="restaurant-logo pull-left" href="#"><img src="<?= base_url(); ?>main_assets/images/beer.jpg" alt="Food logo"></a>
                            </div>
                            <!-- end:Logo -->
                            <div class="rest-descr">
                                <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                            </div>
                            <!-- end:Description -->
                        </div>
                        <!-- end:col -->
                        <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"><span
                                    class="price pull-left">$ 3.15</span></div>
                        <div class="col-xs-6 col-sm-4 col-lg-4">
                            <div class="row no-gutter">
                                <div class="col-xs-7">
                                    <select class="form-control b-r-0" id="exampleSelect6">
                                        <option>Size SM</option>
                                        <option>Size LG</option>
                                        <option>Size XL</option>
                                    </select>
                                </div>
                                <div class="col-xs-5">
                                    <input class="form-control" type="number" value="0" id="quant-input-5">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end:row -->
                </div>
                <!-- end:Food item -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn theme-btn">Add to cart</button>
            </div>
        </div>
    </div>
</div>
<?php include "includes/foot.php" ?>
<script type="text/javascript" src="<?= base_url();?>main_assets/js/cart.js"></script>
</body>

</html>