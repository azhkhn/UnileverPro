        
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
            <h1 id="product_edit_name">OUTLET & PRODUCT TOTAL QUANTITY WEEKLY</h1>
        </div>
        <div id="page_content_inner">
            <div class="md-card">
                            <div class="md-card-content large-padding">
                                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="selectedBA"> Outlet Name</label>
                                            <select id="selectedOutlet" name="selectedOutlet" data-md-selectize data-md-selectize-bottom>
                                                <!-- <option value="">Outlet Name</option> -->
                                                <?php foreach ($outlets as $outlet):?>
                                                    <option value="<?php echo $outlet->id ?>"> <?php echo $outlet->name ?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <label for="txtMarketName">Weekly</label>
                                            <input class="md-input" type="text" id="weeklyDate" data-uk-datepicker="{format:'DD-MMMM-YYYY'}">
                                        </div>
                                    </div>
                                    <!-- <div class="uk-width-large-1-4">
                                        <div class="uk-form-row">
                                            <input type="button"  id="btnExcel" name="btnExcel" value="Export Excel"/>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <!-- <select id="selectYear">
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
                                </select>
                                <button id="btnExportExcel" class>Export Excel</button> -->
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item Codes</th>
                                            <th>Product Description</th>
                                            <th>Size</th>
                                            <th>Unit/Case</th>
                                            <th>Price</th>
                                            <th>Target</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                            <th>Sun</th>
                                            <th>Total</th>
                                            <th>Qty in Price</th>
                                            <th>Ach %</th>
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
            <i class="material-icons">&#xE161;</i>
        </a>
    </div>
    <form style="display:none;" id="myform" method="post" action="<?php echo base_url('outletexcel/weekly') ?>">
        <input name="duration" id="duration" type="hidden"/>
        <input name="outlet_id" id="outlet_id" type="hidden"/>
        <input type="submit" onClick="submitFormToIFrame();"/>
    </form>
    <iframe name="frame_x"></iframe>

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
            $('.md-input-wrapper').addClass('md-input-filled');
            $("#weeklyDate").val(moment().format('DD-MMMM-YYYY'));
            /*alert($('#weeklyDate').val());*/
            var date = moment('2016-01-06'),
            begin = moment(date).add('week',1).startOf('week').isoWeekday(1);
            var str = [];
            for (var i=0; i<7; i++) {
                var data = {};
                data["date"] = begin.format('YYYY-MM-DD');
                data["name"] = begin.format('dddd');
                str.push(data); //+ '<br>';
                begin.add('d', 1);
            }
            //$("#duration").val(JSON.stringify(str));
            var excel = {};
            //var currentYear = new Date().getFullYear()
            $("#selectYear").val();
            excel.getAllProducts = function(year){
                var start_date = moment().date(1).format('YYYY-MM-DD');
                var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
                modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
                $.ajax({
                    url: SITE_URL+'outletexcel/outlet_product_ajax',
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        'duration' : str,
                        'outlet_id' : $("#selectedOutlet").val()
                    },
                    success: function(data){
                        console.log(data);
                        htmlBody = "";
                        $.each(data.products, function(key, value){
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

            excel.getAllProducts();

            // TODO: WHEN CLICK ON THE BUTTON EXPORT EXCEL
            $("#btnExportExcel").click(function(){
                $("#duration").val(JSON.stringify(str));
                $("#outlet_id").val($("#selectedOutlet").val());
                function submitFormToIFrame(){
                    //IE
                    if( document.myform ){
                        document.myform.setAttribute('target','frame_x');
                        document.myform.submit();
                    //FF
                    } else {
                        var form=document.getElementById('myform');
                        form.setAttribute('target', 'frame_x');
                        form.submit();
                    }
                }
                submitFormToIFrame();
            });            

            // TODO: WHEN CLICK ON THE COMBO BOX YEAR
            /*$("#selectYear").change(function(){
                excel.getAllProducts($(this).val());
            });*/
        });
    </script>
</body>
</html>