        
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
    
    

    <div id="page_content" style="background: white;">
        <div id="page_heading">
            <h1 id="product_edit_name">WELCOME TO UNILEVER REPORTING SYSTEM ENJOY YOUR WORKING.</h1>
        </div>
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
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
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">TOTAL BRANDS</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe"><?php echo $total_brand ?><noscript></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div> 
                            <span class="uk-text-muted uk-text-small">TOTAL OUTLETS </span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_outlet ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card">
                        <div id="clndr_events" class="clndr-wrapper">
                            <script>
                                // calendar events
                                clndrEvents = [
                                    { date: '2015-07-08', title: 'Doctor appointment', url: 'javascript:void(0)', timeStart: '10:00', timeEnd: '11:00' },
                                    { date: '2015-07-09', title: 'John\'s Birthday', url: 'javascript:void(0)' },
                                    { date: '2015-07-09', title: 'Party', url: 'javascript:void(0)', timeStart: '08:00', timeEnd: '08:30' },
                                    { date: '2015-07-13', title: 'Meeting', url: 'javascript:void(0)', timeStart: '18:00', timeEnd: '18:20' },
                                    { date: '2015-07-18', title: 'Work Out', url: 'javascript:void(0)', timeStart: '07:00', timeEnd: '08:00' },
                                    { date: '2015-07-18', title: 'Business Meeting', url: 'javascript:void(0)', timeStart: '11:10', timeEnd: '11:45' },
                                    { date: '2015-07-23', title: 'Meeting', url: 'javascript:void(0)', timeStart: '20:25', timeEnd: '20:50' },
                                    { date: '2015-07-26', title: 'Haircut', url: 'javascript:void(0)' },
                                    { date: '2015-07-26', title: 'Lunch with Katy', url: 'javascript:void(0)', timeStart: '08:45', timeEnd: '09:45' },
                                    { date: '2015-07-26', title: 'Concept review', url: 'javascript:void(0)', timeStart: '15:00', timeEnd: '16:00' },
                                    { date: '2015-07-27', title: 'Swimming Poll', url: 'javascript:void(0)', timeStart: '13:50', timeEnd: '14:20' },
                                    { date: '2015-07-29', title: 'Team Meeting', url: 'javascript:void(0)', timeStart: '17:25', timeEnd: '18:15' },
                                    { date: '2015-08-02', title: 'Dinner with John', url: 'javascript:void(0)', timeStart: '16:25', timeEnd: '18:45' },
                                    { date: '2015-08-13', title: 'Business Meeting', url: 'javascript:void(0)', timeStart: '10:00', timeEnd: '11:00' }
                                ]
                            </script>
                            <script id="clndr_events_template" type="text/x-handlebars-template">
                                <div class="md-card-toolbar">
                                    <div class="md-card-toolbar-actions">
                                        <!--<i class="md-icon clndr_add_event material-icons">&#xE145;</i>-->
                                        <i class="md-icon clndr_today material-icons">&#xE8DF;</i>
                                        <i class="md-icon clndr_previous material-icons">&#xE408;</i>
                                        <i class="md-icon clndr_next material-icons uk-margin-remove">&#xE409;</i>
                                    </div>
                                    <h3 class="md-card-toolbar-heading-text">
                                        {{ month }} {{ year }}
                                    </h3>
                                </div>
                                <div class="clndr_days">
                                    <div class="clndr_days_names">
                                        {{#each daysOfTheWeek}}
                                        <div class="day-header">{{ this }}</div>
                                        {{/each}}
                                    </div>
                                    <div class="clndr_days_grid">
                                        {{#each days}}
                                        <div class="{{ this.classes }}" {{#if this.id }} id="{{ this.id }}" {{/if}}>
                                            <span>{{ this.day }}</span>
                                        </div>
                                        {{/each}}
                                    </div>
                                </div>
                                <div class="clndr_events">
                                    <i class="material-icons clndr_events_close_button">&#xE5CD;</i>
                                    {{#each eventsThisMonth}}
                                    <div class="clndr_event" data-clndr-event="{{ dateFormat this.date format='YYYY-MM-DD' }}">
                                        <a href="{{ this.url }}">
                                            <span class="clndr_event_title">{{ this.title }}</span>
                                            <span class="clndr_event_more_info">
                                                {{~dateFormat this.date format='MMM Do'}}
                                                {{~#ifCond this.timeStart '||' this.timeEnd}} ({{/ifCond}}
                                                {{~#if this.timeStart }} {{~this.timeStart~}} {{/if}}
                                                {{~#ifCond this.timeStart '&&' this.timeEnd}} - {{/ifCond}}
                                                {{~#if this.timeEnd }} {{~this.timeEnd~}} {{/if}}
                                                {{~#ifCond this.timeStart '||' this.timeEnd}}){{/ifCond~}}
                                            </span>
                                        </a>
                                    </div>
                                    {{/each}}
                                </div>
                            </script>
                        </div>
                        <div class="uk-modal" id="modal_clndr_new_event">
                            <div class="uk-modal-dialog">
                                <div class="uk-modal-header">
                                    <h3 class="uk-modal-title">New Event</h3>
                                </div>
                                <div class="uk-margin-bottom">
                                    <label for="clndr_event_title_control">Event Title</label>
                                    <input type="text" class="md-input" id="clndr_event_title_control" />
                                </div>
                                <div class="uk-margin-medium-bottom">
                                    <label for="clndr_event_link_control">Event Link</label>
                                    <input type="text" class="md-input" id="clndr_event_link_control" />
                                </div>
                                <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-large-bottom" data-uk-grid-margin>
                                    <div>
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                            <label for="clndr_event_date_control">Event Date</label>
                                            <input class="md-input" type="text" id="clndr_event_date_control" data-uk-datepicker="{format:'YYYY-MM-DD', addClass: 'dropdown-modal', minDate: '2015-07-20' }">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                            <label for="clndr_event_start_control">Event Start</label>
                                            <input class="md-input" type="text" id="clndr_event_start_control" data-uk-timepicker>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="uk-input-group">
                                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-clock-o"></i></span>
                                            <label for="clndr_event_end_control">Event End</label>
                                            <input class="md-input" type="text" id="clndr_event_end_control" data-uk-timepicker>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-modal-footer uk-text-right">
                                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button><button type="button" class="md-btn md-btn-flat md-btn-flat-primary" id="clndr_new_event_submit">Add Event</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
    <script>
        var workbook = new kendo.ooxml.Workbook({
          sheets: [
            {
              // Column settings (width)
              columns: [
                { autoWidth: true },
                { autoWidth: true }
              ],
              // Title of the sheet
              title: "Customers",
              // Rows of the sheet
              rows: [
                // First row (header)
                {
                  cells: [
                    // First cell
                    { value: "Company Name" },
                    // Second cell
                    { value: "Contact" }
                  ]
                },
                // Second row (data)
                {
                  cells: [
                    { value: "Around the Horn" },
                    { value: "Thomas Hardy" }
                  ]
                },
                // Third row (data)
                {
                  cells: [
                    { value: "B's Beverages" },
                    { value: "Victoria Ashworth" }
                  ]
                }
              ]
            }
          ]
        });
        kendo.saveAs({
            dataURI: workbook.toDataURL(),
            fileName: "Test.xlsx"
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>

</body>
</html>