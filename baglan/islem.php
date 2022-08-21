<?php
ob_start();
session_start();
include'baglan.php';

function islemkontrol() {
$mail=null;
if(isset($_SESSION['kullanici_mail'])){
  $mail=$_SESSION['kullanici_mail'];
}
if(isset($_COOKIE['kullanici_mail'])){
  $mail=$_COOKIE['kullanici_mail'];
}
if(empty($mail)){
	Header("Location:../index.php?durum=izinyok");
	exit;
}
}

function adminkontrol () {
if(empty($_SESSION['admin_mail'])){
	Header("Location:../../?durum=admindegilsin");
	exit;
}
}



//sepet işlemleri
if(isset($_POST['sepete_ekle'])){
	islemkontrol();
	$get_sepet=$db->prepare("INSERT INTO sepet SET 
		kullanici_id=:kullaniciid,
		urun_id=:urun_id,
		urun_adet=:urun_adet
		");
	$set_sepet=$get_sepet->execute(array(
		'kullaniciid'=>$_POST['kullanici_id'],
		'urun_id'=>$_POST['urun_id'],
		'urun_adet'=>$_POST['urun_adet']
	));
	if($set_sepet){
		header("Location:../sepet.php?sepet=ok");
		exit;
	}else{
		header("Location:../sepet.php?sepet=ok");
		exit;
	}
}

if(isset($_POST['sepet_eksi'])){
	islemkontrol();
	$id=$_POST['sepet_id'];
	$adet=$_POST['urun_adet'];
	if($adet!=1){
		$newAdet=$adet-1;
		$get_sepet=$db->prepare("UPDATE sepet SET urun_adet=:adet WHERE sepet_id=$id");
		$set_sepet=$get_sepet->execute(array(
			'adet'=>$newAdet
		));
		if($set_sepet){
			header("Location:../sepet.php?update=ok");
			exit;
		}else{
			header("Location:../sepet.php?update=no");
			exit;
		}
	}else{
			$get_sepet=$db->prepare("DELETE from sepet WHERE sepet_id=:id");
	$set_sepet=$get_sepet->execute(array(
		'id'=>$id
	));
	if($set_sepet){
		header("Location:../sepet.php?remove=ok");
		exit;
	}else{
		header("Location:../sepet.php?remove=no");
		exit;
	}
	}

}
if(isset($_POST['sepet_arti'])){
	islemkontrol();
	$id=$_POST['sepet_id'];
	$adet=$_POST['urun_adet'];
	$newAdet=$adet+1;
	$get_sepet=$db->prepare("UPDATE sepet SET urun_adet=:adet WHERE sepet_id=$id");
	$set_sepet=$get_sepet->execute(array(
		'adet'=>$newAdet
	));
	if($set_sepet){
		header("Location:../sepet.php?update=ok");
		exit;
	}else{
		header("Location:../sepet.php?update=no");
		exit;
	}

}

if(isset($_POST['sepet_sil'])){
	islemkontrol();
	//uyarı Adeti 0 olduğunda silme işlemi yap unutma!!!!!!
	$id=$_POST['sepet_id'];
	$get_sepet=$db->prepare("DELETE from sepet WHERE sepet_id=:id");
	$set_sepet=$get_sepet->execute(array(
		'id'=>$id
	));
	if($set_sepet){
		header("Location:../sepet.php?remove=ok");
		exit;
	}else{
		header("Location:../sepet.php?remove=no");
		exit;
	}

}




if(isset($_POST['kullanici_register'])){

	unset($_SESSION["kullanici_adsoyad"]);
	unset($_SESSION["kullanici_mail"]);
	unset($_SESSION["kullanici_passwordone"]);
	unset($_SESSION["kullanici_passwordtwo"]);
	unset($_SESSION["kullanici_tel"]);

$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); 
$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);

$kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); 
$kullanici_tel=trim($_POST['kullanici_tel']);




	/*$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); 
$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
$kullanici_tel=htmlspecialchars($_POST['kullanici_tel']);
$kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); */

