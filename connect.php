<?php

$dbhost = 'localhost';
$dbusername = 'root';
$dbuserpassword = 'rootroot';
$default_dbname = 'mybook_db';

function db_connect() {
global $dbhost, $dbusername, $dbuserpassword, $default_dbname;
global $MYSQL_ERRNO, $MYSQL_ERROR;
$link_id = mysql_connect($dbhost, $dbusername, $dbuserpassword);
if(!$link_id) {
$MYSQL_ERRNO = 0;
$MYSQL_ERROR = "Connection failed to the host $dbhost.";
return 0;
}
else if(empty($dbname) && !mysql_select_db($default_dbname)) {
$MYSQL_ERRNO = mysql_errno();
$MYSQL_ERROR = mysql_error();
return 0;
}
else return $link_id;
}
?>
