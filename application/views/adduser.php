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

            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Input fields</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                             <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                             <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                             <div class="uk-form-row">
                            	<label>Label</label>
	                            <select id="select_demo_1" data-md-selectize>
	                                	<option value="">Select...</option>
	                                    <option value="a">Item A</option>
	                                    <option value="b">Item B</option>
	                                    <option value="c">Item C</option>
	                            </select>
                       		 </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                             <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                             <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                             <div class="uk-form-row">
                                <label>Label</label>
                                <input type="text" class="md-input"  />
                            </div>
                            <div class="uk-form-row">
                            		<label>Label</label><br/>
                                    <span class="icheck-inline">
                                        <div class="iradio_md"><input type="radio" name="radio_demo_inline" id="radio_demo_inline_1" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                        <label for="radio_demo_inline_1" class="inline-label">Mercury</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <div class="iradio_md"><input type="radio" name="radio_demo_inline" id="radio_demo_inline_2" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                        <label for="radio_demo_inline_2" class="inline-label">Venus</label>
                                    </span>
                                    <span class="icheck-inline">
                                        <div class="iradio_md"><input type="radio" name="radio_demo_inline" id="radio_demo_inline_3" data-md-icheck="" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                        <label for="radio_demo_inline_3" class="inline-label">Earth</label>
                                    </span>
                                    
                                    
                             </div>
                           
                        </div>
                    </div>
                    
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div class="uk-form-row">
                                <label>Label</label>
                                <textarea cols="30" rows="4" class="md-input"> </textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-12 uk-width-medium-1-2">
                            <div class="uk-input-group">
                            	<input type="button" class="md-btn"  value="Cancel"/>
                               <input type="button" class="md-btn md-btn-primary" value="Save"/>
                            </div>
                        </div>
                    </div>
                    
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

    <!-- enable hires images -->
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
        $(function() {
            altair_helpers.retina_images();
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>