        
    <!-- main header -->
    <?php $this->load->view('_include') ?>  
     <!-- /main header end -->
     
        <!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/weather-icons/css/weather-icons.min.css') ?>" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/metrics-graphics/dist/metricsgraphics.css')?>">
        <!-- c3.js (charts) -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/c3js-chart/c3.min.css')?>">
        

</head>
<body>
    <!--  header -->
    <?php $this->load->view('_header') ?>  
     <!-- / header end -->
 
    <!-- left side bar -->
    <?php $this->load->view('_leftside_project') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">SUPERVISOR INFORMATIONS</h1>
        </div>
        <div id="page_content_inner">

 <!--            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-2-10">
                            <label for="product_search_name">Full Name</label>
                            <input type="text" class="md-input" id="product_search_name">
                        </div>
                        <div class="uk-width-medium-2-10">
                            <div class="uk-margin-small-top">
                                <select id="product_search_status" data-md-selectize multiple data-md-selectize-bottom>
                                    <option value="">Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-medium-3-10">
                            <div class="uk-margin-small-top">
                                <select id="product_search_status" data-md-selectize multiple data-md-selectize-bottom>
                                    <option value="">Supervisor</option>
                                    <option value="1">Supervisor 1</option>
                                    <option value="2">Supervisor 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-10">
                            <div class="uk-margin-top uk-text-nowrap">
                                <input type="checkbox" name="product_search_active" id="product_search_active" data-md-icheck/>
                                <label for="product_search_active" class="inline-label">Active</label>
                            </div>
                        </div>
                        <div class="uk-width-medium-2-10 uk-text-center">
                            <a href="#" class="md-btn md-btn-primary uk-margin-small-top">Filter</a>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table id="supervisor_table" class="uk-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Code</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Username</th>
                                            <th>Telephone</th>
                                            <th>BA's Executive</th>
                                            <th>Start Working</th>
                                            <th>Remark</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user):?>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo $user->photo?>" alt="" style="width:50px; height:50px"></td>
                                            <td><strong><?php echo $user->code ?></strong></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="javascript:;"><?php echo $user->last_name . ' '. $user->first_name ?></a></td>
                                            <td class="uk-text-nowrap">
                                                <?php if($user->gender=="M")  
                                                            echo "Male";
                                                      else if($user->gender=="F")
                                                            echo "Female";
                                                ?>
                                            </td>
                                            <td><?php echo $user->email ?></td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info"><?php echo $user->phone ?></span></td>
                                            <td>
                                                <?php echo $user->supervisor ?>
                                            </td>
                                            <td><?php echo $user->starting_date ?></td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info"><?php echo $user->remark ? $user->remark : "No Remark"; ?></span></td>
                                            <td>
                                                <input type="checkbox" id="btnStatus" data="<?php echo $user->id?>" data-switchery data-switchery-color="#1e88e5" <?php echo ($user->active==1)?"checked":""?> <?php echo ($user->active==1)?" value='on'":" value='off'"?>/>
                                            </td>
                                            <td class="uk-text-nowrap">
                                                <a title="View" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnView" data="<?php echo $user->id?>"><i class="material-icons">&#xE8F4;</i></a>
                                                <!--<a title="Update" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnUpdate" data="<?php echo $user->id?>"><i class="material-icons">&#xE3C9;</i></a>
                                                <a title="Delete" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnDelete" data="<?php echo $user->id?>"><i class="material-icons">&#xE872;</i></a>-->
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <ul class="uk-pagination uk-margin-medium-top uk-margin-medium-bottom">
                                <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                <li class="uk-active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><span>&hellip;</span></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="uk-modal" id="modalRegisterNewSupervisor">
            <div class="uk-modal-dialog uk-modal-dialog-large">
                <button type="button" class="uk-modal-close uk-close"></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">REGISTER A NEW SUPERVISOR</h3>
                </div>
                <form action="" class="uk-form-stacked" id="frmAddNewSupervisor" method="POST">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                        <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                            <div class="md-card">
                                <div class="md-card-toolbar">
                                    <div class="md-card-toolbar-actions">
                                        <i class="md-icon material-icons" data-uk-modal="{target:'#modalFileManager'}">&#xE146;</i>
                                    </div>
                                    <h3 class="md-card-toolbar-heading-text">
                                        Photo
                                    </h3>
                                </div>
                                <div class="md-card-content">
                                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                        <input type="hidden" name="txtPhoto" id="txtPhoto" onchange="photoChange()">
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium" id="photo"/>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="md-card">
                                <div class="md-card-content">
                                    <div class="uk-float-right">
                                        <input type="checkbox" data-switchery checked name="product_edit_active_control" id="product_edit_active_control" />
                                    </div>
                                    <label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Active</label>
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
                                                <label for="fullname" class="uk-form-label">Code<span class="req">*</span></label>
                                                <input type="text" name="txtCode" required class="md-input" id="txtCode"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" class="uk-form-label">Last Name<span class="req">*</span></label>
                                                <input type="text" name="txtLastName" required class="md-input" id="txtLastName"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" class="uk-form-label">First Name<span class="req">*</span></label>
                                                <input type="text" name="txtFirstName" required class="md-input" id="txtFirstName"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_sn_control" class="uk-form-label">Gender<span class="req">*</span></label>
                                                <select id="selectGender" name="selectGender" required data-md-selectize>
                                                    <option value="">Gender</option>
                                                    <option value="F" selected>Female</option>
                                                    <option value="M">Male</option>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="supervisor" >BA's Executive<span class="req">*</span></label>
                                                <select id="selectSupervisor" name="supervisor" data-md-selectize data-md-selectize-bottom required>
                                                <?php foreach ($supervisors as $supervisor):?>
                                                    <option value="<?php echo $supervisor->id;?>"><?php echo $supervisor->last_name . ' '. $supervisor->first_name;?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Telephone<span class="req">*</span></label>
                                                <input type="text" class="md-input" name="txtTelephone" id="txtTelephone" required />
                                            </div>
                                            
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="txtUsername" class="uk-form-label">Username<span class="req">*</span></label>
                                                <input type="text" name="txtUsername" id="txtUsername" data-parsley-trigger="change" required  class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Password<span class="req">*</span></label>
                                                <input type="password" class="md-input" id="txtPassword" name="txtPassword" required />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Confirmation Password<span class="req">*</span></label>
                                                <input type="password" class="md-input" id="txtConfirmationPassword" name="txtConfirmationPassword" required />
                                            </div>
                                            
                                            <div class="uk-form-row">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label for="validOfDate" class="uk-form-label">Start Working<span class="req">*</span></label>
                                                    <input class="md-input" type="text" id="startWorking" name="startWorking" data-uk-datepicker="{format:'DD-MMMM-YYYY', addClass: 'dropdown-modal'}" required>
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_description_control" class="uk-form-label">Remark</label>
                                                <textarea class="md-input" name="txtRemark" id="txtRemark" cols="30" rows="5"></textarea>
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
    <!--<div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew" data-uk-modal="{target:'#modalRegisterNewSupervisor'}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>-->

    <!-- code for popup file manager -->        
    <div class="uk-modal" id="modalFileManager">
        <div class="uk-modal-dialog uk-modal-dialog-large">
          <button type="button" class="uk-modal-close uk-close"></button>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">File Manager</h4>
            </div>
            <div class="modal-body">
              <iframe width="100%" height="500" src="<?php echo base_url(); ?>public/responsivefilemanager/filemanager/dialog.php?type=2&field_id=txtPhoto&fldr=" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll;"></iframe>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->  

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
    <!-- datatables -->
    <script src="<?php echo base_url()?>public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <!-- datatables colVis-->
    <script src="<?php echo base_url()?>public/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
    <!-- datatables tableTools-->
    <script src="<?php echo base_url()?>public/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
    <!-- datatables custom integration -->
    <script src="<?php echo base_url()?>public/assets/js/custom/datatables_uikit.min.js"></script>

    <!--  datatables functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/plugins_datatables.min.js"></script>

    <!-- enable hires images -->
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            $("#supervisor_table").DataTable();
            altair_helpers.retina_images();
        });
        // TODO: CHANGE ON PHOTO
        function photoChange(){
            $("#photo").attr('src', $("#txtPhoto").val());
            var modalPopup = UIkit.modal("#modalFileManager");
            if ( modalPopup.isActive() ) {
                modalPopup.hide();
            }
            var modalRegisterNewSupervisor = UIkit.modal("#modalRegisterNewSupervisor");
            modalRegisterNewSupervisor.show();
        };
    </script>

    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/supervisor_list.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>