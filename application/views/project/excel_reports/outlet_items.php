        
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
    <?php $this->load->view('_leftside_project') ?>    
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
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-large-1-4">
                            <div class="uk-form-row">
                                <label for="selectedWeek">WEEK</label>
                                <select id="selectedWeek" name="selectedWeek" data-md-selectize data-md-selectize-bottom>
                                    <option value="">Please Choose Week</option>
                                    <option value="1">1st Week</option>
                                    <option value="2">2nd Week</option>
                                    <option value="3">3rd Week</option>
                                    <option value="4">4th Week</option>
                                    <option value="5">Total Week</option>
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
			var $selectedWeek = $("#selectedWeek").selectize();
			var selectedWeek = $selectedWeek[0].selectize;
			var date = moment().format("d");
			if(date<8){
			    selectedWeek.setValue(1); 
			}else if(date>=8 && date<15){
			    selectedWeek.setValue(2); 
            }else if(date>=15 && date<23){
			    selectedWeek.setValue(3); 
            }else{
                selectedWeek.setValue(4); 
            }
            excel.getAllProducts = function(year){
                var start_date = moment().date(1).format('YYYY-MM-DD');
                var end_date = moment().add('months', 1).date(0).format('YYYY-MM-DD');
                modal = UIkit.modal.blockUI("<div class='uk-text-center'>Processing...<br/><img class='uk-margin-top' src='"+SITE_URL+"public/assets/img/spinners/spinner.gif' alt=''"); 
                $.ajax({
                    url: SITE_URL+'outletexcel/outlet_items_ajax/'+ year,
                    type: "POST",
                    dataType: "JSON",
                    data : {
                        supervisor: $("#selectedSupervisorName").val(),
                        year: $("#selectedYear").val(),
                        month: $("#selectedMonth").val(),
                        week: $("#selectedWeek").val()
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
/*            var tableToExcel = (function () {
                var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><style type="text/css">    		table{border: 1px solid #e5e3e3;border-collapse:collapse}       		table td, table th{border: 1px solid #e5e3e3; width:100px; max-width:300px; overflow: hidden; font-size: 16px;}        		table th{background:#F5F5F5}         		tr{height:30px;}        		td, .text-center{text-align:center}        		table tr td:first-child + td + td{width:300px !important;}        	</style></head><body><table>{table}</table></body></html>'
                , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
                return function (table, name, filename) {
                    if (!table.nodeType) table = document.getElementById(table)
                    
                    var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML };

                    document.getElementById("dlink").href = uri + base64(format(template, ctx));
                    document.getElementById("dlink").download = filename;
                    document.getElementById("dlink").click();
        
                }
            })();*/
            
            /*var tablesToExcel = (function() {
                var uri = 'data:application/vnd.ms-excel;base64,'
                , tmplWorkbookXML = '<?xml version="1.0"?><?mso-application progid="Excel.Sheet"?><Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet" xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">'
                  + '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office"><Author>DARA PENHCHET</Author><Created>{created}</Created></DocumentProperties>'
                  + '<Styles>'
                  + '<Style ss:ID="Currency"><NumberFormat ss:Format="Currency"></NumberFormat></Style>'
                  + '<Style ss:ID="Date"><NumberFormat ss:Format="Medium Date"></NumberFormat></Style>'
                  + '</Styles>' 
                  + '{worksheets}</Workbook>'
                , tmplWorksheetXML = '<Worksheet ss:Name="{nameWS}"><Table>{rows}</Table></Worksheet>'
                , tmplCellXML = '<Cell{attributeStyleID}{attributeFormula}><Data ss:Type="{nameType}">{data}</Data></Cell>'
                , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
                return function(tables, wsnames, wbname, appname) {
                  var ctx = "";
                  var workbookXML = "";
                  var worksheetsXML = "";
                  var rowsXML = "";
            
                  for (var i = 0; i < tables.length; i++) {
                    if (!tables[i].nodeType) tables[i] = document.getElementById(tables[i]);
                    for (var j = 0; j < tables[i].rows.length; j++) {
                      rowsXML += '<Row>'
                      for (var k = 0; k < tables[i].rows[j].cells.length; k++) {
                        var dataType = tables[i].rows[j].cells[k].getAttribute("data-type");
                        var dataStyle = tables[i].rows[j].cells[k].getAttribute("data-style");
                        var dataValue = tables[i].rows[j].cells[k].getAttribute("data-value");
                        dataValue = (dataValue)?dataValue:tables[i].rows[j].cells[k].innerHTML;
                        var dataFormula = tables[i].rows[j].cells[k].getAttribute("data-formula");
                        dataFormula = (dataFormula)?dataFormula:(appname=='Calc' && dataType=='DateTime')?dataValue:null;
                        ctx = {  attributeStyleID: (dataStyle=='Currency' || dataStyle=='Date')?' ss:StyleID="'+dataStyle+'"':''
                               , nameType: (dataType=='Number' || dataType=='DateTime' || dataType=='Boolean' || dataType=='Error')?dataType:'String'
                               , data: (dataFormula)?'':dataValue
                               , attributeFormula: (dataFormula)?' ss:Formula="'+dataFormula+'"':''
                              };
                        rowsXML += format(tmplCellXML, ctx);
                      }
                      rowsXML += '</Row>'
                    }
                    ctx = {rows: rowsXML, nameWS: wsnames[i] || 'Sheet' + i};
                    worksheetsXML += format(tmplWorksheetXML, ctx);
                    rowsXML = "";
                  }
            
                  ctx = {created: (new Date()).getTime(), worksheets: worksheetsXML};
                  workbookXML = format(tmplWorkbookXML, ctx);
            
            //console.log(workbookXML);
            
                  var link = document.createElement("A");
                  link.href = uri + base64(workbookXML);
                  link.download = wbname || 'Workbook.xls';
                  link.target = '_blank';
                  document.body.appendChild(link);
                  link.click();
                  document.body.removeChild(link);
                }
          })();*/
          
          var tablesToExcel = (function () {
            var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><style type="text/css">		table{border: 1px solid #e5e3e3;border-collapse:collapse}        		table td, table th{border: 1px solid #e5e3e3; width:100px; max-width:300px; overflow: hidden; font-size: 16px;}        		table th{background:#F5F5F5}         		tr{height:30px;}        		td, .text-center{text-align:center}        		table tr td:first-child + td + td{width:300px !important;}        	</style><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>'
            , templateend = '</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head>'
            , body = '<body>'
            , tablevar = '<table>{table'
            , tablevarend = '}</table>'
            , bodyend = '</body></html>'
            , worksheet = '<x:ExcelWorksheet><x:Name>'
            , worksheetend = '</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>'
            , worksheetvar = '{worksheet'
            , worksheetvarend = '}'
            , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            , wstemplate = ''
            , tabletemplate = '';
        
            return function (table, name, filename) {
                var tables = table;
        
                for (var i = 0; i < tables.length; ++i) {
                    wstemplate += worksheet + worksheetvar + i + worksheetvarend + worksheetend;
                    tabletemplate += tablevar + i + tablevarend;
                }
        
                var allTemplate = template + wstemplate + templateend;
                var allWorksheet = body + tabletemplate + bodyend;
                var allOfIt = allTemplate + allWorksheet;
        
                var ctx = {};
                for (var j = 0; j < tables.length; ++j) {
                    ctx['worksheet' + j] = name[j];
                }
        
                for (var k = 0; k < tables.length; ++k) {
                    var exceltable;
                    if (!tables[k].nodeType) exceltable = document.getElementById(tables[k]);
                    ctx['table' + k] = exceltable.innerHTML;
                }
        
                //document.getElementById("dlink").href = uri + base64(format(allOfIt, ctx));
                //document.getElementById("dlink").download = filename;
                //document.getElementById("dlink").click();
        
                //console.log(ctx);
                //window.location.href = uri + base64(format(allOfIt, ctx));
                
                workbookXML = format(allOfIt, ctx);         
                var link = document.createElement("A");
                  link.href = uri + base64(workbookXML);
                  link.download = filename || 'Workbook.xls';
                  link.target = '_blank';
                  document.body.appendChild(link);
                  link.click();
                  document.body.removeChild(link);
            }
        })();
    </script>
</body>
</html>