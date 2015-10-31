		
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
<body class="sidebar_main_open">
	<!--  header -->
	<?php $this->load->view('_header') ?>  
     <!-- / header end -->
 
    <!-- left side bar -->
	<?php $this->load->view('_leftside') ?>    
    <!-- /left side bar -->

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">BEAUTY AGENT INFORMATION DETAILS</h1>
            <!--<span class="uk-text-muted uk-text-upper uk-text-small" id="product_edit_sn">SM-G925TZKFTMB</span>-->
        </div>
        <div id="page_content_inner">
            <form action="" class="uk-form-stacked" id="product_edit_form">
                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                    <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                        <div class="md-card">
                            <div class="md-card-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery checked name="product_edit_active_control" id="product_edit_active_control" />
                                </div>
                                <label class="uk-display-block uk-margin-small-top" for="product_edit_active_control">Active</label>
                            </div>
                        </div>
                        <div class="md-card">
                            <div class="md-card-toolbar">
                                <div class="md-card-toolbar-actions">
                                    <i class="md-icon material-icons">&#xE146;</i>
                                </div>
                                <h3 class="md-card-toolbar-heading-text">
                                    Photos
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-margin-bottom uk-text-center uk-position-relative">
                                    <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                    <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge.jpg" alt="" class="img_medium"/>
                                </div>
                                <<!--ul class="uk-grid uk-grid-width-small-1-3 uk-text-center" data-uk-grid-margin>
                                    <li class="uk-position-relative">
                                        <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt="" class="img_small"/>
                                    </li>
                                    <li class="uk-position-relative">
                                        <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_2.jpg" alt="" class="img_small"/>
                                    </li>
                                    <li class="uk-position-relative">
                                        <button type="button" class="uk-modal-close uk-close uk-close-alt uk-position-absolute"></button>
                                        <img src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_3.jpg" alt="" class="img_small"/>
                                    </li>
                                </ul>-->
                            </div>
                        </div>
                        <!--<div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Data
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-form-row">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="uk-icon-usd"></i>
                                        </span>
                                        <label for="product_edit_price_control">Price</label>
                                        <input type="text" class="md-input" name="product_edit_price_control" id="product_edit_price_control" value="540.00" />
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">%</span>
                                        <label for="product_edit_tax_control">Tax</label>
                                        <input type="text" class="md-input" name="product_edit_tax_control" id="product_edit_tax_control" value="18" />
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="uk-icon-cubes"></i>
                                        </span>
                                        <label for="product_edit_quantity_control">Quantity</label>
                                        <input type="text" class="md-input" name="product_edit_quantity_control" id="product_edit_quantity_control" value="120" />
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <div class="uk-input-group">
                                        <span class="uk-input-group-addon">
                                            <i class="uk-icon-barcode"></i>
                                        </span>
                                        <label for="product_edit_sku_control">SKU</label>
                                        <input type="text" class="md-input" name="product_edit_sku_control" id="product_edit_sku_control" value="4319572394" />
                                    </div>
                                </div>
                            </div>
                        </div>-->
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
                                            <label for="product_edit_name_control">Code</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="000123"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">First Name</label>
                                            <input type="text" class="md-input" id="product_edit_name_control" name="product_edit_name_control" value="Galaxy S6 edge"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_manufacturer_control">Last Name</label>
                                            <input type="text" class="md-input" id="product_edit_manufacturer_control" name="product_edit_manufacturer_control" value="Samsung"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_sn_control">Gender</label>
                                            <select id="product_edit_color_control" name="product_edit_color_control" data-md-selectize>
                                                <option value="white">Gender</option>
                                                <option value="black" selected>Female</option>
                                                <option value="red">Male</option>
                                            </select>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_name_control">Supervisor</label>
                                            <select id="product_search_status" data-md-selectize data-md-selectize-bottom>
                                                <option value="">Supervisor</option>
                                                <option value="1">Supervisor 1</option>
                                                <option value="2">Supervisor 2</option>
                                            </select>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_memory_control" class="uk-form-label">Email</label>
                                            <input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" value="SM-G925TZKFTMB"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_memory_control" class="uk-form-label">Telephone</label>
                                            <input type="text" class="md-input" id="product_edit_sn_control" name="product_edit_sn_control" value="SM-G925TZKFTMB"/>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_color_control" class="uk-form-label">Start Working</label>
                                            <select id="product_search_status" data-md-selectize data-md-selectize-bottom>
                                                <option value="">Supervisor</option>
                                                <option value="1">Supervisor 1</option>
                                                <option value="2">Supervisor 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-2">
                                        <div class="uk-form-row">
                                            <label class="uk-form-label" for="product_edit_tags_control">Outlet Name</label>
                                            <select id="product_search_status" data-md-selectize data-md-selectize-bottom>
                                                <option value="">Supervisor</option>
                                                <option value="1">Supervisor 1</option>
                                                <option value="2">Supervisor 2</option>
                                            </select>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="product_edit_description_control">Remark</label>
                                            <textarea class="md-input" name="product_edit_description_control" id="product_edit_description_control" cols="30" rows="4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquam necessitatibus suscipit velit voluptatibus! Ab accusamus ad adipisci alias aliquid at atque consectetur, dicta dignissimos, distinctio dolores esse fugiat iste laborum libero magni maiores maxime modi nemo neque, nesciunt nisi nulla optio placeat quas quia quibusdam quis saepe sit ullam!</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="md-card">
                            <div class="md-card-toolbar">
                                <h3 class="md-card-toolbar-heading-text">
                                    Options
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-10">
                                        <span class="uk-display-block uk-margin-small-top uk-text-large">Colors <a href="#"><i class="material-icons uk-text-primary">&#xE5CD;</i></a></span>

                                    </div>
                                    <div class="uk-width-medium-8-10">
                                        <div class="uk-overflow-container">
                                            <table class="uk-table">
                                                <thead>
                                                    <tr>
                                                        <th class="uk-width-4-10 uk-text-nowrap">Color</th>
                                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">In stock</th>
                                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                                        <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" value="Black" /></td>
                                                        <td class="uk-text-center uk-text-middle"><input type="checkbox" data-md-icheck checked /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="0.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" value="White" /></td>
                                                        <td class="uk-text-center uk-text-middle"><input type="checkbox" data-md-icheck /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="+ 25.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-small" value="Red" /></td>
                                                        <td class="uk-text-center uk-text-middle"><input type="checkbox" data-md-icheck checked /></td>
                                                        <td class="uk-text-nowrap uk-text-middle">
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="- 10.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" placeholder="Color" /></td>
                                                        <td class="uk-text-middle uk-text-center"><input type="checkbox" data-md-icheck /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" placeholder="Price" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE145;</i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-10">
                                        <span class="uk-display-block uk-margin-small-top uk-text-large">Internal memory <a href="#"><i class="material-icons uk-text-primary">&#xE5CD;</i></a></span>
                                    </div>
                                    <div class="uk-width-medium-8-10">
                                        <div class="uk-overflow-container">
                                            <table class="uk-table">
                                                <thead>
                                                    <tr>
                                                        <th class="uk-width-4-10 uk-text-nowrap">Memory</th>
                                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">In stock</th>
                                                        <th class="uk-width-2-10 uk-text-center uk-text-nowrap">Price</th>
                                                        <th class="uk-width-2-10 uk-text-right uk-text-nowrap">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" value="32GB" /></td>
                                                        <td class="uk-text-middle uk-text-center"><input type="checkbox" data-md-icheck /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="- 50.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" value="64GB" /></td>
                                                        <td class="uk-text-middle uk-text-center"><input type="checkbox" data-md-icheck checked /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="0.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" value="128GB" /></td>
                                                        <td class="uk-text-middle uk-text-center"><input type="checkbox" data-md-icheck checked /></td>
                                                        <td>
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" value="+ 80.00" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE872;</i></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" class="md-input md-input-width-medium" placeholder="Memory" /></td>
                                                        <td class="uk-text-middle uk-text-center">
                                                            <input type="checkbox" data-md-icheck />
                                                        </td>
                                                        <td class="uk-text-right">
                                                            <div class="uk-input-group">
                                                                <span class="uk-input-group-addon">
                                                                    <i class="uk-icon-usd"></i>
                                                                </span>
                                                                <input type="text" class="md-input md-input-width-small uk-text-right" placeholder="Price" />
                                                            </div>
                                                        </td>
                                                        <td class="uk-text-right uk-text-middle"><a href="#"><i class="material-icons md-24">&#xE145;</i></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-2-10">
                                        <a class="md-btn" href="#">Add option</a>
                                    </div>
                                    <div class="uk-width-medium-8-10">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="product_edit_submit">
            <i class="material-icons">&#xE161;</i>
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

    <!-- page specific plugins -->

    <!--  product edit functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/ecommerce_product_edit.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

</body>
</html>