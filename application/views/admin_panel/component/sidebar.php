<?php 
    $seg2 = $this->uri->segment(2);
    $seg3 = $this->uri->segment(3);
?>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li class="<?php if($seg2 == 'abouts') echo 'mm-active'; ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Abouts</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/abouts/about" 
                                class="<?php if($seg3 == 'about') echo 'active'; ?>">About</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/abouts/vision_mission_image" 
                                class="<?php if($seg3 == 'vision_mission_image') echo 'active'; ?>">Vision Mission Image</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/abouts/vision" 
                                class="<?php if($seg3 == 'vision') echo 'active'; ?>">Vision</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/abouts/mission" 
                                class="<?php if($seg3 == 'mission') echo 'active'; ?>">Mission</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/abouts/customer" 
                                class="<?php if($seg3 == 'customer') echo 'active'; ?>">Customer</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php if($seg2 == 'products') echo 'mm-active'; ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/products/product_description" 
                                class="<?php if($seg3 == 'product_description') echo 'active'; ?>">Product Description</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/products/product_category" 
                                class="<?php if($seg3 == 'product_category') echo 'active'; ?>">Product Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/products/product" 
                                class="<?php if($seg3 == 'product') echo 'active'; ?>">Product</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/products/raw_material" 
                                class="<?php if($seg3 == 'raw_material') echo 'active'; ?>">Raw Material</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php if($seg2 == 'solutions') echo 'mm-active'; ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Solutions</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/solutions/solution_description" 
                                class="<?php if($seg3 == 'solution_description') echo 'active'; ?>">Solution Description</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/solutions/certificate_image" 
                                class="<?php if($seg3 == 'certificate_image') echo 'active'; ?>">Certificate Image</a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?php echo base_url(); ?>admin_panel/solutions/certificate" 
                                class="<?php if($seg3 == 'certificate') echo 'active'; ?>">Certificate</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php if($seg2 == 'policy') echo 'mm-active'; ?>">
                    <a href="<?php echo base_url(); ?>admin_panel/policy" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Policy</span>
                    </a>
                </li>

                <li class="<?php if($seg2 == 'article') echo 'mm-active'; ?>">
                    <a href="<?php echo base_url(); ?>admin_panel/article" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Article</span>
                    </a>
                </li>

                <li class="<?php if($seg2 == 'contact_message') echo 'mm-active'; ?>">
                    <a href="<?php echo base_url(); ?>admin_panel/contact_message" class=" waves-effect">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Contact Message</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
