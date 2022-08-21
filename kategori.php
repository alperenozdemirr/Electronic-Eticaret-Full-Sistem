<?php 
  include'header.php';
  $id=$_GET['kategori'];
$urunler=$db->query("SELECT * FROM urunler WHERE kategori_id=$id ORDER BY id DESC",PDO::FETCH_OBJ)->fetchAll();
$kategorisor=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
$kategorisor->execute(array('id'=>$_GET['kategori']));
$kategoriCek=$kategorisor->fetch(PDO::FETCH_ASSOC);
if(empty($urunler)){
    header("Location:index.php?null");
    exit;
}
?>
<head>
    <title><?= $kategoriCek['kategori_name']; ?></title>
</head>

<!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li>Kategoriler</li>
                            <li><?= $kategoriCek['kategori_name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div id="urunler" class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2><?= $kategoriCek['kategori_name']; ?> Ürünleri</h2>
                    </div>
                </div>
            </div>


                <div class="row justify-content-center">
                    <?php foreach ($urunler as $urun){ 
                        $kategoriID=$urun->kategori_id;
                        $kategorisor=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
                        $kategorisor->execute(array('id'=> $kategoriID));
                        $kategoriCek=$kategorisor->fetch(PDO::FETCH_ASSOC);
                        ?>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                        <div class="single-tranding">
                            <a href="product-details.php?urun-kod=<?php echo $urun->id; ?>">
                                <div class="tranding-pro-img">
                                    <img src="slider-img/<?php echo $urun->slider_1;?>" alt="">
                                </div>
                                <div class="tranding-pro-title">
                                    <h3><?php echo substr($urun->urun_adi,0,30);?>...</h3>
                                    <h4><?=$kategoriCek['kategori_name'];?></h4>
                                </div>
                                <div class="tranding-pro-price">
                                    <div class="price_box">
                                        <span class="current_price"><?php echo $urun->urun_fiyati;?></span>
                                        <span class="old_price"><?php echo $urun->urun_fiyati+800;?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php } ?>
            </div>

        </div>
    </section><!--Tranding product-->





   
	
 <?php include'footer.php'; ?>