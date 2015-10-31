		
	<!-- main header -->
	<?php $this->load->view('_include') ?>  
     <!-- /main header end -->
     
		<!-- additional styles for plugins -->
        <!-- weather icons -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/weather-icons/css/weather-icons.min.css') ?>" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/metrics-graphics/dist/metricsgraphics.css')?>">
        <!-- c3.js (charts) -->
        <link rel="stylesheet" href="<?php echo base_url('public/bower_components/c3js-chart/c3.min.css')?>">
        

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
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-4-10">
                            <label for="product_search_name">Full Name</label>
                            <input type="text" class="md-input" id="product_search_name">
                        </div>
<!--                        <div class="uk-width-medium-1-10">
                            <div class="uk-margin-small-top">
                                <select id="product_search_status" data-md-selectize multiple data-md-selectize-bottom>
                                    <option value="">Gender</option>
                                    <option value="1">Female</option>
                                    <option value="2">Male</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="uk-width-medium-3-10">
                            <div class="uk-margin-small-top">
                                <select id="product_search_status" data-md-selectize multiple data-md-selectize-bottom>
                                    <option value="">Group</option>
                                    <option value="1">BEAUTY AGENT</option>
                                    <option value="2">SUPERVISOR</option>
                                    <option value="3">BA's EXECUTIVE</option>
                                    <option value="4">PROJECT HOLDER</option>
                                </select>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-10">
                            <div class="uk-margin-top uk-text-nowrap">
                                <input type="checkbox" name="product_search_active" id="product_search_active" data-md-icheck/>
                                <label for="product_search_active" class="inline-label">Active</label>
                            </div>
                        </div>
                        <div class="uk-width-medium-2-10 uk-text-center">
                            <a href="#" class="md-btn md-btn-primary uk-margin-small-top">Filter</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card">
                <div class="md-card-content">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-1-1">
                            <div class="uk-overflow-container">
                                <table class="uk-table">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Telephone</th>
                                            <th>Group</th>
                                            <th>Status</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach ($users as $user):?>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_2.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html"><?php echo $user->last_name . ' '. $user->first_name ?></a></td>
                                            <td class="uk-text-nowrap">Female</td>
                                            <td><?php echo $user->email ?></td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-info"><?php echo $user->phone ?></span></td>
                                			<td>
												<?php foreach ($user->groups as $group):?>
													<?php echo $group->name;?><br />
								                <?php endforeach?>
											</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-success">Active</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                       	<?php endforeach;?>
<!--                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_2.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Necessitatibus aliquam modi adipisci.</a></td>
                                            <td class="uk-text-nowrap">$ 507.00</td>
                                            <td>32</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-muted">Ships in 3-5 days</span></td>
                                            <td><i class="material-icons uk-text-success md-24">&#xE834;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_3.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Quia rerum fugit.</a></td>
                                            <td class="uk-text-nowrap">$ 595.00</td>
                                            <td>65</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-success">In stock</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_3.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Omnis autem magni a.</a></td>
                                            <td class="uk-text-nowrap">$ 496.00</td>
                                            <td>77</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-muted">Ships in 3-5 days</span></td>
                                            <td><i class="material-icons uk-text-success md-24">&#xE834;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Vel officia et repudiandae.</a></td>
                                            <td class="uk-text-nowrap">$ 550.00</td>
                                            <td>14</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-danger">Out of stock</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Odio at itaque.</a></td>
                                            <td class="uk-text-nowrap">$ 529.00</td>
                                            <td>73</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-success">In stock</span></td>
                                            <td><i class="material-icons uk-text-success md-24">&#xE834;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Ullam voluptatibus nostrum.</a></td>
                                            <td class="uk-text-nowrap">$ 456.00</td>
                                            <td>64</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-danger">Out of stock</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Dolor quia nulla.</a></td>
                                            <td class="uk-text-nowrap">$ 526.00</td>
                                            <td>65</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-success">In stock</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Quas nihil in quas.</a></td>
                                            <td class="uk-text-nowrap">$ 523.00</td>
                                            <td>75</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-danger">Out of stock</span></td>
                                            <td><i class="material-icons uk-text-success md-24">&#xE834;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img class="img_thumb" src="<?php echo base_url()?>public/assets/img/ecommerce/s6_edge_1.jpg" alt=""></td>
                                            <td class="uk-text-large uk-text-nowrap"><a href="ecommerce_product_details.html">Enim ut voluptas.</a></td>
                                            <td class="uk-text-nowrap">$ 598.00</td>
                                            <td>83</td>
                                            <td class="uk-text-nowrap"><span class="uk-badge uk-badge-success">In stock</span></td>
                                            <td><i class="material-icons uk-text-muted md-24">&#xE835;</i></td>
                                            <td class="uk-text-nowrap">
                                                <a href="ecommerce_product_details.html"><i class="material-icons md-24">&#xE8F4;</i></a>
                                                <a href="#"><i class="material-icons md-24">&#xE872;</i></a>
                                            </td>
                                        </tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <ul class="uk-pagination uk-margin-medium-top uk-margin-medium-bottom">
                                <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
                                <li class="uk-active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><span>&hellip;</span></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

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


    <!-- enable hires images -->
    <script>
        $(function() {
            altair_helpers.retina_images();
        });
    </script>

</body>
</html>