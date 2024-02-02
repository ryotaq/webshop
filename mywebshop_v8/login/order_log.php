<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="../metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <center class="center_1_2">
            <div class='sentaku_1_2'>
            <?php
            session_name('logintest');
            session_start();
            require_once "../mylibrary.php";

            $pdo=connect_mysql();
            $sql="SELECT * FROM order_log
                  WHERE customer_name=\"".$_SESSION["logintest_user"]."\"";
            $result=$pdo->query($sql);
            echo "<h1>購入履歴</h1>";
            echo "<div class='title_1'>";
            echo "<a href='mypage.php'>マイページに戻る</a><br>";
            echo "</div>";
            $bought_time=0;
            $price_total=-1;
            while($row=$result->fetch(PDO::FETCH_ASSOC)){
                if($bought_time != $row["time"]){
                    if($price_total>-1){echo "<h4>合計".$price_total."円</h4>";}
                    echo "<hr>";
                    echo "<h4>購入日時:".$row["time"]."</h4>";
                    $price_total=0;
                }
                $bought_time = $row["time"];
                $sql="SELECT name, price FROM goods
                      WHERE id=" . $row["goods_id"];
                $result_goods=$pdo->query($sql);

                while($row_goods=$result_goods->fetch(PDO::FETCH_ASSOC)){
                    echo "<h4>".$row_goods["name"] . "(".
                         $row_goods["price"] . "円)<br></h4>";
                         $price_total += $row_goods["price"];
                }
            }
            if($price_total>-1){
                echo "<h4>合計" . $price_total . "円</h4><hr>";
            }
            ?>
            </div>
        </center>
    </body>
</html>