  <?php
ob_start();
session_start();
  ?>
 <?php require_once '../../baglan/baglan.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Paneli</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="../../baglan/islem.php" method="POST" role="form">
              <h1>Admin Paneli</h1>
              <div>
                <input name="admin_mail" type="email" class="form-control" placeholder="E-mail" />
              </div>
              <div>
                <input name="admin_password" type="password" class="form-control" placeholder="Şifre"/>
              </div>
              <div>
                <button name="admin_giris" type="submit" class="btn btn-default submit" >Giriş Yap</button>
                
              </div>

              <div class="clearfix">
                <?php

if(isset($_GET['durum'])) {
    if($_GET['durum']=="no"){?>

        <h4> Hata! Şifre veya E-posta Yanlış Tekrar Deneyiniz.</h4>
         
        
      <?php }}?>
                
              </div>

              <div class="separator">
                
                <a href="../../index.php">Web Sitene Git</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Hoşgeldiniz</h1>
                  <p>©2022 AL&BE Web/Yazılım Sistemleri</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
  </body>
</html>
