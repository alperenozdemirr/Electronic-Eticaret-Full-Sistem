<?php
session_start();
ob_start();
require_once'baglan/baglan.php'; 
$mail=null;
if(isset($_SESSION['kullanici_mail'])){
  $mail=$_SESSION['kullanici_mail'];
}
if(isset($_COOKIE['kullanici_mail'])){
  $mail=$_COOKIE['kullanici_mail'];
}
$kullaniciSor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and durum=:durum");
$kullaniciSor->execute(array(
 'mail'=>$mail,
 'durum'=>1
));
$kullanici_confirm=$kullaniciSor->rowCount();
$kullaniciCek=$kullaniciSor->fetch(PDO::FETCH_ASSOC);
$kullanici_id=$kullaniciCek['kullanici_id'];
if($kullanici_confirm==1){
    $sepet=$db->query("SELECT * from sepet WHERE kullanici_id=$kullanici_id ORDER BY sepet_id DESC",PDO::FETCH_OBJ)->fetchAll();
$sepetSay=count($sepet);
}else{
    $sepetSay=0;
}

$kategoriler=$db->query("SELECT * FROM kategoriler ORDER BY kategori_id DESC",PDO::FETCH_OBJ)->fetchAll();
$header_setting=$db->query("SELECT * FROM header WHERE id=1",PDO::FETCH_OBJ)->fetch();
?>
<!doctype html>
<html class="no-js" lang="en">

<!--   03:20:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <!-- CSS 
    ========================= -->
   

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
<link rel="stylesheet" href="css/index.css">
</head>

<body>

    <!--header area start-->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">
            
    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>  
                        </div>
                        
                        <div class="top_right text-right">
                            <ul>
                               <li><a href="hesabim.php"> Hesabım </a></li> 
                               <li><a href="sepet.php">Sepetim</a></li> 
                            </ul>
                        </div> 
                        <div class="search_container">
                           <form action="arama.php" method="POST">
                                <div class="search_box">
                                     <input name="name" placeholder="Ürün Ara..." type="text">
                                            <button type="submit">Ara</button>
                                </div>
                            </form>
                        </div> 
                        
                        <div class="middel_right_info">
                            <div class="header_wishlist">
                                <a href="hesabim.php"><img src="assets/img/user.png" alt=""></a>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="sepet.php"><img src="assets/img/shopping-bag.png" alt=""></a>
                                <span class="cart_quantity"><?php echo $sepetSay;?></span>
                               
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="index.php">Anasayfa</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="index.php#urunler">Ürünler</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Kategoriler</a>
                                    <ul class="sub-menu">
                                        
                                                <?php foreach($kategoriler as $kategori): ?>
                                <li><a href="kategori.php?kategori=<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_name; ?></a></li>
                                                <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Hakkımızda</a>
                                   
                                </li>
                                <?php if(empty($mail)){ ?>
                                <li class="menu-item-has-children">
                                    <a href="login.php">Giriş Yap</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="register.php">Kaydol</a> 
                                </li>
                                <?php }else{?>
                                    <li class="menu-item-has-children">
                                    <a href="logout.php">Çıkış Yap</a> 
                                </li>
                                <?php }?>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> teknoshop.destek@gmail.com</a></span>
                            <ul>
                                <li class="facebook"><a href="<?=$header_setting->facebook_url;?>"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="<?=$header_setting->twiter_url;?>"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="<?=$header_setting->instagram_url;?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
    
    <header>
        <div class="main_header">
            <!--header top start-->
            <div class="header_top">
                <div class="container">  
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="support_info">
                                <p><a href="mailto:">teknoshop.destek@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-right">
                                <ul>
                                    <?php if($kullanici_confirm==1){ ?>

                                        <li><a href="login.php"><?php echo $kullaniciCek['kullanici_adsoyad']; ?></a></li> <li><a href="logout.php">Çıkış</a></li> 
                                   
                               <?php }else{ ?>
                                <li><a href="login.php">Giriş Yap</a></li> 
                                   <li><a href="register.php">Üye Ol</a></li>
                               <?php }?>
                                </ul>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
            <!--header top start-->
            <!--header middel start-->
            <div class="header_middle">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-6">
                            <div class="logo">
                                <a href="index.php"><img src="logo/<?=$header_setting->logo;?>" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6">
                            <div class="middel_right">
                                <div class="search_container">
                                   <form action="arama.php" method="POST">
                                        <div class="search_box">
                                            
                                            <input name="name" placeholder="Ürün Ara..." type="text">
                                            <button type="submit">Ara</button>
                                            
                                        </div>
                                   </form> 
                                </div>
                                <div class="middel_right_info">
                                    <div class="header_wishlist">
                                        <a href="hesabim.php"><img src="assets/img/user.png" alt=""></a>
                                    </div>
                                    <div class="mini_cart_wrapper">
                                        <a href="sepet.php"><img src="assets/img/shopping-bag.png" alt=""></a>
                                        <span class="cart_quantity"><?php echo $sepetSay;?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header middel end-->
            <!--header bottom satrt-->
            <div class="main_menu_area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="main_menu menu_position"> 
                                <nav>  
                                    <ul>
                                        <li><a href="index.php">Anasayfa</a></li>
                                        <li><a href="index.php#urunler">Ürünler</a></li>
                                        
                                        <li><a class="active" href="#">Kategoriler<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <?php foreach($kategoriler as $kategori): ?>
                                <li><a href="kategori.php?kategori=<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_name; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">Hakkımızda</a></li>
                                    </ul>  
                                </nav> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div> 
    </header>
    <!--header area end-->