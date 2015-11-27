
<!-- kendo UI -->
<link rel="stylesheet"
	href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css" />
<link rel="stylesheet"
	href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css" />


<!-- main header -->
<?php $this->load->view('_include')?>
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

			<form name="productform" action="<?php  echo site_url('product/addproduct')?>" id="productform">

				<div class="md-card">
					<div class="md-card-content">
						<h3 class="heading_a">Add product</h3>
						<div class="uk-grid" data-uk-grid-margin>


							<div class="uk-width-medium-1-2">

								<div class="uk-form-row">
									<label>Code</label> <input type="text" id="code"
										class="md-input" required />
										
										<input type="hidden" id="id" />
								</div>
								
								
								
								<div class="uk-form-row">
									<label>Size </label> <input type="text" id="size"
										class="md-input" required />
								</div>
								
								<div class="uk-form-row">
									<label>Promotion</label>
									<div class="uk-form-row">
										<input id=promotion name="promotion" class="uk-form-width-medium" />
									</div>
								</div>
								
								<div class="uk-form-row">
									<label>Brand</label>
									<div class="uk-form-row">
										<input id=brand name="type" class="uk-form-width-medium" />
									</div>
								</div>
								

							</div>

							<div class="uk-width-medium-1-2">

								<div class="uk-form-row">
									<label>Name </label> <input type="text" id="name"
										class="md-input" required />
								</div>

								<div class="uk-form-row">
									<label>Price </label> <input type="text" id="price"
										class="md-input" required />
								</div>

								<div class="uk-form-row">
									<label>Unit </label> <input type="text" id="unit"
										class="md-input" required />
								</div>




							</div>


						</div>



						<br />

						<div class="uk-form-row">
							<div class="uk-width-1-1">
								<div class="uk-form-row">
									<label>Description</label>
									<textarea cols="30" rows="4" class="md-input" id="description"> </textarea>
								</div>
							</div>
						</div>

						<br />

						<div class="uk-grid" data-uk-grid-margin>
							<div class="uk-width-large-1-12 uk-width-medium-1-2">
								<div class="uk-input-group">
									<a href="<?= site_url() ?>product" class="md-btn">Cancel</a> <input
										type="submit" class="md-btn md-btn-primary" value="Save" />
								</div>
							</div>
						</div>

					</div>
				</div>

			</form>

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
	<!-- ionrangeslider -->
	<script
		src="<?php echo base_url()?>public/bower_components/ionrangeslider/js/ion.rangeSlider.min.js"></script>
	<!-- htmleditor (codeMirror) -->
	<script
		src="<?php echo base_url()?>public/assets/js/uikit_htmleditor_custom.min.js"></script>
	<!-- inputmask-->
	<script
		src="<?php echo base_url()?>public/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>

	<!--  forms advanced functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/forms_advanced.min.js"></script>

	<!-- enable hires images -->
	<script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
    
    <!-- page specific plugins -->
	<!-- kendo UI -->
	<script
		src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

	<!--  kendoui functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>

	<!--  notifications functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/components_notifications.min.js"></script>

	<script type="text/javascript">
	      $(document).ready(function() {
	        $("#promotion").kendoComboBox({
	          placeholder: "Select Beauty agent",
	          dataTextField: "name",
	          dataValueField: "id",
	          filter: "contains",
	          autoBind: false,
	          minLength: 3,
	          dataSource: {
	            type: "odata",
	            serverFiltering: true,
	            transport: {
	              read: {
	                url: "<?php  echo site_url('product/listPromotionJson')?>",
	              }
	            }
	          },
	          change: function(e) {
	            var widget = e.sender;
	            if (widget.value() && widget.select() === -1) {
	              //custom has been selected
	              widget.value(""); //reset widget
	            }
	          }
	        });

	        $("#brand").kendoComboBox({
		          placeholder: "Select Beauty agent",
		          dataTextField: "name",
		          dataValueField: "id",
		          filter: "contains",
		          autoBind: false,
		          minLength: 3,
		          dataSource: {
		            type: "odata",
		            serverFiltering: true,
		            transport: {
		              read: {
		                url: "<?php  echo site_url('product/listBrandJson')?>",
		              }
		            }
		          },
		          change: function(e) {
		            var widget = e.sender;
		            if (widget.value() && widget.select() === -1) {
		              //custom has been selected
		              widget.value(""); //reset widget
		            }
		          }
		        });
	      });
	</script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>

<script type="text/javascript">
		$(function(){
			 $("#productform").submit(function(event) {
			    event.preventDefault();
			    alert($.trim($("#code").val()));
			    console.log($("#productform").attr("action"));
			    modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
				$.ajax({
					type: "POST",
					url: $("#productform").attr("action"),
					dataType: 'json',
					data: {
						id			   	     : $.trim($("#id").val()),
						code			   	 : $.trim($("#code").val()),
						size			   	 : $.trim($("#size").val()),
						promotion			 : $.trim($("#promotion").val()),
						brand			   	 : $.trim($("#brand").val()),
						name		         : $.trim($("#name").val()),
						price				 : $.trim($("#price").val()),
						unit		         : $.trim($("#unit").val()),
						description		     : $.trim($("#description").val())
					},success: function(data){
						modal.hide();
						console.log(data);
						//location.href= "<?php  //echo site_url('production')?>";	
						
					},
					error: function(data){
						modal.hide();
						console.log("ERROR" + data );
					}
				});
				
			 });
			 		<?php
						if(isset($geProduct)){
							foreach($geProduct as $v){
							?>
							console.log("update");
							document.title= "Edit Product";
							$("#id").focus().val("<?php echo $v->id?>");
							$("#code").focus().val("<?php echo $v->code?>");
							$("#size").focus().val("<?php echo $v->size?>");
							$("#promotion").focus().val("<?php echo $v->promotion?>");
							$("#brand").focus().val("<?php echo $v->brand?>");
							$("#name").focus().val("<?php echo $v->name?>");
							$("#price").focus().val("<?php echo $v->price?>");
							$("#unit").focus().val("<?php echo $v->unit?>");
							$("#description").focus().val("<?php echo $v->description ?>");
							document.productform.action="<?php echo site_url('product/updateProduct')?>";
							document.title = "Edit Promotion";
							<?php
							 }
						}
					 ?>	

					

					 	 
					 
		});
	</script>
	<script>
        var SITE_URL = '<?php echo site_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>