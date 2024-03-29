<?php include_once '../config/init.php'; ?>

<?php 

function getDatabases($dir) {
  
    $result = array();
 
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
 } 

    $template = new Template('../templates/admin/databases.php');

    $template->dbs = getDatabases("../_db_backup");

    echo $template;

?>