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

            <div class="uk-width-medium-8-10 uk-container-center reset-print">
                <div class="uk-grid uk-grid-collapse" data-uk-grid-margin>
                    <div class="uk-width-large-7-10">
                        <div class="md-card md-card-single main-print" id="invoice">
                            <div id="invoice_preview"></div>
                            <div id="invoice_form"></div>
                        </div>
                    </div>
                    <div class="uk-width-large-3-10 hidden-print uk-visible-large">
                        <div class="md-list-outside-wrapper">
                            <ul class="md-list md-list-outside invoices_list" id="invoices_list">
                                <li class="heading_list">July 2015</li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 17/2015 <span class="uk-text-small uk-text-muted">(19 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Feest-Volkman</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 25/2015 <span class="uk-text-small uk-text-muted">(18 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Hoeger PLC</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="uk-badge uk-badge-danger">Overdue</span>
                                        <span class="md-list-heading uk-text-truncate">Invoice 19/2015 <span class="uk-text-small uk-text-muted">(17 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Jacobi, Graham and Quigley</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 150/2015 <span class="uk-text-small uk-text-muted">(16 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Anderson, Kautzer and Smith</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 100/2015 <span class="uk-text-small uk-text-muted">(15 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Roob-Ruecker</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 43/2015 <span class="uk-text-small uk-text-muted">(14 Jul)</span></span>
                                        <span class="uk-text-small uk-text-muted">Gutmann Group</span>
                                    </a>
                                </li>
                    
                                <li class="heading_list">Oldest</li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 198/2015 <span class="uk-text-small uk-text-muted">(10 Jun)</span></span>
                                        <span class="uk-text-small uk-text-muted">Jacobi-Lehner</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 172/2015 <span class="uk-text-small uk-text-muted">(2 Jun)</span></span>
                                        <span class="uk-text-small uk-text-muted">Steuber Group</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 88/2015 <span class="uk-text-small uk-text-muted">(27 May)</span></span>
                                        <span class="uk-text-small uk-text-muted">Kemmer, Pfannerstill and Mante</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="uk-badge uk-badge-danger">Overdue</span>
                                        <span class="md-list-heading uk-text-truncate">Invoice 30/2015 <span class="uk-text-small uk-text-muted">(20 Feb)</span></span>
                                        <span class="uk-text-small uk-text-muted">Renner Inc</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 35/2015 <span class="uk-text-small uk-text-muted">(28 May)</span></span>
                                        <span class="uk-text-small uk-text-muted">Cremin-Abshire</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 104/2015 <span class="uk-text-small uk-text-muted">(5 May)</span></span>
                                        <span class="uk-text-small uk-text-muted">Koch, Eichmann and Waters</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="uk-badge uk-badge-danger">Overdue</span>
                                        <span class="md-list-heading uk-text-truncate">Invoice 176/2015 <span class="uk-text-small uk-text-muted">(7 Apr)</span></span>
                                        <span class="uk-text-small uk-text-muted">Zboncak Ltd</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 59/2015 <span class="uk-text-small uk-text-muted">(11 Apr)</span></span>
                                        <span class="uk-text-small uk-text-muted">Wilkinson-Mraz</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 164/2015 <span class="uk-text-small uk-text-muted">(18 Jun)</span></span>
                                        <span class="uk-text-small uk-text-muted">Armstrong LLC</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 51/2015 <span class="uk-text-small uk-text-muted">(2 Mar)</span></span>
                                        <span class="uk-text-small uk-text-muted">Funk, O'Hara and Goldner</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 22/2015 <span class="uk-text-small uk-text-muted">(18 May)</span></span>
                                        <span class="uk-text-small uk-text-muted">Bradtke-Kuhlman</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 181/2015 <span class="uk-text-small uk-text-muted">(10 Jun)</span></span>
                                        <span class="uk-text-small uk-text-muted">Langosh-Kozey</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 192/2015 <span class="uk-text-small uk-text-muted">(9 Jun)</span></span>
                                        <span class="uk-text-small uk-text-muted">Nikolaus-Heller</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="md-list-content" data-invoice-id="1">
                                        <span class="md-list-heading uk-text-truncate">Invoice 144/2015 <span class="uk-text-small uk-text-muted">(14 Apr)</span></span>
                                        <span class="uk-text-small uk-text-muted">Schmidt Ltd</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-success" href="#" id="invoice_add">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

    <div id="sidebar_secondary">
        <div class="sidebar_secondary_wrapper uk-margin-remove"></div>
    </div>

    <script id="invoice_template" type="text/x-handlebars-template">
        <div class="md-card-toolbar">
            <div class="md-card-toolbar-actions hidden-print">
                <i class="md-icon material-icons" id="invoice_print">&#xE8ad;</i>
                <div class="md-card-dropdown" data-uk-dropdown>
                    <i class="md-icon material-icons">&#xE5D4;</i>
                    <div class="uk-dropdown uk-dropdown-flip uk-dropdown-small">
                        <ul class="uk-nav">
                            <li><a href="#">Archive</a></li>
                            <li><a href="#" class="uk-text-danger">Remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="md-card-toolbar-heading-text large" id="invoice_name">
                Invoice {{invoice_id.invoice_number}}
            </h3>
        </div>
        <div class="md-card-content">
            <div class="uk-margin-medium-bottom">
                <span class="uk-text-muted uk-text-small uk-text-italic">Date:</span> {{invoice_id.invoice_date}}
                <br/>
                <span class="uk-text-muted uk-text-small uk-text-italic">Due Date:</span> {{invoice_id.invoice_due_date}}
            </div>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-small-3-5">
                    <div class="uk-margin-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">From:</span>
                        <address>
                            <p><strong>{{invoice_id.invoice_from_company}}</strong></p>
                            <p>{{invoice_id.invoice_from_address_1}}</p>
                            <p>{{invoice_id.invoice_from_address_2}}</p>
                        </address>
                    </div>
                    <div class="uk-margin-medium-bottom">
                        <span class="uk-text-muted uk-text-small uk-text-italic">To:</span>
                        <address>
                            <p><strong>{{invoice_id.invoice_to_company}}</strong></p>
                            <p>{{invoice_id.invoice_to_address_1}}</p>
                            <p>{{invoice_id.invoice_to_address_2}}</p>
                        </address>
                    </div>
                </div>
                <div class="uk-width-small-2-5">
                    <span class="uk-text-muted uk-text-small uk-text-italic">Total:</span>
                    <p class="heading_b uk-text-success">{{invoice_id.invoice_total_value}}</p>
                    <p class="uk-text-small uk-text-muted uk-margin-top-remove">Incl. VAT - {{invoice_id.invoice_vat_value}}</p>
                </div>
            </div>
            <div class="uk-grid uk-margin-large-bottom">
                <div class="uk-width-1-1">
                    <table class="uk-table">
                        <thead>
                        <tr class="uk-text-upper">
                            <th>Description</th>
                            <th>Rate</th>
                            <th class="uk-text-center">Hours</th>
                            <th class="uk-text-center">Vat</th>
                            <th class="uk-text-center">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{#each invoice_id.invoice_services}}
                            <tr class="uk-table-middle">
                                <td>
                                    <span class="uk-text-large">{{ service_name }}</span><br/>
                                    <span class="uk-text-muted uk-text-small">{{ service_description }}</span>
                                </td>
                                <td>
                                    {{ service_rate }}
                                </td>
                                <td class="uk-text-center">
                                    {{ service_hours }}
                                </td>
                                <td class="uk-text-center">
                                    {{ service_vat }}
                                </td>
                                <td class="uk-text-center">
                                    {{ service_total }}
                                </td>
                            </tr>
                        {{/each}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <span class="uk-text-muted uk-text-small uk-text-italic">Payment to:</span>
                    <p class="uk-margin-top-remove">
                        {{{ invoice_id.invoice_payment_info }}}
                    </p>
                    <p class="uk-text-small">Please pay within {{ invoice_id.invoice_payment_due }} days</p>
                </div>
            </div>
        </div>
    </script>

    <script id="invoice_form_template" type="text/x-handlebars-template">
        <form action="" class="uk-form-stacked">
            <div class="md-card-toolbar">
                <div class="md-card-toolbar-actions">
                    <i class="md-icon material-icons">&#xE161;</i>
                </div>
                <input name="invoice_number" id="invoice_number" class="md-card-toolbar-input" type="text" value="" placeholder="Invoice number" />
            </div>
            <div class="md-card-content large-padding">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label" for="hobbies">Issue date:</label>
                        <div class="uk-input-group">
                            <span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
                            <label for="invoice_dp">Select date</label>
                            <input class="md-input" type="text" id="invoice_dp" value="" data-uk-datepicker="{format:'DD.MM.YYYY'}">
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label uk-margin-bottom" for="hobbies">Due date (days):</label>
                        <span class="icheck-inline">
                            <input type="radio" name="invoice_due_date" id="invoice_due_date_7" data-md-icheck />
                            <label for="invoice_due_date_7" class="inline-label">7</label>
                        </span>
                        <span class="icheck-inline">
                            <input type="radio" name="invoice_due_date" id="invoice_due_date_14" data-md-icheck />
                            <label for="invoice_due_date_14" class="inline-label">14</label>
                        </span>
                        <span class="icheck-inline">
                            <input type="radio" name="invoice_due_date" id="invoice_due_date_21" data-md-icheck />
                            <label for="invoice_due_date_21" class="inline-label">21</label>
                        </span>
                    </div>
                </div>
                <div class="uk-grid uk-grid-divider grid-block" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label uk-margin-bottom" for="hobbies">From:</label>
                        <div class="uk-form-row">
                            <label for="invoice_from_company">Company Name</label>
                            <input type="text" class="md-input" id="invoice_from_company" name="invoice_from_company"/>
                        </div>
                        <div class="uk-form-row">
                            <label for="invoice_from_address_1">Address 1</label>
                            <input type="text" class="md-input" id="invoice_from_address_1" name="invoice_from_address_1" />
                        </div>
                        <div class="uk-form-row">
                            <label for="invoice_from_address_2">Address 2</label>
                            <input type="text" class="md-input" id="invoice_from_address_2" name="invoice_from_address_2" />
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label class="uk-form-label uk-margin-bottom" for="hobbies">To:</label>
                        <div class="uk-form-row">
                            <label for="invoice_to_company">Company Name</label>
                            <input type="text" class="md-input" id="invoice_to_company" name="invoice_to_company"/>
                        </div>
                        <div class="uk-form-row">
                            <label for="invoice_to_address_1">Address 1</label>
                            <input type="text" class="md-input" id="invoice_to_address_1" name="invoice_to_address_1" />
                        </div>
                        <div class="uk-form-row">
                            <label for="invoice_to_address_2">Address 2</label>
                            <input type="text" class="md-input" id="invoice_to_address_2" name="invoice_to_address_2" />
                        </div>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1">
                        <div id="form_invoice_services"></div>
                        <div class="uk-text-center uk-margin-medium-top uk-margin-bottom">
                            <a href="#" class="md-btn md-btn-flat md-btn-flat-primary" id="invoice_form_append_service_btn">Add new</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </script>
    <script id="invoice_form_template_services" type="text/x-handlebars-template">
        {{#ifCond invoice_service_id '!==' 1}}
        <hr class="md-hr"/>
        {{/ifCond}}
        <div class="uk-grid" data-uk-grid-margin data-service-number="{{invoice_service_id}}">
            <div class="uk-width-medium-1-10 uk-text-center">
                <p class="uk-text-large">{{invoice_service_id}}.</p>
            </div>
            <div class="uk-width-medium-9-10">
                <div class="uk-grid uk-grid-small" data-uk-grid-margin>
                    <div class="uk-width-medium-5-10">
                        <label for="inv_service_{{invoice_service_id}}">Service Name</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}" name="inv_service_id_{{invoice_service_id}}" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_rate">Rate</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_rate" name="inv_service_{{invoice_service_id}}_rate" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_hours">Hours</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_hours" name="inv_service_{{invoice_service_id}}_hours" />
                    </div>
                    <div class="uk-width-medium-1-10">
                        <label for="inv_service_{{invoice_service_id}}_vat">VAT</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" />
                    </div>
                    <div class="uk-width-medium-2-10">
                        <label for="inv_service_{{invoice_service_id}}_vat">Total</label>
                        <input type="text" class="md-input" id="inv_service_{{invoice_service_id}}_vat" name="inv_service_{{invoice_service_id}}_vat" readonly/>
                    </div>
                </div>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <label for="inv_service_{{invoice_service_id}}_desc">Description</label>
                        <textarea class="md-input" id="inv_service_{{invoice_service_id}}_desc" name="invoice_service_id_{{invoice_service_id}}_desc" cols="30" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </script>

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
    <!-- handlebars.js -->
    <script src="<?php echo base_url()?>public/bower_components/handlebars/handlebars.min.js"></script>
    <script src="<?php echo base_url()?>public/assets/js/custom/handlebars_helpers.min.js"></script>

    <!--  invoices functions -->
    <script src="<?php echo base_url()?>public/assets/js/pages/page_invoices.min.js"></script>
    
    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

</body>
</html>