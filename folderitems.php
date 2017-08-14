<?php
   require_once("db.php");

   header("Access-Control-Allow-Origin: *");
   header("Content-type: text/html; charset=UTF-8");
  
   $s=""; 

   $FolderId=$_GET['fid'];

   $d=ibconnectex();
   
   if ($d==0)
     {
       exit;
     }

   $sqltext=sprintf("SELECT ID,ITEMNAME,ITEMDESC,CHK FROM ITEMS WHERE FID=%d",
                     $FolderId);   
   $sql=ibase_query($d,$sqltext); 
 
   while ($row=ibase_fetch_object($sql))
     {
      
      if ($row->CHK == 1) 
      {
        $chk="checked";
        $fnt="style=\"text-decoration:line-through;\"";  
      }
     else 
      {
       $fnt="";
       $chk="";
      }
      
print(sprintf("
       <li id=\"it_%d\" draggable=\"true\" ondragstart=\"dragstart_handler(event);\">         
       <a href=\"#\"><input type=\"checkbox\" %s id=\"cb_%d\" style=\"float:left; position:absolute; top:5;\" onclick=\"DBMarkItem(%d);\">&nbsp;&nbsp;&nbsp;&nbsp;
       <span %s onclick=\"showhide_divbyid('content_%d');\">%s</span><span style=\"float:right;\" onclick=\"DBDeleteItem(%d);\">&times;</span></a>       
       </li>
       <div id=\"content_%d\" style=\"display:none; font-size:small; border:1px solid black;\">
       %s  
       </div>",
       $row->ID,$chk,$row->ID,$row->ID,$fnt,$row->ID,$row->ITEMNAME,$row->ID,$row->ID,$row->ITEMDESC));
     }
   
   ibase_close($d);
?>