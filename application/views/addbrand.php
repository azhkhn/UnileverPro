	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->

	<!-- kendo UI -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css"/>
	

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

        <form action="<?php  echo site_url('brand/addBrand')?>" id="frmAddBrand" method="post" >
        
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Input fields</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                       
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="md-input"  required/>
                            </div>
                             
                             <div class="uk-form-row">
                            	<label>Parent Brand</label>
                                <div class="uk-form-row">
     								 <input id="parentid"  class="uk-form-width-medium"  />
                                </div>
                            </div> 
                        </div>
                    </div>
                      <br/>
                     	 <div class="uk-form-row">
                               <div class="uk-width-1-1">
		                            <div class="uk-form-row">
		                                <label>Description</label>
		                                <textarea cols="30" rows="4" class="md-input" id="description"> </textarea>
		                            </div>
		                        </div>
                            </div>
                            
                            <br/>
                            
                            
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-12 uk-width-medium-1-2">
                            <div class="uk-input-group">
                            	<a href="<?= site_url() ?>brand" class="md-btn"  v>Cancel</a>
                               <input type="submit" class="md-btn md-btn-primary" value="Save"/>
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
    <script src="<?php echo base_url()?>public/bower_components/moment/min/moment.min.js"></script>
	
    <!-- uikit functions -->
    <script src="<?php echo base_url()?>public/assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="<?php echo base_url()?>public/assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
    <!-- ionrangeslider -->
    <script src="<?php echo base_url()?>public/bower_components/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <!-- htmleditor (codeMirror) -->
    <script src="<?php echo base_url()?>public/assets/js/uikit_htmleditor_custom.min.js"></script>
    <!-- inputmask-->
    <script src="<?php echo base_url()?>public/bower_components/jquery.inputmask/dist/jquery.inputmask.bundle.min.js"></script>

    <!--  forms advanced functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/forms_advanced.min.js"></script>
   
    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
   
   
    <!-- page specific plugins -->
    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    	
    <script type="text/javascript">
	      $(document).ready(function() {
	        $("#parentid").kendoComboBox({
	          placeholder: "Select parent brand",
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
	   
    <script type="text/javascript">
	 var action = "inserted";
	$(function(){
		 $("form#frmAddBrand11").submit(function(event) {
			    event.preventDefault();
			    alert(1);
// 			var json = {
// 				"name" : $(".parent_id").val();
// 			}
// 			alert(json);
		 	$("#frmWaiting").modal('show');
			$.ajax({
				type: "POST",
				url: $("form#frmAddBrand").attr("action"),
				dataType: 'json',
				data: {
					name			   	 : $.trim($("#name").val()),
					parent_brand	     : $.trim($("#selec_adv_2").val()),
					description		     : $.trim($("#description").val())
				},success: function(){
					console.log("SUCCESS");
//  						$("#getTxt").html("<h5>You have been "+action+" successfully.</h5>");
// 						setTimeout(function(){ 
				//			location.href= "<?php  // echo site_url('admin/brand')?>";
//  							$("#frmWaiting").modal('hide');
// 						}, 1000);
						
				},
				error: function(data){
					console.log("ERROR");
// 					$("#frmWaiting").modal('hide');
				}
			});
		

		});

	});
	</script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript">
		$(function(){
			 $("form#frmAddBrand").submit(function(event) {
			    event.preventDefault();
				$.ajax({
					type: "POST",
					url: $("form#frmAddBrand").attr("action"),
					dataType: 'json',
					data: {
						name			   	 : $.trim($("#name").val()),
						parent_brand	     : $.trim($("#parentid").val()),
						description		     : $.trim($("#description").val())
					},success: function(data){
						console.log("SUCCESS" );
					},
					error: function(data){
						console.log("ERROR" , data.a);
					}
				});
				
			 });
		});
	</script>


    
    
  
</body>
</html>