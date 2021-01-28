<?php

if(isset($_POST['edit'])==true)
{
	$td_ID=$_POST['edit'];
	header('Location:edit.php?edit='.$td_ID);
	exit();
}

if(isset($_POST['delete'])==true)
{
	$td_ID=$_POST['delete'];
	header('Location:delete.php?delete='.$td_ID);
	exit();
}

?>