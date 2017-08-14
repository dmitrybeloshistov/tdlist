<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $json=array(); 

   $FolderId=$_GET['u'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       $json['status']=1;
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
     }

   $sqltext=sprintf("DELETE FROM FOLDERS WHERE ID=%d",
                     $FolderId);    
   $sql=ibase_query($d,$sqltext);
   $json['status']=0;
   ibase_close($d);
   
   print(json_encode($json,JSON_HEX_TAG));
   unset($json);
?>