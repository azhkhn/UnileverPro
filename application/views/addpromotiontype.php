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
        <div id="page_heading">
            <h1 id="product_edit_name">PROMOTION TYPE MANAGEMENT</h1>
        </div>
        <div id="page_content_inner">
        <form action="#" id="promotiontypeform">
        
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                         <div class="uk-width-medium-1-2">
                         
                            <div class="uk-form-row">
                                <label>Code</label>
                                <input type="text" id="code" class="md-input"  required/>
                            </div>  
                         </div> 
                           <div class="uk-width-medium-1-2">
                           
                           		 <div class="uk-form-row">
                              		  <label>Name</label>
                              		  <input type="text" id="name" class="md-input"  required/>
                            	</div>
                            </div>
                        </div>	  	 
                   <br/>
                   <!-- <div class="uk-grid" data-uk-grid-margin>
                       <div class="uk-width-1-2">
                            <div class="uk-form-row">
                                <label>Size</label>
                               <input type="text" id="size" class="md-input"  required/>
                            </div>
                        </div>
                         <div class="uk-width-1-2">
                            <div class="uk-form-row">
                               <label>Sale Promotion</label>
                               <select id="selectSalePromotion" name="type" data-md-selectize data-md-selectize-bottom required>
                                    <option value="">Sale Promotion</option>
                                    <?php foreach ($sale_promotions as $v):?>
                                        <option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
                                     <?php endforeach?>                                    
                               </select>
                            </div>
                        </div>
                       
                    </div>-->
                   

                   <br/>
                            
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-12 uk-width-medium-1-2">
                            <div class="uk-input-group">
                            	<a href="<?= site_url() ?>promotiontype" class="md-btn">Cancel</a>
                               <input type="submit" class="md-btn md-btn-primary" value="Save" id="btnsubmit"/>
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
           <?php if(isset($getpro)) {?>
                $("#code").val("<?php echo $getpro->code ?>");
                $("#name").val("<?php echo $getpro->name ?>");
                $("#size").val("<?php echo $getpro->size ?>");
                $("#selectSalePromotion").val("<?php echo $getpro->sale_promotion_id ?>");                
                $("#size").focus();
                $("#name").focus();
                $("#code").focus();
                editid = <?php echo $getpro->id ?> ;
            $("#btnsubmit").val("Update");
            $(".heading_a").text("Update Promotiontype");
            $("#promotiontypeform").submit(function(e){
                e.preventDefault();
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                $.ajax({
                    url : "<?php echo site_url()?>promotiontype/updatepro/"+ editid,
                    method: "POST",
                    data: {
                        code : $("#code").val(),
                        name : $("#name").val(),
                        size : $("#size").val(),
                        sale_promotion_id : $("#selectSalePromotion").val()
                    },
                    success : function(data){
                        modal.hide();
                        location.href="<?php echo site_url()?>promotiontype";
                    }
                });

            });

            <?php }else{ ?>

                $("#promotiontypeform").submit(function(e){
                    e.preventDefault();
                     modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                    $.ajax({
                        url : "<?php echo site_url()?>promotiontype/addingpro",
                        method: "POST",
                        data: {
                           code : $("#code").val(),
                           name : $("#name").val(),
                           size : $("#size").val(),
                           sale_promotion_id : $("#selectSalePromotion").val()
                        },
                        success : function(data){
                            modal.hide();
                            location.href="<?php echo site_url()?>promotiontype";
                        }
                    });

                });

            <?php } ?>
        });
    </script>
    <script>
        var SITE_URL = '<?php echo site_url(); ?>';
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>public/scripts/changeuserpassword.js"></script>
</body>
</html>