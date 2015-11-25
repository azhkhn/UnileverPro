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

        
        
        <form action="<?php  echo site_url('brand/updateBrand')?>" id="frmUpdateBrand" method="post" >
        
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Edit Brand</h3>
                    
                   		<div class="uk-form-row" style="width: 80%;display: none" id="msgError" >
                       		<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                Brand name has already existed.
                            </div>
                        </div>
                        
                        <div class="uk-form-row" style="width: 80%;display: none" id="msgSUCCESS" >
                       		<div class="uk-alert uk-alert-success" data-uk-alert="">
                                <a href="#" class="uk-alert-close uk-close"></a>
                                Brand was updated successfully!
                            </div>
                        </div>
                        
                        
                    
                    <div class="uk-grid" data-uk-grid-margin>
                       
                       
                        
                        <br/><br/>
                       
                       
                         	
                            
                        <div class="uk-width-medium-1-2">
                        
                            <div class="uk-form-row">
                                <label>Brand name</label>
                                <input type="text" id="name" name="name" class="md-input"  required/>
                                <input type="hidden" id="id" name="id"  placeholder="id" required/>
                                <input type="hidden" id="oldname" name="oldname"  placeholder="Old Brand name" required/>
                            </div>
                             
                             <div class="uk-form-row">
                                     <label for="supervisor" >Parent Brand<span class="req">*</span></label>
                                     <select id="parentid" name="parentid" data-md-selectize data-md-selectize-bottom required>
                                     <?php foreach ($lstBrand as $brand1):?>
                                            <option value="<?php echo $brand1->id;?>"><?php echo $brand1->id . ' '. $brand1->name;?></option>
                                     <?php endforeach?>
                                    </select>
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
    	
   <!--  notifications functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/components_notifications.min.js"></script>
   
   
	   
   

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript">
		$(function(){
				var $selectBrand = $("#parentid").selectize();
				var selecttBrand = $selectBrand[0].selectize;
			 		<?php
						if($brand != null ){
							foreach($brand as $v){
							?>
							document.title= "Edit Brand";
							$("#id").focus().val("<?php echo $v->id?>");
							$("#name").focus().val("<?php echo $v->name?>");
							$("#oldname").focus().val("<?php echo $v->name?>");
							selecttBrand.setValue(<?php echo $v->parent_brand?>); 
							console.log("ID : " + <?php echo $v->parent_brand?>);
							$("#description").focus().val("<?php echo $v->description ?>");
							<?php
							 }
						}
					 ?>		 

					 $("#frmUpdateBrand").submit(function(event) {
						    event.preventDefault();
						    console.log("Update");
						    modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>');
						    $.ajax({
								type: "POST",
								url: $("form#frmUpdateBrand").attr("action"),
								dataType: 'json',
								data: {
									id					 : $.trim($("#id").val()),
									name			   	 : $.trim($("#name").val()),
									oldname			   	 : $.trim($("#oldname").val()),
									parent_brand	     : $.trim($("#parentid").val()),
									description		     : $.trim($("#description").val())
								},success: function(data){
									console.log(data);
									if(data["ERROR"]==true){
										console.log(data["ERR_MSG"]);
										modal.hide();
										$("#name").css('border-color','red');
										$("#msgError").fadeIn(2500);
									}else{
										console.log(data["ERR_MSG"]);
										location.href= "<?php   echo site_url('brand')?>";	
// 										$("#msgSUCCESS").fadeIn(2500).fadeOut(3000);
// 										setTimeout(function(){
// 							 			}, 5000);
									}
								},
								error: function(data){
									modal.hide();
									console.log("ERROR" + data);
								}
							});
							
					});	 
		});
	</script>


     					
    
  
</body>
</html>