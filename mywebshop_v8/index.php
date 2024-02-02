<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="./metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <center>
        <div class="title">
            <div class="greet">ようこそおいでくださいました！</div><br>
            <h1>METAL SHOP</h1>
            <hr>
        <marquee width="40%" color="white">日本にメタルの<span>花</span>を咲かせよう!</marquee><br>
        <?php
        session_name("counter");
        session_start();
        if(isset($_SESSION["count"])){
            $_SESSION["count"]++;
        }else{
            $_SESSION["count"] = 0;
        }
        echo "本日のご来店回数: " . $_SESSION["count"] . "<br>";
        ?>
         <h2>※このショッピングサイトは、作者の独断により<br>
             ヘヴィメタルだと思ったものを紹介しています。<br>
         </h2>
         <img src='img/R.jpg' height='250' width='60%'><br>
         <div class="title_1">
          <a href='select.php'>お買い物をする</a><br>
         </div>
         <div class="title_1">
          <a href='login/login_form.html'>会員様ログイン</a>
         </div>
         <div class="title_1">
          <a href='simpleMB/mb_form.html'>ご意見箱</a>
         </div>
        </div.
        </center>
    </body>
</html>