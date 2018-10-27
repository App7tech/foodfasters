<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="<?=base_url();?>main_assets/images/food-picky-logo.png" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?=base_url();?>admin_assets/img/dummy/u2.png" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">Food Fasters</h6>
                        <a href="#"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="index-2.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview">
            	<a href="<?=base_url();?>su_dashboard">
            		<i class="icon icon-dashboard text-lime s-18"></i> 
            		<span>Dashboard</span>
            	</a>
        	</li>
            <li class="treeview">
                <a href="#">
                    <i class="icon icon-building-o text-lime s-18"></i>
                    <span>Restaurants</span>
                    <i class="icon icon-angle-left s-18 pull-right"></i>
            	</a>
                <ul class="treeview-menu">
                    <li><a href="<?=base_url();?>su_restaurants"><i class="icon icon-circle-o"></i>All Restaurants</a>
                    </li>
                    <li><a href="<?=base_url();?>su_restaurant_add"><i class="icon icon-add"></i>Add
                        New </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?=base_url();?>su_users">
                    <i class="icon icon-users text-lime s-18"></i> 
                    <span>Users</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url();?>su_sliders">
                    <i class="icon icon-image text-lime s-18"></i> 
                    <span>App Sliders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url();?>su_banners">
                    <i class="icon icon-image text-lime s-18"></i> 
                    <span>App Banners</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>su_logout">
                    <i class="icon icon-sign-out text-lime s-18"></i> 
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
</aside>