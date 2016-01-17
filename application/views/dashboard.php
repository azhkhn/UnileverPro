		
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
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <!-- <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div> -->
                            <span class="uk-text-muted uk-text-small">TOTAL BA</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_ba ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><i class="material-icons">&#xE854;</i></div>
                            <span class="uk-text-muted uk-text-small">TOTAL PRODUCTS</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_product ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <!-- <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div> -->
                            <span class="uk-text-muted uk-text-small">TOTAL BRANDS</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_brand ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <!-- <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Visitors (live)</span>
                            <h2 class="uk-margin-remove" id="peity_live_text">0<noscript>46</noscript></h2>
                        </div>
                    </div>
                </div> -->
            </div>


            <!-- circular charts -->
            <!-- <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="76" data-bar-color="#03a9f4">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE0BE;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    User Messages
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias consectetur.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                            <span class="peity_conversions_large peity_data">5,3,9,6,5,9,7</span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Conversions
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content uk-flex uk-flex-center uk-flex-middle">
                            <span class="peity_conversions_large peity_data">5,3,9,6,5,9,7</span>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Conversions
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="53" data-bar-color="#009688">
                                <span class="epc_chart_text"><span class="countUpMe">53</span>%</span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Orders
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card md-card-hover md-card-overlay">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="37" data-bar-color="#607d8b">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE7FE;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    User Registrations
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                </div>
            </div> -->


        </div>
    </div>

    
    <!-- right sidebar -->
    <?php //$this->load->view('_rightside') ?>    
    <!-- right sidebar end -->
    
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
        <!-- d3 -->
        <script src="<?php echo base_url()?>public/bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="<?php echo base_url()?>public/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- c3.js (charts) -->
        <script src="<?php echo base_url()?>public/bower_components/c3js-chart/c3.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url()?>public/bower_components/maplace.js/src/maplace-0.1.3.js"></script>
        <!-- peity (small charts) -->
        <script src="<?php echo base_url()?>public/bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="<?php echo base_url()?>public/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="<?php echo base_url()?>public/bower_components/countUp.js/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="<?php echo base_url()?>public/bower_components/handlebars/handlebars.min.js"></script>
        <script src="<?php echo base_url()?>public/assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="<?php echo base_url()?>public/bower_components/clndr/src/clndr.js"></script>
        <!-- fitvids -->
        <script src="<?php echo base_url()?>public/bower_components/fitvids/jquery.fitvids.js"></script>

        <!--  dashbord functions -->
        <script src="<?php echo base_url()?>public/assets/js/pages/dashboard.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        var SITE_URL = '<?php echo site_url() ?>';
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>

</body>
</html>