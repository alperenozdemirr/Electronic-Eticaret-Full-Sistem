<?php 
ob_start();
session_start();
include'../baglan.php';
require 'src/Exception.php'; 
require 'src/PHPMailer.php';
require 'src/SMTP.php';
 $smtp = $db->query("SELECT * from smtp WHERE id=1", PDO::FETCH_OBJ)->fetch();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer();
if(isset($_POST['sendmail'])){

   unset($_SESSION["security_code"]);

    $security_code = rand(100000, 999999);
    $_SESSION['security_code'] = $security_code;


$mail->Host = $smtp->host;
$mail->Username = $smtp->username; 
$mail->Password = $smtp->password;
$mail->Port = $smtp->port;
$mail->SMTPSecure = $smtp->smtp_secure;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->isHTML(true);
$mail->CharSet = "UTF-8";
$mail->setLanguage('tr', 'language/');
$mail->SMTPDebug  = $smtp->smtp_debug;
$mail->setFrom('destek@electronic.online', 'Kimlik Doğrulama İşlemi');
$mail->addAddress($_SESSION['kullanici_mail'], $_SESSION['kullanici_adsoyad']);
$mail->Subject = $security_code;
$mail->Body ='
   
      <h1>Bu Onay Kodu Tek Kullanımlıktır ve Girilen Cihazda Geçerlidir!</h1>
      <div style="width:100%;padding-bottom:20px;
      padding-top:20px;
      background-color:#ececec;" class="contanier">
         <h1 style="text-align:center;color:#92df6c;">Doğrulama Kodunuz: <b><u><span style="color:black;letter-spacing: 3px;">'.$security_code.'</span></u></b></h1>
         </div>'


;


$mail_gonder = $mail->send();
if($mail_gonder){ 
   header("Location:../../mail-confirm/mail-confirm.php");
  exit;
}else{
   header("Location:../../mail-confirm/mail-confirm.php?hata=smtp"); 
   exit;
}

 
   }


if(isset($_POST['onaykodu'])){
   $dogrulama_kodu = trim($_POST['dogrulama_kodu']);
   if($dogrulama_kodu == $_SESSION['security_code']){
      
      //header("Location:../islem.php?durum=kullanicikaydet");
      //exit;

   $kullanici_adsoyad=$_SESSION['kullanici_adsoyad']; 
$kullanici_mail=$_SESSION['kullanici_mail'];
$kullanici_tel=$_SESSION['kullanici_tel'];
$kullanici_passwordone=$_SESSION['kullanici_passwordone']; 
$kullanici_passwordtwo=$_SESSION['kullanici_passwordtwo']; 

if($kullanici_passwordone==$kullanici_passwordtwo){
   if(strlen($kullanici_passwordone)>=6){
      if($kullanici_adsoyad =="" || $kullanici_mail =="" || $kullanici_passwordone =="" || $kullanici_passwordtwo =="" || $kullanici_tel ==""){
         header("Location:../../register.php?durum=eksikbilgi");
         exit;
      }
      else{
         // burada mail yapılacak şimdilik kayıt
         $get_register=$db->prepare("INSERT INTO kullanici SET
            kullanici_adsoyad=:adsoyad,
            kullanici_mail=:mail,
            kullanici_tel=:tel,
            kullanici_password=:password,
            kullanici_yetki=:yetki,
            durum=:durum
            ");
         $set_register=$get_register->execute(array(
            'adsoyad'=>$kullanici_adsoyad,
            'mail'=>$kullanici_mail,
            'tel'=>$kullanici_tel,
            'password'=>md5($kullanici_passwordone),
            'yetki'=>1,
            'durum'=>1
         ));
         if($set_register){
            header("Location:../../login.php?durum=register-ok");
            exit;
         }else{
            header("Location:../../register.php?durum=register-no");
            exit;
         }
      }
   }else{


         header("Location:../../register.php?durum=eksiksifre");
         exit;

      }
}else{
   header("Location:../../register.php?durum=eksiksifre");
   exit;
}
   }else{
      header("Location:../../mail-confirm/mail-confirm.php?durum=no");
   }

}

?>