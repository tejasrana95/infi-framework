<!doctype html>
<html lang="en" class="no-js">
    <?php fnGetMeta(array("title" => "Contact us | " . SITENAME)); ?>
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
                        <h2>Contact Us</h2>
                        <ul class="page-tree">
                            <li><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="<?php echo URL . links("contact"); ?>">Contact</a></li>
                        </ul>		
                    </div>
                </div>
                <!-- contact box -->
                <div class="contact-box">
                    <div class="container">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="contact-information">
                                    <h3>Contact info</h3>
                                    <ul class="contact-information-list">
                                        <li><span><i class="fa fa-home"></i><?php echo ADDRESS; ?></span></li>
                                        <li><span><i class="fa fa-phone"></i><?php echo TEL; ?></span></li>
                                        <li><a href="#"><i class="fa fa-envelope"></i><?php echo MAIL; ?></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div id="noti"></div>
                                <h3>Send us a message</h3>
                                <form id="contact-form" class="contact-work-form2">

                                    <div class=" text-input">
                                        <div class="float-input">
                                            <input name="name" id="name2" type="text" placeholder="name" required="">
                                            <span><i class="fa fa-user"></i></span>
                                        </div>

                                        <div class="float-input2">
                                            <input name="mail" id="mail2" type="text" placeholder="email" required="">
                                            <span><i class="fa fa-envelope"></i></span>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="textarea-input">
                                        <textarea name="comment" id="comment2" placeholder="message" required=""></textarea>
                                        <span><i class="fa fa-comment"></i></span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="<?php echo URL ?>captcha.php" style="width: 125px;">
                                        </div>
                                        <div class="col-md-5">
                                            <input name="captcha" id="captcha" type="text" placeholder="Security Code" required="">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="submit" name="mailing-submit" id="mailing-submit" class="submit_contact main-form" value="Send Message" style="margin-top: 0px;">

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- End content -->
            <!-- footer 
                    ================================================== -->
            <?php fnGetFooter(); ?>
            <script>
                (function ($) {
                    var form = $('#contact-form');
                    var submit = $('#mailing-submit');
                    var noti = $('#noti');
                    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

                    // form submit event
                    form.on('submit', function (e) {
                        e.preventDefault(); // prevent default form submit
                        if ($("#name2").val() == "") {
                            alert("Please enter name.");
                        }
                        else if ($("#mail2").val() == "") {
                            alert("Please enter name.");
                        }
                        else if (!emailReg.test($("#mail2").val()))
                        {
                            alert("Please enter proper email id.");
                        }
                        else if ($("#comment2").val() == "")
                        {
                            alert("Please enter your message.");
                        }
                        else {
                            $.ajax({
                                url: '', // form action url
                                type: 'POST', // form submit method get/post
                                dataType: 'html', // request type html/json/xml
                                data: form.serialize() + '&submit=' + "Yes", // serialize form data 

                                beforeSend: function () {
                                    noti.fadeOut();
                                    submit.html('Please Wait...'); // change submit button text
                                },
                                success: function (data) {
                                    noti.html(data).fadeIn(); // fade in response data
                                    form.trigger('reset');
                                    submit.html('Create');
                                },
                                error: function (e) {
                                    console.log(e)
                                }
                            });
                        }
                    });
                })(jQuery);
            </script>
    </body>
</html>