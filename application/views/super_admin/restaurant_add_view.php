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
                        Restaurant Add
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
                      <h4>Personal Info</h4>
                      <form class="form-material" action="<?=base_url();?>su_restaurant_add_sub" method="post" enctype="multipart/form-data">
                      <?php //echo form_open_multipart(base_url().'su_restaurant_add_sub');?>
                          <!-- Input -->
                          <div class="body">
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="name" value="<?=set_value('name');?>">
                                              <label class="form-label">Name *</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="mobile" value="<?=set_value('mobile');?>" >
                                              <label class="form-label">Mobile *</label>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- #END# Input -->
                  </div>
                  <div class="card-body b-b">
                      <h4>Restaurant Details</h4>
                          <!-- Input -->
                          <div class="body form-material">
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                  	<span style="font-size: 12px;font-weight: 400;">Restaurant Name *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_name" value="<?=set_value('restaurant_name');?>" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Email *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="Email" class="form-control" name="restaurant_email" value="<?=set_value('restaurant_email');?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Image *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="file" class="form-control" name="restaurant_img" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Address *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_address" value="<?=set_value('restaurant_address');?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant City *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_city" value="<?=set_value('restaurant_city');?>" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant State *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_state" value="<?=set_value('restaurant_state');?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-sm-3">
                                  		<span style="font-size: 12px;font-weight: 400;">Latitude Point
                                  		</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="latitude" value="<?=set_value('latitude');?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                  		<span style="font-size: 12px;font-weight: 400;">longitude Point
                                  		</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="longitude" value="<?=set_value('longitude');?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Days Open *
                                  		</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="mon" <?= set_checkbox('days', 'mon'); ?> >Mon</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="tue" <?= set_checkbox('days', 'tue'); ?> >Tue</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="wed" <?= set_checkbox('days', 'wed'); ?> >Wed</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="thru" <?= set_checkbox('days', 'thru'); ?> >Thru</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="fri" <?= set_checkbox('days', 'fri'); ?> >Fri</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="sat" <?= set_checkbox('days', 'sat'); ?> >Sat</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="sun" <?= set_checkbox('days', 'sun'); ?> >Sun</label>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="font-size: 12px;font-weight: 400;">Opening Time *</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <input type="time" class="form-control" name="s_time" value="<?=set_value('s_time')?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="font-size: 12px;font-weight: 400;">Closing Time *</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <input type="time" class="form-control" name="e_time" value="<?=set_value('e_time')?>" >
                                      </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-primary" name="reg_submit">
                          </div>
                          <!-- #END# Input -->
                      </form>
                  </div>
              </div>
          </div>
          <div class="col-md-5">
              <h3>Registration Guide</h3>
              <hr>
              <p>Please fill all the mandatory fields to get restaurant placed correctly in the listing.</p>
              <a href="su_restaurants" class="btn btn-xs btn-primary">Show all Restaurants</a>
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