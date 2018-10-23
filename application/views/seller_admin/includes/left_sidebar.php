<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="<?=base_url();?>admin_assets/img/basic/logo.png" alt="">
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
                        <a href="<?=base_url();?>se_profile" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-umbrella text-blue"></i>Profile
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-cogs text-yellow"></i>Settings</a>
                        <a href="<?=base_url();?>se_change_pass" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Change Password</a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview">
            	<a href="<?=base_url();?>se_dashboard">
            		<i class="icon icon-sailing-boat-water purple-text s-18"></i> 
            		<span>Dashboard</span>
            	</a>
        	</li>
			<li class="treeview"><a href="<?=base_url();?>se_categories">
                <i class="icon icon icon-package blue-text s-18"></i>
                <span>Product Categories</span>
                <span class="badge r-3 badge-primary pull-right">4</span>
            	</a>                
            </li>
            <li class="treeview"><a href="#">
                <i class="icon icon icon-package blue-text s-18"></i>
                <span>Products</span>
                <span class="badge r-3 badge-primary pull-right">4</span>
            	</a>
                <ul class="treeview-menu">
                    <li>
						<a href="<?=base_url();?>se_products"><i class="icon icon-circle-o"></i>All Products</a>
                    </li>
                    <li>
						<a href="<?=base_url();?>se_addProduct"><i class="icon icon-add"></i>Add New</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="icon icon-list light-green-text s-18"></i>
                    Orders
                </a>
            </li>
        </ul>
    </section>
</aside>