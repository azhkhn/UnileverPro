	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->

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

            <h4 class="heading_a uk-margin-bottom">Distributor</h4>
            
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="vu-table" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                         <tr>
                           	<th>No</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Created By</th>
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
                            <td><?php echo $data->name ?></td>
                            <td><?php echo $data->created_date ?></td>
                            <td><?php echo $data->created_by ?></td>
                            <td>
                            	<input type="checkbox" data-switchery data-switchery-color="#1e88e5" <?php if($data->status){echo "checked";}else{echo "";} ?>/>
			                    <label for="switch_demo_primary" class="inline-label">Active</label>
			                </td>
                            <td>
                            	<a href="<?php echo site_url()?>distributor/getpro/<?php echo $data->id ?>" data-uk-tooltip="{pos:'left'}" title="Edit"><i class="md-icon material-icons">edit</i></a>
                            	<a href="<?php echo site_url()?>distributor/deletepro/<?php echo $data->id ?>" onclick="return confirm('Do you want to delete?');" data-uk-tooltip="{pos:'left'}" title="Delete"><i class="md-icon material-icons">delete</i></a>
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
        var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            $("#vu-table").DataTable();
           altair_helpers.retina_images();
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>