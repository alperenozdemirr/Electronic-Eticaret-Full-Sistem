<?php 
  include'header.php';
$urunler=$db->query("SELECT * FROM urunler ORDER BY id DESC",PDO::FETCH_OBJ)->fetchAll();

?>
<head>
    <title>Anasayfa</title>

</head>
<div id="poupop"><div id="content"><img src="pouppop/pouppop.jpg"><span onclick="pouppopClose()" id="pouppop-close">&#10007;</span></div></div>
    <!--slider area start-->
    <section class="slider_section d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg">
        <div class="slider_area owl-carousel">
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>IPHONE SE 2022</h1>
                                <h2>PEŞİN FİYATINA 12 TAKSİT</h2>
                                <p>Yeni Kullanıcıya <span> %20 </span> İndirim</p>
                                <a class="button" href="kategori.php?kategori=5">Şimdi Satın Al</a>
                            </div>
                        </div>                      
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="content-slider/slider3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>BİR SONRAKİ DRONE SEVİYESİ</h1>
                                <h2>KULLANIM İÇİN ÇILGIN KALİTE</h2>
                                <p>Bu Haftaya Özel <span> %20</span>indirim</p>
                                <a class="button" href="kategori.php?kategori=3">Şimdi Satın Al</a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="assets/img/product/1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="single_slider d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <h1>TEKNO GAME SET</h1>
                                <h2>%100 Performans</h2>
                                <p>Cuma Günlerine Özel <span> 20% off </span> İndirim</p>
                                <a class="button" href="product-details.html">Şimdi Satın Al</a>
                            </div>
                        </div>                        
                        <div class="col-xl-6 col-md-6">
                            <div class="slider_content">
                                <img src="content-slider/slider2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--slider area end-->

    <!--Tranding product-->
    <section class="pt-60 pb-30 gray-bg">
        <div id="urunler" class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Tüm Ürünler</h2>
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
    <?php if(empty($mail)){ ?>
    <script>
    function pouppopOpen(){
        document.getElementById("poupop").style.display ="block";
        document.getElementById("poupop").style.justifyContent ="center";
         document.getElementById("poupop").style.display ="flex";
    }
    function pouppopClose(){
        document.getElementById("poupop").style.display ="none";
    }
    setTimeout(pouppopOpen,3000);
</script>
<?php } ?>



   
	
 <?php include'footer.php'; ?>