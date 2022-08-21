<?php include'header.php'; 

$kategoriler=$db->query("SELECT * from kategoriler ORDER BY kategori_id DESC",PDO::FETCH_OBJ)->fetchAll();

?>

<head>
  <title>Kategoriler</title>
</head>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tüm Kategoriler Listesi</h3>
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
                    <h2>Kategoriler</h2>
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

                    <p>Bugüne Kadar Kullanıcıların Aldığı Tüm Siparişler</p>

                    <!-- start project list -->
                    <table style="width:70%;margin-left: 15%;" class="table table-striped projects">
                      <thead>
                        <tr>
                          
                          <th style="width: 80%">Kategori Adı</th>
                          <th>Güncelle</th>
                          <th >Sil</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($kategoriler as $kategori){ ?>
                          
                        <tr style="text-align:center;">
                          <td><?= $kategori->kategori_name ?></td>
                          <td>
                            <a href="kategoriupdate.php?kategori=<?php echo $kategori->kategori_id ?>" class="btn btn-success btn-xs"><i class="fa fa-rotate-left"></i>Güncelle</a>
                          </td>
                          <td>
                            <form action="../../baglan/islem.php" method="POST">
                            <input type="hidden" name="kategoriid" value="<?= $kategori->kategori_id; ?>">
                            <button type="submit" name="kategori_sil" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </button>
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