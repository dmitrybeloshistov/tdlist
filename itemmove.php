<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $json=array(); 

   $ItemId=$_GET['u'];
   $FolderId=$_GET['f'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       $json['status']=1;
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
     }

   $sqltext=sprintf("UPDATE ITEMS SET FID=%d WHERE ID=%d",
                     $FolderId,$ItemId);    
   $sql=ibase_query($d,$sqltext);
   $json['status']=0;
   ibase_close($d);
   
   print(json_encode($json,JSON_HEX_TAG));
   unset($json);
?>