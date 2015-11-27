
<!-- main header -->
<?php $this->load->view('_include')?>
<!-- /main header end -->
<!-- kendo UI -->
<link rel="stylesheet"
	href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css" />
<link rel="stylesheet"
	href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css" />

<!-- common functions -->
<script src="<?php echo base_url()?>public/assets/js/common.min.js"></script>
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

			<form action="<?php  echo site_url('salepromotion/addsalepromotion')?>"
				name="frmSalepromotion" id="frmSalepromotion" method="post">

				<div class="md-card">
					<div class="md-card-content">
						<h3 class="heading_a">Add sale promotion</h3>
						
						<div class="uk-form-row" style="width: 100%;display: none" id="msgError" >
                       		<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#"  class="uk-alert-close uk-close"></a>
                                <span id="msg">Name has already existed.</span>
                            </div>
                        </div>
                        
                        
						<div class="uk-grid" data-uk-grid-margin>


							<div class="uk-width-medium-1-2">

								<div class="uk-form-row">
									<label>Code</label> 
									
									<input type="text" id="code" name="code"	class="md-input" required />


									<input type="hidden" id="id" name="id"  placeholder="id"  />
									<input type="hidden" id="oldname" name="oldname"  placeholder="old name"  />
									<input type="hidden" id="oldcode" name="oldcode"  placeholder="old code"  />
									
								</div>

								<div class="uk-form-row">
									<label>Name</label> <input type="text" id="name" name="name"
										class="md-input" required />
								</div>



								<div class="uk-form-row">
									<label>Type</label>
									<div class="uk-form-row">
										<input id=type name="type" class="uk-form-width-medium" />
									</div>
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


							<div class="uk-width-medium-1-2">

								<div class="uk-form-row">
									<div class="uk-input-group">
										<span class="uk-input-group-addon"><i
											class="uk-input-group-icon uk-icon-calendar"></i></span> <label
											for="uk_dp_1">Start Date</label> <input class="md-input"
											type="text" id="start_date" name="start_date" 
											data-uk-datepicker="{format:'YYYY-MM-DD'}">
									</div>
								</div>
								<div class="uk-form-row">
									<div class="uk-input-group">
										<span class="uk-input-group-addon"><i
											class="uk-input-group-icon uk-icon-calendar"></i></span> <label
											for="uk_dp_1">End Date</label> <input class="md-input"  name="end_date" 
											type="text" id="end_date"
											data-uk-datepicker="{format:'YYYY-MM-DD'}">
									</div>
								</div>


							</div>


						</div>



						<br /> <br />

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

	<!-- kendo UI -->
	<script
		src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

	<!--  kendoui functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>

	<!--  notifications functions -->
	<script
		src="<?php echo base_url()?>public/assets/js/pages/components_notifications.min.js"></script>

	<!-- enable hires images -->
	<script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

	<script type="text/javascript">
	      $(document).ready(function() {
	        $("#type").kendoComboBox({
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
	                url: "<?php  echo site_url('brand/listBrandJson')?>",
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
			 $("#frmSalepromotion").submit(function(event) {
			    event.preventDefault();
			    alert($.trim($("#code").val()));
			    console.log($("#frmSalepromotion").attr("action"));
			    modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
				$.ajax({
					type: "POST",
					url: $("#frmSalepromotion").attr("action"),
					dataType: 'json',
					data: {
						id			   	     : $.trim($("#id").val()),
						code			   	 : $.trim($("#code").val()),
						name			   	 : $.trim($("#name").val()),
						oldname			   	 : $.trim($("#oldname").val()),
						oldcode			   	 : $.trim($("#oldcode").val()),
						description		     : $.trim($("#description").val()),
						type				 : $.trim($("#type").val()),
						start_date		     : $.trim($("#start_date").val()),
						end_date		     : $.trim($("#end_date").val())
					},success: function(data){
						console.log(data);
						if(data["ERROR"]==true){
							console.log(data["ERR_MSG"]);
							modal.hide();
							if(data["FIELD"] == "CODE"){
								$("#msg").text("Code has already existed.");
								$("#code").css('border-color','red').focus();
							}else if(data["FIELD"] == "NAME"){
								$("#msg").text("Name has already existed.");
								$("#name").css('border-color','red').focus();
							}else{
								$("#msg").text("Name and code have already existed.");
								$("#name").css('border-color','red').focus();
								$("#code").css('border-color','red').focus();
							}
							$("#msgError").fadeIn(2500);
						}else{
							modal.hide();
							console.log(data);
							//location.href= "<?php  //echo site_url('salepromotion')?>";	
						}
					},
					error: function(data){
						modal.hide();
						console.log("ERROR" + data );
					}
				});
				
			 });


		 		
			 		<?php
						if(isset($salepromotion)){
							foreach($salepromotion as $v){
							?>
							console.log("update");
							document.title= "Edit Sale Target";
							$("#id").focus().val("<?php echo $v->id?>");
							$("#code").focus().val("<?php echo $v->code?>");
							$("#name").focus().val("<?php echo $v->name?>");
							$("#oldname").focus().val("<?php echo $v->name?>");
							$("#oldcode").focus().val("<?php echo $v->code?>");
							$("#type").focus().val("<?php echo $v->type?>");
							$("#start_date").focus().val("<?php echo $v->start_date?>");
							$("#end_date").focus().val("<?php echo $v->end_date?>");
							$("#description").focus().val("<?php echo $v->description ?>");
							document.frmSalepromotion.action="<?php echo site_url('salepromotion/updateSalePromotion')?>";
							document.title = "Edit Sale Promotion";
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