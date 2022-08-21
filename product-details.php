<?php 
include'header.php';
if(isset($_GET['urun-kod'])){
$urun_id=$_GET['urun-kod'];
}

$urunsor=$db->prepare("SELECT * FROM urunler WHERE id=:id");
$urunsor->execute(array(
'id'=>$urun_id
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
 $kategoriID=$uruncek['kategori_id'];
                        $kategorisor=$db->prepare("SELECT * FROM kategoriler WHERE kategori_id=:id");
                        $kategorisor->execute(array('id'=> $kategoriID));
                        $kategoriCek=$kategorisor->fetch(PDO::FETCH_ASSOC);
 ?>
<head>
    <title>
        <?php echo $uruncek['urun_adi']; ?>    
   </title>
</head>


    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-2.html">Anasayfa</a></li>
                            <li>Ürün Detayları</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    
    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="slider-img/<?php echo $uruncek['slider_1']; ?>" data-zoom-image="slider-img/<?php echo $uruncek['slider_1']; ?>" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="slider-img/<?php echo $uruncek['slider_2']; ?>" data-zoom-image="slider-img/<?php echo $uruncek['slider_2']; ?>">
                                        <img src="slider-img/<?php echo $uruncek['slider_2']; ?>" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="slider-img/<?php echo $uruncek['slider_3']; ?>" data-zoom-image="slider-img/<?php echo $uruncek['slider_3']; ?>">
                                        <img src="slider-img/<?php echo $uruncek['slider_3']; ?>" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="slider-img/<?php echo $uruncek['slider_4']; ?>" data-zoom-image="slider-img/<?php echo $uruncek['slider_4']; ?>">
                                        <img src="slider-img/<?php echo $uruncek['slider_4']; ?>" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="slider-img/<?php echo $uruncek['slider_1']; ?>" data-zoom-image="slider-img/<?php echo $uruncek['slider_1']; ?>">
                                        <img src="slider-img/<?php echo $uruncek['slider_1']; ?>" alt="zo-th-1"/>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="baglan/islem.php" method="POST">
                           
                            <h1> <?php echo $uruncek['urun_adi']; ?>   </h1>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (250 reviews) </a></li>
                                </ul>
                                
                            </div>
                            <div class="price_box">
            <span class="current_price"> <?php echo $uruncek['urun_fiyati']; ?>TL</span>
                                <span class="old_price"><?php echo $uruncek['urun_fiyati']+800; ?>TL</span>
                                
                            </div>
                            <div class="product_desc">
                                <ul>
                                    <li>Sınırsız Stok</li>
                                    <li>Kargo Ücreti 39TL</li>
                                    <li>30 Gün İçinde Geri İade</li>
                                    <li>12 Ay Garanti</li>
                                </ul>
                                <p><?php echo $uruncek['urun_aciklamasi'];?></p>
                            </div>
                            <?php $time=0; if($time!=0){ ?>
							<div class="product_timing">
                                <div data-countdown="2023/12/15"></div>
                            </div>
                        <?php } ?>
                            <div class="product_variant quantity">
                                <label>Adet</label>
                                <input type="hidden" value="<?php echo $kullaniciCek['kullanici_id']; ?>" name="kullanici_id">
                                <input type="hidden" value="<?php echo $urun_id; ?>" name="urun_id">
                                <input min="1" max="100" name="urun_adet" value="1" type="number">
                                <?php if($kullanici_confirm==1){ ?>
                                <button class="button" name="sepete_ekle" type="submit">Sepete Ekle</button> 
                                <?php }else{ ?>
                                    <a href="login.php?y=sepet" class="button">Sepete Ekle</a>
                                <?php } ?> 
                                
                            </div>
                            <div class="product_meta">
                                <span>Kategori: <a href="kategori.php?kategori=<?= $uruncek['kategori_id']; ?>"><?=$kategoriCek['kategori_name'];?></a></span>
                            </div>
                            
                        </form>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>           
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>           
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>           
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>        
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>        
                            </ul>      
                        </div>

                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--product details end-->
    
    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">   
                        <div class="product_info_button">    
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Özellikleri</a>
                                </li>
                                
                               
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p><?php echo $uruncek['urun_aciklamasi'];?></p>
                                </div>    
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product_d_table">
                                   <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Styles</td>
                                                    <td>Girly</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Properties</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>    
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    </ul>   
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div> 
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>  
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>   
                                    </div> 
                                </div>     
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </div>    
    </div>  
    <!--product info end-->


    <?php include'footer.php'; ?>