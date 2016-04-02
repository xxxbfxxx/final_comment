<?php

         define(DB_HOST, 'localhost');
         define(DB_USER, 'a0030560_hotels');
         define(DB_PASSWORD, '239158566');
         define(DB_NAME, 'a0030560_hotels');
         
$connect = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) ;
mysql_select_db(DB_NAME); 
         /* Устанавливаем кодировку */
mysql_query('SET CHARACTER SET utf8');  
         mysql_query('SET NAMES utf8');
         /*  Установка русской локали соединения */
         mysql_query("SET lc_time_names = 'ru_RU'") ; 

?>