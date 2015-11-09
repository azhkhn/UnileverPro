		
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
	<?php $this->load->view('_leftside') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">BA's EXECUTIVE INFORMATIONS</h1>
        </div>
        <div id="page_content_inner">

            <div class="md-card">
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
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Supervisor</th>
                                            <th>Remark</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($users as $user):?>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_2.jpg" alt="" style="width:50px; height:50px"></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="<?php echo base_url('user/dailybareport/'.$user->id) ?>"><?php echo $user->last_name . ' '. $user->first_name ?></a></td>
                                            <td class="uk-text-nowrap">Female</td>
                                            <td><?php echo $user->email ?></td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info"><?php echo $user->phone ?></span></td>
                                			<td>
												<?php foreach ($user->groups as $group):?>
													<?php echo $group->name;?><br />
								                <?php endforeach?>
											</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info">Stop Working</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="<?php echo base_url('user/information/'.$user->id) ?>"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                       	<?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <ul class="uk-pagination uk-margin-medium-top uk-margin-medium-bottom">
                                <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                <li class="uk-active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><span>&hellip;</span></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div>
        <div class="uk-modal" id="modal_header_footer">
            <div class="uk-modal-dialog uk-modal-dialog-large">
                <button type="button" class="uk-modal-close uk-close"></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">REGISTER A NEW BA's EXECUTIVE</h3>
                </div>
                <form action="" class="uk-form-stacked" id="form_validation">
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
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium"/>
                                    </div>
                                </div>
                            </div>
                            <div class="md-card">
                                <div class="md-card-content">
                                    <div class="uk-float-right">
                                        <input type="checkbox" data-switchery checked name="product_edit_active_control" id="product_edit_active_control" />
                                    </div>
                                    <label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Active</label>
                                </div>
                            </div>
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
                                                <input type="text" name="code" required class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" class="uk-form-label">Last Name<span class="req">*</span></label>
                                                <input type="text" name="lastname" required class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="fullname" class="uk-form-label">First Name<span class="req">*</span></label>
                                                <input type="text" name="firstname" required class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_sn_control" class="uk-form-label">Gender<span class="req">*</span></label>
                                                <select id="product_edit_color_control" name="product_edit_color_control" required data-md-selectize>
                                                    <option value="white">Gender</option>
                                                    <option value="black" selected>Female</option>
                                                    <option value="red">Male</option>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_name_control" class="uk-form-label">Supervisor<span class="req">*</span></label>
                                                <select id="product_search_status" data-md-selectize data-md-selectize-bottom required>
                                                    <option value="">Supervisor</option>
                                                    <option value="1">Supervisor 1</option>
                                                    <option value="2">Supervisor 2</option>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Telephone<span class="req">*</span></label>
                                                <input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" required value=""/>
                                            </div>
                                            
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="email" class="uk-form-label">Email<span class="req">*</span></label>
                                                <input type="email" name="email" data-parsley-trigger="change" required  class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Password<span class="req">*</span></label>
                                                <input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" required value=""/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_memory_control" class="uk-form-label">Confirmation Password<span class="req">*</span></label>
                                                <input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" required value=""/>
                                            </div>
                                            
                                            <div class="uk-form-row">
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label for="validOfDate" class="uk-form-label">Start Working<span class="req">*</span></label>
                                                    <input class="md-input" type="text" id="startDate" data-uk-datepicker="{format:'DD/MMMM/YYYY'}" required>
                                                </div>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="product_edit_description_control" class="uk-form-label">Remark</label>
                                                <textarea class="md-input" name="product_edit_description_control" id="product_edit_description_control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                    <input type="submit" class="md-btn md-btn-flat md-btn-flat-primary" id="btnSave" value="Save">
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="product_insert_submit" data-uk-modal="{target:'#modal_header_footer'}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

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

    <script>
    // load parsley config (altair_admin_common.js)
    altair_forms.parsley_validation_config();
    </script>

    <script src="<?php echo base_url()?>public/bower_components/parsleyjs/dist/parsley.min.js"></script>

    <!--  forms_validation functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/forms_validation.min.js"></script>

    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

</body>
</html>