<?php include'header.php'; 
$kategoriler=$db->query("SELECT * FROM kategoriler",PDO::FETCH_OBJ)->fetchAll();
?>

        <!-- page content -->
        <div class="right_col" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ürün Ekleme Sayfası</h3>
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
              <div class="col-md-12 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ürün Ekleme<small>Ürün İd : 0</small></h2>
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

                      <p>DİKKAT bu Ürün Ekle Butonuna Bastığınızda Satış Sayfanızdaki verilerinize Eklenecektir Emin olmadan Değişiklik Ekleme Yapmayınız<br>Dilediğiniz Kadar Ekleme Yapabilirsiniz Bir Sınır Yokur!
                      </p>
                      <span class="section">Ürün Bilgileri<br></span><p>-Eklemek İstediğin Ürün Bilgilerini Gereken Yerlere Girip Ürün Ekle butonuna basınız.<br>
                      -Fiyat Girişinde Lütfen küsüratlı olacaksa "." ile giriniz örnek-1="99.99" örnek-2="100" küsürat şart Değildir.<br>
                      -Resim Girerken Uzantının Önemi Yoktur<br>

                      -Resim Uzunluğu En Fazla 80Mb Olmalıdır
                    ama siz ufak dosyalar atmaya çalışın.<br>
                    -Resimleriniz Kb veya Mb cinsinsden ne kadar az ise sitenizin açılması o kadar hızlı olur! 
                      <br>
                    </p>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  name="urun_adi" type="text">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Açıklaması<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="urun_aciklamasi" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ürün Fiyatı<br><span class="required">*</span>
                        </label>TL
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="urun_fiyati" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim 1 (KAPAK)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file"  name="slider_1" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="slider_2" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resim 3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="slider_3" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Resim 4<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="slider_4" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="kategori" class="optional form-control col-md-6 col-xs-12" >
                          <option>Seçiniz</option>
                          <?php foreach($kategoriler as $kategori): ?>
                        <option value="<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                      </div>
                      
                         
                        

                      
                    <button name="urun_ekle" type="submit" class="btn btn-success">Ürünü Ekle</button>

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