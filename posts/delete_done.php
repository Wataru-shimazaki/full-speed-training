<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>
<body>
<h1>
    Done delete ToDo Page
</h1>
<?php
try
{

$td_ID=$_POST['ID'];

$dsn='mysql:dbname=todo;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='DELETE FROM posts WHERE ID=?';
$stmt=$dbh->prepare($sql);
$data[]=$td_ID;
$stmt->execute($data);

$dbh=null;

}
catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}


?>

        削除しました。<br/>
        <br/>
<a href="index.php">一覧へ</a>

</body>
</html>