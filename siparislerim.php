<?php include'header.php'; 
if(empty($mail)){
    header("Location:login.php");
    exit;
}
$kid=$kullaniciCek['kullanici_id'];
$tedarik_siparisler=$db->query("SELECT * FROM siparisler WHERE kullanici_id=$kid AND siparis_durum=1",PDO::FETCH_OBJ)->fetchAll();
$kargo_siparisler=$db->query("SELECT * FROM siparisler WHERE kullanici_id=$kid AND siparis_durum=2",PDO::FETCH_OBJ)->fetchAll();
$teslim_siparisler=$db->query("SELECT * FROM siparisler WHERE kullanici_id=$kid AND siparis_durum=3",PDO::FETCH_OBJ)->fetchAll();

//sayaclar
$tedarikSay=count($tedarik_siparisler);
$kargoSay=count($kargo_siparisler);
$teslimSay=count($teslim_siparisler);
?>
<!--breadcrumbs area start-->
<head>
<title>Hesabım</title>
<style>
    #page-info{
        border: none;
        float: left;
        padding-top:20px;
        padding-bottom:20px;
        font-size:15px;
    }
    .column-info{
    	width:100%;
    	padding:15px 0px 15px 0px;
    	background-color: #665dde;
    }
    .column-info h3{
    	color: white;
    }
    .img-body{
    	border-radius: 50%;
    }

</style>
</head>
  
   
    <!--shopping cart area start -->

    <div class="shopping_cart_area mt-60">
    	
        <div class="container"> 
        	<div class="top_page">
        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-lg-12">
                    <div class="row">
                         <div class="col-xl-12 col-lg-10 col-md-10 col-sm-10">
    <a href="hesabim.php"><button id="page-info" class="col-md-3">Bilgilerim</button></a>
    <a href="siparislerim.php"><button id="page-info" class="col-md-3 ">Siparişlerim</button></a>
    <a href="index.php#urunler"><button id="page-info" class="col-md-3 ">Ürünler</button></a>
    <a href="index.php"><button id="page-info" class="col-md-3 ">Anasayfa'ya Geri Dön</button></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
        <div class="column-info">
        <center><h3>Tedarik Edilen Ürünler</h3></center>
    </div> 
            
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                
                                 <table>

                            <thead>
                                
                                <tr style="background-color: #e2e2e2; color:#666;border:none;">
                                    
                                    <th class="product_name">Sipariş Tarihi</th>
                                    <th class="product-price">Sipariş Özeti</th>
                                    <th class="product_quantity">Alıcı</th>
                                    <th class="product_total">Toplam Tutar</th>
                                    <th class="product_remove">Detay</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tedarik_siparisler as $siparis): ?>
                                <tr>
                                    
                                    <td class="product_name"><a href="#"><?= $siparis->siparis_zaman; ?></a></td>
                                    <td class="product-price"><?= $siparis->urun_toplam_adet; ?> Adet Ürün</td>
                                    <td class="product_quantity"><label><?= $kullaniciCek['kullanici_adsoyad']; ?></label> </td>
                                    <td class="product_total"><?= $siparis->toplam_tutar; ?>TL</td>
                                    <td class="product_remove"><a href="#"><div class="cart_submit">
                                <a href="siparis-detay.php?siparis-kodu=<?=$siparis->siparis_id;?>"><button type="submit">Sipariş Detay</button></a>
                            </div>  </a></td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                        </table>  
                        <?php if($tedarikSay==0){ ?>
                                        <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                          </div>
                                    <?php } ?>    
                            </div>  
                                  
                        </div>
                    </div>
                </div>
                
                <div class="column-info">
        <center><h3>Kargodaki Ürünler</h3></center>
    </div> 
            
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                
                                 <table>

                            <thead>
                                
                                <tr style="background-color: #e2e2e2; color:#666;border:none;">
                                    
                                    <th class="product_name">Sipariş Tarihi</th>
                                    <th class="product-price">Sipariş Özeti</th>
                                    <th class="product_quantity">Alıcı</th>
                                    <th class="product_total">Toplam Tutar</th>
                                    <th class="product_remove">Detay</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($kargo_siparisler as $siparis): ?>
                                <tr>
                                    <td class="product_name"><a href="#"><?= $siparis->siparis_zaman; ?></a></td>
                                    <td class="product-price"><?= $siparis->urun_toplam_adet; ?> Adet Ürün</td>
                                    <td class="product_quantity"><label><?= $kullaniciCek['kullanici_adsoyad']; ?></label> </td>
                                    <td class="product_total"><?= $siparis->toplam_tutar; ?>TL</td>
                                    <td class="product_remove"><a href="#"><div class="cart_submit">
                                <a href="siparis-detay.php?siparis-kodu=<?=$siparis->siparis_id;?>"><button type="submit">Sipariş Detay</button></a>
                            </div>  </a></td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>

                        </table> 
                         <?php if($kargoSay==0){ ?>
                                        <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                          </div>
                                    <?php } ?>   
                            </div>  
                                  
                        </div>
                    </div>
                </div>

                <div class="column-info">
        <center><h3>Teslim Edilen Ürünler</h3></center>
    </div> 
            
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                
                                 <table>

                            <thead>
                                
                                <tr style="background-color: #e2e2e2; color:#666;border:none;">
                                    
                                    <th class="product_name">Sipariş Tarihi</th>
                                    <th class="product-price">Sipariş Özeti</th>
                                    <th class="product_quantity">Alıcı</th>
                                    <th class="product_total">Toplam Tutar</th>
                                    <th class="product_remove">Detay</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($teslim_siparisler as $siparis): ?>
                                <tr>
                                    
                                    <td class="product_name"><a href="#"><?= $siparis->siparis_zaman; ?></a></td>
                                    <td class="product-price"><?= $siparis->urun_toplam_adet; ?> Adet Ürün</td>
                                    <td class="product_quantity"><label><?= $kullaniciCek['kullanici_adsoyad']; ?></label> </td>
                                    <td class="product_total"><?= $siparis->toplam_tutar; ?>TL</td>
                                    <td class="product_remove"><a href="#"><div class="cart_submit">
                                <a href="siparis-detay.php?siparis-kodu=<?=$siparis->siparis_id;?>"><button type="submit">Sipariş Detay</button></a>
                            </div>  </a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>  
                        <?php if($teslimSay==0){ ?>
                                        <div style="text-align: center;" class="alert alert-primary">  <h4>Bu Tipte Siparişiniz Bulunmamaktadır.</h4>
                                          </div>
                                    <?php } ?>    
                            </div>  
                                  
                        </div>
                    </div>
                </div>


            
            
        </div>     
    </div>
    <!--shopping cart area end -->

<?php include'footer.php';?>