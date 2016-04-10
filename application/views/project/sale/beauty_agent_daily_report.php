        
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
    <?php $this->load->view('_leftside_project') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">BA DAILY REPORT</h1>
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
                                            <label for="selectedBA"> BA Name</label>
                                            <select id="selectedBA" name="selectedBA" data-md-selectize data-md-selectize-bottom>
                                                <option value="">BA Name</option>
                                                <?php foreach ($ba_users as $user):?>
                                                    <option value="<?php echo $user->id;?>"><?php echo $user->username; ?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtSupervisorName">Supervisor Name</label>
                                            <input type="text" class="md-input" id="txtSupervisorName" name="txtSupervisorName" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtBAExecutive">BA's Executive Name</label>
                                            <input type="text" class="md-input" id="txtBAExecutive" name="txtBAExecutive" value=""/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="txtMarketName">Market Name</label>
                                            <input type="text" class="md-input" id="txtMarketName" name="txtMarketName" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtOutletName">Outlet Name</label>
                                            <input type="text" class="md-input" id="txtOutletName" data-id="" name="txtOutletName" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtDMSCode">DMS Code</label>
                                            <input type="text" class="md-input" id="txtDMSCode" name="txtDMSCode" value=""/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="txtDT">DT</label>
                                            <input type="text" class="md-input" id="txtDT" name="txtDT" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtCustomerType">Customer Type</label>
                                            <input type="text" class="md-input" id="txtCustomerType" name="txtCustomerType" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtChannel">Channel</label>
                                            <input type="text" class="md-input" id="txtChannel" name="txtChannel" value=""/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <div class="md-card">
                                                <div class="md-card-content">
                                                    <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium" id="txtPhoto" />
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
                                                <input type="text" class="md-input" id="txtMonthlyTarget" name="txtMonthlyTarget" value=""/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtTodayTarget">Today Target</label>
                                                <input type="text" class="md-input" id="txtTodayTarget" name="txtTodayTarget" value=""/>
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
                                            <input type="text" class="md-input" id="txtNumberOfWorking" name="txtNumberOfWorking" value="26"/>
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
                                            <label for="txtTodayAchievement">$ Today Achievement</label>
                                            <input type="text" class="md-input" id="txtTodayAchievement" name="txtTodayAchievement" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtMonthToDateAchievement">$ Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtMonthToDateAchievement" name="txtMonthToDateAchievement" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtYearToDateAchievement">$ Year to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtYearToDateAchievement" name="txtYearToDateAchievement" value=""/>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-2-4">
                                        <div class="uk-form-row">
                                            <label for="txtTodayAchievementPercent">% Today Achievement</label>
                                            <input type="text" class="md-input" id="txtTodayAchievementPercent" name="txtTodayAchievementPercent" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtMonthToDateAchievementPercent">% Month to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtMonthToDateAchievementPercent" name="txtMonthToDateAchievementPercent" value=""/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="txtYearToDateAchievementPercent">% Year to Date Achievement</label>
                                            <input type="text" class="md-input" id="txtYearToDateAchievementPercent" name="txtYearToDateAchievementPercent" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card" style="display:none;">
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
                                                        <label for="txtTransactionOf1">Transaction Of</label>
                                                        <input class="md-input" type="text" id="txtTransactionOf1" data-uk-datepicker="{format:'DD-MMMM-YYYY', }">
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
                                                            <table class="uk-table" id="saleTransaction1" style="display:none;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:10%;">Item Code</th>
                                                                        <th style="width:30%;">Item Name</th>
                                                                        <th style="width:10%;">Price</th>
                                                                        <th style="width:10%;">Quantity Sold</th>
                                                                        <th style="width:10%;">Amount</th>
                                                                        <th style="width:15%;">Promotion</th>
                                                                        <th style="width:15%;">Promotion Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="CONTENTS">
                                                                </tbody>
                                                            </table>
                                                        <div id="grid"></div>
                                                        </div>
                                                        <div id="PAGINATION" style="display:none;">
                                                            <!--<?php
                                                               echo $page_links;
                                                            ?>-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="uk-modal-footer uk-text-right">
                                            <input type="button" class="md-btn md-btn-primary" id="btnSave" value="Save" />
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-card">
                            <div id="page_heading">
                                <h1>Sale Transaction History</h1>
                            </div>
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
                                                        <label for="txtTransactionOfsaleTransactionHistorys">Transaction Of</label>
                                                        <input class="md-input" type="text" id="txtTransactionOfsaleTransactionHistory" data-uk-datepicker="{format:'DD-MMMM-YYYY', }">
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
                                                            <table class="uk-table" id="saleTransactionHistory">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:10%;">Item Code</th>
                                                                        <th style="width:20%;">Item Name</th>
                                                                        <th style="width:10%;text-align:right;">Price</th>
                                                                        <th style="width:10%;text-align:right;">Quantity Sold</th>
                                                                        <th style="width:10%;text-align:right;">Amount</th>
                                                                        <th style="width:15%;">Promotion</th>
                                                                        <th style="width:15%;">Transaction</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="CONTENTSsaleTransactionHistory">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="PAGINATIONsaleTransactionHistory">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="uk-modal-footer uk-text-right">
                                            <input type="button" class="md-btn md-btn-primary" id="btnSave" value="Save" />
                                        </div> -->
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
                    <h3 class="uk-modal-title">UPDATE SALE INFORMATION</h3>
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
                                        <div class="uk-width-small">
                                            <div class="uk-form-row">
                                                <label for="txtItemCode" class="uk-form-label">Item Code<span class="req">*</span></label>
                                                <!--<select id="selectedItemCode" name="selectedItemCode" data-md-selectize data-md-selectize-bottom>
                                                    <option value="">Select Product Code</option>
                                                </select>-->
                                                <input type="text" name="selectedItemCode" required class="md-input" id="selectedItemCode" value=""  readonly="readonly"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="selectedItemName" class="uk-form-label">Item Name<span class="req">*</span></label>
                                                <input type="text" name="selectedItemName" required class="md-input" id="selectedItemName" value="" readonly="readonly"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtQuantitySold" class="uk-form-label">Quantity Sold<span class="req">*</span></label>
                                                <input type="text" name="txtQuantitySold" required class="md-input" id="txtQuantitySold" value="0"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtPrice" class="uk-form-label">Price<span class="req">*</span></label>
                                                <input type="text" name="txtPrice" required class="md-input" id="txtPrice" readonly="readonly" value="0"  readonly="readonly"/>
                                            </div>
                                            <div class="uk-form-row">
                                                <label for="txtAmount" class="uk-form-label">Amount<span class="req">*</span></label>
                                                <input type="text" name="txtAmount" required class="md-input" id="txtAmount" readonly="readonly" value="0" readonly="readonly"/>
                                            </div>    
                                            <div class="uk-form-row">
                                                <label for="txtPromotion" class="uk-form-label">Promotion</label>
                                                <input type="text" name="txtPromotion" id="txtPromotion" data-parsley-trigger="change" class="md-input"  readonly="readonly"/>
                                            </div>
                                        </div>
                                        <!--<div class="uk-width-large-1-2">
                                            <div class="uk-form-row">
                                                <label for="txtPromotion" class="uk-form-label">Promotion</label>
                                                <input type="text" name="txtPromotion" id="txtPromotion" data-parsley-trigger="change" class="md-input" />
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn uk-modal-close" id="btnClose">Close</button>
                    <input type="submit" class="md-btn md-btn-primary" id="btnSave" value="Save" />
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--     <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew" data-uk-modal="{target:'#modalAddNewSale'}">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div> -->

    <script id="CONTENT_TEMPLATE" type="text/x-jquery-tmpl">
        <tr>
            <td id="itemCode">{{= code}}</td>
            <td id="itemName">{{= product_name}}</td>
            <td id="price" style="text-align:right;">{{= price}}</td>
            <td id="quantitySold" style="text-align:right;">{{= quantity}}</td>
            <td id="amount" style="text-align:right;">{{= amount}}</td>
            <td id="promotion">{{= promotion_name }}</td>
            <td id="saleTime">{{= sale_time }}</td>
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
    <!--
    <script src="<?php echo base_url()?>public/assets/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url()?>public/assets/js/semantic.min.js"></script>
    <script src="<?php echo base_url()?>public/assets/js/semantic.editableRecord.js"></script>
    <script src="<?php echo base_url()?>public/assets/js/example.js"></script>
    -->
    <script src="<?php echo base_url()?>public/assets/js/jquery.tmpl.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2014.3.1029/js/jszip.min.js"></script>
    <script src="<?php echo base_url()?>public/assets/js/kendo.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/project/ba_report.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
    <script type="text/javascript">

    </script>
        <!-- <div id="example">
        <div id="grid"></div>
            <script>
                $(document).ready(function () {
                    var dataSource = new kendo.data.DataSource({
                       pageSize: 20,
                       data: products,
                       autoSync: true,
                       schema: {
                           model: {
                             id: "ProductID",
                             fields: {
                                ProductID: { editable: false, nullable: true },
                                ProductName: { validation: { required: true } },
                                Category: { defaultValue: { CategoryID: 1, CategoryName: "Beverages"} },
                                UnitPrice: { type: "number", validation: { required: true, min: 1} }
                             }
                           }
                       }
                    });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        pageable: true,
                        height: 550,
                        toolbar: ["create"],
                        columns: [
                            { field:"ProductName",title:"Product Name" },
                            { field: "Category", title: "Category", width: "180px", editor: categoryDropDownEditor, template: "#=Category.CategoryName#" },
                            { field: "UnitPrice", title:"Unit Price", format: "{0:c}", width: "130px" },
                            { command: "destroy", title: " ", width: "150px" }],
                        editable: true
                    });
                });

                function categoryDropDownEditor(container, options) {
                    $('<input required data-text-field="CategoryName" data-value-field="CategoryID" data-bind="value:' + options.field + '"/>')
                        .appendTo(container)
                        .kendoDropDownList({
                            autoBind: false,
                            dataSource: {
                                type: "odata",
                                transport: {
                                    read: "//demos.telerik.com/kendo-ui/service/Northwind.svc/Categories"
                                }
                            }
                        });
                }

            </script>
        </div> -->

       
</body>
</html>