<?php
session_start();
ob_start();
session_destroy();
setcookie("kullanici_mail", $mail ,time() + (-86400 * 7),"/");
setcookie("kullanici_password",$password ,time() + (-86400 * 7),"/");
header("Location:index.php?logout=ok");