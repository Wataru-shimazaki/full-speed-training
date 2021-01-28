<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
</head>
<body>
<h1>
    Delete Todo Page
</h1>
<?php

try
{
$td_ID=$_GET['delete'];

$dsn='mysql:dbname=todo;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT title,content FROM posts WHERE ID=?';
$stmt=$dbh->prepare($sql);
$data[]=$td_ID;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$td_title=$rec['title'];
$td_content=$rec['content'];

$dbh=null;

}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
    ?>

タイトル：
<?php print $td_title; ?>
<br/>
内容：
<?php print $td_content; ?>
<br/>
<br/>
このタスクを削除してもよろしいですか。<br/>
<br/>
<form method="post" action="delete_done.php">
<input type="hidden"name="ID" value="<?php print $td_ID;?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>
</body>
</html>