<?php 
 ?>
<html>
<head>

	<meta charset="utf-8">
  <style>
  html,body{
    margin:0 auto;
    padding: 0px;
  }
  .contanier{
    display: flex;
      justify-content: center;
      align-items: center;
      height:90vh;
  }
    .content{
      width:400px;
      padding-bottom:30px;
      padding-top:30px;
      border-radius:10px;
      border:1px solid darkgray;
    }
    .content h1{
      font-size:20px;
      font-family: sans-serif;
      text-align: center;
    }
    form{
      width:100%;
      color: black;
      font-size:18px;
      font-family: sans-serif;
    }

    form label{
      width:90%;
      float: left;
      margin-left:5%;
      padding-top:5px ;
      padding-bottom: 5px;
    } 
    form input{
      width:90%;
      height:35px;
      color: black;
padding-top:5px ;
margin-left:5%;
      padding-bottom: 5px;
    }
    form textarea{
      width:90%;
      margin-left: 5%;
      resize: none;
      height:250px;
    }
    .okey{
      margin-top:30px;
      margin-left:5%;
      background-color: #337ab7;
      padding:8px 30px 8px 30px;
      border: none;
      color: white;
      cursor: pointer;
    }
  </style>
	<title></title>
</head>
<body>
  <div class="contanier">

<div class="content">
<h1>Bize Mail Gönder</h1>

  <form class="frm" action="sendmail.php" method="post">

    <label>E-mail Giriniz</label>
    <input type="email" name="email">

    <label>Gönderenin Adı soyadı</label>
    <input type="text" name="name">

    <label>Konu</label>
    <input type="text" name="subject">

    <label>Mesaj</label>
    <textarea name="message" cols="15" placeholder="Yaz..."></textarea>

    <button name="sendmail" class="okey">Gönder</button>
  </form>
</div>
</div>
</body>
</html>