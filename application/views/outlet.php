	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->

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
            <h1 id="product_edit_name">OUTLET MANAGEMENT</h1>
        </div>
        <div id="page_content_inner">            
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="vu-table" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                         <tr>
                            <th>No</th>
                            <th>DMS Code</th>
                            <th>Name</th>
                            <th>Channel</th>
                            <th>Distributor</th>
                            <th>Customer Type</th>
                            <th>BA Name</th>
                            <th>Address</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                         <tr>
                            <th>No</th>
                            <th>DMS Code</th>
                            <th>Name</th>
                            <th>Channel</th>
                            <th>Distributor</th>
                            <th>Customer Type</th>
                            <th>BA Name</th>
                            <th>Address</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                   <?php foreach ($lists as $data ) {
                       # code...
                    ?>  
                        <tr>
                            <td><?php echo $data->id ?></td>
                            <td><?php echo $data->dms_code ?></td>
                            <td><?php echo $data->outlet_name ?></td>
                            <td><?php echo $data->channel ?></td>
                            <td><?php echo $data->distributor ?></td>
                            <td><?php echo $data->customer_type ?></td>
                            <td><?php echo $data->ba_name ?></td>
                            <td><?php echo $data->outlet_address ?></td>
                            <td><?php echo $data->created_date ?></td>
                            <td>
                                <input type="checkbox" id="btnStatus" data="<?php echo $data->id?>" data-switchery data-switchery-color="#1e88e5" <?php echo ($data->status==1)?"checked":""?> <?php echo ($data->status==1)?" value='on'":" value='off'"?>/>
                            </td>
                            <td>
                                <a href="<?php echo site_url()?>outlet/getpro/<?php echo $data->id ?>" data-uk-tooltip="{pos:'left'}" title="Edit"><i class="material-icons">edit</i></a>
                                <!--<a href="#" data-uk-tooltip="{pos:'left'}" title="View BA" id="btnAddBA" data="<?php echo $data->id?>">
                                <i class="material-icons">&#xE02F; </i></a>-->
                                <a href="#" data-id="<?php echo $data->id ?>" id="btnDelete" data-uk-tooltip="{pos:'left'}" title="Delete"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                     
                     <?php  } ?>    
                        
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- right sidebar -->
    <?php $this->load->view('_rightside') ?>    
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
        $(function() {
            $("#vu-table").DataTable();
            altair_helpers.retina_images();
        });
    </script>
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/outlet.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>