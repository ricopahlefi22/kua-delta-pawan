<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8 col-md-12 footer-info">
                    <a href="{{ url('p/admin') }}" class="logo d-flex align-items-center">
                        <span>Nova Bootstrap Made</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita
                        valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex  mt-3">
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                    <h4>Alamat Kami</h4>

                    <p>
                        {{ $web->address }} <br><br>
                        <strong>Telepon:</strong> {{ $web->phone_number }}<br>
                        <strong>Email:</strong> {{ $web->email }}<br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="footer-legal">
        <div class="container">
            <div class="copyright">
                &copy; Hak Cipta Desain <strong><span>BootstrapMade</span></strong>.
            </div>
            <div class="credits">
                Dikembangkan oleh <a href="https://bootstrapmade.com/">Rico Pahlefi</a>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->
<!-- End Footer -->
