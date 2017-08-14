<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $json=array(); 

   $UserId=$_GET['u'];
   $FolderName=$_GET['p'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       $json['status']=1;
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
     }

   $sqltext="INSERT INTO FOLDERS(FOLDERNAME,UID) VALUES (?,?)";
   $sql=ibase_query($d,$sqltext,$FolderName,$UserId);
   $json['status']=0;
   ibase_close($d);
   
   print(json_encode($json,JSON_HEX_TAG));
   unset($json);
?>