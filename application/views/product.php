
<!-- main header -->
<?php $this->load->view('_include')?>
<!-- /main header end -->
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
	    <div id="page_heading">
            <h1 id="product_edit_name">PRODUCT MANAGEMENT</h1>
        </div>
		<div id="page_content_inner">
			<div class="md-card uk-margin-medium-bottom">
				<div class="md-card-content">
					<table id="to_table" class="uk-table" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Code</th>
								<th>Name</th>
								<th>Size</th>
								<th>Unit</th>
								<th>Brand</th>
								<th>Price</th>
								<!--<th>Promotion</th>-->
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
								<!--<th>Promotion</th>-->
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
								<!--<td><?= $v->promotion ?></td>-->
								<td>
									<a href="#" data-uk-tooltip="{pos:'left'}" title="Detail" id="btnView" data="<?php echo $v->id?>">
									<i class="material-icons">remove_red_eye </i></a> 
									<a href="#" data-uk-tooltip="{pos:'left'}" title="View Promotion" id="btnAddPromotion" data="<?php echo $v->id?>">
									<i class="material-icons">&#xE02F; </i></a>
									<a href="#" data-uk-tooltip="{pos:'left'}" title="Edit" id="btnUpdate" data="<?php echo $v->id?>">
									<i class="material-icons">edit </i></a>
									<a href="<?php  echo site_url('product/delete')?>/<?= $v->id ?>" onClick="return confirm('Do you want to delete?');" data-uk-tooltip="{pos:'left'}" title="Delete">
									<i class="material-icons">delete </i></a></td>
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

	<div>
		<div class="uk-modal" id="modalProduct">
			<div class="uk-modal-dialog uk-modal-dialog-large">
				<button type="button" class="uk-modal-close uk-close"></button>
				<div class="uk-modal-header">
					<h3 class="uk-modal-title">PRODUCT</h3>
				</div>
				<form action="#" class="uk-form-stacked" id="frmProduct" name="frmProduct"
					method="POST">
					<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-xLarge-12-12  uk-width-large-12-12">
							<div class="md-card1">
								<div class="md-card-content large-padding">
									<div class="uk-grid uk-grid-divider uk-grid-medium"
										data-uk-grid-margin>
										<div class="uk-width-large-1-2">
											<div class="uk-form-row">
												<label>Code <span class="req">*</span></label> <input
													type="text" id="code" class="md-input" required />
											</div>
											<div class="uk-form-row">
												<label>Size <span class="req">*</span></label> <input
													type="text" id="size" class="md-input" required />
											</div>
											<div class="uk-form-row">
												<label>Price <span class="req">*</span></label> <input
													type="text" id="price" class="md-input" required />
											</div>

											<div class="uk-form-row">
												<label>Unit <span class="req">*</span></label> <input
													type="text" id="unit" class="md-input" required />
											</div>
										</div>
										<div class="uk-width-large-1-2">
											<div class="uk-form-row">
												<label>Name <span class="req">*</span></label> <input
													type="text" id="name" class="md-input" required />
											</div>
											<!--<div class="uk-form-row">
												<label for="supervisor">Promotion</label> <select
													id="promotion" name="promotion" data-md-selectize
													data-md-selectize-bottom>
													<option></option>
				                                     <?php foreach ($lstPromotion as $v):?>
				                                            <option
														value="<?php echo $v->id;?>"><?php echo  $v->name;?></option>
				                                     <?php endforeach?>
				                                    </select>
											</div>-->
											<div class="uk-form-row">
												<label for="supervisor">Brand</label> <select id="brand"
													name="brand" data-md-selectize data-md-selectize-bottom>
													<option></option>
				                                     <?php foreach ($lstBrand as $v):?>
				                                            <option
														value="<?php echo $v->id;?>"><?php echo  $v->name;?></option>
				                                     <?php endforeach?>
				                                    </select>
											</div>
											<div class="uk-form-row">
												<div class="uk-width-1-1">
													<div class="uk-form-row">
														<label>Description</label>
														<textarea cols="30" rows="4" class="md-input"
															id="description"> </textarea>
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
						<input type="button" class="md-btn md-btn-primary" data=''
							id="btnUpdateSave" value="Update" style="display: none;" /> <input
							type="submit" class="md-btn md-btn-primary" id="btnSave"
							value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="md-fab-wrapper">
		<a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew"
			data-uk-modal="{target:'#modalProduct'}"> <i class="material-icons">&#xE145;</i>
		</a>
	</div>
	
	<div>
		<div class="uk-modal" id="modalPromotion">
			<div class="uk-modal-dialog uk-modal-dialog-large">
				<button type="button" class="uk-modal-close uk-close"></button>
				<div class="uk-modal-header">
					<h3 class="uk-modal-title">PROMOTION INFORMATION</h3>
				</div>
				<form action="#" class="uk-form-stacked" id="frmProduct" name="frmProduct"
					method="POST">
					<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-xLarge-12-12  uk-width-large-12-12">
							<div class="md-card1">
								<div class="md-card-content large-padding">
									<div class="uk-grid uk-grid-divider uk-grid-medium"
										data-uk-grid-margin>
										<div class="uk-width-large">
											<h4>PROMOTION LIST</h4>
											<table class="uk-table">
												<thead>
													<tr>
														<th>PROMOTION NAME</th>
														<th>BUY</th>
														<th>FREE</th>
														<th>START DATE</th>
														<th>END DATE</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody id="PROMOTIONS">
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-modal-footer uk-text-right">
						<button type="button" class="md-btn uk-modal-close">Close</button>
						<input type="button" class="md-btn md-btn-primary" id="btnAddNewPromotion" value="Add New"/> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="md-fab-wrapper">
		<a class="md-fab md-fab-primary" href="#" id="btnOpenAddNew"
			data-uk-modal="{target:'#modalProduct'}"> <i class="material-icons">&#xE145;</i>
		</a>
	</div>
	
	
	<div>
		<div class="uk-modal" id="modalAddNewPromotion">
			<div class="uk-modal-dialog uk-modal-dialog">
				<button type="button" class="uk-modal-close uk-close"></button>
				<div class="uk-modal-header">
					<h3 class="uk-modal-title"> + ADD NEW PROMOTION</h3>
				</div>
				<form action="#"  id="frmSaleTarget" class="uk-form-stacked" method="POST">
					<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-xLarge-12-12  uk-width-large-12-12">
							<div class="md-card1">
								<div class="md-card-content large-padding">
								<div class="uk-form-row" style="width: 100%;display: none" id="msgError" >
		                       		<div class="uk-alert uk-alert-danger" data-uk-alert="">
		                                <a href="#" class="uk-alert-close uk-close"></a>
		                            </div>
		                         </div>
									<div class="uk-grid uk-grid-divider uk-grid-medium" data-uk-grid-margin>
										<div class="uk-width-large">
											<div class="uk-form-row">
												<label for="supervisor">PROMOTION<span class="req">*</span></label>
												<select id="selectPromotions" name="selectPromotions" data-md-selectize data-md-selectize-bottom >
													<option>Please Choose the PROMOTION</option>
													<?php foreach ($promotions as $v):?>
			                                         <option value="<?php echo $v->id;?>"><?php echo  $v->name;?></option>
				                                     <?php endforeach?>
			                                    </select>
											</div>
											
											<div class="uk-form-row">
												<label>BUY<span class="req">*</span></label>
												<input class="md-input" type="text" id="BUY">
											</div>
											<div class="uk-form-row">
												<label>FREE<span class="req">*</span></label>
												<input class="md-input" type="text" id="FREE">
											</div>
											<div class="uk-form-row">
												<div class="uk-input-group">
													<label for="kUI_datepicker_a" class="uk-form-label">Start date<span class="req">*</span></label>
													<input id="start_date" required="required" />
												</div>
											</div>
											<div class="uk-form-row">
												<div class="uk-input-group">
													<label for="kUI_datepicker_a" class="uk-form-label">End date<span class="req">*</span></label>
													<input id="end_date" required="required"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="uk-modal-footer uk-text-right">
						<button type="button" id="btnCloseAddNewPromotion" class="md-btn uk-modal-close">Close</button>
						<input type="submit" class="md-btn md-btn-primary" id="btnSaveNewPromotion" value="Save" />
						<input type="submit" class="md-btn md-btn-primary" id="btnUpdateSavePromotion" value="Update" style="display:none;" />
					</div>
				</form>
			</div>
		</div>
	</div>

	<div>
		<div class="uk-modal" id="modalProductDetail">
			<div class="uk-modal-dialog uk-modal-dialog-large">
				<button type="button" class="uk-modal-close uk-close"></button>
				<div class="uk-modal-header">
					<h3 class="uk-modal-title">PRODUCT INFORMATION DETAILS</h3>
				</div>
				<form action="#" class="uk-form-stacked" id="frmProduct"
					method="POST">
					<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
						<div class="uk-width-xLarge-12-12  uk-width-large-12-12">
							<div class="md-card">
								<div class="md-card-toolbar">
									<h3 class="md-card-toolbar-heading-text">Details</h3>
								</div>
								<div class="md-card-content large-padding">
									<div class="uk-grid uk-grid-divider uk-grid-medium">
										<div class="uk-width-large-1-2">
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small" >Code</span>
												</div>
												<div class="uk-width-large-2-3">
													<span class="uk-text-large uk-text-middle" id="getCode">    </span>
												</div>
											</div>
											
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small" >Product Name</span>
												</div>
												<div class="uk-width-large-2-3">
													<span class="uk-text-large uk-text-middle" id="getProName">    </span>
												</div>
											</div>
											
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Price</span>
												</div>
												<div class="uk-width-large-2-3">
													<span class="uk-text-large uk-text-middle" id="getPrice"> </span>
												</div>
											</div>
											
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Size</span>
												</div>
												<div class="uk-width-large-2-3" id="geSize">  </div>
											</div>
											<hr class="uk-grid-divider">
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small" >Unit</span>
												</div>
												<div class="uk-width-large-2-3" id="getUnit">    </div>
											</div>
											
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Brand</span>
												</div>
												<div class="uk-width-large-2-3" id="getBrand"> </div>
											</div>
											
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Promotion</span>
												</div>
												<div class="uk-width-large-2-3" id="getPromotion">  </div>
											</div>
											
											
											<hr class="uk-grid-divider uk-hidden-large">
											
										</div>
										<div class="uk-width-large-1-2">
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Upload date</span>
												</div>
												<div class="uk-width-large-2-3" id="getCreateDate"> </div>
											</div>
											<hr class="uk-grid-divider">
											
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Upload by</span>
												</div>
												<div class="uk-width-large-2-3" id="getCreateBy"> </div>
											</div>
											<hr class="uk-grid-divider">
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Update date</span>
												</div>
												<div class="uk-width-large-2-3" id="getUpdateDate"> </div>
											</div>
											<hr class="uk-grid-divider">
											<div class="uk-grid uk-grid-small">
												<div class="uk-width-large-1-3">
													<span class="uk-text-muted uk-text-small">Update by</span>
												</div>
												<div class="uk-width-large-2-3" id="getUpdateBy"> </div>
											</div>
											<hr class="uk-grid-divider">
											<p>
												<span
													class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Description</span>
												<span id="getDescription"> 			</span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script id="CONTENT_TEMPLATE" type="text/x-jquery-tmpl">
		<tr>
			<td>{{= name}}</td>
			<td>{{= buy}}</td>
			<td>{{= free}}</td>
			<td>{{= start_date}}</td>
			<td>{{= end_date}}</td>
			<td>
				<a href="#" id="btnUpdatePromotion" data-uk-tooltip="{pos:'left}" data-promotionid="{{= promotion_id}}" data-productid="{{= product_id}}" title="EDIT PROMOTION">
				<i class="material-icons">edit </i></a>
				<a href="#" id="btnDeletePromotion" data-uk-tooltip="{pos:'left'}" data-promotionid="{{= promotion_id}}" data-productid="{{= product_id}}" title="DELETE PROMOTION">
				<i class="material-icons">delete </i></a>
			</td>
		</tr>
    </script>


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
	<script
		src="<?php echo base_url()?>public/bower_components/moment/min/moment.min.js"></script>

	<!-- common functions -->
	<script src="<?php echo base_url()?>public/assets/js/common.min.js"></script>
	<!-- uikit functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/uikit_custom.min.js"></script>
	<!-- altair common functions/helpers -->
	<script
		src="<?php echo base_url()?>public/assets/js/altair_admin_common.min.js"></script>

	<!-- page specific plugins -->
	<!-- datatables -->
	<script
		src="<?php echo base_url()?>public/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<!-- datatables colVis-->
	<script
		src="<?php echo base_url()?>public/bower_components/datatables-colvis/js/dataTables.colVis.js"></script>
	<!-- datatables tableTools-->
	<script
		src="<?php echo base_url()?>public/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
	<!-- datatables custom integration -->
	<script
		src="<?php echo base_url()?>public/assets/js/custom/datatables_uikit.min.js"></script>

	<!--  datatables functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/plugins_datatables.min.js"></script>
		
		<!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>

	<!-- enable hires images -->
	<script>
    	var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
        	$("#to_table").DataTable();
            altair_helpers.retina_images();
            $("#end_date,#start_date").kendoDatePicker({
            	  format: "dd-MM-yyyy"
           	});
        });
    </script>

	<script src="<?php echo base_url()?>public/assets/js/jquery.tmpl.min.js"></script>
	<script type="text/javascript" 	src="<?php echo base_url()?>public/scripts/product.js"></script>
	<script>
        var SITE_URL = '<?php echo site_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>