<?php
   require_once("db.php");
   include ("vargetpost2.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $json=array(); 

   $FolderId=post2var('u',-1);
   $ItemName=post2var('n',"");
   $ItemDesc=post2var('d',"");

   $d=ibconnectex();
   
   if ($d==0)
     {
       $json['status']=1;
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
     }

   if ($FolderId == -1)
      {
       ibase_close($d); 
       $json['status']=1;
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
      }

   $sqltext="INSERT INTO ITEMS(FID,ITEMNAME,ITEMDESC) VALUES (?,?,?)";
   $sql=ibase_query($d,$sqltext,$FolderId,$ItemName,$ItemDesc);
   $json['status']=0;
   ibase_close($d);
   
   print(json_encode($json,JSON_HEX_TAG));
   unset($json);
?>