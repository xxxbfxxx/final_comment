$(function (){ 
  	


      var sendDataComment = {}; 
      var commentForm; 


      function CommentForm()
      {
      	if(commentForm) 
	{

            removeCommentForm();  
          } 
          commentForm = $('#newComment').clone();
      }
      
 
      function removeCommentForm()
      {
         commentForm.remove();
         sendDataComment = {};
      }
      
      
      // Действия при нажатии на конопки добавить или ответить
      
$('#addNewComment, .reply').click(function(){
          
          CommentForm(); 
          
          if($(this).attr('id') == 'addNewComment')
          {
             
            commentForm.appendTo('#commentRoot');
             
          }
          else
          {
             
              var parentComment = $(this).parent().parent();
             
          
              sendDataComment.parent_id = parentComment.attr('id');
              
             
             var childs =  parentComment.find('ul'); 
             
             if(!childs.length) 
             {
             
                 parentComment.append('<ul></ul>');
                 commentForm.appendTo(parentComment.children('ul'));
             }  
             else
              commentForm.prependTo(childs); 
              
          }
          
          commentForm.show(); 
          
          return false; 
      });      
     
      $('#cancelComment').live('click', function(){
          removeCommentForm();
  
      })
 
      
 // По нажатию на кнопку "Сохранить",

 $('#newComment button').live('click',function(){
    sendDataComment.author = commentForm.find("input[name='name']").val(); 
    sendDataComment.comment = commentForm.find("textarea").val();
    
    sendData(); 
    
 });


function sendData()
{
   commentForm.find('button').hide().next().show(); 

  $.post(
           "savecomment.php",
           sendDataComment, 
           function(data){ 
            
            
            if(data)
            {   
             
                data = $.parseJSON(data);
                


                var errors =''; 
                $.each(data, function(i, val) {
                errors += val+'\n';

                });
                
                
                commentForm.find('button').show().next().hide();             
                alert(errors); 
                             
            }
           else 
               formToComment();           
          }
)
}

 
 // Функция преобразование формы ввода коментария в сам комментарий

 function formToComment()
 {
   commentForm.find('h6').text(sendDataComment.author);
   commentForm.find('.comment').text(sendDataComment.comment);
   commentForm.find('button').remove();  
   commentForm.find('.loader').remove();
   commentForm.find('#cancelComment').remove();
   commentForm.removeAttr('id');
   commentForm = null; 
 }
     
    
  });    
