<aside id="sidebar_main">
        <a href="#" class="uk-close sidebar_main_close_button"></a>
        <div class="sidebar_main_header">
            <div class="sidebar_logo"><a href="<?php echo site_url('dashboard')?>"><img src="<?php echo base_url('/public/assets/img/unilever-logo_tcm244-409314.svg')?>" style="padding-top: 10px; width:25px; height:25px; float:left;" alt="" height="15" width="71"/><h4>Unilever Reporting System</h4></a></div>
            <!-- <div class="sidebar_actions">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div> -->
        </div>
        <div class="menu_section">
            <ul>
                <li class="act_section">
                    <a href="<?php echo site_url('dashboard')?>">
                    	<i class="menu_icon material-icons">&#xE871;</i>
                        Dashboard
                    </a>
                </li>
                <li>		
                    <a href="<?php echo site_url('brand/')?>">
                    	<i class="menu_icon material-icons">&#xE41D;</i>
                        Brand
                    </a>
                </li>
                 <li>
                    <a href="<?php echo site_url('product/')?>">
                   		 <i class="menu_icon material-icons">&#xE854;</i>
                        Product
                    </a>
                </li>
                 <li>
                    <a href="<?php echo site_url('group/')?>">
                        <i class="menu_icon material-icons">&#xE02F;</i>
                        Group
                    </a>
                </li>
                 <li>
                    <a href="<?php echo site_url('saletarget/')?>">
                    	<i class="menu_icon material-icons">&#xE163;</i>
                        Sale Target
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo site_url('salepromotion/')?>">
                        <i class="menu_icon material-icons">&#xE547;</i>
                        Sale Promotion
                    </a>
                </li>
                
                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE80D;</i>
                        Promotion Type
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('promotiontype/')?>">Promotion type</a></li>
                        <li><a href="<?php echo site_url('promotiontype/add')?>">Add promotion type</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <i class="menu_icon material-icons">&#xE86D;</i>
                        Channel
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('channel/')?>">Channel</a></li>
                        <li><a href="<?php echo site_url('channel/add')?>">Add channel</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE566;</i>
                        Distributor
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('distributor/')?>">Distributor</a></li>
                        <li><a href="<?php echo site_url('distributor/add')?>">Add distributor</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE8D1;</i>
                        Outlet
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('Outlet/')?>">Outlet</a></li>
                        <li><a href="<?php echo site_url('Outlet/add')?>">Add Outlet</a></li>
                    </ul>
                </li>
                
                 <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE865;</i>
                        Customer Type
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('Outlettype/')?>">Customer type</a></li>
                        <li><a href="<?php echo site_url('Outlettype/add')?>">Add  Customer type</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE8D1;</i>
                        Outlet Reports
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('outletexcel/outlet_items')?>">Outlet Items</a></li>
                        <li><a href="<?php echo site_url('outletexcel/outlet_amount')?>">Outlet Total Amount</a></li>
                        <li><a href="<?php echo site_url('outletexcel/outlet_quantity')?>">Outlet Total Quantity</a></li>
                        <li><a href="<?php echo site_url('outletexcel/outlet_product')?>">Outlet Total Product Weekly</a></li>
                    </ul>
                </li>
                
                <!-- <li >
                    <a href="<?php echo site_url('sale')?>">
                         <i class="menu_icon material-icons">&#xE547;</i>
                        Sale
                    </a>
                </li>
                
                <li>
                    <a href="<?php echo site_url('saleitem')?>">
                       <i class="menu_icon material-icons">&#xE8CB;</i>
                        Sale item
                    </a>
                </li> -->
                
                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE7FB;</i>
                        Users
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('user/bainformation')?>">BA's Information</a></li>
                        <li><a href="<?php echo site_url('user/supervisorinformation')?>">Supervisor Information</a></li>
                        <li><a href="<?php echo site_url('user/baexecutiveinformation')?>">BA's Executive Information</a></li>
                        <li><a href="<?php echo site_url('user/projectholderinformation')?>">Project Holder Information</a></li>
                        <!-- <li><a href="<?php echo site_url('user/add')?>">Add User</a></li> -->
                    </ul>
                </li>
                 <li class="act_section">
                    <a href="<?php echo site_url('report')?>">
                        <i class="menu_icon material-icons">&#xE873;</i>
                        Report
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('report/dailybareport/1')?>">BA DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('report/dailysupervisorreport/1')?>">SUPERVISOR DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('report/dailygmreport/1')?>">BA's EXECUTIVE DAILY REPORT</a></li>
                        <!-- <li><a href="<?php echo site_url('report/dailypmreport/1')?>">BA PROGRAM DAILY REPORT</a></li> -->
                    </ul>
                </li>
                
                
                
            </ul>
        </div>
    </aside>