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
    Done New ToDo Page
</h1>
<?php
try
{

$td_title=$_POST['titles'];
$td_content=$_POST['contents'];	

$td_title=htmlspecialchars($td_title,ENT_QUOTES,'UTF-8');
$td_content=htmlspecialchars($td_content,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=todo;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='INSERT INTO posts(title,content,created_at,updated_at) VALUES (?,?,now(),now())';
$stmt=$dbh->prepare($sql);
$data[]=$td_title;
$data[]=$td_content;
$stmt->execute($data);

$dbh=null;

?>
<span style="font:900 15pt 'ＭＳ Ｐ明朝'">タイトル：</span>
<?php print $td_title;?>
<br/>
<span style="font:900 15pt 'ＭＳ Ｐ明朝'">を追加しました。</span><br />
<?php
}
catch (Exception $e)
{
    print'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}


?>

<a href="index.php">一覧へ</a>

</body>
</html>