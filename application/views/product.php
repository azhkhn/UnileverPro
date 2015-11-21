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

            <h4 class="heading_a uk-margin-bottom">Brand</h4>
            
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_tableTools" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                        	<th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Unit</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Promotion</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                         <tr>
                        	<th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Unit</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Promotion</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        
                          <?php foreach ($product as $v) {?>
                        <tr>
                            <td><?= $v->id ?></td>
                            <td><?= $v->code ?></td>
                            <td><?= $v->name ?></td>
                            <td><?= $v->size ?></td>
                            <td><?= $v->unit ?></td>
                            <td><?= $v->brand ?></td>
                            <td><?= $v->price ?></td>
                            <td><?= $v->promotion ?></td>
                            <td>
                            	<a href="#" data-uk-tooltip="{pos:'left'}" title="Detail"><i class="material-icons">remove_red_eye</i></a>
                            	<a href="<?php  echo site_url('product/update')?>/<?= $v->id ?>" data-uk-tooltip="{pos:'left'}" title="Edit"><i class="material-icons">edit</i></a>
                            	<a href="<?php  echo site_url('product/delete')?>/<?= $v->id ?>" onClick="return confirm('Do you want to delete?');" data-uk-tooltip="{pos:'left'}" title="Delete"><i class="material-icons">delete</i></a>
                            </td>
                            </td>
                        </tr>
                         <?php } ?>
                        
                        
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
            altair_helpers.retina_images();
        });
    </script>

</body>
</html>