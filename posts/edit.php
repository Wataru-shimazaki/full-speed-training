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
    Edit Todo Page
</h1>

<?php

try
{
$td_ID=$_GET['edit'];

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

<form method="post" action="edit_check.php">
<input type="hidden"name="ID" value="<?php print $td_ID;?>">

    <div style="margin: 10px">
        <label for="title">タイトル：</label>
        <input id="title" type="text" name="titles" value="<?php print $td_title; ?>">
    </div>
    <div style="margin: 10px">
        <label for="content">内容：</label>
            <textarea id="content" name="contents" rows="8" cols="40"><?php print $td_content; ?></textarea>
    </div>
    <input type="submit" name="post" value="編集する">
</form>
<form action="index.php">
    <button type="submit" name="back">戻る</button>
</form>
</body>
</html>