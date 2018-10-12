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
                        Restaurant Sliders
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce" style="padding-top: 15px;">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body b-b">
                    <?php echo $this->session->flashdata('slider_err'); ?>
                      <form class="form-material" action="<?=base_url();?>su_slider_add" method="post" enctype="multipart/form-data">
                          <!-- Input -->
                          <div class="body form-material">
                              <div class="row clearfix">
                                  <div class="col-sm-4">
                                  		<span style="font-size: 12px;font-weight: 400;">Slider Image *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="file" class="form-control" name="slider_img" required="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                  		<span style="font-size: 12px;font-weight: 400;">Slider Text *</span>
                                      <div class="form-group form-float">
                                          <div class="form-line">
                                              <input type="text" class="form-control" name="slider_txt" value="<?=set_value('slider_txt');?>" >
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <input type="submit" class="btn btn-primary" name="slider_submit">
                          </div>
                          <!-- #END# Input -->
                      </form>
                  </div>
              </div>
        	</div>

        	<div class="col-md-12">
        		<div class="card">
			        <div class="card-body table-responsive">
			            <table class="table table-striped table-hover r-0">
			                <thead>
			                  <tr class="no-b">
			                      <th>Image</th>
			                      <th>Text</th>
			                      <th>Status</th>
			                      <th>Actions</th>
			                  </tr>
			                </thead>
			                <tbody>
			                	<?php foreach($sliders as $slider){
			                		if($slider["status"]=='active'){
			                        $st = "text-success";
			                        $del_link = base_url().'super_admin/del_slider/inactive/'.$slider["id"];
			                        $del_txt = "<span class='badge badge-danger'>Make Inactive</span>";
			                    }else{
			                        $st = "text-danger";
			                        $del_link = base_url().'super_admin/del_slider/active/'.$slider["id"];
			                        $del_txt = "<span class='badge badge-success'>Make Active</span>";
			                    }?>
			                  <tr>
													<td><img src="<?=base_url()?>/images/sliders/<?=$slider['image']?>" width="200"/></td>
													<td><?=$slider['text']?></td>
			                    <td><span class="icon icon-circle s-12  mr-2 <?=$st?>"></span><?=$slider['status']?></td>
			                    <td>
			                        <a href="<?=$del_link?>"><?= $del_txt ?></a>
			                    </td>
			                  </tr>
			                	<?php } ?>
			                </tbody>
			            </table>
			    		</div>
			    	</div>
        	</div>

    		</div> <!-- row close -->
		</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<?php include 'includes/foot.php'; ?>
</html>