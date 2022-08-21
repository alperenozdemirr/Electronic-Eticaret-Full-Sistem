  <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Ücretsiz Kargo</h2>
                            <p>500TL Üstü</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Destek 7/24</h2>
                            <p>24 Saat Destek</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Geri Ödeme</h2>
                            <p>30 Gün İçinde</p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Güvenli Ödeme</h2>
                            <p>Kartınız Bizle Güvende</p>
                        </div>
                    </div>
                </div>                          
            </div>
        </div>
    </section>
    <!--shipping area end-->
    
 <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="logo/<?=$header_setting->logo;?>" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>Electronik ürünler Telefon Tablet bilgisayar ürünlerine kadar taksitsiz geri iadeli ürün garantili Ve güvenli Hızlı Hizmet sunmaktayız.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Kategoriler</h3>
                        <div class="footer_menu">
                            <ul>
                                <?php foreach($kategoriler as $kategori): ?>
                                <li><a href="kategori.php?kategori=<?= $kategori->kategori_id; ?>"><?=$kategori->kategori_name;?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Hesap İşlemleri</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#">Hesabım</a></li>
                               <li><a href="#">Kullanıcı Bilgilerim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Sosyal Medya Hesaplarımız</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="<?=$header_setting->facebook_url;?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="<?=$header_setting->twiter_url;?>" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="<?=$header_setting->instagram_url;?>" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                
                            </ul>
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
                            <p> <a href="templateshub.net">AL&BE SOFTWARE</a></p>
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

<!--   03:22:07 GMT -->
</html>