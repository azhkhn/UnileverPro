<aside id="sidebar_main">
        <a href="#" class="uk-close sidebar_main_close_button"></a>
        <div class="sidebar_main_header">
            <div class="sidebar_logo"><a href="<?php echo site_url('admin/dashboard')?>"><img src="<?php echo base_url('public/assets/img/logo_main.png')?>" alt="" height="15" width="71"/></a></div>


            <div class="sidebar_actions">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div>
        </div>
        <div class="menu_section">
            <ul>
                <li class="act_section">
                    <a href="<?php echo site_url('dashboard')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Brand
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('brand/')?>">All Brand</a></li>
                        <li><a href="<?php echo site_url('brand/add')?>">Add brand</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Product
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('product/')?>">All product</a></li>
                        <li><a href="<?php echo site_url('product/add')?>">Add product</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Group
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('group/')?>">All group</a></li>
                        <li><a href="<?php echo site_url('group/add')?>">Add group</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Sale Target
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('saletarget/')?>">All Sale Target</a></li>
                        <li><a href="<?php echo site_url('saletarget/add')?>">Add Sale Target</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Sale Promotion
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('salepromotion/')?>">Sale promotion</a></li>
                        <li><a href="<?php echo site_url('salepromotion/add')?>">Add Sale promotion</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Promotion Type
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('promotiontype/')?>">Promotion type</a></li>
                        <li><a href="<?php echo site_url('promotiontype/add')?>">Add promotion type</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Channel
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('channel/')?>">Channel</a></li>
                        <li><a href="<?php echo site_url('channel/add')?>">Add channel</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Distributor
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('distributor/')?>">Distributor</a></li>
                        <li><a href="<?php echo site_url('distributor/add')?>">Add distributor</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Outlet
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('Outlet/')?>">Outlet</a></li>
                        <li><a href="<?php echo site_url('Outlet/add')?>">Add Outlet</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Outlet type
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('Outlettype/')?>">  Outlet type</a></li>
                        <li><a href="<?php echo site_url('Outlettype/add')?>">Add  Outlet type</a></li>
                    </ul>
                </li>
                
                 <li >
                    <a href="<?php echo site_url('sale')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Sale
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo site_url('saleitem')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Sale item
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Users
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('user/')?>">Users</a></li>
                        <li><a href="<?php echo site_url('user/add')?>">Add User</a></li>
                    </ul>
                </li>
                 <li class="act_section">
                    <a href="<?php echo site_url('report')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Report
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('user/dailybareport/1')?>">BA DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('user/dailysupervisorreport/1')?>">SUPERVISOR DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('user/dailygmreport/1')?>">BA's EXECUTIVE DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('user/dailypmreport/1')?>">BA PROGRAM DAILY REPORT</a></li>
                    </ul>
                </li>
                
                
                
            </ul>
        </div>
    </aside>