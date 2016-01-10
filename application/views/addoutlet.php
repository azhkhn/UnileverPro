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
                            <!-- <div class="uk-form-row">
                                <label>Distributor</label>
                                <div class="uk-form-row">
                                     <input id="distributorid"  class="uk-form-width-medium"  />
                                </div>
                            </div> -->
                            
                            <div class="uk-form-row">
                								<label for="supervisor">Distributor</label>
                								<div class="uk-form-row">
                                     <input id="distributorid" name="distributorid" class="uk-form-width-medium"  />
                                </div>
							             </div>
                            
                            
                            
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>Channels</label>
                                <div class="uk-form-row">
                                     <input id="channelid"  class="uk-form-width-medium"  />
                                </div>
                            </div> 
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>Outlet Type</label>
                                <div class="uk-form-row">
                                     <input id="outlettypeid"  class="uk-form-width-medium"  />
                                </div>
                            </div> 
                        </div>
                        <div class="uk-width-medium-1-4">                             
                            <div class="uk-form-row">
                                <label>Choose BA</label>
                                <div class="uk-form-row">
                                     <input id="baid"  class="uk-form-width-medium"  />
                                </div>
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
    
    <!-- kendo UI -->
    <script src="<?php echo base_url()?>public/assets/js/kendoui.custom.min.js"></script>

    <!--  kendoui functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/kendoui.min.js"></script>
    <!-- enable hires images -->
        <script type="text/javascript">
          $(document).ready(function() {
            $("#distributorid").kendoComboBox({
              placeholder: "Select Distributor",
              dataTextField: "name",
              dataValueField: "id",
              filter: "contains",
              autoBind: true,
              minLength: 3,
              <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
                ?>
                index : <?php echo $data->distributor?> ,
                <?php }  }?>
              dataSource: {
                type: "odata",
                serverFiltering: true,
                transport: {
                  read: {
                    url: "<?php  echo site_url('outlet/listdistributorjson')?>",
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


            //Channel
            $("#channelid").kendoComboBox({
              placeholder: "Select Channel",
              dataTextField: "name",
              dataValueField: "id",
              filter: "contains",
              autoBind: true,
              minLength: 3,
              <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
                ?>
                index : <?php echo $data->channel_id?> ,
                <?php }  }?>
              dataSource: {
                type: "odata",
                serverFiltering: true,
                transport: {
                  read: {
                    url: "<?php  echo site_url('outlet/listchanneljson')?>",
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



            //OutletType
            $("#outlettypeid").kendoComboBox({
              placeholder: "Select OutletType",
              dataTextField: "name",
              dataValueField: "id",
              filter: "contains",
              autoBind: true,
              minLength: 3,
               <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
                ?>
                index : <?php echo $data->outlet_type_id?> ,
                <?php }  }?>

              dataSource: {
                type: "odata",
                serverFiltering: true,
                transport: {
                  read: {
                    url: "<?php  echo site_url('outlet/listoutlettypejson')?>",
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


            //BA
            $("#baid").kendoComboBox({
              placeholder: "Select BA",
              dataTextField: "first_name",
              dataValueField: "ba_id",
              filter: "contains",
              autoBind: true,
              minLength: 3,
               <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
                ?>
                index : <?php echo $data->ba_id?> ,
                <?php }  }?>

              dataSource: {
                type: "odata",
                serverFiltering: true,
                transport: {
                  read: {
                    url: "<?php  echo site_url('outlet/listbajson')?>",
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
      <script>
        $(function() {
           altair_helpers.retina_images();
           <?php if(isset($getpro)) { 
                foreach ($getpro as $data ) {
            ?>
                $("#dms_code").val("<?php echo $data->dms_code ?>");
                $("#name").val("<?php echo $data->name ?>");
                $("#name").focus();
                $("#dms_code").focus();
                $("#address").val("<?php echo $data->address ?>");
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
                            distributor : $("#distributorid").val(),
                            channel_id : $("#channelid").val(),
                            outlet_type_id : $("#outlettypeid").val(),
                            name : $("#name").val(),
                            address : $("#address").val(),
                            ba_id : $("#baid").val()
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
                            distributor : $("#distributorid").val(),
                            channel_id : $("#channelid").val(),
                            outlet_type_id : $("#outlettypeid").val(),
                            name : $("#name").val(),
                            address : $("#address").val(),
                            ba_id : $("#baid").val()
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