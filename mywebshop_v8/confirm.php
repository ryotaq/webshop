<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="./metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <div class='confirm_php'>
        <?php
        echo "<center>";
        require_once "mylibrary.php";
        session_name("cart");
        session_start();

        if(isset($_GET["clear_cart"])){
            $_SESSION["item"]=array();
        }
        if(isset($_GET["item"])){
            if(!isset($_SESSION["item"])){
                $_SESSION["item"]=array();
            }
            array_push($_SESSION["item"], $_GET["item"]);
        }
        echo "<div class='sentaku_chu'>";
        echo "<h1>現代選択中の商品:</h1>";
        echo "</div>";
        echo "</center><br><br><br><br><br>";
        if(count($_SESSION["item"]) > 0){
            $pdo = connect_mysql();
            if(isset($pdo)){
                echo "<div class='confirm_1'>";
                $total = 0;
                for($i = 0; $i < count($_SESSION["item"]); $i++){
                    $sql = "SELECT name,price FROM goods WHERE id=" . $_SESSION["item"][$i];
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo  "<div class='confirm_img'>";
                        echo   "<img src='img/".$_SESSION["item"][$i].".jpg' width='270px' height='200px'";
                        echo  "</div>";
                        echo  "<div class='nedan'>";
                        echo    $row["name"] . "(" . $row["price"] . "円)";
                        echo  "</div>";
                        $total += $row["price"];
                    }
                }
                echo "</div>";
                echo "<div class='zentai'>";
                echo "<div class='goukei_kingaku'>";
                echo "<center>";
                echo  "<h2>合計金額:".$total . "円(税込み".$total * 1.10 . "円)</h2>";
                echo "<form action='confirm.php' method='get'>
                      <input type='hidden' name='clear_cart'>
                      <input type='submit' value='カートを空にする'>
                      </form>";
                echo "</center>";
                echo "</div>";

                session_write_close();
                session_name("logintest");
                session_start();
                $name = ""; $mail = ""; $address = "";
                if(isset($_SESSION["logintest_user"])){
                    $sql = "SELECT * FROM user WHERE name=\"" . $_SESSION["logintest_user"] . "\"";
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        $name = $row["name"];
                        $mail = $row["mail"];
                        $address = $row["address"];
                    }
                }
                echo "<div class='confirm_form'>";
                echo "<center>";
                echo  "<form action='pay.php' method='post'>";
                echo   "氏名:<br><input type='text' name='customer_name' value='".$name."'><br>";
                echo   "メールアドレス: <br><input type='text' name='customer_mail' value='" . $mail . "'><br>";
                echo   "住所: <br><input type='text' name='customer_address' value='" . $address . "'><br><br>";
                echo   "<input type='submit' value='購入する'>";
                echo  "</form>";
                echo  "<div class='title_1'>";
                echo   "<a href='select.php'>買い物を続ける</a><br>";
                echo  "</div>";
                echo "</center>";
                echo "</div>";
                echo "</div>";
            }else{
                echo "MySQL接続エラー";
            }
        }else{
            echo "なし";
        }
        ?>
        </div>
    </body>
</html>