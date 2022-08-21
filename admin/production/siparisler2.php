<?php include'header.php'; ?>
<?php 
$siSay = $db->query("SELECT * from siparisler where siparis_durum=1 order by siparis_id DESC", PDO::FETCH_OBJ)->fetchAll();
if(empty($siparisler->kullanici_id)){
    $kid=null;
}else{
    $kid=$siparisler->kullanici_id;
}
  $sipariskullanicisor=$db->prepare("SELECT * FROM kullanici where id=:id");
$sipariskullanicisor->execute(array(
  'id' => $kid
  ));

$sipariskullanicicek=$sipariskullanicisor->fetch(PDO::FETCH_ASSOC);
if(isset($_GET['s'])){
  $sayfa = $_GET['s'];
}

if (empty($sayfa) || !is_numeric($sayfa)){
  $sayfa =1;
}
$kacar =15;
$ksayisi = count($siSay);
$ssayisi = ceil($ksayisi/$kacar);
$nereden = ($sayfa*$kacar)-$kacar;
$siparisler = $db->query("SELECT * from siparisler where siparis_durum=1 order by siparis_id DESC Limit $nereden,$kacar", PDO::FETCH_OBJ)->fetchAll();
 ?>
<head>
  <title>Siparişlerim</title>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Siparişler - Tedarik Edilen Siparis Listesi</h3>
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
                    <h2>Siparis Listesi</h2>
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

                    <p>Kullanıcıların Siparişleri</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">Siparis id</th>
                          <th style="width: 20%">Adı Soyadı</th>
                          <th>Adresi</th>
                          <th>Posta Kodu</th>
                          <th>Şehir</th>
                          <th>Toplam Ürün Adet Sayısı</th>
                          <th>Ödenen Toplam Tutar</th>
                          <th>Siparis Durumu</th>
                          <th style="width: 20%">Düzenle</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($siparisler as $siparis){ ?>
                          <?php $sipariskullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$sipariskullanicisor->execute(array(
  'id' => $siparis->kullanici_id
  ));

$sipariskullanicicek=$sipariskullanicisor->fetch(PDO::FETCH_ASSOC); ?>

                        <tr>
                          <td><?php echo $siparis->siparis_id ?></td>
                          <td>
                            <a><?php echo $sipariskullanicicek['kullanici_adsoyad'] ?></a>
                            <br />
                            <small>Siparis Tarihi:<?php echo $siparis->siparis_zaman; ?></small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <?php echo $sipariskullanicicek['kullanici_adres'] ?>
                            </ul>
                          </td>
                          <td class="project_progress">
                            
                            </div>
                            <medium><?php echo $sipariskullanicicek['kullanici_posta_kodu'] ?></medium>
                          </td>
                         <td>
                            <?php echo $sipariskullanicicek['kullanici_sehir'] ?>
                          </td>
                          <td>
                            <?php echo $siparis->urun_toplam_adet ?> Ürün
                          </td>
                          <td>
                            <?php echo $siparis->toplam_tutar; ?> TL
                          </td>
                          <td>
                            <?php if($siparis->siparis_durum == 1){ ?>
                              <a class="btn btn-warning
 btn-xs disabled">Tedarik Ediliyor</a>
                            
                            <?php }elseif($siparis->siparis_durum == 2){ ?>
<a class="btn btn-primary btn-xs disabled"> Kargoda </a>
                            <?php }else{ ?>
 <a class="btn btn-success btn-xs disabled">Teslim Edildi</a>
                            <?php } ?>



                          </td>

                          <td>
                            
                            <a href="siparisdetay.php?siparis_id=<?php echo $siparis->siparis_id ?>" class="btn btn-info btn-xs"></i>Sipariş Durumunu ve Detay</a>
                          </td>
                        </tr>


                      <?php } ?>


                      </tbody>
                    </table>
                    <!-- end project list -->

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-end">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <?php for ($i=1; $i<=$ssayisi; $i++) { ?> 

         <li class="page-item"><a class="page-link" href="siparisler2.php?s=<?php echo $i ?>"><?php echo $i ?></a></li>

    <?php } ?>
    
    

    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

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