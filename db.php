<?php

function ibconnectex()
{
$dbh = @ibase_connect('LOCALHOST:D:\IBDatabases\tdl\TDL.FDB','tdl','tdl',"UNICODE_FSS",0,3,'');
return $dbh;
}

?>