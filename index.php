<?php require_once 'comments.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Комментарии сайта АВПАХАРЬ.РУ</title>
<style>
body 
{
    font-family: Verdana;
    font-size:12px;
}

ul 
{
    list-style-type: none;
    width: 500px;
}

#commentRoot li
{
    margin: 7px 0 7px 7px;
}

#commentRoot li a
{
   margin-left: 400px;
}

#commentRoot li .commentContent
{
    border: solid 1px #ccc;
    padding: 5px 10px;
}
#commentRoot li h6 
{
    font-size: 16px; 
    color: green;
}
#commentRoot li h6  span 
{
    color: #666; font-size: 11px;  
    margin-left: 20px;
}
#commentRoot li .comment
{
    margin-top: 5px;
}
#commentRoot li a.reply
{
    font-size: 11px; 
} 

/*  Формочка */
	#newComment, .loader {display: none;}
#cancelComment
{
    float: right; width: 20px; color: red; cursor: pointer;
}
#newComment input
{
    height: 26px; width: 250px; padding: 0 5px ; margin-left: 50px; 
    border: solid 1px #ccc;
}
#newComment textarea
{
    width: 350px;  height: 100px; margin-left: 5px; 
    vertical-align: middle; border: solid 1px #ccc;
}
#newComment button
{
    margin-left: 102px; margin-top: 10px;
}   
</style>
<script type="text/javascript" src="jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="comment.js"></script>
<script type="text/javascript" src="del.js"></script>

</head>
<body>
<ul id="commentRoot">
<?php echo $comments;  ?>
<li id="newComment">
   <div class="commentContent">
      <div id="cancelComment">X</div>
          <h6>Ваше имя: <input name="name" type="text"> <span></span> </h6>
          <div class="comment">
              Комментарий: 
              <textarea name="newCommentText"></textarea>
          </div>
          
         <button>Сохранить</button><img class="loader" src="loader.gif">
      </div>                            
  </li>

</ul> 
<button id="addNewComment">Добавить комментарий</button>
   
</body>
</html>