<?php include'header.php'; ?>

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Üye Ol</h2>
                                    <p>Şimdi Üye Ol ve Aramıza Katıl Hemen Alışverişe Güvenli Bir Şekilde Başla</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="baglan/islem.php" method="POST">
                                        <div class="single-acc-field">
                                            <label for="name">Ad Soyad</label>
                                            <input type="text" name="kullanici_adsoyad" id="name" placeholder="Ad Soyad">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="email">Email Adresi</label>
                                            <input type="email" name="kullanici_mail" id="email" placeholder="Email Adresi">
                                        </div>
                                         <div class="single-acc-field">
                                            <label for="name">Telefon No</label>
                                            <input type="text" name="kullanici_tel" id="name" placeholder="Telefon No">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password">Şifre</label>
                                            <input type="password" name="kullanici_passwordone" id="password" placeholder="En az 6 karakter içerisinde a-z büyük harf ve rakam içersin">
                                        </div>
                                        <div class="single-acc-field">
                                            <label for="password">Tekrar Şifre</label>
                                            <input type="password" name="kullanici_passwordtwo" id="password" placeholder="Belirlediğiniz Şifreyi Tekrar Giriniz">
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" id="checkbox">
                                            <label for="checkbox">Ben Robot Değilim</label>
                                        </div>
                                        <div class="single-acc-field">
                                            <button name="kullanici_register" type="submit">Üye Ol</button>
                                        </div>
                                        <a href="login.php">Üyemisin? Giriş Yap</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others except</p>
                            <p>Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="blog.html">Delivery Information</a></li>
                                <li><a href="contact.html">Privacy Policy</a></li>
                                <li><a href="services.html">Terms & Conditions</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Gift Certificates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="wishlist.html">Wish List</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="faq.html">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="rss" href="#" title="rss"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                            <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter" >
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p> <a href="templateshub.net">Templates Hub</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </footer>
    <!--footer area end-->


<!-- JS
============================================ -->


<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>



</body>

<!-- register.html  03:24:53 GMT -->
</html>