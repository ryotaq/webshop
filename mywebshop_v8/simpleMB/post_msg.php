<html>
<head>
    <meta http-equiv="Content-Type" content="text/html";charset="UTF-8">
    <meta http-equiv="Content-Style-Type" content="text/css">
    <link rel="stylesheet" type="text/css" href="../metalshop.css">
    <title>Message Board</title>
</head>
<body>
<?php
    echo "<center>";
    echo "<div class='post_msg'>";
    require_once("my_library.php");
    if(!empty($_POST["name"]) || !empty($_POST["msg"])){
        $pdo = connect_mysql();
        $sql = "INSERT INTO board (name, message) VALUES ('". $_POST["name"] . "', '" . mb_ereg_replace("\n", "<br>", $_POST["msg"]) . "')";
        $result = $pdo->query($sql);
        if($result == true){
             echo "<h1>伝言を投稿しました。</h1><br>"; 
             echo "<img src='../img/toukou.jpg' width='60%' height='400px'><br>";
             echo "<div class='title_1'>";
             echo "<a href='../index.php'>タイトルに戻る</a>";
             echo "</div>";
        }
        else{ echo "<h1>投稿に失敗しました。</h1><br>"; }
    }else{
        echo "<h1>正しく入力してください.</h1><br>";
        exit(0);
    }
    echo "</div>";
    echo "</center>";
?>
</body>
</html>
