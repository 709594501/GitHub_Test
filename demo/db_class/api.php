<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/14
 * Time: 13:57
 */
header("Content-Type:text/html;charset=gbk");
require_once('db_class.php');
$db = new DB();

$sql = 'select * from v9_stock_info';
$info = $db->get_all($sql);
$table = 'v9_stock_info';

$sql = "insert into v9_stock_info (code,name,alias) VALUES (5,'ÆÖ·¢ÒøÐÐ',5)";
$db->query($sql);