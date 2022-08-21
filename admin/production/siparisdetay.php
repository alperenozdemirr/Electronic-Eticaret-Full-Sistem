<?php include'header.php'; ?>
<?php $siparis_detay = $db->query("SELECT * from siparis_detay WHERE siparis_id={$_GET['siparis_id']}", PDO::FETCH_OBJ)->fetchAll();

$siparisler = $db->query("SELECT * from siparisler WHERE siparis_id={$_GET['siparis_id']}", PDO::FETCH_OBJ)->fetch();

$siparisId=$_GET['siparis_id'];

  $sipariskullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$sipariskullanicisor->execute(array(
  'id' => $siparisler->kullanici_id
  ));

$sipariskullanicicek=$sipariskullanicisor->fetch(PDO::FETCH_ASSOC);



 ?>
<head>
  <title>Sipariş Detay</title>
  <style>
    .img-hover:active{
      
      height: auto;
      position: absolute;
      transition:0.5s;
      transform: scale(5.0);
    }
    .img-hover:hover{
      cursor:zoom-in;
    }
  </style>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sipariş Detay Sayfası</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:darkred;">Siparisler  Siparis Durumu = </h2> <u><?php if($siparisler->siparis_durum==1){ ?>
                      <button  class="btn btn-warning disabled">Tedarik Ediliyor...</button>
                      <?php }elseif($siparisler->siparis_durum==2){?>
                        <button  class="btn btn-primary disabled">Ürünler Kargoda</button>
                      <?php }else{?>
                        <button  class="btn btn-success disabled">Teslim Edildi</button>
                      <?php } ?></u>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

<h4>Sipariş Detay Sayfası buradan sipariş durumlarını güncelleyebilir ve müşterinin hangi ürünleri aldığını görebilirsin.<br>
  <br>
Siparis Sahibi Bilgisi<br>
-<?=$sipariskullanicicek['kullanici_adsoyad'];?>
</h4>
                    <ul class="nav navbar-nav navbar-left">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   Sipariş Durumunu Güncelle
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-left">
                    
                    <form action="../../baglan/islem.php" method="POST" role="form">
                      <input type="hidden" name="siparisID" value="<?php echo $siparisId; ?>">
                      <input type="hidden" name="s_durum" value="1">
                    <li><button type="submit" name="siparis_durumu" class="btn btn-warning"><i class="fa fa-sign-out pull-left"></i>Tedarik Ediliyor</button></li>
                    </form>

                        <form action="../../baglan/islem.php" method="POST" role="form">
                          <input type="hidden" name="siparisID" value="<?php echo $siparisId ?>">
                          <input type="hidden" name="s_durum" value="2">
                        <li><button type="submit" name="siparis_durumu" class="btn btn-primary"><i class="fa fa-sign-out pull-left"></i>Kargoda</button></li>
                        </form>

                            <form action="../../baglan/islem.php" method="POST" role="form">
                              <input type="hidden" name="siparisID" value="<?php echo $siparisId ?>">
                              <input type="hidden" name="s_durum" value="3">
                             <li><button type="submit" name="siparis_durumu" class="btn btn-success"><i class="fa fa-sign-out pull-left"></i>Teslim Edildi</button></li>
                           </form>
                  </ul>
                </li>


              </ul>

                    

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">Sipariş id</th>
                          <th style="width: 5%">Ürün Resim</th>
                          <th style="width: 20%">Ürün Adı</th>
                          <th style="width: 15%">Ürün Adet</th>
                          <th style="width: 25%">Ürün Fiyatı</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($siparis_detay as $siparis){ ?>
                        
<?php  $sid = $siparis->urun_id ?>
    <?php 
    $urunsor=$db->prepare("SELECT * FROM urunler WHERE id=:id");
  $urunsor->execute(array(
    'id' => $sid
  ));
  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
  // php echo $uruncek['urun_adi']; 
     ?>

                        <tr>
                          <td><?php echo $siparis->siparis_id ?></td>
                          <td>
                            <ul class="list-inline">
                              <li>
                                <img width="40px" class="img-hover" src="../../slider-img/<?php echo $uruncek['slider_1'];?>" >
                                
                              </li>
                            </ul>
                          </td>
                          <td><?php echo $uruncek['urun_adi'] ?></td>
                          <td><?php echo $siparis->urun_fiyat ?> TL</td>
                          <td><?php echo $siparis->urun_adet ?> Adet Ürün</td>
                          
                         
                          
                          
                          

                         
                        </tr>


                      <?php } ?>


                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->






        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>