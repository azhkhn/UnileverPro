<aside id="sidebar_main">
        <a href="#" class="uk-close sidebar_main_close_button"></a>
        <div class="sidebar_main_header">
            <div class="sidebar_logo"><a href="<?php echo site_url('admin/dashboard')?>"><!-- <img src="<?php echo base_url('public/assets/img/logo_main.png')?>" alt="" height="15" width="71"/> --><h4>Unilever Reporting System</h4></a></div>


            <div class="sidebar_actions">
                <select id="lang_switcher" name="lang_switcher">
                    <option value="gb" selected>English</option>
                </select>
            </div>
        </div>
        <div class="menu_section">
            <ul>
                <li class="act_section">
                    <a href="<?php echo site_url('supervisor/bainformation')?>">
                    	<i class="menu_icon material-icons">&#xE871;</i>
                        BA's Information
                    </a>
                </li>
                <li>		
                    <a href="<?php echo site_url('supervisor/dailybareport')?>">
                    	<i class="menu_icon material-icons">&#xE41D;</i>
                        BA's Daily Report
                    </a>
                </li>
                <li>        
                    <a href="<?php echo site_url('supervisor')?>">
                        <i class="menu_icon material-icons">&#xE41D;</i>
                        Supervisor's Daily Report
                    </a>
                </li>
            </ul>
        </div>
    </aside>