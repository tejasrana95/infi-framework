<?php http_response_code(404); ?>
<!doctype html>
<html lang="en" class="no-js">
    <?php fnGetMeta(); ?>
    <body>
        <!-- Container -->
        <div id="container">
            <!-- Header
                ================================================== -->
            <?php fnGetHeader(); ?>
            <!-- End Header -->

            <!-- content 
                    ================================================== -->
            <div id="content">

                <!-- Page Banner -->
                <div class="page-banner">
                    <div class="container">
                        <h2><?php echo $this->row['title']; ?></h2>
                        <ul class="page-tree">
                            <li><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="<?php echo URL; ?><?php echo links($this->row['permalink']); ?>"><?php echo $this->row['title']; ?></a></li>
                        </ul>	
                    </div>
                </div>

                <!-- blog-box Banner -->
                <div class="blog-box with-sidebar">
                    <div class="container">
                        <div class="row">
                            <?php
                            if ($this->row['template'] == "1") {
                                $class = "col-md-12";
                            } else {
                                $class = "col-md-9";
                            }
                            ?>
                            <div class="<?php echo $class ?> single-post">
                                <div class="single-post-content">
                                    <?php if (trim($this->row['featuredImage']) != "") { ?>
                                        <img alt="" src="<?php echo $this->row['featuredImage']; ?>">
                                    <?php } ?>
                                    <h2><?php echo stripslashes($this->row['heading']) ?></h2>
                                    <?php echo stripslashes(magicKeyword($this->row['content'])) ?>
                                </div>

                            </div>
                            <?php if ($this->row['template'] != "1") { ?>
                                <div class="col-md-3 sidebar">
                                    <div class="sidebar-widgets">
                                        <?php if ($this->row['template'] == 2) { ?>
                                            <?php
                                            fnSidebar();
                                            fnRenderModule($this->modules);
                                        } else {
                                            fnSidebar();
                                            ?>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>
            <!-- End content -->


            <!-- footer 
                    ================================================== -->
            <footer>
                <div class="up-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="widget footer-widgets text-widget">
                                    <img alt="" src="images/logo.png">
                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem</p>
                                </div>
                                <div class="widget footer-widgets twitter-widget">
                                    <h4>Recent Tweets</h4>
                                    <ul class="tweets">
                                        <li>
                                            <p><a class="tweet-acc" href="#">@premiumlayers</a> Thanks for the head up! :) <a href="#">http://support.envato.com</a> was very helpful</p>
                                            <span>3 days ago</span>
                                        </li>
                                        <li>
                                            <p><a class="tweet-acc" href="#">@envato</a> <a href="#">http://support.envato.com</a> </p>
                                            <span>4 days ago</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="widget footer-widgets flickr-widget">
                                    <h4>Flickr Gallery</h4>
                                    <ul class="flickr-list">
                                        <li><a href="#"><img alt="" src="images/flickr1.png"></a></li>
                                        <li><a href="#"><img alt="" src="images/flickr2.png"></a></li>
                                        <li><a href="#"><img alt="" src="images/flickr3.png"></a></li>
                                        <li><a href="#"><img alt="" src="images/flickr4.png"></a></li>
                                        <li><a href="#"><img alt="" src="images/flickr5.png"></a></li>
                                        <li><a href="#"><img alt="" src="images/flickr6.png"></a></li>
                                    </ul>
                                </div>
                                <div class="widget footer-widgets popular-widget">
                                    <h4>Popular Posts</h4>
                                    <ul class="pop-post">
                                        <li><a href="#"><i class="fa fa-pencil-square-o"></i> New Search Platform Update</a></li>
                                        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Envato's Most Wanted - $5,000 for Ghost Themes</a></li>
                                        <li><a href="#"><i class="fa fa-pencil-square-o"></i> Update: WordPress Theme Submission Requirements</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="widget footer-widgets tag-widget">
                                    <h4>Tags</h4>
                                    <ul class="tag-widget-list">
                                        <li><a href="#">web design</a></li>
                                        <li><a href="#">coding</a></li>
                                        <li><a href="#">wordpress</a></li>
                                        <li><a href="#">woo commerce</a></li>
                                        <li><a href="#">php</a></li>
                                        <li><a href="#">photography</a></li>
                                    </ul>
                                </div>
                                <div class="widget footer-widgets message-widget">
                                    <h4>Send Message</h4>
                                    <form id="footer-contact" class="contact-work-form">
                                        <input type="text" name="name" id="name" placeholder="Name"/>
                                        <input type="text" name="mail" id="mail" placeholder="Email"/>
                                        <textarea name="comment" id="comment" placeholder="Message"></textarea>
                                        <button type="submit" name="contact-submit" class="submit_contact">
                                            <i class="fa fa-envelope"></i> Send
                                        </button>
                                        <div class="msg"></div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="widget footer-widgets info-widget">
                                    <h4>Contact Us</h4>
                                    <ul class="contact-list">
                                        <li><a class="phone" href="#"><i class="fa fa-phone"></i>9930 1234 5679</a></li>
                                        <li><a class="mail" href="#"><i class="fa fa-envelope"></i> contact@yourdomain.com</a></li>
                                        <li><a class="address" href="#"><i class="fa fa-home"></i> street address example</a></li>
                                    </ul>
                                </div>
                                <div class="widget footer-widgets work-widget">
                                    <h4>Working Hours</h4>
                                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum </p>
                                    <p class="work-time"><span>Mon - Fri</span> : 10 AM to 5 PM</p>
                                    <p class="work-time"><span>Sat - Sun</span> : 10 AM to 2 PM</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="footer-line">
                    <div class="container">
                        <p>&#169; 2013 Convertible,  All Rights Reserved</p>
                        <a class="go-top" href="#"></a>
                    </div>
                </div>

            </footer>
            <!-- End footer -->
        </div>
        <!-- End Container -->

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.migrate.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/retina-1.1.0.min.js"></script>
        <script type="text/javascript" src="js/plugins-scroll.js"></script>
        <script type="text/javascript" src="js/script.js"></script>

        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </body>
</html>