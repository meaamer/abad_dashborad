<!-- Left Sidebar -->
	<div class="left main-sidebar">
	
		<div class="sidebar-inner leftscroll">

			<div id="sidebar-menu">
        
			<ul>

					<li class="submenu">
						<a href="#"><i class="fa fa-fw fa-bars"></i><span> Dashboard </span> </a>
                    </li>

					
					
					<li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-users"></i> <span> Customers </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								<li><a href="<?php echo base_url('Registration'); ?>">New Customer</a></li>
								<li><a href="<?php echo base_url('Registration/listBusiness'); ?>">Active Customer</a></li>
                                <li><a href="<?php echo base_url('Registration/deactiveBusiness'); ?>">DeactiveCustomer</a></li>
							</ul>
                    </li>
										
                    <li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-table"></i> <span>Main Category</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('Category'); ?>">New Category</a></li>
                                <li><a href="<?php echo base_url('Category/categoryList'); ?>">Category List</a></li>
                                
                            </ul>
                    </li>

					<li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-indent"></i> <span> Sub Category </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                 <li><a href="<?php echo base_url('SubCategory'); ?>">New Category</a></li>
                                <li><a href="<?php echo base_url('SubCategory/categoryList'); ?>">Category List</a></li>
                               
                            </ul>
                    </li>
					
                    <!-- <li class="submenu">
						<a href="#"><i class="fa fa-fw fa-area-chart"></i> <span> Area</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="<?php echo base_url('Area'); ?>">New Area</a></li>
								<li><a href="<?php echo base_url('Area/areaList'); ?>">Area List</a></li>
								
                            </ul>
                    </li>

					<li class="submenu">
                        <a href="#"><i class="fa fa-fw fa-tv"></i> <span> Advertisement </span> <span class="menu-arrow"></span></a>
							<ul class="list-unstyled">
								
								<li><a href="#">Add New</a></li>
								<li><a href="#">Active</a></li>
                                <li><a href="#">Deactive</a></li>
								
							</ul>
                    </li>
					 -->
                    

					

					

                    <li class="submenu">
                        <a  class="pro" href="<?php echo base_url('Admin/Logout'); ?>"><i class="fa fa-fw fa-power-off"></i><span> Logout </span> </a>
                    </li>
					
            </ul>

            <div class="clearfix"></div>

			</div>
        
			<div class="clearfix"></div>

		</div>

	</div>
	<!-- End Sidebar -->

