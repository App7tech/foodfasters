<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php include 'includes/head.php'; ?>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<?php include 'includes/left_sidebar.php'; ?>
<!--Sidebar End-->
<?php include 'includes/top_bar.php'; ?>
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Add New Product
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px;">
        <div class="row">
          <div class="col-md-7">
              <div class="card">
                  <div class="card-body b-b">
                    <?php echo $this->session->flashdata('res_reg_err'); ?>
                      <h4>Product Info</h4>
                      <form class="form-material" action="<?=base_url();?>seller_admin/addNewProduct" method="post" enctype="multipart/form-data">
                          <!-- Input -->
                          <div class="body">
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="product_name" value="<?=set_value('product_name');?>">
                                              <label class="form-label">Product Name *</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
										  <input class="form-control" name="product_description" value="<?=set_value('product_description');?>" >                                              
                                              <label class="form-label">Product Description *</label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
							  <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="price" value="<?=set_value('price');?>">
                                              <label class="form-label">Price *</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
										  <input class="form-control" name="selling_price" value="<?=set_value('selling_price');?>" >                                              
                                              <label class="form-label">Selling Price *</label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
							  <div class="row clearfix">
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Product Image *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="file" class="form-control" name="product_image" >
                                          </div>
                                      </div>
                                  </div>
								  
                                  <div class="col-sm-6">
										<span style="font-size: 12px;font-weight: 400;">Category *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
											  <select class="form-control" name="category" value="<?=set_value('category');?>" >
												<option value="">Select Category</option>
												<option value="1">Biryani</option>
												<option value="2">Starter</option>
												<option value="3">Soup</option>
											  </select>										  
                                              
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
						  <input type="submit" class="btn btn-primary" name="product_submit">
						 </form>
                          <!-- #END# Input -->
                  </div>
                  
              </div>
          </div>
          <div class="col-md-5">
              <h3>Product Guide</h3>
              <hr>
              <p>Please fill all the mandatory fields.</p>
              <a href="#" class="btn btn-xs btn-primary">Show all products</a>
              <?php
                if(validation_errors()){
                  echo "<div class='card card-body mt-2'>";
                  echo "<h4 style='color:red;font-weight:500;'>Errors</h4>";
                  echo validation_errors();
                  echo "</div>";
                }
              ?>
          </div>
      </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</html>