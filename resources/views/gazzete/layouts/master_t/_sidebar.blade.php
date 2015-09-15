<div class="row">
    <div id="menu-target">
        @include('gazzete.layouts._sidebar_options')
    </div>

    <section class="sidebar col-md-5 col-sm-12" style="background-image:url('{!! url("gazzete/img/default-sidebar.jpg") !!}')">
        <span class="menu-trigger animated fadeInDown" id="menu-trigger-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </span>

        <noscript>
            <div class="no-js-menu">
                @include('gazzete.layouts._sidebar_options')
            </div>
        </noscript>
        <!-- end no script -->
        <div class="site-info">
            <div class="primary-info">
                <h1> Gazette </h1>

                <p>Deree News. 24/7. <a href="#">Latest story.</a></p>

                <p> Subtitle.</p>
            </div>
            <div class="secondary-info">
                <p>
                    <a class="btn btn-primary" href="#"><i class="fa fa-user-plus"></i>Join Our Newsletter</a>
                </p>
            </div>
        </div>
    </section>
    <!-- end sidebar -->
</div>
