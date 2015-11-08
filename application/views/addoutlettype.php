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

        <form action="#" id="outlettypeform">
        
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Add Outlettype</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                       
                      
                            
                           <div class="uk-width-medium-1-1">
                           
                                 <div class="uk-form-row">
                                      <label>Name</label>
                                      <input type="text" id="name" class="md-input"  required/>
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
                                <a href="<?= site_url() ?>outlettype" class="md-btn">Cancel</a>
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
           <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
            ?>
                $("#name").val('<?php echo $data->name ?>');
                $("#name").focus();
                $("#description").val('<?php echo $data->description ?>');
                editid = <?php echo $data->id ?> ;
            <?php } ?>
            $("#btnsubmit").val("Update");
            $(".heading_a").text("Update Outlettype");
            $("#outlettypeform").submit(function(e){
                e.preventDefault();
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                $.ajax({
                    url : "<?php echo site_url()?>outlettype/updatepro/"+ editid,
                    method: "POST",
                    data: {
                        name : $("#name").val(),
                        description : $("#description").val()
                    },
                    success : function(data){
                        modal.hide();
                        location.href="<?php echo site_url()?>outlettype";
                    }
                });

            });

            <?php }else{ ?>

                $("#outlettypeform").submit(function(e){
                    e.preventDefault();
                     modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                    $.ajax({
                        url : "<?php echo site_url()?>outlettype/addingpro",
                        method: "POST",
                        data: {
                            name : $("#name").val(),
                            description : $("#description").val()
                        },
                        success : function(data){
                            modal.hide();
                            location.href="<?php echo site_url()?>outlettype";
                        }
                    });

                });


            <?php } ?>
        });
    </script>
    
    
    
    
</body>
</html>