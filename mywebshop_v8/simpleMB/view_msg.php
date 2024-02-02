<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Message Board</title>
</head>
<body>
    <?php
        $id = $_GET["id"];
        if(empty($id)){
            echo "伝言idの指定が不正です。<br>";
        }
        require_once("my_library.php");
        $pdo = connect_mysql();
        $sql = "SELECT id,name,message,time FROM board WHERE id=" . $id;
        $result = $pdo->query($sql);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            echo "伝言ID: " . $row["id"] . "<br>";
            echo "投稿者: " . $row["name"] . "<br>";
            echo "内容: " . $row["message"] . "<br>";
            echo "投稿時刻: " . $row["time"] . "<br>";
        }

    ?>
</body>
</html>

