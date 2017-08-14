<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $s=""; 

   $UserId=$_GET['uid'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       exit;
     }

   $sqltext=sprintf("SELECT ID,FOLDERNAME FROM FOLDERS WHERE UID=%d",
                     $UserId);   
   $sql=ibase_query($d,$sqltext); 
 
   while ($row=ibase_fetch_object($sql))
     {
      print(sprintf("<li id=\"fl_%d\" ondrop=\"drop_handler(event);\" ondragover=\"dragover_handler(event);\"><a href=\"#\"><span onclick=\"DoSetCurrentFolder(%d,'%s');\">%s</span>
                    <span style=\"float:right; position:relative;\" onclick=\"DBDeleteFolder(%d);\">&times;</span></a></li>",
                    $row->ID,$row->ID,$row->FOLDERNAME,$row->FOLDERNAME,$row->ID));
     }
   
   ibase_close($d);
?>