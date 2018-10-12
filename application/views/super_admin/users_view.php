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
                        Users
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
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
                                                <th>USER NAME</th>
                                                <th>PHONE</th>
                                                <th>REFERAL CODE</th>
                                                <th>STATUS</th>
                                                <th>DATE TIME</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($rest_data as $user){ 
                                                $first_char = mb_substr($user["username"], 0, 1);
                                                if($user["status"]=='active'){
                                                    $st = "text-success";
                                                    $del_link = base_url().'super_admin/del_user/inactive/'.$user["id"];
                                                    $del_txt = "<span class='badge badge-danger'>Make Inactive</span>";
                                                }else{
                                                    $st = "text-warning";
                                                    $del_link = base_url().'super_admin/del_user/active/'.$user["id"];
                                                    $del_txt = "<span class='badge badge-success'>Make Active</span>";
                                                }
                                                $first_char = mb_substr($user["username"], 0, 1);
                                                echo '
                                                <tr>
                                                    <td>
                                                        <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                            <span class="avatar-letter avatar-letter-'.$first_char.'  avatar-md circle"></span>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>'.$user["username"].'</strong>
                                                            </div>
                                                            <small>'.$user["email"].'</small>
                                                        </div>
                                                    </td>

                                                    <td>'.$user["phone"].'</td>

                                                    <td>'.$user["referal_code"].'</td>
                                                    <td><span class="icon icon-circle s-12  mr-2 '.$st.'"></span>'.$user["status"].'</td>
                                                    <td>'.$user["datetime"].'</td>
                                                    <td>
                                                        <a href=""><i class="icon-eye mr-3"></i></a>
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
<!-- 
                <nav class="my-3" aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</div>
<div class="control-sidebar-bg shadow white fixed"></div>
</div>

<?php include 'includes/foot.php'; ?>
</html>