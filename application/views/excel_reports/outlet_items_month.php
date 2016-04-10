        
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
        
        <style type="text/css">
            th, td { width:10px; word-wrap:break-word; overflow:hidden; text-overflow: ellipsis; }
            th{
                text-align: center;
                font-weight: bold;
                font-size: 14px;
            }
        </style>
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
            <h1 id="product_edit_name">OUTLET & PRODUCT TOTAL</h1>
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
                                <label for="selectedSupervisorName">SUPERVISOR NAME</label>
                                <select id="selectedSupervisorName" name="selectedSupervisorName" data-md-selectize data-md-selectize-bottom>
                                    <!--<option value="">Please Choose Supervisor Name</option>-->
                                    <?php foreach ($supervisors as $supervisor):?>
                                        <option value="<?php echo $supervisor->id ?>"> <?php echo $supervisor->username ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4">
                            <div class="uk-form-row">
                                <label for="selectedYear">YEAR</label>
                                <select id="selectedYear" name="selectedYear" data-md-selectize data-md-selectize-bottom>
                                    <option value="">Please Choose Year</option>
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
                        <div class="uk-width-large-1-4">
                            <div class="uk-form-row">
                                <label for="selectedMonth">MONTH</label>
                                <select id="selectedMonth" name="selectedMonth" data-md-selectize data-md-selectize-bottom>
                                    <option value="">Please Choose Month</option>
                                    <option value="1">JANUARY</option>
                                    <option value="2">FEBRUARY</option>
                                    <option value="3">MARCH</option>
                                    <option value="4">APRIL</option>
                                    <option value="5">MAY</option>
                                    <option value="6">JUNE</option>
                                    <option value="7">JULY</option>
                                    <option value="8">AUGUST</option>
                                    <option value="9">SEPTEMBER</option>
                                    <option value="10">OCTOBER</option>
                                    <option value="11">NOVEMBER</option>
                                    <option value="12">DECEMBER</option>
                                    <option value="13">TOTAL MONTHS</option>
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
                            <div class="uk-overflow-container" id="EXCEL">
                                <table class="uk-table" id="OUTLET_ITEM">
                                    <thead>
                                    </thead>
                                    <tbody id="CONTENTS">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<a id="dlink"  style="display:none;"></a>

            <input type="button" onclick="tableToExcel('OUTLET_ITEM', 'name', 'myfile.xls')" value="Export to Excel">-->
        </div>
        <!--<a id="dlink"  style="display:none;"></a>
        <input type="button" onclick="tablesToExcel(['OUTLET_ITEM','OUTLET_ITEM','OUTLET_ITEM','OUTLET_ITEM','OUTLET_ITEM'], ['WEEK1','WEEK2','WEEK3','WEEK4','TOTAL'],'MASTER_REPORT')" value="EXPORT TO EXCEL">-->
    </div>
    
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-primary" href="#" id="btnExportExcel">
            <i class="material-icons">&#xE2C0;</i>
        </a>
    </div>
    <form style="display:none;" id="myform" method="post" action="<?php echo base_url('outletexcel/html') ?>">
        <input name="data" id="data" type="hidden"/>
        <input name="supervisor_name" id="supervisor_name" type="hidden" />
        <input name="year" id="year" type="hidden" />
        <input name="month" id="month" type="hidden" />
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
    <!--<script src="<?php echo base_url()?>public/assets/js/tableHeadFixer.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
	<!--<script src="<?php echo base_url()?>public/assets/js/tablefreeze.min.js"></script>-->
    <script type="text/javascript">
        $(function(){var topHeaders = "<tr id='TOP001'>";
            var headers = "<tr id='TOP002'>";
            var JSONColumns = [];
            var excel = {};
            var supervisorName = $("#selectedSupervisorName").text();
            var currentYear = new Date().getFullYear();
            var table;
            var bDestroy;
            var $selectedYear = $("#selectedYear").selectize();
			var selectedYear = $selectedYear[0].selectize;
			selectedYear.setValue(currentYear);
			var $selectedMonth = $("#selectedMonth").selectize();
			var selectedMonth = $selectedMonth[0].selectize;
			selectedMonth.setValue(moment().format('M')); 
			var date = moment().format("d");
            excel.getAllProducts = function(year){
                var start_date = moment().date(1).format('YYYY-MM-DD');
                var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
                modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
                $.ajax({
                    url: SITE_URL+'outletexcel/outlet_items_ajax_month/'+ year,
                    type: "POST",
                    dataType: "JSON",
                    data : {
                        supervisor: $("#selectedSupervisorName").val(),
                        year: $("#selectedYear").val(),
                        month: $("#selectedMonth").val()
                    },
                    success: function(data){
                        var topHeaders = "<tr id='TOP001'>";
                        var headers = "<tr id='TOP002'>";
                        var JSONColumns = [];
                        var i=0;
                        var index =0;
                        for(props in data.outlets[0]){
                            if(i<8){
                                topHeaders +="<th></th>";
                                headers +="<th></th>";
                                JSONColumns.push({title:props, width:"10"});
                            }else{
                                headers += "<th colspan='2' style='text-align:center;'>" + props + "</th>";
                                topHeaders +="<th colspan='2' style='text-align:center;'>"+(pad(++index,3))+"</th>";
                                JSONColumns.push({title:"QTY"});
                                JSONColumns.push({title:"AMOUNT"});
                            }
                            i++;
                            //JSONColumns.push({title:"AMOUNT"});
                        }
                        JSONColumns.push({title:"Total Item"});
                        JSONColumns.push({title:"Total In Case"});
                        JSONColumns.push({title:"Qty. In Price"});
                        topHeaders += "<th colspan='3' style='text-align:center;'>BA Supervisor: "+$("#selectedSupervisorName").text()+"</th>";
                        headers += "<th style='text-align:center;'></th>";
                        headers += "<th style='text-align:center;'></th>";
                        headers += "<th style='text-align:center;'></th>";
                        
                        //console.log(JSONColumns);
                        topHeaders +="</tr>";
                        headers +="</tr>";

                        htmlBody = "";
                        var JSONData = [];
                        var j = 0;
                        var k = 0;
                        $.each(data.outlets, function(key, value){
                            if(value["PROMOTION"]>2){
                                htmlBody +="<tr style='font-weight:bold'>"    
                            }else{
                                htmlBody +="<tr>"
                            }
                            var JSONString = [];
                            for(key in value){
                                JSONString.push(value[key]);
                                if(j>=8){
                                    try{
                                        JSONString.push(data.outlets_amount[k][key]);
                                    }catch(ex){
                                        console.log(ex);
                                    }
                                    
                                }
                                /*console.log(data.outlets_amount[k]["Total_Items"]);*/
                                
                                htmlBody +="<td style='text-align:center;'>"+value[key]+"</td>";
                                j++;
                            }
                            j=0;
                            JSONString.push(data.outlets_amount[k]["Total_Items"]);
                            JSONString.push(data.outlets_amount[k]["Total_In_Case"]);
                            JSONString.push(data.outlets_amount[k]["Qty_In_Price"]);
                            htmlBody +="<td style='text-align:center;'>"+data.outlets_amount[k]["Total_Items"]+"</td>";
                            htmlBody +="<td style='text-align:center;'>"+data.outlets_amount[k]["Total_In_Case"]+"</td>";
                            htmlBody +="<td style='text-align:center;'>"+data.outlets_amount[k]["Qty_In_Price"]+"</td>";
                            JSONData.push(JSONString);
                            //console.log(JSONString);
                            //console.log(JSONData);
                            htmlBody +="</tr>"
                            k++;
                        });
                        
                        

                        //$("table tbody").html(htmlBody);

                        
                        if(table != null) {
                            bDestroy = true;
                            table.destroy();
                            $("#OUTLET_ITEM").empty();
                        }
                        table = $("#OUTLET_ITEM").DataTable({
                           autoWidth: false,
                           data : JSONData ,
                           columns: JSONColumns,
                           displayLength: 10,
                           "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
                           //fixedColumns: true,
                           fixedColumns:   {
                                leftColumns: 8
                            },
                           order: [[ 0, 'asc' ]],
                            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                                console.log(aData);
                                if(aData[7]>0){
                                    $(nRow).css({'backgroundColor': 'green','color':'white'});
                                }
                            },
                            "bDestroy": bDestroy
                        });
                        
                        
                        /*table = new FixedColumns( oTable, {
                            "iLeftColumns": 1
                        });*/
                        $("#TOP001").remove();
                        $("#TOP002").remove();
                        $("table thead").prepend(headers);
                        $("table thead").prepend(topHeaders);
                        
                        //$("#OUTLET_ITEM").tableFreeze();
                        modal.hide();
                    },
                    error: function(data){
                        modal.hide();
                        console.log(data);
                    }
                });
            };

            function pad (str, max) {
                str = str.toString();
                return str.length < max ? pad("0" + str, max) : str;
            }
            
            $("#selectedSupervisorName").change(function(){
                excel.getAllProducts($("#selectedYear").val());
            });
            
            excel.getAllSupervisors = function(currentyear){
                $.ajax({
                    url: SITE_URL+'outletexcel/supervisors',
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        
                        $.each(data.supervisors, function(key, value){
                            console.log(value["id"]);
                        });
                    },
                    error: function(data){
                        modal.hide();
                        console.log(data);
                    }
                });
            };
            
            //excel.getAllSupervisors();
            excel.getAllProducts(currentYear);

            // TODO: WHEN CLICK ON THE BUTTON EXPORT EXCEL
            $("#btnExportExcel").click(function(){
                //location.href=SITE_URL+"outletexcel/outlet_items_excel/"+$("#selectYear").val();
                $("#data").val($("#EXCEL table").html());
                $("#supervisor_name").val($("#selectedSupervisorName").text());
                $("#year").val($("#selectedYear").text());
                $("#month").val($("#selectedMonth").text());
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
            $("#selectedYear").change(function(){
                excel.getAllProducts($(this).val());
            });
            
            // TODO: WHEN CLICK ON THE COMBO BOX MONTH
            $("#selectedMonth").change(function(){
                excel.getAllProducts($("#selectedYear").val());
            });
            
            // TODO: WHEN CLICK ON THE COMBO BOX WEEK
            $("#selectedWeek").change(function(){
                excel.getAllProducts($("#selectedYear").val());
            });
            
        });
    </script>
</body>
</html>