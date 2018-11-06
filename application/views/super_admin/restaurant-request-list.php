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
                            RESTAURANT REQUESTS
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
                                                <th>RESTAURANT NAME</th>
												<th>CONTACT PERSON</th>
                                                <th>PHONE</th>
                                                <th>ADDRESS</th>
                                                <th>MESSAGE</th>
                                                <th>STATUS</th>
                                                <th>DATE TIME</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            foreach($resReqData as $req){
                                                $first_char = mb_substr($req["restaurant_name"], 0, 1);
                                                if($req["log_active"]==1){
                                                    $st = "text-success";
                                                    $status="Active";
                                                    $del_link = base_url().'super_admin/changeReqStatus/'.$req["res_req_id"].'/'.$req["log_active"];
                                                    $del_txt = "<span class='badge badge-danger'>Make Inactive</span>";
                                                }else{
                                                    $st = "text-warning";
                                                    $status="In Active";
                                                    $del_link = base_url().'super_admin/changeReqStatus/'.$req["res_req_id"].'/'.$req["log_active"];
                                                    $del_txt = "<span class='badge badge-success'>Make Active</span>";
                                                }
                                                $first_char = mb_substr($req["restaurant_name"], 0, 1);
                                                echo '
                                                <tr> 
                                                    <td>
                                                        <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                            <span class="avatar-letter avatar-letter-'.$first_char.'  avatar-md circle"></span>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>'.$req["restaurant_name"].'</strong>
                                                            </div>
                                                            <small>'.$req["contact_email"].'</small>
                                                        </div>
                                                    </td>
													<td>'.$req["contact_name"].'</td>
                                                    <td>'.$req["contact_mobile"].'</td>
                                                    <td>'.$req["contact_address"].'</td>
                                                    <td>'.$req["message"].'</td>
                                                    <td><span class="icon icon-circle s-12  mr-2 '.$st.'"></span>'.$status.'</td>
                                                    <td>'.$req["log_datetime"].'</td>
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