if($kullanici_passwordone==$kullanici_passwordtwo){
	if(strlen($kullanici_passwordone)>=6){
		if($kullanici_adsoyad =="" || $kullanici_mail =="" || $kullanici_passwordone =="" || $kullanici_passwordtwo =="" || $kullanici_tel ==""){
			header("Location:../register.php?durum=eksikbilgi");
			exit;
		}
		else{
			$_SESSION['kullanici_adsoyad']=$kullanici_adsoyad; 
			$_SESSION['kullanici_mail']=$kullanici_mail;
			$_SESSION['kullanici_passwordone']=$kullanici_passwordone; 
			$_SESSION['kullanici_passwordtwo']=$kullanici_passwordtwo; 
			$_SESSION['kullanici_tel']=$kullanici_tel;
			header("Location:../mail-confirm/mail-confirm.php");

		}
	}else{


			header("Location:../register.php?durum=eksiksifre");
			exit;

		}
}else{
	header("Location:../register.php?durum=eksiksifre");
	exit;
}
}


if(isset($_POST['kullanici_login'])){
	$mail=htmlspecialchars($_POST['kullanici_mail']);
	$password=md5($_POST['kullanici_password']);
	if($mail!="" && $password!=""){
 	$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:kullanici_mail AND kullanici_password=:kullanici_password AND kullanici_yetki=:yetki AND durum=:durum");
 	$kullanicisor->execute(array(
 		'kullanici_mail'=>$mail,
 		'kullanici_password'=>$password,
 		'yetki'=>1,
 		'durum'=>1
 	));
 	$say=$kullanicisor->rowCount();
 	if($say==1){
 		if(!isset($_POST['remember_me'])){
                $_SESSION['kullanici_mail']=$mail;
            $_SESSION['kullanici_password']=$password;
            }	
        
            if(isset($_POST['remember_me'])){
                setcookie("kullanici_mail", $mail ,time() + (86400 * 7),"/");
                setcookie("kullanici_password",$password ,time() + (86400 * 7),"/");
            }
 		header("Location:../index.php?durum=ok");
 		exit;
 	}else{
 		header("Location:../login.php?durum=no");
 		exit;
 	}
 }else{
 	header("Location:../login.php?durum=null");
 	exit;
 }
}
/*  giriş yap üye ol işlemleri -----------*/
if(isset($_POST['mail_dogrula'])){

	unset($_SESSION["kullanici_adsoyad"]);
	unset($_SESSION["kullanici_mail"]);
	unset($_SESSION["kullanici_passwordone"]);
	unset($_SESSION["kullanici_passwordtwo"]);
	unset($_SESSION["kullanici_tel"]);

$kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); 
$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);

$kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); 
$kullanici_tel=trim($_POST['kullanici_tel']);


if($kullanici_passwordone==$kullanici_passwordtwo) {
		if(strlen($kullanici_passwordone)>=6) {
	if($kullanici_adsoyad =="" || $kullanici_mail =="" || $kullanici_passwordone =="" || $kullanici_passwordtwo =="" || $kullanici_tel ==""){
header("Location:../indexler/giris.php?durum=eksikbilgi");
	}else{
		 $_SESSION['kullanici_adsoyad']=$kullanici_adsoyad; 
$_SESSION['kullanici_mail']=$kullanici_mail;
$_SESSION['kullanici_passwordone']=$kullanici_passwordone; 
$_SESSION['kullanici_passwordtwo']=$kullanici_passwordtwo; 
$_SESSION['kullanici_tel']=$kullanici_tel;
header("Location:../indexler/mail-onay.php");
	
}
		}else{


			header("Location:../indexler/giris.php?durum=eksiksifre");


		}

	}else{



		header("Location:../indexler/giris.php?durum=farklisifre");
	}

}



 



/* site giriş yap üye ol işlemleri son ---------- */





