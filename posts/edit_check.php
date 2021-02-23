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
    Check Re ToDo Page
</h1>

<?php
$td_ID=$_POST['ID'];
$td_title=$_POST['titles'];
$td_content=$_POST['contents'];

$td_title==htmlspecialchars($td_title,ENT_QUOTES,'UTF-8');
$td_content=htmlspecialchars($td_content,ENT_QUOTES,'UTF-8');
//制限値
$limit=25;
//入力された文字数を取得する
$telLength=strlen($td_titles);
//タイトルが文字数を満たしているか、未入力ではないかチェック
if($td_title=='')
{
    print'タイトルが入力されてません。<br/>';
}
elseif($limit<$telLength)
{
    print'タイトルの文字数は25文字以内で入力してください。<br/>';
}
else
{ ?>
<span style="font:900 15pt 'ＭＳ Ｐ明朝'">タイトル：</span>
<?php print$td_title;
      print'<br/>';
}
//内容が未入力ではないかチェック
if($td_content=='')
{
    print'内容が入力されていません。<br/>';
}
else
{ ?>
<span style="font:900 15pt 'ＭＳ Ｐ明朝'">内容：</span>
<?php print $td_content;
      print'<br/>';
}

if($td_title==''||$td_content==''||$limit<$telLength)
{
    print'<form>';
    print'<input type="button"onclick="history.back()"value="戻る">';
    print'</form>';
}
else
{
print'<form method="post"action="edit_done.php">';
print'<input type="hidden"name="ID"value="'.$td_ID.'">';
print'<input type="hidden"name="titles"value="'.$td_title.'">';
print'<input type="hidden"name="contents"value="'.$td_content.'">';
print'<br/>';
print'<input type="button"onclick="history.back()"value="戻る">';
print'<input type="submit"value="OK">';
print'</form>';
}

?>
        
</body>
</html>