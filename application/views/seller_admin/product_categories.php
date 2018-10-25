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

<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        Product Categories
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce" style="padding-top: 15px;">
		<div class="row">
			  <div class="col-md-7">
				  <div class="card">
					  <div class="card-body b-b">
						<?php echo $this->session->flashdata('res_reg_err'); ?>
						  <h4>Add New Category</h4>
						  <form class="form-material"  method="post" action="<?=base_url()?>se_categorySubmit">
							  <!-- Input -->
							<div class="body">
								 <div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">												  
											<div class="form-line">
												<input type="text" class="form-control" name="category_name" id="category_name" value="<?=set_value('category_name');?>">
												<label class="form-label">Category Name *</label>
											</div>
										 </div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<input class="form-control" name="description" id="description" value="<?=set_value('description');?>" >                                              
												<label class="form-label">Category Description</label>
											</div>
										  </div>
									</div>
								  </div>								  
							  <input type="submit" class="btn btn-primary" name="category_submit" id="category_submit" value="Submit">
							</div>
						   </form>
							  <!-- #END# Input -->
					  </div>
				  </div>
			  </div>
			  <div class="col-md-5">
				  <h3>Filling Guide</h3>
				  <hr>
				  <div class='card card-body mt-2' id="errors">
                        <p>Please fill all the mandatory fields.</p>
                        <?php echo $this->session->flashdata('cat_err'); ?>
                        <?php echo validation_errors(); ?>
                </div>
			  </div>
		</div>
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>  
                                    <table class="table table-striped table-hover r-0">
                                        <thead>
                                            <tr class="no-b">
                                                <th>Category NAME</th>
                                                <th>Description</th>                                                
                                                <th>STATUS</th>
                                                <th>DATE TIME</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($categoryArray as $category){ 
                                                if($category["log_status"]==1){
                                                    $st = "text-success";
													$status="Active";
                                                    $del_link = base_url().'seller_admin/delCategory/3/'.$category["category_id"];
                                                    $del_txt = "<span class='badge badge-danger'>Make Inactive</span>";
                                                }else{
                                                    $st = "text-warning";
													$status="InActive";
                                                    $del_link = base_url().'seller_admin/delCategory/1/'.$category["category_id"];
                                                    $del_txt = "<span class='badge badge-success'>Make Active</span>";
                                                }
                                                echo '
                                                <tr>      
                                                    <td>'.$category["category_name"].'</td>
                                                    <td>'.$category["description"].'</td>
                                                    <td><span class="icon icon-circle s-12  mr-2 '.$st.'"></span>'.$status.'</td>
                                                    <td>'.$category["log_datetime"].'</td>
                                                    <td>
                                                        <a href="'.$del_link.'">'.$del_txt.'</a>
                                                    </td>
                                                </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>

<?php include 'includes/foot.php'; ?>
</html>