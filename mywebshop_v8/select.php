<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"; charset="utf8">
        <meta http-equiv="Content-Style-Type" content="text/css">
        <link rel="stylesheet" type="text/css" href="./metalshop.css">
        <title>metal-shop.com</title>
    </head>
    <body>
        <center>
        <div class="sentaku">
         <?php
         require_once "mylibrary.php";
         session_name("logintest");
         session_start();
         echo "<div class='aisatu'>";
          echo "<h1>いらっしゃいませ、</h1>";
          echo "<h1>商品を選択してください。</h1>";
         echo "</div>";
        
         echo "<br><br><br><br>";
         $pdo=connect_mysql();
         if(isset($pdo)){
             $sql="select * from goods";
             $result=$pdo->query($sql);
             while($row=$result->fetch(PDO::FETCH_ASSOC)){
              echo "<div class='goods'>";
               echo "<div class='img'>";
                echo "<img src='img/". $row['id'] .".jpg' width='270px' height='200px'>";
               echo "</div>";
               echo "<div class='intro'>";
                echo "<h1><a href='confirm.php?item=". $row["id"] . "'>". $row["name"]."(".$row["price"].")円</a></h1><br>";
                echo "<h3>=>" . $row["description"] . "</h3>";
               echo "</div>";
              echo "</div>";
             }
         }
         else{
            echo "Fail to connect!";
         }
         ?>
        </div>
        </center>
    </body>
</html>