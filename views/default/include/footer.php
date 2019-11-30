<footer>
    <div class="up-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="widget footer-widgets text-widget">
                        <img alt="" src="<?php echo TEMPLATE; ?>images/logo.png">
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
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr1.png"></a></li>
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr2.png"></a></li>
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr3.png"></a></li>
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr4.png"></a></li>
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr5.png"></a></li>
                            <li><a href="#"><img alt="" src="<?php echo TEMPLATE; ?>images/flickr6.png"></a></li>
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

<!--
##############################
 - ACTIVATE THE BANNER HERE -
##############################
-->
<script type="text/javascript">

    var tpj = jQuery;
    tpj.noConflict();

    tpj(document).ready(function () {

        if (tpj.fn.cssOriginal != undefined)
            tpj.fn.css = tpj.fn.cssOriginal;

        var api = tpj('.fullwidthbanner').revolution(
                {
                    delay: 8000,
                    startwidth: 1170,
                    startheight: 580,
                    onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off

                    thumbWidth: 100, // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
                    thumbHeight: 50,
                    thumbAmount: 3,
                    hideThumbs: 0,
                    navigationType: "bullet", // bullet, thumb, none
                    navigationArrows: "solo", // nexttobullets, solo (old name verticalcentered), none

                    navigationStyle: "round", // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom


                    navigationHAlign: "center", // Vertical Align top,center,bottom
                    navigationVAlign: "bottom", // Horizontal Align left,center,right
                    navigationHOffset: 30,
                    navigationVOffset: 40,
                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,
                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,
                    touchenabled: "on", // Enable Swipe Function : on/off


                    stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
                    stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

                    hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
                    hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value
                    hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value


                    fullWidth: "on",
                    shadow: 1								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

                });


        // TO HIDE THE ARROWS SEPERATLY FROM THE BULLETS, SOME TRICK HERE:
        // YOU CAN REMOVE IT FROM HERE TILL THE END OF THIS SECTION IF YOU DONT NEED THIS !
        api.bind("revolution.slide.onloaded", function (e) {


            jQuery('.tparrows').each(function () {
                var arrows = jQuery(this);

                var timer = setInterval(function () {

                    if (arrows.css('opacity') == 1 && !jQuery('.tp-simpleresponsive').hasClass("mouseisover"))
                        arrows.fadeOut(300);
                }, 3000);
            })

            jQuery('.tp-simpleresponsive, .tparrows').hover(function () {
                jQuery('.tp-simpleresponsive').addClass("mouseisover");
                jQuery('body').find('.tparrows').each(function () {
                    jQuery(this).fadeIn(300);
                });
            }, function () {
                if (!jQuery(this).hasClass("tparrows"))
                    jQuery('.tp-simpleresponsive').removeClass("mouseisover");
            })
        });
        // END OF THE SECTION, HIDE MY ARROWS SEPERATLY FROM THE BULLETS
    });
</script>
<script>
    jQuery(function () {
        DevSolutionSkill.init('circle');
        DevSolutionSkill.init('circle2');
        DevSolutionSkill.init('circle3');
        DevSolutionSkill.init('circle4');
        DevSolutionSkill.init('circle5');
        DevSolutionSkill.init('circle6');
    });
</script>
<?php
    if (isset($scriptsfooter)) {
        foreach ($scriptsfooter as $script) {
            echo '<script type="text/javascript" src="' . TEMPLATE . $script . '"></script>';
        }
    }
    ?>