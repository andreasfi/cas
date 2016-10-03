<?php
/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 27.09.16
 * Time: 15:18
 */
include_once ROOT_DIR.'views/header.inc';
?>
    <div class="content">
        <div class="container">

            <div class="contact">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Google maps -->
                        <div class="gmap">
                            <!-- Google Maps. Replace the below iframe with your Google Maps embed code -->
                            <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Google+India+Bangalore,+Bennigana+Halli,+Bangalore,+Karnataka&amp;aq=0&amp;oq=google+&amp;sll=9.930582,78.12303&amp;sspn=0.192085,0.308647&amp;ie=UTF8&amp;hq=Google&amp;hnear=Bennigana+Halli,+Bangalore,+Bengaluru+Urban,+Karnataka&amp;t=m&amp;ll=12.993518,77.660294&amp;spn=0.012545,0.036006&amp;z=15&amp;output=embed"></iframe>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="cwell">
                            <!-- Contact form -->
                            <h3 class="title">Contact Form</h3>
                            <div class="form">
                                <!-- Contact form (not working)-->
                                <form class="form-horizontal">
                                    <!-- Name -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="name">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="email">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <!-- Website -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="website">Website</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="website">
                                        </div>
                                    </div>
                                    <!-- Comment -->
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="comment">Comment</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="comment" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="form-group">
                                        <!-- Buttons -->
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-warning">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="cwell">
                            <!-- Address section -->
                            <h3 class="title">Address</h3>

                            <div class="address">
                                <address>
                                    <!-- Company name -->
                                    <h4>Responsive Web, Inc.</h4>
                                    <!-- Address -->
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    <!-- Phone number -->
                                    <abbr title="Phone">P:</abbr> (123) 456-7890.
                                </address>

                                <address>
                                    <!-- Name -->
                                    <h4>Full Name</h4>
                                    <!-- Email -->
                                    <a href="mailto:#">first.last@gmail.com</a>
                                </address>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Content ends -->

    <!-- Footer -->


<?php include_once ROOT_DIR.'views/footer.inc';
?>