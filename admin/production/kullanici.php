<?php include'header.php'; ?>
<?php $siSay = $db->query("SELECT * from kullanici", PDO::FETCH_OBJ)->fetchAll(); 

if(isset($_GET['s'])) {
    $sayfa = $_GET['s'];
}
if (empty($sayfa) || !is_numeric($sayfa)){
  $sayfa =1;
}
$kacar =15;
$ksayisi = count($siSay);
$ssayisi = ceil($ksayisi/$kacar);
$nereden = ($sayfa*$kacar)-$kacar;
$kullanicilar = $db->query("SELECT * from kullanici order by kullanici_id DESC Limit $nereden,$kacar", PDO::FETCH_OBJ)->fetchAll(); 
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kullanıcı Listesi</h3>
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
                          <th style="width: 20%">Ad Soyad</th>
                          <th>Adresi</th>
                          <th>Telefon No</th>
                          <th>Mail Adresi</th>
                          <th>Posta Kodu</th>
                          <th>Şehir</th>
                          <th style="width: 20%">Düzenle</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($kullanicilar as $kullanici){ ?>
                        <tr>
                          <td><?php echo $kullanici->kullanici_id ?></td>
                          <td>
                            <a><?php echo $kullanici->kullanici_adsoyad ?></a>
                            <br />
                            <small><?php echo $kullanici->zaman ?></small>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <?php echo $kullanici->kullanici_adres ?>
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <?php echo $kullanici->kullanici_tel ?>
                            </ul>
                          </td>
                          <td>
                            <ul class="list-inline">
                              <?php echo $kullanici->kullanici_mail ?>
                            </ul>
                          </td>
                          <td class="project_progress">
                            
                            </div>
                            <medium><?php echo $kullanici->kullanici_posta_kodu ?></medium>
                          </td>
                          <td>
                            <?php echo $kullanici->kullanici_sehir ?>
                          </td>
                          <td>
                            
                           <form action="../../baglan/islem.php" method="POST" role="form">
                            <input type="hidden" name="kullanici_ID" value="<?php echo $kullanici->kullanici_id ?>">
                            <button type="submit" name="kullanici_delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </button>
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

         <li class="page-item"><a class="page-link" href="kullanici.php?s=<?php echo $i ?>"><?php echo $i ?></a></li>

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