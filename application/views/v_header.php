<?
$ci =& get_instance();
?>
<header id="top_page">
        <div class="navbar-fixed">
        <nav id="nav">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="<?echo site_url();?>" class="brand-logo">
                        <div class="logo"><img class="responsive-img" src="<?echo site_url();?>images/logo.png"></div>
                    </a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li class="our_service">
                            <a <?php if ($page == 'service') { ?>class="active"<?php } ?> href="#!" id="btn_submenu">Our Service</a>
                            <ul class="submenu">
                                <!-- <div class="arrow_up"></div> -->
                                <li>
                                    <a href="<?echo site_url('study_abroad');?>">Study Abroad</a>
                                </li>
                                <li><a href="<?echo site_url('study_language_abroad');?>">Study Language Abroad</a></li>
                                <li><a href="<?echo site_url('summer_camp');?>">Summer Camp</a></li>
                                <li><a href="<?echo site_url('study_tour_seminar');?>">Study Tour &amp; Seminar</a></li>
                            </ul>
                        </li>
                        <li><a <?php if ($page == 'about') { ?>class="active"<?php } ?> href="<?echo site_url('about');?>">About Us</a></li>
                        <li><a <?php if ($page == 'news') { ?>class="active"<?php } ?> href="<?echo site_url('news');?>">News</a></li>
                        <li><a <?php if ($page == 'gallery') { ?>class="active"<?php } ?> href="<?echo site_url('gallery');?>">Gallery</a></li>
                        <li><a <?php if ($page == 'testimonial') { ?>class="active"<?php } ?> href="<?echo site_url('testimonial');?>">Testimonial</a></li>
                        <li><a <?php if ($page == 'contact') { ?>class="active"<?php } ?> href="<?echo site_url();?>#h_contact">Contact Us</a></li>
                    </ul>



                    <ul class="side-nav" id="mobile-demo">

                        <!-- <li>
                        <a <?php if ($page == 'service') { ?>class="active"<?php } ?> href="#!">Our Service</a>
                        </li> -->

                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                              <li>
                                <a class="collapsible-header">Our Service<i class="material-icons">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                  <ul>
                                    <li><a href="<?echo site_url('study_abroad');?>">Study Abroad</a></li>
                                    <li><a href="<?echo site_url('study_language_abroad');?>">Study Language Abroad</a></li>
                                    <li><a href="<?echo site_url('summer_camp');?>">Summer Camp</a></li>
                                    <li><a href="<?echo site_url('study_tour_seminar');?>">Study Tour &amp; Seminar</a></li>
                                  </ul>
                                </div>
                              </li>
                            </ul>
                        </li>



                        <li><a <?php if ($page == 'about') { ?>class="active"<?php } ?> href="<?echo site_url('about');?>">About Us</a></li>
                        <li><a <?php if ($page == 'news') { ?>class="active"<?php } ?> href="<?echo site_url('news');?>">News</a></li>
                        <li><a <?php if ($page == 'gallery') { ?>class="active"<?php } ?> href="<?echo site_url('gallery');?>">Gallery</a></li>
                        <li><a <?php if ($page == 'testimonial') { ?>class="active"<?php } ?> href="<?echo site_url('testimonial');?>">Testimonial</a></li>
                        <li><a <?php if ($page == 'contact') { ?>class="active"<?php } ?> href="<?echo site_url();?>#h_contact">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
        
    </header>

    <script type="text/javascript">
        $(".button-collapse").sideNav();
    </script>

    <script>
    $(document).ready(function(){
        $("#btn_submenu").click(function(){
            $(".submenu").toggle();
        });
    });
    </script>
