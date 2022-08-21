  <?php include'header.php'; 
if(empty($mail)){
    header("Location:login.php");
    exit;
}
  ?>
  <head>
      <title>
          Ödeme İşlemleri
      </title>
  </head>
   <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="sepetim.php">Sepetim</a></li>
                            <li><a href="teslimat-bilgi.php">Teslimat Bilgilerim</a></li>
                            <li><a href="odeme.php">Ödeme İşlemlerim</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <section class="account">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-lg-10">
                    <div class="account-contents" >
                        <div class="row">
                            
                            <div class="col-xl-12 col-lg-10 col-md-10 col-sm-10">
                                <form action="baglan/islem.php" method="POST">
                                    <input type="hidden" value="<?=$kullaniciCek['kullanici_id'];?>" name="k_id">
                                <button name="siparis_tamamla" class="btn btn-success col-md-12">Ödemeyi Kabul Et Ve Siparişin Eklensin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
include'footer.php';?>