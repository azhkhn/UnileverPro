        
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
    <?php //$this->load->view('_leftside') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">SALE INFORMATION</h1>
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
                                            <label for="txtBAName">BA Name</label>
                                            <input type="text" class="md-input" id="txtBAName" name="txtBAName" value="<?php echo $user->last_name.' '.$user->first_name; ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtSupervisorName">Supervisor Name</label>
                                            <input type="text" class="md-input" id="txtSupervisorName" name="txtSupervisorName" value="<?php echo $user->supervisor ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtBAExecutive">BA's Executive</label>
                                            <input type="text" class="md-input" id="txtBAExecutive" name="txtBAExecutive" value="<?php echo $user->executive ?>"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="txtMarketName">Market Name</label>
                                            <input type="text" class="md-input" id="txtMarketName" name="txtMarketName" value="<?php echo $user->outlet_address ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtOutletName">Outlet Name</label>
                                            <input type="text" class="md-input" id="txtOutletName" name="txtOutletName" value="<?php echo $user->outlet_name ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtDMSCode">DMS Code</label>
                                            <input type="text" class="md-input" id="txtDMSCode" name="txtDMSCode" value="<?php echo $user->dms_code ?>"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="txtDT">DT</label>
                                            <input type="text" class="md-input" id="txtDT" name="txtDT" value="<?php echo $user->distributor ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtCustomerType">Customer Type</label>
                                            <input type="text" class="md-input" id="txtCustomerType" name="txtCustomerType" value="<?php echo $user->customer_type ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtChannel">Channel</label>
                                            <input type="text" class="md-input" id="txtChannel" name="txtChannel" value="<?php echo $user->channel ?>"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                                        
                                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium"/>
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
                                                <input type="text" class="md-input" id="txtMonthlyTarget" name="txtMonthlyTarget" value="<?php echo '$ ' . ($user->monthly_target)?>"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtTodayTarget">Today Target</label>
                                                <input type="text" class="md-input" id="txtTodayTarget" name="txtTodayTarget" value="<?php echo '$ ' . ($user->monthly_target / 26) ?>"/>
                                            </div>
                                        </div>
                                        <div class="uk-width-large-1-4">
                                            <div class="uk-form-row">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="uk-input-group-icon uk-icon-calendar"></i>
                                                    </span>
                                                    <div class="md-input-wrapper md-input-filled">
                                                        <label for="validOfTarget">Valid Of Target</label>
                                                            <input class="md-input" type="text" id="startDate" data-uk-datepicker="{format:'DD-MMMM-YYYY'}" value="<?php echo $user->start_date ?>">
                                                        <span class="md-input-bar"></span>
                                                            <input class="md-input" type="text" id="endDate" data-uk-datepicker="{format:'DD-MMMM-YYYY'}" value="<?php echo $user->end_date ?>">
                                                        <span class="md-input-bar"></span>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="txtNumberOfWorkingDay">Number of working days</label>
                                            <input type="text" class="md-input" id="txtNumberOfWorkingDay" name="txtNumberOfWorkingDay" value="26"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content large-padding">
                                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">$ Today Achievement</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="<?php echo '$ '. $sale_archievement->amount ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">$ Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="<?php echo '$ '. $sale_archievement_month_to_date->amount ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_manufacturer_control">$ Year to Date Achievement</label>
                                            <input type="text" class="md-input" id="product_edit_manufacturer_control" name="product_edit_manufacturer_control" value="<?php echo '$ '. $sale_archievement_year_to_date->amount ?>"/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">% Today Achievement</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="<?php echo '% '. (($sale_archievement->amount/($user->monthly_target / 26))*100) ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">% Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="<?php echo '% '. (($sale_archievement_month_to_date->amount/$user->monthly_target)*100) ?>"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_manufacturer_control">% Year to Date Achieevemnt</label>
                                            <input type="text" class="md-input" id="product_edit_manufacturer_control" name="product_edit_manufacturer_control" value="<?php echo '% '. (($sale_archievement_year_to_date->amount/($user->target_achievement)*100)) ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-content large-padding">
                                <div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large">
                                        <div class="uk-width-large-1-4">
                                            <div class="uk-form-row">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="uk-input-group-icon uk-icon-calendar"></i>
                                                    </span>
                                                    <div class="md-input-wrapper md-input-filled">
                                                        <label for="txtTransactionOf">Transaction Of</label>
                                                        <input class="md-input" type="text" id="txtTransactionOf" data-uk-datepicker="{format:'DD-MMMM-YYYY', }">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large">
                                        <div class="uk-width-large">
                                            <div class="uk-form-row">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-1-1">
                                                        <div class="uk-overflow-container">
                                                            <table class="uk-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Item Code</th>
                                                                        <th>Item Name</th>
                                                                        <th>Quantity Sold</th>
                                                                        <th>Price</th>
                                                                        <th>Amount</th>
                                                                        <th>Sale Time</th>
                                                                        <th>Promotion</th>
                                                                        <th>Promotion Type</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="CONTENTS">
                                                                    <?php foreach ($sales as $sale):?>
                                                                    <tr>
                                                                        <td><?php echo $sale->code ?></td>
                                                                        <td><?php echo $sale->product_name ?></td>
                                                                        <td><?php echo $sale->quantity ?></td>
                                                                        <td><?php echo $sale->price ?></td>
                                                                        <td><?php echo $sale->amount ?></td>
                                                                        <td><?php echo $sale->sale_time ?></td>
                                                                        <td><?php echo $sale->promotion_name ?></td>
                                                                        <td><?php echo $sale->promotion_type ?></td>
                                                                        <td>
                                                                            <a title="View" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnView" data="<?php echo $sale->id?>"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                                            <a title="Update" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnUpdate" data="<?php echo $sale->id?>"><i class="material-icons md-24">&#xE3C9;</i></a>
                                                                            <a title="Delete" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnDelete" data="<?php echo $sale->id?>"><i class="material-icons md-24">&#xE872;</i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach;?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="PAGINATION">
                                                            <?php
                                                               echo $page_links;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        <div class="uk-modal" id="modalAddNewSale">
            <div class="uk-modal-dialog uk-modal-dialog-large">
                <button type="button" class="uk-modal-close uk-close"></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">ADD NEW SALE</h3>
                </div>
                <form action="" class="uk-form-stacked" id="frmAddNewSale" method="POST">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                        <div class="uk-width-xLarge-10-10  uk-width-large-10-10">
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
                                                <label for="txtItemCode" class="uk-form-label">Item Code<span class="req">*</span></label>
                                                <select id="selectedItemCode" name="selectedItemCode" data-md-selectize data-md-selectize-bottom required>
                                                    <option value="">Select Product Code</option>
                                                <?php foreach ($products as $product):?>
                                                    <option value="<?php echo $product->id;?>;<?php echo $product->price ?>"><?php echo $product->code; ?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="selectedItemName" class="uk-form-label">Item Name<span class="req">*</span></label>
                                                <select id="selectedItemName" name="selectedItemName" data-md-selectize data-md-selectize-bottom required>
                                                    <option value="">Select Product Name</option>
                                                <?php foreach ($products as $product):?>
                                                    <option value="<?php echo $product->id;?>;<?php echo $product->price ?>"><?php echo $product->name; ?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtQuantitySold" class="uk-form-label">Quantity Sold<span class="req">*</span></label>
                                                <input type="text" name="txtQuantitySold" required class="md-input" id="txtQuantitySold" value="0"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtPrice" class="uk-form-label">Price<span class="req">*</span></label>
                                                <input type="text" name="txtPrice" required class="md-input" id="txtPrice" readonly="readonly" value="0"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtAmount" class="uk-form-label">Amount<span class="req">*</span></label>
                                                <input type="text" name="txtAmount" required class="md-input" id="txtAmount" readonly="readonly" value="0"/>
                                            </div>                                           
                                        </div>
                                        <div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="txtPromotion" class="uk-form-label">Promotion<span class="req">*</span></label>
                                                <input type="text" name="txtPromotion" id="txtPromotion" data-parsley-trigger="change" class="md-input" />
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtPromotionType" class="uk-form-label">Promotion Type<span class="req">*</span></label>
                                                <select id="selectedPromotionType" name="selectedPromotionType" data-md-selectize data-md-selectize-bottom>
                                                    <option value="">Select Promotion Type</option>
                                                </select>
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

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew" data-uk-modal="{target:'#modalAddNewSale'}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

    <script id="CONTENT_TEMPLATE" type="text/x-jquery-tmpl">
        <tr>
            <td>{{= code}}</td>
            <td>{{= product_name}}</td>
            <td>{{= quantity }}</td>
            <td>{{= price }}</td>
            <td>{{= amount }}</td>
            <td>{{= sale_time }}</td>
            <td>{{= promotion_name }}</td>
            <td>{{= promotion_type }}</td>
            <td>
                <a title="View" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnView" data="{{= id}}"><i class="material-icons md-24">&#xE8F4;</i></a>
                <a title="Update" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnUpdate" data="{{= id}}"><i class="material-icons md-24">&#xE3C9;</i></a>
                <a title="Delete" data-uk-tooltip="{pos:'left'}" href="javascript:;" id="btnDelete" data="{{= id}}"><i class="material-icons md-24">&#xE872;</i></a>
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

    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            //$("table").DataTable();
            altair_helpers.retina_images();
        });
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
    <script src="<?php echo base_url()?>public/scripts/sale.js"></script>

</body>
</html>