<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="../metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
    <center>
    <div class='update'>
    <?php
    require_once "../mylibrary.php";
    session_name('logintest');
    session_start();
    echo "<h1>Webshop.com 会員情報の更新</h1>";
    if( empty($_POST["mail"]) ||
        empty($_POST["address"])){
        echo "必要な情報をすべて入力してください。";
        exit();
    }
    $pdo = connect_mysql();
    $sql = "UPDATE user SET mail = \"" .
        $_POST["mail"] . "\" WHERE name=\"" . $_SESSION["logintest_user"] . "\"";
    $result = $pdo->query($sql);
    if(!$result){
        echo "<p>更新できませんでした。<p>";
    }else{
        echo "<p>更新しました。<p>";
        echo "<div class='title_1'>";
        echo "<a href='mypage.php'>マイページ</a><br>";
        echo "</div>";
    }
    ?>
    </div>
    </center>
    </body>
</html>