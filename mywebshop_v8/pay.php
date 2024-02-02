<html>
    <head>
        <meta http-equiv="Content-Type" Content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css" >
        <link rel="stylesheet" type="text/css" href="./metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
    <center>
    <div class='pay_php'>
    <?php
        require_once "mylibrary.php";
        session_name("cart");
        session_start();

        if(empty($_POST["customer_name"])||
           empty($_POST["customer_mail"])||
           empty($_POST["customer_address"])){
           echo "必要な情報をすべて入力してください。";
           exit();
        }

        echo "<div class='sentaku_chu'>";
        echo "<br><h1>現在選択中の商品:</h1>";
        echo "</div>";
        if(isset($_SESSION["item"])){
            $pdo = connect_mysql();
            if(isset($pdo)){
                for($i = 0; $i < count($_SESSION["item"]); $i++){
                    $sql="INSERT INTO order_log
                    (customer_name, customer_mail, customer_address, goods_id)
                    VALUES(".
                    "\"".$_POST["customer_name"] . "\"," .
                    "\"".$_POST["customer_mail"] . "\"," .
                    "\"".$_POST["customer_address"] . "\"," .
                    "\"".$_SESSION["item"][$i] . "\"" . ")";

                    $result=$pdo->query($sql);
                    if(empty($result)){
                        echo "購入できませんでした。";
                        exit();
                    }
                }
                $total = 0;
                echo "<br><br><br><br>";
                for($i = 0; $i < count($_SESSION["item"]); $i++){
                    $sql= "SELECT name,price FROM goods WHERE id=" . $_SESSION["item"][$i];
                    $result=$pdo->query($sql);

                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo $row["name"] . "(" . $row["price"] . "円)";
                        echo "<img src='img/" . $_SESSION["item"][$i].".jpg' width='280px' height='200px'>";
                        $total += $row["price"];
                    }
                }
                echo "<h2>合計" . $total . "円（税込み" . $total * 1.10 . "円）を購入しました!</h2>";
                echo "<img src='img/reception.jpg' width='420px' height='300px'><br>";
                echo "<div class='title_1'>";
                echo "<a href='index.php'>タイトルへ戻る</a>";
                echo "</div>";
            }
        }else{
            echo "商品が選択されていません。";
        }
    ?>
    </div>
    </center>
    </body>
</html>