<!-- Start Footer Section -->
<section id="footer-section" class="footer-section">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="section-heading-2">
                    <h3 class="section-title">
                        <span>Stay With us</span>
                    </h3>
                </div>
                <div class="subscription">
                    <p>Send your vauable feedback to support us!</p>
                    <div class="form-group">
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <textarea class="form-control @error('name') is-invalid @enderror" name="feedback" rows="3" placeholder="Your Feedback"></textarea>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3 py-1"><i class="bi bi-send"></i> Send
                                Feedback</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="section-heading-2">
                    <h3 class="section-title">
                        <span>Office Address</span>
                    </h3>
                </div>

                <div class="footer-address">
                    <ul>
                        <li class="footer-contact"><i class="fa fa-home"></i>3103, Sylhet, Bangladesh
                        </li>
                        <li class="footer-contact mt-2"><i class="fa fa-envelope"></i><a href="#">info@tcloud.com</a>
                        </li>
                        <li class="footer-contact mt-2"><i class="fa fa-phone"></i><a href="tel:+8801315959871">+880
                                1315 959 871</a></li>
                        <li class="footer-contact mt-2"><i class="fa fa-globe"></i><a href="#"
                                target="_blank">www.techcloud.com</a></li>
                        <li class="footer-contact mt-2"><i class="fab fa-facebook"></i> <a
                                href="https://www.facebook.com/mamun20172018/" target="_blank">Facebook</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="section-heading-2">
                    <h3 class="section-title">
                        <span>We are here</span>
                    </h3>
                </div>

                <div class="latest-tweet">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.056705720667!2d91.97082851492817!3d24.93013808402113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3750552bc71c899d%3A0x804e438bcc32b390!2sMetropolitan%20University!5e0!3m2!1sen!2sbd!4v1655446808667!5m2!1sen!2sbd"
                        width="100%" height="200px" style="border:0; border-radius:10px" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>
        <!--/.row -->
    </div><!-- /.container -->
</section>
<!-- End Footer Section -->

<!-- Start CCopyright Section -->
<div id="copyright-section" class="copyright-section">
    <div class="container">
        <div class="copyright">
            Copyright ©
            <script>
                document.write(new Date().getFullYear())
            </script>. All Rights Reserved. Design and Developed by
            <a href="https://github.com/mr-mamun-50" target="blank"><b>M R Mamun</b></a>
        </div>
    </div><!-- /.container -->
</div>
<!-- End CCopyright Section -->
