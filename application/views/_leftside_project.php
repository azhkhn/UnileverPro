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
                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE7FB;</i>
                        Users
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('projectuser/bainformation')?>">BA's Information</a></li>
                        <li><a href="<?php echo site_url('projectuser/supervisorinformation')?>">Supervisor Information</a></li>
                        <li><a href="<?php echo site_url('projectuser/baexecutiveinformation')?>">BA's Executive Information</a></li>
                        <li><a href="<?php echo site_url('projectuser/projectholderinformation')?>">Project Holder Information</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                       <i class="menu_icon material-icons">&#xE8D1;</i>
                        Outlet Reports
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('projectoutletexcel/outlet_items')?>">OUTLET & ITEMS WEEKLY</a></li>
                        <li><a href="<?php echo site_url('projectoutletexcel/outlet_items_month')?>">OUTLET & ITEMS MONTHLY</a></li>
                        <li><a href="<?php echo site_url('projectoutletexcel/outlet_items_year')?>">OUTLET & ITEMS YEARLY</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('projectsupervisor')?>">
                        <i class="menu_icon material-icons">&#xE873;</i>
                        Sale Report
                    </a>
                </li>
                 <li class="act_section">
                    <a href="<?php echo site_url('projectreport')?>">
                        <i class="menu_icon material-icons">&#xE873;</i>
                        Report
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('projectreport/dailybareport/1')?>">BA DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('projectreport/dailysupervisorreport/1')?>">SUPERVISOR DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('projectreport/dailygmreport/1')?>">BA's EXECUTIVE DAILY REPORT</a></li>
                        <li><a href="<?php echo site_url('projectreport')?>">BA PROGRAM DAILY REPORT</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>