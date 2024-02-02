<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="../metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <center>
            <div class='title_backimage'>
            <div class="title_1_2">
            <?php
            session_name('logintest');
            session_start();

            echo "<h1>metal-shop.com会員メタルヘッド様ページ</h1>";
            if(empty($_SESSION["logintest_user"])){
                echo "<hr>ログインされていません。<br>";
                echo "<div class='title_1'>";
                echo "<a href='login_form.html'>ログイン</a>";
                echo "</div>";
            }
            else{
                echo "<div class='title_1'>";
                echo "<a href='../select.php' >買い物をする</a><br>";
                echo "</div>";
                echo "<div class='title_1'>";
                echo "<a href='update_form.html'>会員情報変更</a><br>";
                echo "</div>";
                echo "<div class='title_1'>";
                echo "<a href='order_log.php'>購入履歴</a><br>";
                echo "</div>";
                echo "<div class='title_1'>";
                echo "<a href='withdrawal_form.html'>退会</a><br>";
                echo "</div>";
                echo "<div class='title_1'>";
                echo "<a href='logout.php'>ログアウト</a><br>";
                echo "</div>";
                echo "<div class='title_1'>";
                echo "<a href='../index.php'>タイトルに戻る</a>";
                echo "</div>";
            }
            ?>
            <img src="../img/login_form.jpg" height="350px" width="80%">
            </div>
        </div>
        </center>
    </body>
</html>