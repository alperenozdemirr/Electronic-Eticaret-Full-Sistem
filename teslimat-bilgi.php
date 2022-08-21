  <?php include'header.php'; 
if(empty($mail)){
    header("Location:login.php");
    exit;
}
  ?>
  <head>
      <title>
          Teslimat Bilgileri
      </title>
  </head>
   <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="sepetim.php">Sepetim</a></li>
                            <li><a href="teslimat-bilgi.php">Teslimat Bilgilerim</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
   <section class="account">
		<div class="container">
			<div class="row justify-content-center" >
				<div class="col-lg-10">
					<div class="account-contents" >
                        <div class="row">
                            
                            <div class="col-xl-12 col-lg-10 col-md-10 col-sm-10">
                                <div class="account-content">
                                    <form action="baglan/islem.php" method="POST">
                                        <input type="hidden" name="kullanici_ID" value="<?=$kullaniciCek['kullanici_id'];?>">
                                        <h3>Teslimat Bilgilerim</h3>
                                        <br>
                                        <div class="single-acc-field">
                                            <label for="email">Email</label>
                                            <input type="email" disabled value="<?=$kullaniciCek['kullanici_mail'];?>" class="form-control" placeholder="Email Adresi giriniz">
                                        </div>
                                        <div class="single-acc-field">
                                            <label>Şehir</label>
                                            <select id="sehir" class="form-control" name="sehir">
    <option value="0">Şehir Seç</option>
    <option value="1">Adana</option>
    <option value="2">Adıyaman</option>
    <option value="3">Afyonkarahisar</option>
    <option value="4">Ağrı</option>
    <option value="5">Amasya</option>
    <option value="6">Ankara</option>
    <option value="7">Antalya</option>
    <option value="8">Artvin</option>
    <option value="9">Aydın</option>
    <option value="10">Balıkesir</option>
    <option value="11">Bilecik</option>
    <option value="12">Bingöl</option>
    <option value="13">Bitlis</option>
    <option value="14">Bolu</option>
    <option value="15">Burdur</option>
    <option value="16">Bursa</option>
    <option value="17">Çanakkale</option>
    <option value="18">Çankırı</option>
    <option value="19">Çorum</option>
    <option value="20">Denizli</option>
    <option value="21">Diyarbakır</option>
    <option value="22">Edirne</option>
    <option value="23">Elazığ</option>
    <option value="24">Erzincan</option>
    <option value="25">Erzurum</option>
    <option value="26">Eskişehir</option>
    <option value="27">Gaziantep</option>
    <option value="28">Giresun</option>
    <option value="29">Gümüşhane</option>
    <option value="30">Hakkâri</option>
    <option value="31">Hatay</option>
    <option value="32">Isparta</option>
    <option value="33">Mersin</option>
    <option value="34">İstanbul</option>
    <option value="35">İzmir</option>
    <option value="36">Kars</option>
    <option value="37">Kastamonu</option>
    <option value="38">Kayseri</option>
    <option value="39">Kırklareli</option>
    <option value="40">Kırşehir</option>
    <option value="41">Kocaeli</option>
    <option value="42">Konya</option>
    <option value="43">Kütahya</option>
    <option value="44">Malatya</option>
    <option value="45">Manisa</option>
    <option value="46">Kahramanmaraş</option>
    <option value="47">Mardin</option>
    <option value="48">Muğla</option>
    <option value="49">Muş</option>
    <option value="50">Nevşehir</option>
    <option value="51">Niğde</option>
    <option value="52">Ordu</option>
    <option value="53">Rize</option>
    <option value="54">Sakarya</option>
    <option value="55">Samsun</option>
    <option value="56">Siirt</option>
    <option value="57">Sinop</option>
    <option value="58">Sivas</option>
    <option value="59">Tekirdağ</option>
    <option value="60">Tokat</option>
    <option value="61">Trabzon</option>
    <option value="62">Tunceli</option>
    <option value="63">Şanlıurfa</option>
    <option value="64">Uşak</option>
    <option value="65">Van</option>
    <option value="66">Yozgat</option>
    <option value="67">Zonguldak</option>
    <option value="68">Aksaray</option>
    <option value="69">Bayburt</option>
    <option value="70">Karaman</option>
    <option value="71">Kırıkkale</option>
    <option value="72">Batman</option>
    <option value="73">Şırnak</option>
    <option value="74">Bartın</option>
    <option value="75">Ardahan</option>
    <option value="76">Iğdır</option>
    <option value="77">Yalova</option>
    <option value="78">Karabük</option>
    <option value="79">Kilis</option>
    <option value="80">Osmaniye</option>
    <option value="81">Düzce</option>
</select>
                                        </div>
                                        <div class="single-acc-field">
                                            <label>Adres</label>
                                            <textarea name="adres" class="form-control"><?=$kullaniciCek['kullanici_adres'];?></textarea>
                                        </div>
                                        <div class="single-acc-field">
                                            <label>Posta Kodu</label>
                                            <input type="number" name="posta_kodu" value="<?=$kullaniciCek['kullanici_posta_kodu'];?>" class="form-control" placeholder="Posta Kodunuzu Giriniz">
                                        </div>
                                        <div class="single-acc-field">
                                            <label>Telefon</label>
      <input id="telefon" name="telefon" type="number" class="form-control" value="<?=$kullaniciCek['kullanici_tel'];?>">                                        </div>
                                        <div class="single-acc-field">
                                            <br>
                                            <button class="col-md-12" name="teslimat-bilgi" type="submit">Ödeme ile Devam Et</button>
                                            <a href="#"></a>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php echo'
	<script>
		document.getElementById("sehir").value="'.$kullaniciCek['kullanici_sehir'].'";
	</script>'; ?>

<?php
include'footer.php';?>