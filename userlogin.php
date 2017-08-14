<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $json=array(); 

   $username=$_GET['u'];
   $userpass=$_GET['p'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       $json['UID']=-1;
       $json['UserName']="";
       print(json_encode($json,JSON_HEX_TAG));
       unset($json); 
       exit;
     }

   $sqltext="SELECT FIRST 1 ID,UNAME FROM USERS WHERE UNAME=? AND UPASS=?";

   $sql=ibase_query($d,$sqltext,$username,$userpass);
   $flag=false;
   while ($row=ibase_fetch_object($sql))
     {
       $json['UID']=$row->ID;
       $json['UserName']=$row->UNAME;
       $flag=true;
     }
  
   ibase_close($d);
   
   if ($flag !== true)
      {
       $json['UID']=-1;
       $json['UserName']="";
      } 

   print(json_encode($json,JSON_HEX_TAG));
   unset($json);
?>