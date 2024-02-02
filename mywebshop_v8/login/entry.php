<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="../metalshop.css">
        <title>metal-shop.com会員登録システム</title>
    </head>
    <body>
        <center>
        <div class="entry_php">
        <?php
        require_once "../mylibrary.php";
        echo "<h1>metal-shop.com会員登録ページ</h1>";
        if(empty($_POST["name"])||
           empty($_POST["pass"])||
           empty($_POST["mail"])||
           empty($_POST["address"])){
           echo "<p>必要な情報をすべて入力してください。<p>";
           exit();
        }
        $pdo=connect_mysql();
        $sql="SELECT count(*) FROM user WHERE name=\"".$_POST["name"]."\"";
        $result=$pdo->query($sql);
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $count=$row["count(*)"];
        }
        if($count>0){
            echo "<p>既に登録されているユーザー名です。</p.";
        }
        $sql="INSERT INTO user VALUES(\"".
           $_POST["name"]."\",\"".
           $_POST["pass"]."\",\"".
           $_POST["mail"]."\",\"".
           $_POST["address"]."\")";
        $result = $pdo->query($sql);
        if(!$result){
            echo "<p>登録できませんでした。</p>";
        }
        else{
            echo "<p>登録完了しました!</p>";
            echo "<div class='title_1'>";
            echo "<a href='login_form.html'>ログイン</a>";
            echo "</div>";
        }
        ?>
        </div>
        </center>
    </body>
</html>