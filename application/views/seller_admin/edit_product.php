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
                            <form class="form-material" action="<?= base_url(); ?>seller_admin/addNewProduct"
                                  method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $productData[0]['product_id']; ?>"
                                       name="product_id">
                                <!-- Input -->
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="product_name"
                                                           value="<?= set_value('product_name', $productData[0]['product_name']); ?>">
                                                    <label class="form-label">Product Name *</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input class="form-control" name="product_description"
                                                           value="<?= set_value('product_description', $productData[0]['product_description']); ?>">
                                                    <label class="form-label">Product Description *</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="price"
                                                           value="<?= set_value('price', $productData[0]['price']); ?>">
                                                    <label class="form-label">Price *</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input class="form-control" name="selling_price"
                                                           value="<?= set_value('selling_price', $productData[0]['selling_price']); ?>">
                                                    <label class="form-label">Selling Price *</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <span style="font-size: 12px;font-weight: 400;">Category *</span>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select class="form-control" name="category"
                                                            value="<?= set_value('category'); ?>">
                                                        <option value="">Select Category</option>
                                                        <?php foreach($categoryData as $cat) {?>
                                                        <option value="<?php echo $cat['category_id']; ?>" <?php echo ($productData[0]['category_id'] == $cat['category_id']) ? "selected" : ""; ?> >
                                                            <?php echo $cat['category_name']; ?>
                                                        </option>
                                                        <?php }?>
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
                    <div class="col-md-5">
                        <h4>Status: <a><?php echo ($productData[0]['log_active'] == 1) ? "Active" : "Inactive"; ?></a>
                        </h4>
                        <?php if ($productData[0]['log_active'] == 1) {
                            echo "<a href='" . base_url() . "Seller_admin/changeProductStatus/inactive/".$productData[0]['product_id']."' class='badge badge-primary'>Make Inactive</a>";
                        } else {
                            echo "<a href='" . base_url() . "Seller_admin/changeProductStatus/active/".$productData[0]['product_id']."' class='badge badge-primary'>Make Active</a>";
                        } ?>
                        <hr>
                        <h4>Product Image</h4>
                        <?= $this->session->flashdata('res_img_err'); ?>
                        <img src="<?= base_url(); ?>/images/products/<?= $productData[0]['product_image'] ?>"
                             style="height:200px;object-fit: contain;">
                        <br>
                        <br>
                        <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                data-target="#edit_pic_modal">Edit Picture
                        </button>
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

                <div class="col-md-5">
                    <h3>Product Guide</h3>
                    <hr>
                    <p>Please fill all the mandatory fields.</p>
                    <a href="#" class="btn btn-xs btn-primary">Show all products</a>
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

<!-- Edit Picture Modal -->
<div class="modal fade" id="edit_pic_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?= base_url(); ?>seller_admin/editProductImage" method="post"
                      enctype="multipart/form-data">
                    <input type="file" name="product_image" class="form-control"/>
                    <input type="hidden" name="db_img" value="<?= $productData[0]['product_image'] ?>"
                           class="form-control"/>
                    <input type="hidden" name="product_id" value="<?= $productData[0]['product_id']; ?>" class="form-control"/>
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