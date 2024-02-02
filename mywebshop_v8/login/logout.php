<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" type="text/css" href="../metalshop.css">
    <title>metal-shop.com ログアウト</title>
</head>
<body>
<center>
<div class="title_login">
<?php
    session_name("logintest");
    session_start();

    $_SESSION = array();
    echo "<h1>metal-shop.com 会員ページ</h1>";
    echo "<h4>ログアウトしました<br>またのご利用をお待ちしております!<h4>";
    echo "<div class='title_1'>";
    echo "<a href='login_form.html'>ログイン</a>";
    echo "</div>";
    echo "<img src='../img/crazy_crouds.jpg' height='350px' width='60%'><br><br>";
    echo "<marquee width='40%' color='white'><h1>ENJOY YOUR METAL LIFE!</h1></marquee>";
?>
</div>
</center>
</body>
</html>