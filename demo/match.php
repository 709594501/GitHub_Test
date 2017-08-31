<?php
header("Content-type: text/html; charset=utf-8");
class SinaIP{
    /**
     * 获取IP的归属地( 新浪IP库 )
     *
     * @param $ip String        IP地址：112.65.102.16
     * @return Array
     */
    static public function getIpCity($ip)
    {
        $ip = preg_replace("/\s/","",preg_replace("/\r\n/","",$ip));
        $link = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=".$ip."&t=".time();
        $ipJson = self::httpCurl($link);
       $str = str_replace('var remote_ip_info =','',$ipJson);
        $json_str = rtrim($str,';');
        $list =  json_decode($json_str,true);
       return $list;
    }

    /**
     * Curl方式获取信息
     */
    static public function httpCurl($url)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl_handle, CURLOPT_FAILONERROR,1);
        $file_content = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $file_content;
    }

    /**
     * 将unicode编码转化为中文，转化失败返回原字符串
     *
     * @param $code String      unicode编码
     * @return String
     */
    static public function ucode2zh($code)
    {
        $temp = explode('\u',$code);
        $rslt = array();
        array_shift($temp);
        foreach($temp as $k => $v)
        {
            $v = hexdec($v);
            $rslt[] = '&#' . $v . ';';
        }

        $r = implode('',$rslt);
        return empty($r) ? $code : $r;
    }
}
$ip = '120.41.153.63';       //厦门ip
//$ip = '130.25.48.12';  //测试ip  意大利
$city_info = SinaIP::getIpCity($ip);
$city = $city_info['city'];
$patt = '/厦门/';
preg_match_all($patt,$city,$match);
print_r($match);