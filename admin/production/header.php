<?php 
session_start();
    ob_start();
  require_once '../../baglan/baglan.php'; 
   $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
  'mail' => $_SESSION['admin_mail'],
  'yetki' => 5
  ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
if($say==0){
  header("Location:../../index.php?durum=yetkisizgiris");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-user"></i> <span>Admin Paneli</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin</span>
                <h2><?php echo $kullanicicek['kullanici_adsoyad']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Ayarlar</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i>Anasayfa</span></a>
                    
                  </li>
              <li><a href="kullanici.php"><i class="fa fa-user"></i>Kayıtlı Kullanıcılar</span></a></li>
                
                  <li><a ><i class="fa fa-gift"></i>Siparişler</span></a>
                    <ul class="nav child_menu">
                    <li><a href="siparisler.php"><i class="fa fa-gift"></i>Tüm Siparişler</span></a></li>
                    <li><a href="siparisler2.php"><i class="fa fa-gift"></i>Tedarik Edilen Siparişler</span></a></li>
                    <li><a href="siparisler3.php"><i class="fa fa-gift"></i>Kargodaki Siparişler</span></a></li>
                    <li><a href="siparisler4.php"><i class="fa fa-gift"></i>Teslim Edilmiş Siparişler</span></a></li>
                  
                </ul>
                  </li>
                  <li><a href="urunler.php"><i class="fa fa-shopping-cart"></i>Ürünler</span></a></li>
               <li><a href="urunekle.php"><i class="fa fa-plus-square-o"></i>Ürün Ekleme</span></a></li>

                
                
                  <li><a ><i class="fa fa-gift"></i>Kategori</span></a>
                    <ul class="nav child_menu">
                      <li><a href="kategoriler.php"><i class="fa fa-gift"></i>Kategoriler</span></a></li>
                    <li><a href="kategoriekle.php"><i class="fa fa-gift"></i>Kategori Ekle</span></a></li>
                    
                  
                </ul>
                  </li>
                
                 <li><a ><i class="fa fa-gift"></i>Siteyi Düzenle</span></a>
                    <ul class="nav child_menu">
                    
                    <li><a href="settingheader.php"><i class="fa fa-gift"></i>Header Ayarları (üst menü)</span></a></li>
                  
                </ul>
                  </li>

                 <li><a href="smtp-ayar.php"><i class="fa fa-gift"></i>SMTP Ayarları</span></a></li>
                 
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
             
              <a href="logout.php" data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt=""><?php echo $kullanicicek['kullanici_adsoyad']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Güvenli Çıkış</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->