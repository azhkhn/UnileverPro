		
	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->
         <!-- kendo UI -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css"/>
    
    <style>
        .uk-grid-divider>[class*=uk-width-large-]:not(.uk-width-large-1-1):nth-child(n+2) {
            border-left: 0px;
        }
    </style>

</head>
<body>
	<!--  header -->
	<?php $this->load->view('_header') ?>  
     <!-- / header end -->
 
    <!-- left side bar -->
	<?php $this->load->view('_leftside_supervisor') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">SUPERVISOR DAILY REPORT</h1>
            <!--<span class="uk-text-muted uk-text-upper uk-text-small" id="product_edit_sn">SM-G925TZKFTMB</span>-->
        </div>
        <div id="page_content_inner">
            <form action="" class="uk-form-stacked" id="product_edit_form">
                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                    <div class="uk-width-xLarge-10-10  uk-width-large-10-10">
                        <div class="md-card">
                            <div class="md-card-content large-padding">
                                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="selectedSupervisor">Supervisor Name</label>
                                            <input type="text" class="md-input" id="txtSupervisorName" name="txtSupervisorName" readonly="readonly"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtBAExecutive">BA's Executive Name</label>
                                            <input type="text" class="md-input" id="txtBAExecutive" name="txtBAExecutive" readonly="readonly"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <div class="md-card">
                                                    <div class="md-card-toolbar">
                                                        <div class="md-card-toolbar-actions">
                                                            <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                                        </div>
                                                        <h3 class="md-card-toolbar-heading-text">
                                                            Reported By BA
                                                        </h3>
                                                    </div>
                                                    <div class="mGraph-wrapper">
                                                        <div class="uk-overflow-container">
                                                            <table class="uk-table uk-text-nowrap">
                                                            <tbody id="CONTENTS">
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                                        <img src="" alt="" class="img_medium" id="txtPhoto" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="md-card">
                                <div class="md-card-content large-padding">
                                    <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                        <div class="uk-width-large-1-4">
                                            <div class="uk-form-row">
                                                <label for="txtMonthlyTarget">Monthly Target</label>
                                                <input type="text" class="md-input" id="txtMonthlyTarget" name="txtMonthlyTarget" readonly="readonly"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtTodayTarget">Today Target</label>
                                                <input type="text" class="md-input" id="txtTodayTarget" name="txtTodayTarget" readonly="readonly"/>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4">
                                            <div class="uk-form-row">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="uk-input-group-icon uk-icon-calendar"></i>
                                                    </span>
                                                    <div class="md-input-wrapper md-input-filled">
                                                        <label for="validOfDate">Valid Of Target</label>
                                                            <input class="md-input" type="text" id="startDate" data-uk-datepicker="{format:'DD-MMMM-YYYY'}">
                                                        <span class="md-input-bar"></span>
                                                            <input class="md-input" type="text" id="endDate" data-uk-datepicker="{format:'DD-MMMM-YYYY'}">
                                                        <span class="md-input-bar"></span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="txtNumberOfWorking">Number of working days</label>
                                            <input type="text" class="md-input" id="txtNumberOfWorking" name="txtNumberOfWorking" value="26" readonly="readonly"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- large chart -->
                        <div class="md-card">
                            <div class="md-card-content large-padding">
                                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="txtTodayAchievement">$ Today Achievement</label>
                                            <input type="text" class="md-input" id="txtTodayAchievement" name="txtTodayAchievement" readonly="readonly"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtMonthToDateAchievement">$ Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtMonthToDateAchievement" name="txtMonthToDateAchievement" readonly="readonly"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtYearToDateAchievement">$ Year to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtYearToDateAchievement" name="txtYearToDateAchievement" readonly="readonly"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="txtTodayAchievementPercent">% Today Achievement</label>
                                            <input type="text" class="md-input" id="txtTodayAchievementPercent" name="txtTodayAchievementPercent" readonly="readonly"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtMonthToDateAchievementPercent">% Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtMonthToDateAchievementPercent" name="txtMonthToDateAchievementPercent" readonly="readonly"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtYearToDateAchievementPercent">% Year to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtYearToDateAchievementPercent" name="txtYearToDateAchievementPercent" readonly="readonly"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div>
        <div class="uk-modal" id="modalRegisterNewBA">
            <div class="uk-modal-dialog uk-modal-dialog-large">
                <button type="button" class="uk-modal-close uk-close"></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">REGISTER A NEW BEAUTY AGENT</h3>
                </div>
                <form action="" class="uk-form-stacked" id="frmAddNewBeautyAgent">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                        <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                            <div class="md-card">
                                <div class="md-card-toolbar">
                                    <div class="md-card-toolbar-actions">
                                        <i class="md-icon material-icons">&#xE146;</i>
                                    </div>
                                    <h3 class="md-card-toolbar-heading-text">
                                        Photo
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium" id="photo"/>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="md-card">
                                <div class="md-card-content">
                                    <div class="uk-float-right">
                                        <input type="checkbox" data-switchery data-switchery-color="#1e88e5" id="active"/>
                                    </div>
                                    <label class="uk-display-block uk-margin-small-top" for="user_active_control">Active</label>
                                </div>
                            </div> -->
                        </div>
                        <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                            <div class="md-card">
                                <div class="md-card-toolbar">
                                    <h3 class="md-card-toolbar-heading-text">
                                        INFORMATION DETAILS
                                    </h3>
                                </div>
                                <div class="md-card-content large-padding">
                                    <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                        <div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="fullname" >Code<span class="req">*</span></label>
                                                <input type="text" name="code" required class="md-input"  id="txtCode"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" >Last Name<span class="req">*</span></label>
                                                <input type="text" name="lastname" required class="md-input" id="txtLastName" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" >First Name<span class="req">*</span></label>
                                                <input type="text" name="firstname" required class="md-input" id="txtFirstName" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="gender" >Gender<span class="req">*</span></label>
                                                <select name="gender" required data-md-selectize id="selectGender">
                                                    <option value="">Gender</option>
                                                    <option value="F" selected>Female</option>
                                                    <option value="M">Male</option>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="supervisor" >Supervisor<span class="req">*</span></label>
                                               <input type="text" class="md-input" id="txtSupervisor" name="txtSupervisor" required value=""/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="telephone" >Telephone<span class="req">*</span></label>
                                                <input type="text" class="md-input" id="txtTelephone" name="telephone" required value=""/>
                                            </div>
                                            
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="email" >Username<span class="req">*</span></label>
                                                <input type="email" name="email" id="txtEmail" data-parsley-trigger="change" required  class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="password" >Password<span class="req">*</span></label>
                                                <input type="password" class="md-input" id="txtPassword" name="password" required value=""/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="confirmation_password" >Confirmation Password<span class="req">*</span></label>
                                                <input type="password" class="md-input" id="txtConfirmationPassword" name="confirmation_password" required value=""/>
                                            </div>
                                            
                                            <div class="uk-form-row">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label for="startWorking" >Start Working<span class="req">*</span></label>
                                                    <input class="md-input" type="text" id="startWorking" name="startWorking" data-uk-datepicker="{format:'DD-MMMM-YYYY', addClass: 'dropdown-modal'}" required>
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="remark" >Remark</label>
                                                <textarea class="md-input" name="remark" id="txtRemark" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn uk-modal-close">Close</button>
                    <input type="button" class="md-btn md-btn-primary" data='' id="btnUpdateSave" value="Update" style="display:none;"/>
                    <input type="submit" class="md-btn md-btn-primary" id="btnSave" value="Save" />
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="product_edit_submit">
            <i class="material-icons">&#xE161;</i>
        </a>
    </div> -->
    
    <script id="CONTENT_TEMPLATE" type="text/x-jquery-tmpl">
        <tr style="font-weight:bold" >
            <td>{{= no}}</td>
            <td>{{= username}}</td>
            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info">{{= starting_date}}</span></td>
            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info">{{= phone}}</span></td>
            <td>
                <a title="VIEW BA INFORMATION" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnViewInfo" data="{{= id}}"><i class="material-icons  md-24">&#xE8A6;</i></a>
                <a title="VIEW BA DAILY REPORT" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnView" data="{{= id}}"><i class="material-icons md-24">&#xE8F4;</i></a>
            </td>
        </tr>
    </script>

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- momentJS date library -->
    <script src="<?php echo base_url()?>public/bower_components/moment/min/moment.min.js"></script>

    <!-- common functions -->
    <script src="<?php echo base_url()?>public/assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>public/assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>public/assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->

    <!--  product edit functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/ecommerce_product_edit.min.js"></script>
    
    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
    <script src="<?php echo base_url()?>public/assets/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/supervisor/supervisor_report.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>