<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" type="text/css" href="../metalshop.css">
    <title>metal-shop.com 会員登録システム</title>
</head>
<body>
<center>
<div class='withdrawal_php'>
<?php
    require_once "../mylibrary.php";
    session_name("logintest");
    session_start();
    
    echo "<h1>Webshop.com 退会</h1>";
    $pdo = connect_mysql();
    $sql = "DELETE FROM user WHERE name = \"" . $_SESSION["logintest_user"] . "\"";
    $result = $pdo->query($sql);
    if(!$result){
        echo "<p>退会できませんでした。<p>";
    }else{
        echo "<p>退会しました。</p><br>";
        echo "<p>ご利用ありがとうございました</p><br>";
        echo "<div class='title_1'>";
        echo "<a href='login_form.html'>ログイン</a><br>";
        echo "</div>";
    }
?>
</div>
</center>
</body>
</html>