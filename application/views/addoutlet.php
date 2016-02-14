	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->
    <!-- kendo UI -->
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>public/bower_components/kendo-ui-core/styles/kendo.material.min.css"/>
    
     <!-- common functions -->
    <script src="<?php echo base_url()?>public/assets/js/common.min.js"></script>
    
</head>
<body>
   
     <!--  header -->
	<?php $this->load->view('_header') ?>  
     <!-- / header end -->
    
    <!-- left side bar -->
	<?php $this->load->view('_leftside') ?>    
    <!-- /left side bar -->
    

    <div id="page_content">
        <div id="page_heading">
            <h1 id="product_edit_name">OUTLET MANAGEMENT</h1>
        </div>
        <div id="page_content_inner">
        <form action="#" id="outletform">
            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <label>DMS Code</label>
                                <input type="text" id="dms_code" class="md-input"  required/>
                            </div>
                        </div>
                        
                        <div class="uk-width-medium-1-2">
                        
                        	<div class="uk-form-row">
                                <label>Name</label>
                                <input type="text"  id="name" class="md-input"  required/>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
								<label for="supervisor">Distributor</label>
								<div class="uk-form-row">
                                  <select id="selectedDT" name="selectedDT" data-md-selectize data-md-selectize-bottom>
                                    <option value="">PLEASE SELECT Distributor</option>                                          
                                    <?php foreach ($distributors as $distributor):?>
                                        <option value="<?php echo $distributor->id;?>"><?php echo $distributor->name; ?></option>
                                    <?php endforeach?>
                                  </select>
                                </div>
							             </div>
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>Channels</label>
                                <select id="selectedCN" name="selectedCN" data-md-selectize data-md-selectize-bottom>
                                    <option value="">PLEASE SELECT Channel</option>
                                    <?php foreach ($channels as $channel):?>
                                        <option value="<?php echo $channel->id;?>"><?php echo $channel->name; ?></option>
                                    <?php endforeach?>                                          
                                </select>
                            </div> 
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>Customer Type</label>
                                <select id="selectedCT" name="selectedCT" data-md-selectize data-md-selectize-bottom>
                                  <option value="">PLEASE SELECT Customer Type</option> 
                                  <?php foreach ($outlettypes as $outlettype):?>
                                      <option value="<?php echo $outlettype->id;?>"><?php echo $outlettype->name; ?></option>
                                  <?php endforeach?>                                           
                                </select>
                            </div> 
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>BA</label>
                                <select id="selectedBA" name="selectedBA" data-md-selectize data-md-selectize-bottom>
                                    <option value="">PLEASE SELECT BA</option>
                                    <?php foreach ($bas as $ba):?>
                                      <option value="<?php echo $ba->ba_id;?>"><?php echo $ba->name; ?></option>
                                  <?php endforeach?>                                          
                                </select>
                            </div> 
                        </div>
                    </div>
                      <br/>
                     	 <div class="uk-form-row">
                           <div class="uk-width-1-1">
                            <div class="uk-form-row">
                                <label>Address</label>
                                <textarea cols="30" rows="4" class="md-input" id="address"> </textarea>
                            </div>
                        </div>
                        </div>
                        <br/>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-large-1-12 uk-width-medium-1-2">
                            <div class="uk-input-group">
                            	<a href="<?= site_url() ?>outlet" class="md-btn"  v>Cancel</a>
                               <input type="submit" class="md-btn md-btn-primary" value="Save" id="btnsubmit"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </form>  
        </div>
    </div>
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
    
    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    <!-- enable hires images -->
      <script>
        $(function() {
           altair_helpers.retina_images();
           <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
            ?>
                $("#dms_code").val("<?php echo $data->dms_code ?>");
                $("#name").val("<?php echo $data->name ?>");
                $('.md-input-wrapper').addClass('md-input-filled');
                $("#address").val("<?php echo $data->address ?>");
                var $selectedDT = $("#selectedDT").selectize();
                var selectedDT = $selectedDT[0].selectize;
                selectedDT.setValue("<?php echo $data->distributor ?>");
                var $selectedCN = $("#selectedCN").selectize();
                var selectedCN = $selectedCN[0].selectize;
                selectedCN.setValue("<?php echo $data->channel_id ?>");
                var $selectedCT = $("#selectedCT").selectize();
                var selectedCT = $selectedCT[0].selectize;
                selectedCT.setValue("<?php echo $data->outlet_type_id ?>");
                var $selectedBA = $("#selectedBA").selectize();
                var selectedBA = $selectedBA[0].selectize;
                selectedBA.setValue("<?php echo $data->ba_id ?>");
                editid = <?php echo $data->id ?> ;

            <?php } ?>
            $("#btnsubmit").val("Update");
            $(".heading_a").text("Update Outlet");
            $("#outletform").submit(function(e){
                e.preventDefault();
                modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                $.ajax({
                    url : "<?php echo site_url()?>outlet/updatepro/"+ editid,
                    method: "POST",
                    data: {
                            dms_code : $("#dms_code").val(),
                            distributor : $("#selectedDT").val(),
                            channel_id : $("#selectedCN").val(),
                            outlet_type_id : $("#selectedCT").val(),
                            name : $("#name").val(),
                            address : $("#address").val(),
                            ba_id : $("#selectedBA").val()
                    },
                    success : function(data){
                        modal.hide();
                        location.href="<?php echo site_url()?>outlet";
                    }
                });

            });

            <?php }else{ ?>

                $("#outletform").submit(function(e){
                    e.preventDefault();
                     modal = UIkit.modal.blockUI('<div class=\'uk-text-center\'>Processing...<br/><img class=\'uk-margin-top\' src=\'<?php echo base_url()?>public/assets/img/spinners/spinner.gif\' alt=\'\'>'); 
                    $.ajax({
                        url : "<?php echo site_url()?>outlet/addingpro",
                        method: "POST",
                        data: {
                            dms_code : $("#dms_code").val(),
                            distributor : $("#selectedDT").val(),
                            channel_id : $("#selectedCN").val(),
                            outlet_type_id : $("#selectedCT").val(),
                            name : $("#name").val(),
                            address : $("#address").val(),
                            ba_id : $("#selectedBA").val()
                        },
                        success : function(data){
                            modal.hide();
                            location.href="<?php echo site_url()?>outlet";
                        }
                    });

                });


            <?php } ?>
        });
    </script>
</body>
</html>