<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Страница с удаления дерева комментариев</title>
<?php
require_once 'db.php';  
 if ($_GET['act']== del ) {
      $id = $_GET['id'];
      $Result = mysql_query("SELECT id FROM comments");
      while($row = mysql_fetch_array($Result)){
      $sql_delete = "DELETE FROM comments WHERE id=$id";
      mysql_query($sql_delete);
      }
      
      
      print 'Комментарий удален!';
      print '<p><a href="index.php">Вернуться к Коментариям</a>';}

?>