<?php include'header.php'; 

?>
<head>
    <title>Sepetim(<?= $sepetSay ?>)</title>
    <style>
        .adet-arti,.adet-eksi,.basket-remove{
            padding: 5px;
            font-size: 20px;
            border: none;
            background-color: white;


        }
        .adet-arti{
            color: #1d1678;
        }
        
    </style>
</head>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li>Sepetim</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">  

            
                
                        <?php if($sepetSay!=0){ ?>
                            <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_thumb">Resim</th>
                                    <th class="product_name">Ürün</th>
                                    <th class="product-price">Fiyat</th>
                                    <th class="product_quantity">Adet</th>
                                    <th class="product_total">Tutar</th>
                                    <th class="product_remove">Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($sepet as $urun){ 
                                
                                $urunid=$urun->urun_id;
                                $urunsor=$db->prepare("SELECT * FROM urunler WHERE id=:urunid");
                                $urunsor->execute(array(
                                'urunid'=>$urunid
                                ));
                                $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                                @$toplamTutar+=$uruncek['urun_fiyati']*$urun->urun_adet;
                                @$toplamAdet+=$urun->urun_adet;
                                    ?>
                                    
                                <tr>
                                    <td class="product_thumb"><a href="#"><img src="slider-img/<?php echo $uruncek['slider_1']; ?>" alt=""></a></td>
                                    <td class="product_name"><a href="#"><?php echo substr($uruncek['urun_adi'],0,30); ?>...</a></td>
                                    <td class="product-price"><?php echo $uruncek['urun_fiyati']; ?>TL</td>
                                    
                                    <td class="product_quantity">
                                        <form action="baglan/islem.php" method="POST"> 
                                    <input type="hidden" name="sepet_id" value="<?= $urun->sepet_id; ?>">
                                    <input type="hidden" name="urun_adet" value="<?= $urun->urun_adet; ?>">
                                        <button type="submit" name="sepet_eksi" class="adet-eksi">-</button></form>     
                                        <input min="1" max="100" value="<?php echo $urun->urun_adet; ?>" type="number" disabled>
                                        <form action="baglan/islem.php" method="POST"> 
                                    <input type="hidden" name="sepet_id" value="<?= $urun->sepet_id; ?>">
                                    <input type="hidden" name="urun_adet" value="<?= $urun->urun_adet; ?>">
                                        <button type="submit" name="sepet_arti" class="adet-arti">+</button></form></td>
                                    <td class="product_total"><?php echo $uruncek['urun_fiyati']*$urun->urun_adet; ?>TL</td>
									<td class="product_remove">
                                        <form action="baglan/islem.php" method="POST"> 
                                    <input type="hidden" name="sepet_id" value="<?= $urun->sepet_id; ?>">
                                        <button name="sepet_sil" type="submit" class="basket-remove" href="#"><i class="ion-android-close"></i></button></form></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>   
                            </div>  
                               
                        </div>
                           </div>
                </div>
                <div class="coupon_area">
                    <div class="row">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="coupon_code right">
                                <h3>Sipariş Özeti</h3>
                                <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Toplam Fiyat</p>
                                    <p class="cart_amount"><?= $toplamTutar;?>TL</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Kargo Dahil</p>
                                    <p class="cart_amount"> <?= $toplamTutar+39;?>TL</p>
                                </div>
                               <div class="cart_subtotal ">
                                    <p>Toplam Ürün Adeti</p>
                                    <p class="cart_amount"><?= $toplamAdet; ?></p>
                                </div>

                                <div class="cart_subtotal">
                                    <p>Ödenecek Tutar</p>
                                    <p class="cart_amount"><?= $toplamTutar+39;?>TL</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="teslimat-bilgi.php">Siparişi Tamamla</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php }else{ ?>
                        <div style="text-align: center;" class="alert alert-primary"><h4>
    Sepetinizde Ürün Bulunmamaktadır Sepete Ürün Eklemek İçin <a href="index.php#urunler"><u> Tıklayınız</u></a></h4>
  </div>
                   <?php } ?>
                 
                <!--coupon code area start-->
                
                <!--coupon code area end-->
            
        </div>     
    </div>
    <!--shopping cart area end -->
        
<?php include'footer.php'; ?>