if(isset($_POST['bilgiUpdate'])){
	islemkontrol();
$bilgilerKaydet=$db->prepare("UPDATE kullanici SET
  					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_tel=:kullanici_tel,
					kullanici_adres=:kullanici_adres
					WHERE kullanici_id={$_POST['kullanici_id']}
	");

	$bilgiUpdate=$bilgilerKaydet->execute(array(
					'kullanici_adsoyad' => htmlspecialchars($_POST['bilgilerim_adsoyad']),
					'kullanici_tel' => htmlspecialchars($_POST['bilgilerim_tel']),
					'kullanici_adres' => htmlspecialchars($_POST['bilgilerim_adres'])
					));

	if ($bilgiUpdate) {
    	header("Location:../bilgilerim.php?durum=ok");
        exit;

    } else {
    	header("Location:../bilgilerim.php?durum=no");
        exit;
    }
}
/* siparis böolümünün adres bilgi lerini giriş işlemleri */

if(isset($_POST['siparisbilgilerim'])){
	islemkontrol();
	if(empty($_SESSION['userkullanici_mail'])){
	Header("Location:../indexler/giris.php?durum=uyesiz");
	exit;
}else{
	if($_POST['kullanici_posta_kodu'] == "" || $_POST['kullanici_sehir'] == "" 
	|| $_POST['kullanici_tel'] == "" || $_POST['kullanici_adres'] == ""){
		header("Location:../siparisbilgilerim.php?durum=no");
        exit;
	}else{
		
		$siparisbilgileriKaydet=$db->prepare("UPDATE kullanici SET
  					kullanici_posta_kodu=:kullanici_posta_kodu,
					kullanici_sehir=:kullanici_sehir,
					kullanici_tel=:kullanici_tel,
					kullanici_adres=:kullanici_adres
					WHERE kullanici_id={$_POST['kullanici_id']}
	");

	$siparisbilgiUpdate=$siparisbilgileriKaydet->execute(array(
					'kullanici_posta_kodu' => htmlspecialchars($_POST['kullanici_posta_kodu']),
					'kullanici_sehir' => htmlspecialchars($_POST['kullanici_sehir']),
					'kullanici_tel' => htmlspecialchars($_POST['kullanici_tel']),
					'kullanici_adres' => htmlspecialchars($_POST['kullanici_adres'])
					));

	if ($siparisbilgiUpdate) {
    	header("Location:../odeme.php?durum=ok");
        exit;

    } else {
    	header("Location:../siparislerim.php?durum=no");
        exit;
    }
}//burası 
}
	}

$adetsay = 0;
$fiyatsay = 0;
/* sipariş okeyleme işlemi */
 if(isset($_POST['sipariskaydet'])){
 	islemkontrol();
 	$siparis_durum =1;
$siparisKaydet=$db->prepare("INSERT into siparisler SET
  					urun_toplam_adet=:urun_toplam_adet,
  					urun_toplam=:urun_toplam,
  					urun_id=:urun_id,
  					kullanici_id=:kullanici_id,
  					siparis_durum=:siparis_durum
					
	");

	$siparisyaz=$siparisKaydet->execute(array(
					'kullanici_id' => $_POST['kullanici_id'],
					'urun_toplam' => $_POST['urun_toplam'],
					'urun_id' => $_POST['urun_id'],
					'urun_toplam_adet' => $_POST['urun_toplam_adet'],
					'siparis_durum' => $siparis_durum
					));

 		if($siparisyaz){
 			//header("Location:../odeme.php?durum=ok");

 			echo $siparis_id = $db->lastInsertId();
 			echo "<hr>";

 			$urunler = $_POST['urun_id'];
 			$fiyatlar = $_POST['urun_fiyat'];
 			$adetler = $_POST['urun_adet'];
 			
 			$kullanici_yetki =1;
 			
 			
 			

 			foreach($urunler as $urun){

 				$siparisKaydet=$db->prepare("INSERT into siparis_detay SET
  					siparis_id=:siparis_id,
  					urun_id=:urun_id,
  					urun_fiyat=:urun_fiyat,
  					urun_adet=:urun_adet
  									
	");

	$siparisyaz=$siparisKaydet->execute(array(
					'siparis_id' => $siparis_id,
					'urun_id' => $urun,
					'urun_fiyat' => $fiyatlar[$fiyatsay],
					'urun_adet' => $adetler[$adetsay]
					
					));
$adetsay++;
$fiyatsay++;


 			}
             //sepet sıfırlama işlemi
 			//header("Location:indexler/sepetunset.php");
 			//urunler doldurulduktan sonra eksik kalan adet doldurma işlemi
if ($siparisyaz) {
    	header("Location:../indexler/sepetunset.php");
        exit;

    } else {
    	
    	
    	
        exit;
    }
    
        exit;

    } else {
    	header("Location:../odeme.php?durum=no");
        exit;
    }
 }

//$_SESSION['userkullanici_mail']
if(isset($_POST['admin_giris'])){
	$admin_mail=htmlspecialchars($_POST['admin_mail']);
	$admin_password=md5($_POST['admin_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
  'mail' => $admin_mail,
  'password' => $admin_password,
  'yetki' => 5
  ));
echo $say=$kullanicisor->rowCount();

if($say==1){
	$_SESSION['admin_mail']=$admin_mail;
	header("Location:../admin/production/index.php?durum=basariligiris");
	exit;
}else{
header("Location:../admin/production/login.php?durum=no");
exit;
}

}

//Siparis durumu Güncelleme İşlemi

if(isset($_POST['siparis_durumu'])){
	adminkontrol();
	$siparis_durum_no=$_POST['s_durum'];
	$siparisID=$_POST['siparisID'];

$siparis_durum_update=$db->prepare("UPDATE siparisler SET
  					siparis_durum=:siparis_durum
					WHERE siparis_id=$siparisID
	");

	$siparisDurumUpdate=$siparis_durum_update->execute(array(
					'siparis_durum' => $siparis_durum_no
					));

	if ($siparisDurumUpdate) {
    	header("Location:../admin/production/siparisler.php?durum=ok");
        exit;

    } else {
    	header("Location:../admin/production/siparisler.php?durum=no");
        exit;
    }
}
//admin paneli kullanici silme işlemi
if(isset($_POST['kullanici_delete'])){
	adminkontrol();
	$kullanici_ID = $_POST['kullanici_ID'];

	
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");
	$kontrol=$sil->execute(array(
		'kullanici_id' => $kullanici_ID
		));
	if ($kontrol) {

		Header("Location:../admin/production/kullanici.php?durum=ok");
		exit;

	} else {

		Header("Location:../admin/production/kullanici.php?durum=no");
		exit;
	}

}

if(isset($_POST['urun_ekle'])){
	adminkontrol();
    $resim_dizini="../slider-img/";
    $slider1 = $_FILES["slider_1"]["name"];
    $slider2 = $_FILES["slider_2"]["name"];
    $slider3 = $_FILES["slider_3"]["name"];
    $slider4 = $_FILES["slider_4"]["name"];
$urunkaydet=$db->prepare("INSERT INTO urunler SET
		urun_adi=:urun_adi,
		urun_aciklamasi=:urun_aciklamasi,
		urun_fiyati=:urun_fiyati,
		slider_1=:slider_1,
		slider_2=:slider_2,
		slider_3=:slider_3,
		slider_4=:slider_4,
		kategori_id=:kategori_id
		");
	$inserturun=$urunkaydet->execute(array(
		'urun_adi' => htmlspecialchars($_POST['urun_adi']),
		'urun_aciklamasi' => htmlspecialchars($_POST['urun_aciklamasi']),
		'urun_fiyati' => htmlspecialchars($_POST['urun_fiyati']),
		'slider_1' => $slider1,
		'slider_2' => $slider2,
		'slider_3' => $slider3,
		'slider_4' => $slider4,
		'kategori_id'=>$_POST['kategori']

		));

	if ($inserturun) {
        move_uploaded_file($_FILES["slider_1"]["tmp_name"],$resim_dizini.$slider1);
        move_uploaded_file($_FILES["slider_2"]["tmp_name"],$resim_dizini.$slider2);
        move_uploaded_file($_FILES["slider_3"]["tmp_name"],$resim_dizini.$slider3);
        move_uploaded_file($_FILES["slider_4"]["tmp_name"],$resim_dizini.$slider4);
		Header("Location:../admin/production/urunler.php?durum=ok");
		exit;
		

	} else {

		Header("Location:../admin/production/urunler.php?durum=no");
	exit;
	}
}
if(isset($_POST['urun_update'])){
	adminkontrol();
	$resim_dizini="../slider-img/";
	 if (!empty($slider1) && !empty($slider2) && !empty($slider3) && !empty($slider4)) {
	$slider1 = $_FILES["slider_1"]["name"];
    $slider2 = $_FILES["slider_2"]["name"];
    $slider3 = $_FILES["slider_3"]["name"];
    $slider4 = $_FILES["slider_4"]["name"];
	}else{
		$urun_id=$db->prepare("SELECT * from urunler WHERE id=:id");
$urun_id->execute(array(
'id'=>$_POST['urun_id']
));
$uruncek=$urun_id->fetch(PDO::FETCH_ASSOC);
$urunler=$db->query("SELECT * from urunler order by id DESC",PDO::FETCH_OBJ)->fetch();
        $slider1=$uruncek['slider_1'];
        $slider2=$uruncek['slider_2'];
        $slider3=$uruncek['slider_3'];
        $slider4=$uruncek['slider_4'];
	}
	$urunUpdate=$db->prepare("UPDATE urunler SET
urun_adi=:urun_adi,
		urun_aciklamasi=:urun_aciklamasi,
		urun_fiyati=:urun_fiyati,
		slider_1=:slider_1,
		slider_2=:slider_2,
		slider_3=:slider_3,
		slider_4=:slider_4,
		kategori_id=:kategori_id
		
		WHERE id={$_POST['urun_id']}
		");

	$updateurun=$urunUpdate->execute(array(
		'urun_adi' => htmlspecialchars($_POST['urun_adi']),
		'urun_aciklamasi' => htmlspecialchars($_POST['urun_aciklamasi']),
		'urun_fiyati' => htmlspecialchars($_POST['urun_fiyati']),
		'slider_1' => $slider1,
		'slider_2' => $slider2,
		'slider_3' => $slider3,
		'slider_4' => $slider4,
		'kategori_id'=>$_POST['kategori']
		));
if ($updateurun){
	if (!empty($slider1) && !empty($slider2) && !empty($slider3) && !empty($slider4)) {
		move_uploaded_file($_FILES["slider_1"]["tmp_name"],$resim_dizini.$slider1);
        move_uploaded_file($_FILES["slider_2"]["tmp_name"],$resim_dizini.$slider2);
        move_uploaded_file($_FILES["slider_3"]["tmp_name"],$resim_dizini.$slider3);
        move_uploaded_file($_FILES["slider_4"]["tmp_name"],$resim_dizini.$slider4);
	}
		Header("Location:../admin/production/urunler.php?durum=ok");
		exit;
	}else{
		Header("Location:../admin/production/urunler.php?durum=no");
		exit;
	}
}


if(isset($_POST['urun_delete'])){
	adminkontrol();
	$urunsil=$db->prepare("DELETE from urunler where id=:id");
	$urunDelete=$urunsil->execute(array(
		'id' => $_POST['urun_id']
		));
	if ($urunDelete){
		Header("Location:../admin/production/urunler.php?durum=ok");
		exit;
	}else{
		Header("Location:../admin/production/urunler.php?durum=no");
		exit;
	}
}


if(isset($_POST['kategori_ekle'])){
	adminkontrol();
	$kategori_name=htmlspecialchars($_POST['kategori_ad']);
	$get_kategori=$db->prepare("INSERT INTO kategoriler SET 
		kategori_name=:name
		");
	$set_kategori=$get_kategori->execute(array(
		'name'=>$kategori_name
	));
	if($set_kategori){
		header("Location:../admin/production/kategoriler.php?durum=ok");
		exit;
	}else{
		header("Location:../admin/production/kategoriekle.php?durum=no");
		exit;
	}
}
if(isset($_POST['kategori_sil'])){
	adminkontrol();
		$id=htmlspecialchars($_POST['kategoriid']);
		$get_kategori=$db->prepare("DELETE from kategoriler WHERE kategori_id=:id");
		$set_kategori=$get_kategori->execute(array(
			'id'=>$id
		));
		if($set_kategori){
			header("Location:../admin/production/kategoriler.php?durum=ok");
			exit;
		}else{
			header("Location:../admin/production/kategoriler.php?durum=no");
			exit;
		}
	
}
if(isset($_POST['kategori_update'])){
	adminkontrol();
	$id=$_POST['id'];
	$name=htmlspecialchars($_POST['kategori_ad']);
	$get_kategori=$db->prepare("UPDATE kategoriler SET 
		kategori_name=:name
	 WHERE kategori_id={$id}");
	$set_kategori=$get_kategori->execute(array(
		'name'=>$name
	));
	if($set_kategori){
		header("Location:../admin/production/kategoriler.php?durum=ok");
		exit;
	}else{
		header("Location:../admin/production/kategoriler.php?durum=no");
		exit;
	}
}

if (isset($_POST['hesab_ayar'])) {
	islemkontrol();
	$get_hesab=$db->prepare("UPDATE kullanici SET 
		kullanici_sehir=:sehir,
		kullanici_adres=:adres,
		kullanici_posta_kodu=:posta,
		kullanici_tel=:tel
		WHERE kullanici_id={$_POST['kullanici_ID']}
		");
	$set_hesab=$get_hesab->execute(array(
		'sehir'=>$_POST['sehir'],
		'adres'=>htmlspecialchars($_POST['adres']),
		'posta'=>$_POST['posta_kodu'],
		'tel'=>htmlspecialchars($_POST['telefon'])
	));
	if($set_hesab){
		header("Location:../hesabim.php?durum=ok");
		exit;
	}else{
		header("Location:../hesabim.php?durum=no");
		exit;
	}
	
}
if (isset($_POST['teslimat-bilgi'])) {
	islemkontrol();
	$get_hesab=$db->prepare("UPDATE kullanici SET 
		kullanici_sehir=:sehir,
		kullanici_adres=:adres,
		kullanici_posta_kodu=:posta,
		kullanici_tel=:tel
		WHERE kullanici_id={$_POST['kullanici_ID']}
		");
	$set_hesab=$get_hesab->execute(array(
		'sehir'=>$_POST['sehir'],
		'adres'=>htmlspecialchars($_POST['adres']),
		'posta'=>$_POST['posta_kodu'],
		'tel'=>htmlspecialchars($_POST['telefon'])
	));
	if($set_hesab){
		header("Location:../odeme.php?durum=ok");
		exit;
	}else{
		header("Location:../teslimat-bilgi.php?durum=no");
		exit;
	}
	
}
if(isset($_POST['siparis_tamamla'])){
	islemkontrol();
	$id=$_POST['k_id'];
	$sepet=$db->query("SELECT * FROM sepet WHERE kullanici_id=$id",PDO::FETCH_OBJ)->fetchAll();
	foreach($sepet as $sepet){
		@$urun_adet+=$sepet->urun_adet;
		$urun_id=$sepet->urun_id;
		$urunSor=$db->prepare("SELECT * FROM urunler WHERE id=:id");
		$urunSor->execute(array('id'=>$urun_id));
		$urunCek=$urunSor->fetch(PDO::FETCH_ASSOC);
		@$toplam_tutar+=$urunCek['urun_fiyati']*$sepet->urun_adet;
	}
	$get_siparisEkle=$db->prepare("INSERT INTO siparisler SET 
			kullanici_id=:id,
			urun_toplam_adet=:urun_adet,
			toplam_tutar=:tutar,
			siparis_durum=:durum
			");
		$set_siparisEkle=$get_siparisEkle->execute(array(
			'id'=> $id,
			'urun_adet'=>$urun_adet,
			'tutar'=>$toplam_tutar,
			'durum'=>1
		));
		//sipariş ekleme başarılı olursa sipariş detay işlemine geçer
		if($set_siparisEkle) {
			$sonID=$db->lastInsertId();
		$sepet2=$db->query("SELECT * FROM sepet WHERE kullanici_id=$id",PDO::FETCH_OBJ)->fetchAll();
			foreach($sepet2 as $sepetim){
				$urun_id=$sepetim->urun_id;
				$urunSor=$db->prepare("SELECT * FROM urunler WHERE id=:id");
				$urunSor->execute(array('id'=>$urun_id));
				$urunCek=$urunSor->fetch(PDO::FETCH_ASSOC);
			$get_siparisDetay=$db->prepare("INSERT INTO siparis_detay SET
				siparis_id=:siparis_id,
				urun_id=:urun_id,
				urun_fiyat=:fiyat,
				urun_adet=:adet
				");
			$set_siparisDetay=$get_siparisDetay->execute(array(
				'siparis_id'=>$sonID,
				'urun_id'=>$sepetim->urun_id,
				'fiyat'=>$urunCek['urun_fiyati'],
				'adet'=>$sepetim->urun_adet
			));
			$sepet_id=$sepetim->sepet_id;
			$get_sepetSil=$db->prepare("DELETE FROM sepet WHERE sepet_id=:id");
			$set_sepetSil=$get_sepetSil->execute(array('id'=>$sepet_id));
			}
			header("Location:../siparislerim.php?durum=ok");
			exit;
		}else{
			header("Location:../siparislerim.php?durum=no");
			exit;
		}
}

if(isset($_POST['header_duzenle'])){
	adminkontrol();
	$resim_dizini="../logo/";
	$header_logo =$_FILES["header_logo"]["name"];
	$headerUpdate=$db->prepare("UPDATE header SET
		destek_mail=:destek_mail,
		facebook_url=:facebook_url,
		instagram_url=:instagram_url,
		twiter_url=:twiter_url,
		logo=:logo
		WHERE id=1
		");
	$header_up=$headerUpdate->execute(array(
		'destek_mail' => htmlspecialchars($_POST['destek_mail']),
		'facebook_url' => htmlspecialchars($_POST['facebook_url']),
		'instagram_url' => htmlspecialchars($_POST['instagram_url']),
		'twiter_url' => htmlspecialchars($_POST['twiter_url']),
		'logo' => $header_logo
	));
	if ($header_up){
		move_uploaded_file($_FILES["header_logo"]["tmp_name"],$resim_dizini.$header_logo);
		Header("Location:../admin/production/settingheader.php?durum=ok");
		exit;
	}else{
		Header("Location:../admin/production/settingheader.php?durum=no");
		exit;
	}
}

if(isset($_POST['smtp_update'])){
	adminkontrol();
	$smtpUpdate = $db->prepare("UPDATE smtp SET
		host=:host,
		username=:username,
		password=:password,
		port=:port,
		smtp_secure=:smtp_secure,
		smtp_debug=:smtp_debug,
		mail_name=:mail_name
		WHERE id = 1
		");
	$smtp_Update=$smtpUpdate->execute(array(
		'host' => htmlspecialchars($_POST['host']),
		'username' => htmlspecialchars($_POST['username']),
		'password' => htmlspecialchars($_POST['password']),
		'port' => trim($_POST['port']),
		'smtp_secure' => htmlspecialchars($_POST['smtp_secure']),
		'smtp_debug' => trim($_POST['smtp_debug']),
		'mail_name' => htmlspecialchars($_POST['mail_name'])

	));

	if($smtp_Update){
		Header("Location:../admin/production/smtp-ayar.php?durum=ok");
		exit;
	}else{
		Header("Location:../admin/production/smtp-ayar.php?durum=no");
		exit;
	}
}


?>