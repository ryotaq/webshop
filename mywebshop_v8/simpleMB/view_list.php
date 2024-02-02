<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Message Board</title>
    </head>
    <body>
        <?php
            require_once("my_library.php");
            $pdo = connect_mysql();
            $sql = "SELECT id,name,time FROM board";
            $result = $pdo->query($sql);
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "[" . $row["id"] . "] 投稿者: " . $row["name"] . " / ";
                echo "<a href=\"./view_msg.php?id=" . $row["id"] . "\">内容を見る</a>";
                echo " (" . $row["time"] . ")";
                echo "<hr>";
            }
        ?>
    </body>
</html>

