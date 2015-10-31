<?php $this->load->view('_include'); ?>
<!-- BEGIN CUSTOMIZATION STYLE -->

<!-- END CUSTOMIZATION STYLE -->
</head>
<!-- END HEAD TAG -->

<body class="stretched">

    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- BEGIN HEADER -->
        <?php $this->load->view('_header');?>
        <!-- END HEADER -->


        <section id="slider" class="slider-parallax full-screen dark error404-wrap">

            <div class="container vertical-middle center clearfix">

                <div class="error404">404</div>

                <div class="heading-block nobottomborder">
                    <h4>Ooopps.! The Page you were looking for, couldn't be found.</h4>
                    <span>Try the search below to find matching pages:</span>
                </div>

                <form action="#" method="get" role="form" class="divcenter nobottommargin">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Search for Pages...">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">Search</button>
                        </span>
                    </div>
                </form>
                
            </div>

            <div class="video-wrap">
                <video poster="images/videos/explore-poster.jpg" preload="auto" loop autoplay muted>
                    <source src='images/videos/explore.mp4' type='video/mp4' />
                    <source src='images/videos/explore.webm' type='video/webm' />
                </video>
                <div class="video-overlay" style="background-color: rgba(0,0,0,0.3);"></div>
            </div>

        </section>

     

</body>
</html>