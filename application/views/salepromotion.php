	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->
     
      <!-- kendo UI -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css"/>

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

            <h4 class="heading_a uk-margin-bottom">Sale Promotion</h4>
            
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="to-table" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                         <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        
                        <?php foreach ($salepromotion as $v) {?>
                        <tr>
                            <td><?= $v->id ?></td>
                            <td><?= $v->code ?></td>
                            <td><?= $v->name ?></td>
                            <td><?= $v->type ?></td>
                            <td><?= $v->start_date ?></td>
                            <td><?= $v->end_date ?></td>
                            <td>
                            	<a href="#" data-uk-tooltip="{pos:'left'}" title="Detail"><i class="material-icons">remove_red_eye</i></a>
                            	<a href="#" id="btnUpdate" data="<?php echo $v->id?>" data-uk-tooltip="{pos:'left'}" title="Edit"><i class="material-icons">edit</i></a>
                            	<a href="<?php  echo site_url('salepromotion/delete')?>/<?= $v->id ?>" onClick="return confirm('Do you want to delete?');" data-uk-tooltip="{pos:'left'}" title="Delete"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                         <?php } ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



<div>
		<div class="uk-modal" id="modalSalePromotion">
			<div class="uk-modal-dialog uk-modal-dialog">
				<button type="button" class="uk-modal-close uk-close"></button>
				<div class="uk-modal-header">
					<h3 class="uk-modal-title"> + Sale Promotion</h3>
				</div>
				
				<form action="#"  id="frmSalePromotion" class="uk-form-stacked" method="POST">
					<div class="uk-grid uk-grid-medium" data-uk-grid-margin>

						<div class="uk-width-xLarge-12-12  uk-width-large-12-12">
							<div class="md-card1">


								<div class="md-card-content large-padding">

									
								<div class="uk-form-row" style="width: 100%;display: none" id="msgError" >
		                       		<div class="uk-alert uk-alert-danger" data-uk-alert="">
		                                <a href="#"  class="uk-alert-close uk-close"></a>
		                                <span id="msg">Name has already existed.</span>
		                            </div>
		                        </div>

									<div class="uk-grid uk-grid-divider uk-grid-medium"
										data-uk-grid-margin>

										<div class="uk-width-large">
											
											<div class="uk-form-row">
												<label>Code <span class="req">*</span></label> 
												
												<input type="text" id="code" name="code"	class="md-input" required />
			
												<input type="hidden" id="oldname" name="oldname"  placeholder="old name"  />
												<input type="hidden" id="oldcode" name="oldcode"  placeholder="old code"  />
											</div>
			
											<div class="uk-form-row">
												<label>Name <span class="req">*</span></label> 
												<input type="text" id="name" name="name" class="md-input" required />
											</div>
											
											<div class="uk-form-row">
												<label for="type">Type  <span class="req">*</span></label>
												<select id="type" name="type" data-md-selectize
													data-md-selectize-bottom required>
				                                     <?php foreach ($lstType as $v):?>
				                                            <option
														value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
				                                     <?php endforeach?>
				                                    </select>
											</div>
											
											
											<div class="uk-grid uk-grid-medium uk-form-row">
												<div class="uk-width-medium-1-2">
														<div class="uk-input-group">
															<label for="kUI_datepicker_a" class="uk-form-label">Start date <span class="req">*</span></label>
															<input id="start_date" required="required" />
														</div>
												</div>
												<div class="uk-width-medium-1-2">
														<div class="uk-input-group">
															<label for="kUI_datepicker_a" class="uk-form-label">End date <span class="req">*</span></label>
															<input id="end_date" required="required"/>
														</div>
												</div>
												
											</div>
											
											<div class="uk-form-row">
												<div class="uk-width-1-1">
													<div class="uk-form-row">
														<label>Description</label>
														<textarea cols="30" rows="1" class="md-input" name="description"  id="description"> </textarea>
													</div>
												</div>
											</div>
											
											
											
											
											
											
											
											
											
											

										</div>


									</div>


								</div>





							</div>
						</div>
					</div>
					<div class="uk-modal-footer uk-text-right">
						<button type="button" class="md-btn uk-modal-close">Close</button>
						<input type="button" class="md-btn md-btn-primary" data='' id="btnUpdateSave" value="Update" style="display: none;" /> 
						<input type="submit" class="md-btn md-btn-primary" id="btnSave" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>






	<div class="md-fab-wrapper">
		<a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew"
			data-uk-modal="{target:'#modalSalePromotion'}"> <i
			class="material-icons">&#xE145;</i>
		</a>
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
    
    <!-- page specific plugins -->
    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    
    <!-- enable hires images -->
    <script>
    	var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            altair_helpers.retina_images();
            $("#to-table").DataTable();
            $("#end_date,#start_date").kendoDatePicker({
            	  format: "yyyy-MM-dd"
           	});
        });
    </script>
    
     <script type="text/javascript" src="<?php echo base_url()?>public/scripts/salepromotion.js"></script>
    

</body>
</html>