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

        <form action="#" id="productform">
        
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Add distributor</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                       
                        
                         <div class="uk-width-medium-1-2">
                         
                            <div class="uk-form-row">
                                <label>Code</label>
                                <input type="text" id="code" class="md-input"  required/>
                            </div>
                            
	                        <div class="uk-form-row">
	                                <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">Start Date</label>
                                        <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                    </div>
	                        </div>   
	                        
	                        <div class="uk-form-row">
	                            	<label>Type</label>
		                             
					 							<select id="selec_adv_2" name="selec_adv_2" multiple required>
					                                <option value="">Select email...</option>
					                            </select>
			                        
	                          </div>
	                          	  
                         </div> 
                            
                            
                           <div class="uk-width-medium-1-2">
                           
                           		 <div class="uk-form-row">
                              		  <label>Name</label>
                              		  <input type="text" id="code" class="md-input"  required/>
                            	</div>
                           	
                           		<div class="uk-form-row">
	                                <div class="uk-input-group">
                                        <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                                        <label for="uk_dp_1">End Date</label>
                                        <input class="md-input" type="text" id="uk_dp_1" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                                    </div>
	                         	 </div>  
	                         	 
	                         	 <div class="uk-form-row">
	                            		<label>Status</label><br/>
	                                   <div class="uk-width-medium-1-4">
				                            <input type="checkbox" data-switchery data-switchery-color="#1e88e5" checked id="switch_demo_primary" />
				                            <label for="switch_demo_primary" class="inline-label">Active</label>
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
                            	<a href="<?= site_url() ?>product" class="md-btn">Cancel</a>
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

    <!-- common functions -->
    <script src="<?php echo base_url()?>public/assets/js/common.min.js"></script>
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
    
    
    
    
</body>
</html>