<?php
include_once("connect.php");

$q = strtolower($_GET["code"]);
$query=mysql_query("select * from art where title like '$q%' limit 0,10");
$result = array();
if(!empty($query)){
while ($row=mysql_fetch_array($query)) {
	$result[] = array(
		    'id' => $row['id'],
		    'label' => $row['title']
	);
}}else{
    $result = '[]';
}

echo json_encode($result);
?>g