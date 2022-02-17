<nav class="navbar navbar-expand-lg navbar-dark fixed-top site-navigation main-nav navbar-togglable">
        <div class="container">
            <a class="navbar-brand" href="index-4.html">
                <h3><?php echo SITENAME?></h3>
            </a>
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Links -->
                <ul class="navbar-nav ">
                        <li class="nav-item ">
                            <a href="about.html" class="nav-link js-scroll-trigger">
                                Home
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="about.html" class="nav-link js-scroll-trigger">
                                About
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="service.html" class="nav-link js-scroll-trigger">
                                Services
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="pricing.html" class="nav-link js-scroll-trigger">
                                Pricing
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="project.html" class="nav-link js-scroll-trigger">
                                Projects
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a href="contact.html" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                <ul class="ml-lg-auto list-unstyled m-0 nav-btn">
                    <!-- <?php if(isset($_SESSION['user_id']))?>
                    <li><a href="<?php echo URLROOT;?>/users/login" class="btn btn-trans-white btn-circled">Login</a></li> -->
                    <?php if(isset($_SESSION['user_id'])) : ?>
                    <a href="<?php echo URLROOT; ?>/users/logout" class="btn btn-trans-white btn-circled">Log out</a>
                    <?php else : ?>
                        <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-trans-white btn-circled">Login</a>
                    <?php endif; ?>
                </ul>
            </div> <!-- / .navbar-collapse -->
        </div> <!-- / .Container -->
    </nav>
