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
                    <a href="<?php echo site_url('admin/dashboard')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="menu_icon uk-icon-list-alt"></span>
                        Users
                    </a>
                    <ul>
                        <li><a href="<?php echo site_url('admin/user/')?>">Users</a></li>
                        <li><a href="<?php echo site_url('admin/user/add')?>">Add User</a></li>
                    </ul>
                </li>
                 <li class="act_section">
                    <a href="<?php echo site_url('admin/report')?>">
                        <span class="menu_icon uk-icon-th-large"></span>
                        Report
                    </a>
                </li>
                
                
                
            </ul>
        </div>
    </aside>