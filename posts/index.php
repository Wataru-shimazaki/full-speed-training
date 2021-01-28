<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>
</head>
<body>

<h1>
    ToDo List Page
</h1>
<form action="create.php">
    <button type="submit" style="padding: 10px;font-size: 16px;margin-bottom: 10px">New Todo</button>
</form>
<table border="1">
    <colgroup span="4"></colgroup>
    <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>内容</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
<?php

try
{

$dsn='mysql:dbname=todo;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT ID,title,content,created_at FROM posts';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;


print'<form method="post" action="branch.php">';
print'<form/>';
while(true)
    {
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    if($rec==false)
    {
        break;
    }
?>
    <tr>
        <td><?php print $rec['ID']; ?></td>
        <td><?php print $rec['title']; ?></td>
        <td><?php print $rec['content']; ?></td>
        <td><?php print $rec['created_at']; ?></td>
        <td><?php 
            print'<form action="edit.php">
                    <button type="submit" name="edit" value="'.$rec['ID'].'" style="padding: 10px;font-size: 16px;">編集する</button>
            </form>';
    ?></td>
        <td><?php
            print'<form action="delete.php">
                    <button type="submit" name="delete" value="'.$rec['ID'].'" style="padding: 10px;font-size: 16px;">削除する</button>
            </form>';
    ?></td>
    </tr>
<?php
}
?>

</table>
<?php
}

catch (Exception $e)
    {
        print 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }
?>

</body>
</html>