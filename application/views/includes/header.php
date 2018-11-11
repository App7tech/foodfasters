<header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="<?=base_url();?>"> <img class="img-rounded" src="<?=base_url();?>/main_assets/images/food-picky-logo.png" alt="" > </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> 
                                <a class="nav-link active" href="<?=base_url();?>">Home <span class="sr-only">(current)</span></a> 
                            </li>
                            <!-- <li class="nav-item"> 
                                <a class="nav-link" href="<?=base_url();?>Home/Restaurants">Restaurants <span class="sr-only">(current)</span></a> 
                            </li> -->
                            <?php
                                $e = $this->session->userdata('email');
                                if($d = $e[0]['email']){
                                    echo'
                                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">MyAccount</a>
                                        <div class="dropdown-menu"> <a class="dropdown-item" href="'.base_url().'Home/Profile">Profile</a> <a class="dropdown-item" href="'.base_url().'Home/Logout">Logout</a></div>
                                    </li>
                                    ';
                                }else{
                                    echo'
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="'.base_url().'Home/Login">Login <span class="sr-only">(current)</span></a> 
                                    </li>
                                    ';
                                }
                            ?>
                            <li class="nav-item"> 
                                <a class="nav-link" href="<?=base_url();?>Home/Contact">Contact <span class="sr-only">(current)</span></a> 
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->
        </header>