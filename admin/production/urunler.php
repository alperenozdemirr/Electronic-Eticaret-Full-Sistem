<?php include'header.php'; ?>
<?php 
$siSay = $db->query("SELECT * from urunler", PDO::FETCH_OBJ)->fetchAll();

$urunlerSayisi = count($siSay);
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
$urunler = $db->query("SELECT * from urunler order by id DESC Limit $nereden,$kacar", PDO::FETCH_OBJ)->fetchAll(); 
 ?>
<head>
  <title>
    (<?php echo $urunlerSayisi ?>)Ürünler
  </title>
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
                <h3>Tüm Ürünler Lİstesi</h3><br><h4>Toplam <?php echo $urunlerSayisi ?> Adet Ürün Var</h4>
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
                    <h2>Kayıtlı Kullanıcıların listesi ve Bilgileri</h2>
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

                    <p>Kullanıcıların bilgilerini Görebilir Gerekirse Silebilirsiniz Bu Sayfadan Not! Kullanıcın Ad Soyadının Altında Olan Tarih/Saat İlk Kayıt Yaptığı Zamandır</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">id</th>
                          <th style="width: 8%">Ürün Adı</th>
                          <th>Ürün 1.resim</th>
                          <th>Ürün 2.resim</th>
                          <th>Ürün 3.resim</th>
                          <th>Ürün 4.resim</th>
                          <th>Fiyatı</th>
                          <th>Ürün Açıklaması</th>
                          
                          <th style="width: 20%">Düzenle</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($urunler as $urun){ ?>
                        <tr>
                          <td><?php echo $urun->id ?></td>
                          <td>
                            <a><?php echo substr($urun->urun_adi,0,30) ?>...</a>
                            <br />
                            <small></small>
                          </td>
                          <td>
                            <ul class="list-inline">

                              <img width="40px" class="img-hover" src="../../slider-img/<?php echo $urun->slider_1;?>" >
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">

                                <img width="40px" class="img-hover" src="../../slider-img/<?php echo $urun->slider_2;?>" >
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">

                                <img width="40px" class="img-hover" src="../../slider-img/<?php echo $urun->slider_3;?>" >
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">

                                <img width="40px" class="img-hover" src="../../slider-img/<?php echo $urun->slider_4;?>" >
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">

                              <?php echo $urun->urun_fiyati ?>
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <?php echo substr($urun->urun_aciklamasi,0,150); ?>... <u>Tümünü Görmek İçin Detay'a Git</u>
                            </ul>
                          </td>
                          <td>
                          
                          
                          
                            
                           <a href="urunupdate.php?urunid=<?php echo $urun->id ?>" class="btn btn-success btn-xs"><i class="fa fa-rotate-left"></i>Güncelle</a>
                           <form action="../../baglan/islem.php" method="POST" role="form">
                            <input type="hidden" name="urun_id" value="<?php echo $urun->id ?>">
                            <button name="urun_delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Ürünü Sil</button>
                            </form>
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

                   <li class="page-item"><a class="page-link" href="urunler.php?s=<?php echo $i ?>"><?php echo $i ?></a></li>

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