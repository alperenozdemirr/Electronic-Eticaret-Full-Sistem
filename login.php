<?php include'header.php'; ?>

<head><title>Giriş Yap</title></head>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li>Giriş Yap</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

	<section class="account">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="account-contents" style="background: url('assets/img/about/about1.jpg'); background-size: cover;">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-thumb">
                                    <h2>Giriş Yap</h2>
                                    <p>Yeni kullanıcıysan kayıt olarak indirimden faydalanabilirsin</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="account-content">
                                    <form action="baglan/islem.php" method="POST">
                                        <div class="single-acc-field">
                                            <label>Email</label>
                                            <input type="email" name="kullanici_mail"  placeholder="Email Giriniz">
                                        </div>
                                        <div class="single-acc-field">
                                            <label>Şifre</label>
                                            <input type="password" name="kullanici_password"  placeholder="Şifrenizi giriniz">
                                        </div>
                                        <div class="single-acc-field boxes">
                                            <input type="checkbox" name="remember_me" id="checkbox">
                                            <label for="checkbox">Beni Hatırla</label>
                                        </div>
                                        
                                        <div class="single-acc-field">
                                            <button name="kullanici_login" type="submit">Giriş Yap</button>
                                        </div>
                                        <a href="forget-password.html">Şifremi Unuttum?</a>
                                        <a href="register.php">Hala Üye Değilmisin?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include'footer.php'; ?>