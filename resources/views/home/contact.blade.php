@include('home.header')
       <!-- Header End -->
    <div class="clearfix"></div>
    <!--======= Breadcrumb Inner Page =======-->
    <section class="iq-bg iq-bg-fixed iq-over-black-70 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url('images/bg/bg-2.jpg'); background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="heading-title iq-mb-25">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">Contact Us</h3>
                    </div>
                    
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://crystaltrade.org">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us 1</li>
            </ol>
        </nav>
    </section>
    <!--======= Breadcrumb Inner Page =======-->
    <!-- Main Content -->
    <div class="main-content">
        <section class="contact-1">
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-lg-6 col-md-12">
                        <div class="iq-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.9653810564537!2d-0.15123368479943283!3d51.5138511180533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876052cdc130791%3A0x9983515b747e6da0!2s75%20Davies%20St%2C%20London%20W1K%205JN%2C%20UK!5e0!3m2!1sen!2sng!4v1635669961971!5m2!1sen!2sng" allowfullscreen=""></iframe>
                            
                            
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 iq-help-form">
                        <div class="iq-plr-40 iq-mt-40">
                            <h2 class="iq-mtb-10">Happy to Help You!</h2>
                            
                            <div class="row iq-mt-30">
                                <div class="col-sm-12">
                                    
                                    <form class="form-horizontal" id="contactform" method="post" action="https://templates.iqonic.design/coinex/html/php/contact-form.php">
                                        <div class="contact-form">
                                            <div class="section-field iq-mb-30">
                                                <input id="name" type="text" placeholder="Name*" name="name">
                                            </div>
                                            <div class="section-field iq-mb-30">
                                                <input id="email" type="text" placeholder="Email*" name="email">
                                            </div>
                                            <div class="section-field iq-mb-30">
                                                <input id="phone" type="text" placeholder="Phone*" name="phone">
                                            </div>
                                            <div class="section-field iq-mb-30">
                                                <textarea class="input-message" placeholder="Comment*" name="message"></textarea>
                                                <input type="hidden" name="action" value="sendEmail" />
                                                <button id="submit" name="submit" type="submit" value="Send" class="button pull-right iq-mt-40">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="ajaxloader" style="display:none"><img class="center-block mt-30 mb-30" src="images/ajax-loader.html" alt=""></div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row iq-ptb-80">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="iq-contact-box-01">
                            <div class="iq-icon dark-bg">
                                <i aria-hidden="true" class="ion-ios-location-outline"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="iq-tw-6">Address</h5>
                                <span class="lead iq-tw-6">75 Davies St, London W1K 5JN, United Kingdom</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="iq-contact-box-01">
                            <div class="iq-icon dark-bg">
                                <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="iq-tw-6">Phone</h5>
                                <span class="lead iq-tw-6">+1(470)628 5531</span>
                                <p class="iq-mb-0">Mon-Fri 10:00am - 4:00pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="iq-contact-box-01">
                            <div class="iq-icon dark-bg">
                                <i aria-hidden="true" class="ion-ios-email-outline"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="iq-tw-6">Mail</h5>
                                <span class="lead iq-tw-6">support@crystaltrade.org</span>
                                <p class="iq-mb-0">24 X 7 online support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('home.footer')
    <!-- Wrapper Ends -->
</body>


<!-- Mirrored from slimhamdi.net/bayya/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 22:07:01 GMT -->
</html>