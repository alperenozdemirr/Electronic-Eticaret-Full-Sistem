<?php include'header.php'; ?>
<?php 
$urun = $db->query("SELECT * from urunler WHERE id={$_GET['urunid']}", PDO::FETCH_OBJ)->fetch();
$kategoriler=$db->query("SELECT * FROM kategoriler",PDO::FETCH_OBJ)->fetchAll();
?>
<head>
  <title>Ürün Güncelleme Sayfası</title>

</head>
        <!-- page content -->
        <div class="right_col" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ürün Güncelleme Sayfası</h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Güncelleme<small>Ürün İd : <?php echo $urun->id ?></small></h2>
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

                <form action="../../baglan/islem.php" method="POST" role="form" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <h1> Ürün Güncellemeden Önce Bilmeniz Gerekenler! </h1>
                      <p>DİKKAT bu Ürün Güncelle Butonuna Bastığınızda Satış Sayfanızdaki verilerinize Eklenecektir Emin olmadan Değişiklik Güncelle Aksi Takdirde Eski Veriler Kurtarılamaz <br>Dilediğiniz Kadar Güncelleme Yapabilirsiniz Bir Sınır Yokur!
                      </p>
                      <span class="section">Ürün Bilgileri<br></span><p>-Eklemek İstediğin Ürün Bilgilerini Gereken Yerlere Girip <b>Ürünü Güncelle</b> butonuna basınız.<br>
                      
                      

                      
                      -Eklemek İstediğin Ürün Bilgilerini Gereken Yerlere Girip Ürünü Güncelle butonuna basınız<br>
-Yeni Resim Eklediğinizde Eskisi Silinip Yenisi Yüklenecektir Eski Resmi Geri Yükleme Şansınız Yoktur!<br>
                      -Resim Boyutunuz Ne Kadar <b>Az Olursa</b> Sitenizin Yüklenmesi Daha Hızlı Olur<br>
                    </p>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="urun_adi" type="text" value="<?php echo $urun->urun_adi ?>">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Açıklaması<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="urun_aciklamasi" rows="10" class="form-control col-md-7 col-xs-12"
                          ><?php echo $urun->urun_aciklamasi ?></textarea>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Fiyatı<br><span class="required">*</span>
                        </label>TL
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="urun_fiyati" class="form-control col-md-7 col-xs-12" value="<?php echo $urun->urun_fiyati ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file"  name="slider_1" class="form-control col-md-7 col-xs-12">
                           <img class="img" width="60px" src="../../slider-img/<?=$urun->slider_1?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="slider_2" required="required"  class="form-control col-md-7 col-xs-12">
                          <img class="img" width="60px" src="../../slider-img/<?=$urun->slider_2?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resim 3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="slider_3" class="form-control col-md-7 col-xs-12">
                          <img class="img" width="60px" src="../../slider-img/<?=$urun->slider_3?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resim 4<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="file" name="slider_4" class="optional form-control col-md-7 col-xs-12">
                          <img class="img" width="60px" src="../../slider-img/<?=$urun->slider_4?>" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="kategori" id="select-kategori" class="optional form-control col-md-6 col-xs-12" >
                          <option>Seçiniz</option>
                          <?php foreach($kategoriler as $kategori): ?>
                        <option value="<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                      </div>
                      <input type="hidden" name="urun_id" value="<?php echo $urun->id ?>">
                    <button name="urun_update" type="submit" class="btn btn-success">Ürünü Güncelle <i class="fa fa-rotate-left"></i></button>

                      <div class="ln_solid"></div>
                     
                        
                         
                          
                        
                      </div>
                </form>

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
    <?php echo'
  <script>
    document.getElementById("select-kategori").value="'.$urun->kategori_id.'";
  </script>'; ?>
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    
    
  </body>
</html>