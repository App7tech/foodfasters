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
                        <a href="<?=base_url()?>su_restaurants">All Restaurants</a> - <?= $data[0]["restaurant_name"] ?>
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
                    <?php echo $this->session->flashdata('res_edit_err'); ?>
                      <h4>Personal Info</h4>
                      <form class="form-material" action="<?=base_url();?>su_restaurant_edit_sub/<?=$data[0]['id']?>" method="post" enctype="multipart/form-data">
                      <?php //echo form_open_multipart(base_url().'su_restaurant_add_sub');?>
                          <!-- Input -->
                          <div class="body">
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="name" value="<?=set_value('name', $data[0]['name']);?>">
                                              <label class="form-label">Name *</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="mobile" value="<?=set_value('mobile', $data[0]['mobile']);?>" >
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
                                              <input type="text" class="form-control" name="restaurant_name" value="<?=set_value('restaurant_name', $data[0]['restaurant_name']);?>" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Email *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="Email" class="form-control" name="restaurant_email" value="<?=set_value('restaurant_email', $data[0]['restaurant_email']);?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Image *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <?= $data[0]['image'] ?>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant Address *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_address" value="<?=set_value('restaurant_address', $data[0]['restaurant_address']);?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant City *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_city" value="<?=set_value('restaurant_city', $data[0]['restaurant_city']);?>" >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Restaurant State *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="restaurant_state" value="<?=set_value('restaurant_state', $data[0]['restaurant_state']);?>" >
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
                                              <input type="text" class="form-control" name="latitude" value="<?=set_value('latitude', $data[0]['Latitude']);?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-3">
                                  		<span style="font-size: 12px;font-weight: 400;">longitude Point
                                  		</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="longitude" value="<?=set_value('longitude', $data[0]['longitude']);?>">
                                          </div>
                                      </div>
                                  </div>
                                  <?php
                                    $d_arr = unserialize($data[0]['open_days']);
                                  ?>
                                  <div class="col-sm-6">
                                  		<span style="font-size: 12px;font-weight: 400;">Days Open *
                                  		</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="mon" <?= set_checkbox('days', 'mon'); ?> <?php if(in_array('mon', $d_arr))echo "checked"; ?> >Mon</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="tue" <?= set_checkbox('days', 'tue'); ?> <?php if(in_array('tue', $d_arr))echo "checked"; ?> >Tue</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="wed" <?= set_checkbox('days', 'wed'); ?> <?php if(in_array('wed', $d_arr))echo "checked"; ?> >Wed</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="thru" <?= set_checkbox('days', 'thru'); ?> <?php if(in_array('thru', $d_arr))echo "checked"; ?> >Thru</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="fri" <?= set_checkbox('days', 'fri'); ?> <?php if(in_array('fri', $d_arr))echo "checked"; ?> >Fri</label>
                                          <label style="padding: 5px">
                                          <input type="checkbox" class="form-control" name="days[]" value="sat" <?= set_checkbox('days', 'sat'); ?> <?php if(in_array('sat', $d_arr))echo "checked"; ?> >Sat</label>
                                          <label style="padding: 5px">
                                          	<input type="checkbox" class="form-control" name="days[]" value="sun" <?= set_checkbox('days', 'sun'); ?> <?php if(in_array('sun', $d_arr))echo "checked"; ?> >Sun</label>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="font-size: 12px;font-weight: 400;">Opening Time *</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <input type="time" class="form-control" name="s_time" value="<?=set_value('s_time', $data[0]['open_time'])?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <span style="font-size: 12px;font-weight: 400;">Closing Time *</span>
                                      <div class="form-group form-float" style="display: flex;">
                                          <input type="time" class="form-control" name="e_time" value="<?=set_value('e_time', $data[0]['close_time'])?>" >
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
              <h4>Status: <a ><?=$data[0]['status']?></a></h4>
              <?php if($data[0]['status']=='active'){
                echo "<a href='".base_url()."Super_admin/change_rest_status/inactive/".$this->uri->segment(2)."' class='badge badge-primary'>Make Inactive</a>";
              }else{
                echo "<a href='".base_url()."Super_admin/change_rest_status/active/".$this->uri->segment(2)."' class='badge badge-primary'>Make Active</a>";
              } ?><hr>
              <h4>Restaurant Image</h4>
              <?=$this->session->flashdata('res_img_err'); ?>
              <img src="<?=base_url();?>/images/restaurants/<?=$data[0]['image']?>" style="height:200px;object-fit: contain;">
              <br>
              <br>
              <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit_pic_modal">Edit Picture</button>
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

<!-- Edit Picture Modal -->
<div class="modal fade" id="edit_pic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Restaurant Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="<?=base_url();?>super_admin/rest_edit_img" method="post" enctype="multipart/form-data">
          <input type="file" name="rest_img" class="form-control"/>
          <input type="hidden" name="db_img" value="<?= $data[0]['image'] ?>" class="form-control"/>
          <input type="hidden" name="rest_id" value="<?= $this->uri->segment(2); ?>" class="form-control"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include 'includes/foot.php'; ?>
</html>