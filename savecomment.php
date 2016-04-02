<?php


 if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
      
      sleep(3); // Установим задержку выполнения в 3с, только для того, чтобы увидеть в браузере картинку лоадера при отправке данных))   
      
      
      if($_POST[parent_id])  $parent_id = preg_replace('/\D+/i','', $_POST[parent_id]);
      else $parent_id = 0;        
           
      $author = trim($_POST[author]);
      $comment = trim($_POST[comment]);      
      if(!$author)   $error[author] = 'Введите имя!';
      if(!$comment)  $error[comment] = 'Напишите комментарий!';
      
      if($error)
        exit(json_encode($error));
      
      // Сохраняем данные в БД
      
      require_once 'db.php';  
      
      $sql = "INSERT INTO comments (parent_id, name, comment, date_add) VALUES ($parent_id, '$author', '$comment', NOW())";
      $result = mysql_query($sql);
      if(!$result) 
      {
        $error[] = 'Произошла ошибка, комментарий не сохранен';
        exit(json_encode($error));
      }
      exit();
} 
 



?>