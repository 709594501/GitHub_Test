<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/20
 * Time: 11:04
 */

//curl�������ݷ���
//$url  ����ĵ�ַ
header("Content-type: text/html; charset=gbk");
require_once('db_class.php');
function  php_curl($url){
//��ʼ��
    $curl = curl_init();
//����ץȡ��url
    curl_setopt($curl, CURLOPT_URL, $url);
//����ͷ�ļ�����Ϣ��Ϊ���������
    curl_setopt($curl, CURLOPT_HEADER, 0);
//���û�ȡ����Ϣ���ļ�������ʽ���أ�������ֱ�������
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//����post��ʽ�ύ
    curl_setopt($curl, CURLOPT_POST, 1);
//����post����
    $post_data = array(
        "username" => "coder",
        "password" => "12345"
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
//ִ������
    $data = curl_exec($curl);
//�ر�URL����
    curl_close($curl);
//��ʾ��õ�����

//$str = rtrim($data,']');
//$str = ltrim($str,'[');
//echo $str;
    $str= $data;
    $str = trim( $str );
    $str = ltrim( $str, '(' );
    $str = rtrim( $str, ')' );
    $a = preg_split('#(?<!\\\\)\"#', $str );
    for( $i=0; $i < count( $a ); $i+=2 ){
        $s = $a[$i];
        $s = preg_replace('#([^\s\{\}\:\,]+):#', '"\1":', $s );
        $a[$i] = $s;
    }
    //var_dump($a);
    $str = implode( '"', $a );
    return $str;



}

$db = new DB();
$table = 'v9_stock_info';
$page = empty($_GET['page'])?1:$_GET['page'];
$url = "http://vip.stock.finance.sina.com.cn/quotes_service/api/json_v2.php/Market_Center.getHQNodeData?page=$page&num=100&sort=symbol&asc=1&node=hs_a&symbol=&_s_r_a=init";

$stock_list =  php_curl($url);
$json = iconv('gbk','utf-8',$stock_list);
$list = json_decode($json,true);
$cnt = count($list);
//print_r($list);exit;
for($i=0;$i<$cnt;$i++){
    $code = $list[$i]['code'];
    $symbol = $list[$i]['symbol'];
    //echo $code;
    $stock_name = iconv('utf-8','gbk',$list[$i]['name']);
    $sql = "select * from v9_stock_info where code='$code'";
    $res = $db->get_one($sql);
    //print_r($res);
    if(empty($res)){
        $sql = "insert into v9_stock_info (code,name,symbol,alias) VALUES ($code,'$stock_name','$symbol','')";
        $db->query($sql);
        echo 'success';
    }

}







