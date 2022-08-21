<?php include'header.php'; ?>
<?php $header = $db->query("SELECT * from header WHERE id=1", PDO::FETCH_OBJ)->fetch(); ?>
        <!-- page content -->
        <div class="right_col" >
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Header Düzenleme Sayfası</h3>
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
                    <h2>Header daki Bilgileri Düzenle</h2>
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

                      <p>DİKKAT bu Güncelle Butonuna Bastığınızda Satış Sayfanızdaki Bilgileri Değiştirecektir Emin olmadan Değişiklik Yapmayınız!
                      </p>
                      <span class="section"><p>
                        -Sitenin Sağ üst köşesindeki Twiter, instagram, facebook Hesaplarının bağlantı adresleridir<br>
                        -Logo İse Sitenin Sol Üst Köşesinde Olan Logoyu Değiştirir istediğiniz Logoyu Koyabilirisiniz
                        Svg Format çalışmıyor Svg dışı atım yapınız
                    </p>
</span>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Destek Gmail Giriniz<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  name="destek_mail" type="text"
                          value="<?php echo $header->destek_mail ?>">
                        </div>
                      </div>

                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">facebook Bağlantı Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12"  name="facebook_url" type="text"
                          value="<?php echo $header->facebook_url ?>">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Twiter Bağlantı Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input class="form-control col-md-7 col-xs-12"  name="twiter_url" type="text"
                          value="<?php echo $header->twiter_url ?>">
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">İnstagram Bağlantı Url<br><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="instagram_url" class="form-control col-md-7 col-xs-12"
                          value="<?php echo $header->instagram_url ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Logo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file"  name="header_logo" class="form-control col-md-7 col-xs-12">
                        </div>
                        <img src="../../logo/<?=$header->logo;?>" width="35">
                      </div>

                      
                    <button name="header_duzenle" type="submit" class="btn btn-success">Bilgilerimi Güncelle</button>

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