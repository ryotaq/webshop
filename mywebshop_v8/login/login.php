<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="../metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <center class="title_login">
        <?php
        require_once "../mylibrary.php";
        echo "<h1>metal-shop.com会員ページ</h1>";
        if(empty($_POST['name'])||empty($_POST['pass'])){
            echo "<h2 class='kaiin_page_1'>warning!<br>";
            echo "ユーザー名とパスワードを入力してください!</h2>";
            exit();
        }

        $pdo=connect_mysql();
        $sql="SELECT name FROM user WHERE name='".
        $_POST['name']."'AND pass='".$_POST['pass']."'";
        $result=$pdo->query($sql);
        if(!$result){
            echo "<h2 class='kaiin_page'>データが取得できませんでした。</h2>";
            exit();
        }

        $uname=null;
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $uname=$row['name'];
        }

        if($uname != null){
            echo "<hr><h2 class='kaiin_page'>ログイン認証成功しました！</h2>";
            echo "<img src='../img/register.jpg' height='350px' width='60%'>";
        }
        else{
            echo "<hr><h2 class='kaiin_page'>ログイン認証失敗:ユーザー名かパスワードが正しくありません。</h2>";
            exit();
        }

        session_name("logintest");
        session_start();
        $_SESSION["logintest_user"] = $_POST["name"];
        echo "<div class='title_1'>";
        echo "<a href='mypage.php'>マイページ</a>";
        echo "</div>";
        ?>
        </center>
    </body>
</html>