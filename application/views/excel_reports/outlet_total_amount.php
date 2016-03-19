        
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
            <h1 id="product_edit_name">OUTLET & PRODUCT TOTAL AMOUNT MONTHLY</h1>
        </div>
        <div id="page_content_inner">
            <div class="md-card">
                <div id="page_heading">
                    <h1>SEARCHING BY</h1>
                </div>
                <div class="md-card-content large-padding">
                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                        <div class="uk-width-large-1-4">
                            <div class="uk-form-row">
                                <label for="selectYear">Year</label>
                                <select id="selectYear" name="selectYear" data-md-selectize data-md-selectize-bottom>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </div>
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
                                            <th>No</th>
                                            <th>Outlet Name</th>
                                            <th>Product Name</th>
                                            <th>January</th>
                                            <th>Febuary</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
                                        </tr>
                                    </thead>
                                    <tbody id="CONTENTS">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="btnExportExcel">
            <i class="material-icons">&#xE2C0;</i>
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
            //$("table").DataTable();
            altair_helpers.retina_images();

        });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
    <script type="text/javascript">
        $(function(){
            var excel = {};
            var currentYear = new Date().getFullYear();
            var $selectYear = $("#selectYear").selectize();
			var selectYear = $selectYear[0].selectize;
			selectYear.setValue(currentYear);
            $("#selectYear").val(currentYear);
            excel.getAllProducts = function(year){
                var start_date = moment().date(1).format('YYYY-MM-DD');
                var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
                modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
                $.ajax({
                    url: SITE_URL+'outletexcel/outlet_amount_ajax/'+ year,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        console.log(data);
                        htmlBody = "";
                        $.each(data.outlets, function(key, value){
                            htmlBody +="<tr>"
                            for(key in value){
                                htmlBody +="<td>"+value[key]+"</td>";
                            }
                            htmlBody +="</tr>"
                        });

                        $("table tbody").html(htmlBody);
                        modal.hide();
                    },
                    error: function(data){
                        modal.hide();
                        console.log(data);
                    }
                });
            };

            excel.getAllProducts(currentYear);

            // TODO: WHEN CLICK ON THE BUTTON EXPORT EXCEL
            $("#btnExportExcel").click(function(){
                location.href=SITE_URL+"outletexcel/amount/"+$("#selectYear").val();
            });
            // TODO: WHEN CLICK ON THE COMBO BOX YEAR
            $("#selectYear").change(function(){
                excel.getAllProducts($(this).val());
            });
        });
    </script>
</body>
</html>