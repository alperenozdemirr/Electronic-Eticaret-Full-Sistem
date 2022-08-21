<?php include'header.php';
if(empty($mail)){
    header("Location:login.php");
    exit;
} 
$kid=$kullaniciCek['kullanici_id'];
$siparisId=$_GET['siparis-kodu'];
$siparis_detay=$db->query("SELECT * FROM siparis_detay WHERE siparis_id=$siparisId",PDO::FETCH_OBJ)->fetchAll();
$siparis_bilgi=$db->query("SELECT * FROM siparisler WHERE siparis_id=$siparisId",PDO::FETCH_OBJ)->fetch();
$sDurum=$siparis_bilgi->siparis_durum;
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
.siparis-info{
    padding-left:5%;
    padding-right:5%;
    width:90%;
    padding-top:10px;
    padding-bottom:10px;
    background-color:#faf9f9;
    float: left;
    margin-top:15px;
    border: 1px solid #ededed;
position: relative;
}
.siparis-info h1{
    font-size:18px;
    color: #838383;
    letter-spacing:1px;
    padding-bottom:20px;
}
.siparis-info h2{
    font-size:15px;
    color: #838383;
    
}
.siparis-info img{
    width:30px;
    margin-bottom:-7px;
    margin-right:5px;
    height: auto;
}
.block{
    width: 100%;
    height: 250px;
    float: left;
}
.siparis-durum{
    padding:3px 12px 3px 12px;
    position: absolute;
    top:0px;
    right: 0px;

}
.siparis-durum h2{
    font-size:12px;
    color: white;

}
</style>
</head>
  
   
    <!--shopping cart area start -->
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="hesabim.php">Hesabım</a></li>
                            <li><a href="siparislerim.php">Siparişlerim</a></li>
                            <li>Sipariş Detayım</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
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
      <div style="text-align: center;" 
      class="alert alert-<?php if($sDurum==1){echo"warning";}elseif($sDurum==2){echo "info";}elseif($sDurum==3){echo"success";}?>"><h4>
    <?php if($sDurum==1){echo "Bu Sipariş Tedarik Ediliyor Tedarik Edildikten Kargoya Verilecektir Tedarik Süreci 1 ile 7 gün Arasındadır.";}elseif($sDurum==2){echo "Bu Sipariş Kargoda Kargo Şirketine Göre İletim Hızı Değişkenlik Gösterir Tahmini Süre 2 ile 7 Gündür";}elseif($sDurum==3){echo "Bu Sipariş Başarılı Bir Şekilde Teslim Edilmiştir";} ?></h4>
  </div>
            
                <div class="row">

                    <div class="col-12">

                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                
                                 <table>

                            <thead>
                                
                                <tr style="background-color: #e2e2e2; color:#666;border:none;">
                                    
                                    <th class="product_name">Resim</th>
                                    <th class="product-price">Ürün Adı</th>
                                    <th class="product_quantity">Fiyat</th>
                                    <th class="product_total">Ürün Adet</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($siparis_detay as $siparis){ 
                                	$urun_id=$siparis->urun_id;
                                	$urunsor=$db->prepare("SELECT * FROM urunler WHERE id=:urun_id");
                                	$urunsor->execute(array('urun_id'=>$urun_id));
                                	$urunCek=$urunsor->fetch(PDO::FETCH_ASSOC);
                                	?>
                                	

                                <tr>
                                    <td class="product_thumb"><a href="#"><img src="slider-img/<?= $urunCek['slider_1']; ?>" alt=""></a></td>
                                    
                                    <td class="product-price"><?= $urunCek['urun_adi']; ?></td>
                                    <td class="product_quantity"><label><?= $siparis->urun_fiyat*$siparis->urun_adet; ?>TL</label> </td>
                                    <td class="product_total">Adeti: <?= $siparis->urun_adet ?> adet</td>
                                    
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>    
                            </div>  
                                  
                        </div>
                        <div class="checkout_form">
                <div class="row">
                <div class="col-lg-6 col-md-6">
                        <form action="#">    
                            <center><h3>Teslimat Bilgileri</h3></center> 
                            <div class="order_table table-responsive">
                                <table>
                                    
                                    <tbody>
                                        <tr>
                                            <td> Teslim Edilen Kişi </td>
                                            <td><?=$kullaniciCek['kullanici_adsoyad'];?></td>
                                        </tr>
                                        <tr>
                                            <td>  İletişim</td>
                                            <td><?=$kullaniciCek['kullanici_tel'];?></td>
                                        </tr>
                                        <tr>
                                            <td>  Teslim Edilen Adres</td>
                                            <td><?=$kullaniciCek['kullanici_adres'];?></td>
                                        </tr>
                                        
                                    </tfoot>
                                </table>     
                            </div>
                      
                        </form>         
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form action="#">    
                            <center><h3>Ödeme Bilgileri</h3></center> 
                            <div class="order_table table-responsive">
                                <table>
                                    
                                    <tbody>
                                        <tr>
                                            <td>Ödeme Tipi</td>
                                            <td>Kredi Kartı</td>
                                        </tr>
                                        <tr>
                                            <td>Ödenmiş Tutar</td>
                                            <td><?=$siparis_bilgi->toplam_tutar;?>TL</td>
                                        </tr>
                                        <tr>
                                            <td>Kargo Dahil</td>
                                            <td><?=$siparis_bilgi->toplam_tutar+39;?>.00TL</td>
                                        </tr>
                                         </tbody>  
                                    </tfoot>
                                </table>  

                            </div>
                            
                        </form>         
                    </div>
                </div> 
            </div>
                    </div>
               
                </div>
                





            
         
        </div>     
    </div>
    <!--shopping cart area end -->

<?php include'footer.php';?>