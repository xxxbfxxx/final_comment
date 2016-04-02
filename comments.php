<?php


require_once 'db.php';

$sql = "
        SELECT id, parent_id, name, comment,
        DATE_FORMAT(date_add, '%d %M %Y %H:%i') as date_add
        FROM comments
";

$query = mysql_query($sql);

while($row = mysql_fetch_assoc($query))
{
    $data[$row[id]] = $row; 
}

// ДЕРЕВЬЯ

function mapTree($dataset) {
	$tree = array(); 
	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent_id']) { // корневой элемент
			$tree[$id] = &$node;
		} else { 
		  // Потомок
            $dataset[$node['parent_id']]['childs'][$id] = &$node;
             
		}
	}

	return $tree;
}  




function commentsToTemplate($comment)
{
    ob_start();  
      
        include 'comment_template.php';                     
    
    $comments_string =  ob_get_contents(); 
    ob_end_clean();
    
    return $comments_string;
} 

 function commentsString($data)
     {
        foreach($data as $w) 
        {
        $string .= commentsToTemplate($w);
        }
         
        return $string; 
     }   


$data = mapTree($data);
$comments = commentsString($data);
$data = null;


?>