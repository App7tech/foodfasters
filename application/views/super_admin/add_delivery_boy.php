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
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
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
                            Add Delivery Boy
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
                            <form class="form-material" action="<?= base_url(); ?>Super_admin/addNewDeliveryBoy" method="post"
                                  enctype="multipart/form-data">
                                <?php //echo form_open_multipart(base_url().'su_restaurant_add_sub');?>
                                <!-- Input -->
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="dboy_name"
                                                           value="<?= set_value('dboy_name'); ?>">
                                                    <label class="form-label">Name*</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="dboy_mobile"
                                                           value="<?= set_value('dboy_mobile'); ?>">
                                                    <label class="form-label">Mobile *</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Input -->
                        </div>
                        <div class="card-body b-b">
                            <h4>Other Details</h4>
                            <!-- Input -->
                            <div class="body form-material">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <span style="font-size: 12px;font-weight: 400;">Address *</span>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea class="form-control" name="dboy_address"
                                                          value="<?= set_value('dboy_address'); ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <span style="font-size: 12px;font-weight: 400;">Email *</span>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="Email" class="form-control" name="dboy_email"
                                                       value="<?= set_value('dboy_email'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <span style="font-size: 12px;font-weight: 400;">Photo *</span>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" class="form-control" name="dboy_photo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <span style="font-size: 12px;font-weight: 400;">Id Proof*</span>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="file" class="form-control" name="dboy_id_proof">
                                            </div>
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
                    <p>Please fill all the mandatory fields to get Delivery Boy added correctly.</p>
                    <a href="su_restaurants" class="btn btn-xs btn-primary">Show all Restaurants</a>
                    <?php
                    if (validation_errors()) {
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